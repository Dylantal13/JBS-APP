<?php
namespace App\Controllers;

use Config\Email;
use Config\Services;
use App\Models\UserModel;

class LoginController extends BaseController
{
	/**
	 * Access to current session.
	 *
	 * @var \CodeIgniter\Session\Session
	 */
	protected $session;

	/**
	 * Authentication settings.
	 */
	protected $config;


    //--------------------------------------------------------------------

	public function __construct()
	{
		// start session
		$this->session = Services::session();

		// load auth settings
		$this->config = config('Auth');

        helper(['form', 'url']);
	}

    //--------------------------------------------------------------------

	/**
	 * Displays login form or redirects if user is already logged in.
	 */
	public function login()
	{
		if ($this->session->isLoggedIn) {
			return redirect()->to('/');
		}

		return view('login/login');
	}

    //--------------------------------------------------------------------

	/**
	 * Attempts to verify user's credentials through POST request.
	 */
	public function attemptLogin()
	{
        helper(['form', 'url']);
		// validate request
		$input = $this->validate([
			'email'		=> 'required|valid_email',
			'password' 	=> 'required|min_length[5]',
		]);

        if (!$input) {
            return redirect()->to('login')
            ->withInput()
            ->with('errors', $this->validator->getErrors());
        } 

		// check credentials
		$users = new UserModel();
		$user = $users->where('email', $this->request->getPost('email'))->first();

		if (
			is_null($user) ||
			!password_verify($this->request->getPost('password'), $user['password'])
		) {
			return redirect()->to('login')->withInput()->with('error', 'Error de ingreso, intente nuevamente');
		}

		// check activation
		if (!$user['active']) {
			return redirect()->to('login')->withInput()->with('error', 'El usuario no está activo');
		}

		// login OK, save user data to session
		$this->session->set('isLoggedIn', true);
		$this->session->set('userData', [
		    'id' 			=> $user['id'],
		    'name' 			=> $user['name'],
		    'email' 		=> $user['email'],
		    'new_email' 	=> $user['new_email']
		]);

        return redirect()->to('/');
	}

    //--------------------------------------------------------------------

	/**
	 * Log the user out.
	 */
	public function logout()
	{
		$this->session->remove(['isLoggedIn', 'userData']);

		return redirect()->to('login');
	}

}
