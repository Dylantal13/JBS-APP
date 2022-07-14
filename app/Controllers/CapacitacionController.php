<?php

namespace App\Controllers;
use App\Models\CapacitacionModel;

class CapacitacionController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function getAll()
    {
        /* try {
                
                $comisionModel = new ComisionModel();


                $nombre = $this->input->post('nombre');
                $descripcion = $this->input->post('descripcion');

                $list = $comisionModel->get_datatables($nombre, $descripcion);
                $data = array();
                $no = $_POST['start'];
                //var_dump($list);
                foreach ($list as $comision) {
                    $no++;
                    $row = array();
                    $row[] = $comision->id;
                    $row[] = $comision->nombre;
                    $row[] = $comision->descripcion;
    
                    $data[] = $row;
                }

                $output = array(
                    "draw" => $_POST['draw'],
                    "recordsTotal" => $comisionModel->count_all(),
                    "recordsFiltered" => $comisionModel->count_filtered($nombre, $descripcion),
                    "data" => $data,
                );
                //output to json format
                echo json_encode($output);
        } catch (Exception $e) {
            log_message('error', $e->getMessage());
        } */

               /* Contar todas las comisiones */
        /* $comision = $comisionModel->where('active', 1)
        ->countAll(); */

        /* filtrado */
        /*    $comision = $comisionModel->where('active', 1)
            ->where('id', '1')
            ->countAllResults();
        */

        
        /* $comision = $comisionModel
            ->where('nombre', 'comision 1')
            ->where('descripcion', 'comision 1 descripcion')
            ->orderBy('nombre', 'asc')
            ->first(); */

            $capacitacion = new CapacitacionModel();
          
            $data['capacitaciones'] = $capacitacion->orderBy('id', 'DESC')->findAll();
            
            $vista = view('capacitacion/all_capacitaciones', $data);

           // $view = \Config\Services::renderer(); 
            //$vista = $view->render('comision/all_comisiones', $data, true);
    
            $dataPrincipal = [
                'datos_principales'   => $vista,
            ];

            //echo  $view->setVar('comision/all_comisiones', $data)
              //  ->render('template/main', $dataPrincipal);
        
            echo view('template/main', $dataPrincipal);

      /*   print_r($comision); */
        //echo json_encode($this->count_all());
    }


    public function getAllQuery()
    {

        helper(['form', 'url']);

       /*  var_dump($this->request->getPost('nombre'));
        $nombre = $this->request->getPost('nombre');
        die; */
        $comision = new ComisionModel();
        $data['comisiones'] = $comision
        ->like('nombre',$nombre)
        ->first();
        
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $comision->where('active', 1)
            ->countAll(),
            "recordsFiltered" =>  $comision->where('active', 1)
            ->countAll(),
            "data" => $data,
        );

        //output to json format
        echo json_encode($output);
    }
    

}
