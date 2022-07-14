<?php

namespace App\Controllers;
use App\Models\UserModel;

class UsuarioController extends BaseController
{
    public function getAll()
    {
            $usuarios = new UserModel();
            $data['usuarios'] = $usuarios->orderBy('id', 'DESC')->findAll();
            $vista = view('usuarios/all_usuarios', $data);

           // $view = \Config\Services::renderer(); 
            //$vista = $view->render('comision/all_comisiones', $data, true);
    
            $dataPrincipal = [
                'datos_principales'   => $vista,
            ];

            //echo  $view->setVar('comision/all_comisiones', $data)
              //  ->render('template/main', $dataPrincipal);
         
            echo view('template/main', $dataPrincipal);
    }
}
