<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;
use App\Models\ProductoModel;

class AdminController extends Controller{
protected $usuarioModel;

    public function __construct(){

        
        $this->usuarioModel= new UsuarioModel ();
   
       }
    

    public function vistaAdmin()
    {



        $data['titulo'] = 'Administrador';

        echo view("templates/head.php", $data);
        echo view("templates/menuAdmin.php");
        echo view("plantillas/inicioAdmin.php");
        echo view("templates/piePagina.php");


    }


    
//--------------------------------------------------------------------------------------------------------------------------------------

  // METODO PARA LISTAR USUARIOS.
public function listarClientes()
{
    $data['titulo'] = 'Lista de Clientes';
    echo view("templates/head.php", $data);
    echo view("templates/menuAdmin.php");

    // Me permite capturar la información y guardarla en la base de datos
    $usuarioModel = new UsuarioModel();

    // Asignamos un índice, ordenamos la información por id de forma ascendente y buscamos todos los registros 
    // excepto aquellos con id_perfil igual a 1, y los depositamos en $datos['usuarios']
    $datos['usuarios'] = $usuarioModel->where('activo', 1)->where('id_perfil !=', 1)->orderBy('id_usuario', 'ASC')->findAll();

    echo view('plantillas/usuarios/listarClientes', $datos);
    echo view("templates/piePagina.php");
}


    //METODO PARA BORRAR USUARIOS.(borrado logico)

    public function borrarClientes($id_usuario = null)
    {
        $session = session();
        // Obtener el modelo de usuarios
        $usuarioModel = new UsuarioModel();

        // Obtener el usuario por su ID
        $usuario = $usuarioModel->find($id_usuario);

        if ($usuario) {
            // Actualizar el campo activo a 0 para indicar que el usuario está inactivo
            $usuario['activo'] = 0;

            // Guardar los cambios en la base de datos
            $usuarioModel->save($usuario);
        }
        $session->setFlashdata('mensaje', 'El cliente se dio de baja de forma existosa');
        return redirect()->to(base_url('/listarClientes'));
    }

    public function altaCliente ($id_usuario = null)
{

    $session = session();
    // Obtener el modelo de usuarios
    $usuarioModel = new usuarioModel();

    // Obtener el usuario por su ID
    $usuario = $usuarioModel->find($id_usuario);

    if ($usuario) {
        // Actualizar el campo activo a 1 para indicar que el usuario está inactivo
        $usuario['activo'] = 1;

        // Guardar los cambios en la base de datos
        $usuarioModel->save($usuario);
    }
    $session->setFlashdata('mensaje', 'El cliente se dio de alta de forma existosa');
    return redirect()->to(base_url('/clientesBaja'));
}



public function clientesBaja ($activo = 0) {

    $data['titulo'] = 'Listar clientes de baja';
    echo view("templates/head.php", $data);
    echo view("templates/menuAdmin.php");
   
    $usuarios= $this->usuarioModel->where('activo', $activo)->findAll();
    $data= [
         'usuarios'=>$usuarios
    ];
    
    echo view('plantillas/usuarios/clientesBaja',$data );

    echo view("templates/piePagina.php");

}


}