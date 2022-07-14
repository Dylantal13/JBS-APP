<?php

namespace App\Controllers;

class Dashboard extends BaseController
{
    public function index()
    {

        $view = \Config\Services::renderer(); 
        $vista = $view->render('dashboard/principal_dashboard');

        $data = [
            'datos_principales'   => $vista,
        ];
        
        echo view('template/main', $data);
    }
}
