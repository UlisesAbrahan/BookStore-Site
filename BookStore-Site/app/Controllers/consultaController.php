<?php
namespace App\Controllers;

use App\Models\ConsultaModel;
use CodeIgniter\Controller;

use App\Models\UsuarioModel;


class ConsultaController extends Controller
{
  

    
   


    

    public function VistaConsulta($id_usuario = null)
{
    

    $data['titulo'] = 'registro';
    echo view("templates/head.php", $data);
    echo view("templates/menu.php");
     echo view("plantillas/consultas.php", $data);
       

    echo view("templates/piePagina.php");
}

    
        


  public function verConsulta()
    {
        
        $data['titulo'] = 'registro';

        echo view("templates/head.php", $data);
        echo view("templates/menuAdmin.php");
        echo view("plantillas/consultas/listarConsulta.php");
        echo view("templates/piePagina.php");
}


    public function guardarConsulta()
{   
    $session = session();
    $id_usuario = $session->get('id_usuario');
    $email_usuario = $session->get('email');
    $nombre = $this->request->getPost('nombre');
    $apellido = $this->request->getPost('apellido');
    $email= $this->request->getPost('email');
    $mensaje= $this->request->getPost('mensaje');
    //instancio modelo
    $consultaModel = new ConsultaModel();
    $usuarioModel = new UsuarioModel ();

    print_r($id_usuario);

 //$usuario = $usuarioModel->where('email', $email)->first(); 


if ($id_usuario) {

    
if ($email==  $email_usuario) {
           // Las credenciales son válidas
            $datos = [
     'nombre' => $_POST['nombre'],
    'apellido' => $_POST['apellido'],
    'email' => $_POST['email'],
    'mensaje' => $_POST['mensaje'],
   
  ];
 
 //inserto datos
  $consultaModel->insert($datos);
    
 session()->setFlashdata('mensaje', 'Tu mensaje fue enviado con exito');
 return $this->response->redirect(base_url('/consultas'));
  }else{
        session()->setFlashdata('mensaje', 'correo incorrecto');
       return $this->response->redirect(base_url('/consultas'));


 }      
    
   } else {

    $datos = [
        'nombre' => $_POST['nombre'],
       'apellido' => $_POST['apellido'],
       'email' => $_POST['email'],
       'mensaje' => $_POST['mensaje'],
      
     ];
    
    //inserto datos
     $consultaModel->insert($datos);
       
    session()->setFlashdata('mensaje', 'Tu mensaje fue enviado con exito, le responderemos a la brevedad ');
    return $this->response->redirect(base_url('/consultas'));
    }
}

public function listarConsulta()
{
    $data['titulo'] = 'Listar Productos';
    echo view("templates/head.php", $data);
    echo view("templates/menuAdmin.php");

    //me permite capturar la informacion y guardarla a la base de datos
    $consultaModel = new ConsultaModel();

    //le asignamos un indice,ordene la informacion de acuerdo al id, y de forma ascendente y que busque todos los registros 
    //y depositar en $datos['productos'] 
    
    $datos['datos'] = $consultaModel->orderBy('id_consulta', 'ASC')->findAll();

    echo view('plantillas/consultas/listarConsulta', $datos);
    echo view("templates/piePagina.php");
}

public function actualizarConsulta()
{
    $consultaModel = new ConsultaModel();

    // Obtén el estado enviado desde la solicitud AJAX
    $estado = $this->request->getPost('estado');

    // Obtén el ID de la consulta desde la solicitud AJAX
    $id_consulta = $this->request->getPost('id_consulta');

    // Verifica si se proporcionó un ID de consulta válido
    if (!empty($id_consulta)) {
        // Define la cláusula "where" para actualizar solo el registro con el ID de consulta proporcionado
        $consultaModel->where('id_consulta', $id_consulta)
                      ->set('estado', 1)
                      ->update();
        
        // Devuelve una respuesta (puede ser un mensaje de éxito o cualquier otra información)
        return 'Estado de consulta actualizado con éxito';
    } else {
        // Devuelve una respuesta indicando que no se proporcionó un ID de consulta válido
        return 'Error: ID de consulta no válido';
    }


    }
}


 
