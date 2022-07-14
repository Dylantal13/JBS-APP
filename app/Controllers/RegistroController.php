<?php

namespace App\Controllers;
use App\Models\RegistroModel;
use App\Models\ComisionModel;

class RegistroController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function getAll()
    {
       


      
            $registro = new RegistroModel();
            $data['registros'] = $registro->orderBy('id', 'DESC')->findAll();
            $vista = view('registro/all_registros', $data);
    
            $dataPrincipal = [
                'datos_principales'   => $vista,
            ];

            echo view('template/main', $dataPrincipal);

    }


    public function getAllQuery()
    {

        helper(['form', 'url']);

        $registro = new RegistroModel();
        $data['registro'] = $registro
        ->like('nombre',$nombre)
        ->first();

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $registro->where('active', 1)
            ->countAll(),
            "recordsFiltered" =>  $registro->where('active', 1)
            ->countAll(),
            "data" => $data,
        );

        //output to json format
        echo json_encode($output);
    }

    public function crear()
    {

        /* buscar las comisiones */
        $comision = new ComisionModel();
        $comisiones['comisiones'] = $comision->orderBy('id', 'DESC')->findAll();

        $vista = view('registro/crear_registro',$comisiones);
        $dataPrincipal = [
            'datos_principales'   => $vista,
        ];


        
            echo view('template/main', $dataPrincipal);
    }
    

}
