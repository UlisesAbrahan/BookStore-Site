<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsuarioModel;

class UsuarioController extends Controller
{

//--------------------------------------------------------------------------------------------------------------------------------------

    //METODO PARA REGISTRAR.
    public function registro()
    {
        
        $data['titulo'] = 'registro';

        echo view("templates/head.php", $data);
        echo view("templates/menu.php");
        echo view("plantillas/registro.php");
        echo view("templates/piePagina.php");
}

    public function guardar()
    {   
        //validaciones
        $validacion = $this->validate([
            
            'nombre' => 'required|alpha|min_length[3]',
            'apellido' => 'required|alpha|min_length[3]',
            'email' => 'required|valid_email|is_unique[usuario.email]',
            'password' => 'required|min_length[8]|max_length[8]'
         ]);
         
        //si llego el post y cumplio la validacion
        if ($_POST && $validacion) {
            
            $datos = [
                'nombre' => $_POST['nombre'],
                'apellido' => $_POST['apellido'],
                'email' => $_POST['email'],
                'password' => $hashedPassword = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT) //encripta la contraseña ingresada
            ];
            
            //instancio el modelo
            $usuarioModel = new UsuarioModel();
            //inserto datos
            $usuarioModel->insert($datos);
            
            session()->setFlashdata('mensaje', 'Tu registro fue exitoso');

            return $this->response->redirect(base_url('/inicioSession'));
        
        } else {
            
            //si no pasa la validacion
              $error = $this->validator->listErrors();
                 // Cargar el archivo de mensajes traducidos
                 $mensajes = include(APPPATH . 'Custom/mensajes_error.php');
        
                  // Reemplazar los mensajes de error con los mensajes traducidos
                 foreach ($mensajes as $clave => $mensaje) {
                 $error = str_replace($clave, $mensaje, $error);
        }
            session()->setFlashdata('mensaje', $error);

            return $this->response->redirect(base_url('/registro'));
        }
    }

//--------------------------------------------------------------------------------------------------------------------------------------

    //METODO PARA INICIAR SESSION.

    public function inicioSession()
    {

        $data['titulo'] = 'Inicio Session';
        echo view("templates/head.php", $data);
        echo view("templates/menu.php");
        echo view("plantillas/iniciarSession.php");
        echo view("templates/piePagina.php");
    }
    
    public function login() {
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');

    // Instancio el modelo
    $model = new UsuarioModel();

    // Filtrar los registros de la tabla de usuarios, buscando aquellos que tengan el campo "email" igual al valor de la variable $email.
    $usuario = $model->where('email', $email)->first();

    if ($usuario) {
        // Verificar si el usuario está activo (estado = 1)
        if ($usuario['activo'] == 1) {
            if (password_verify($password, $usuario['password'])) {
                // Las credenciales son válidas
                if ($usuario['id_perfil'] == 1) {
                    // Usuario administrador
                    $sessionData = [
                        'id_usuario' => $usuario['id_usuario'],
                        'nombre'=> $usuario['nombre'],
                        'apellido'=> $usuario['apellido'],
                        'email' => $usuario['email'],
                        'id_perfil'=>$usuario['id_perfil']
                    ];

                    $session = session(); // Crea una sesión
                    $session->set($sessionData); // Asignamos a la sesión los valores de $sessionData
                    return redirect()->to(base_url('/vistaAdmin'));

                } elseif ($usuario['id_perfil'] == 2) {
                    // Usuario cliente registrado
                    $sessionData = [
                        'id_usuario' => $usuario['id_usuario'],
                        'nombre'=> $usuario['nombre'],
                        'apellido'=> $usuario['apellido'],
                        'email' => $usuario['email'],
                        'id_perfil'=>$usuario['id_perfil']
                    ];
                    $session = session(); // Crea una sesión
                    $session->set($sessionData); // Asignamos a la sesión los valores de $sessionData
                    return redirect()->to(base_url('/inicio'));
                }
            } else {
                // Contraseña incorrecta
                session()->setFlashdata('mensaje', 'Contraseña incorrecta');
            }
        } else {
            // Usuario no activo
            session()->setFlashdata('mensaje', 'El usuario no está activo. Contacte al administrador.');
        }
    } else {
        // Correo electrónico incorrecto
        session()->setFlashdata('mensaje', 'Correo electrónico incorrecto');
    }

    return redirect()->to(base_url('/inicioSession'));
}

//--------------------------------------------------------------------------------------------------------------------------------------

    //METODO PARA SALIR SESSION.
    public function salir()
    {
        $session = session();
        $session->destroy(); //destruye la session
        return redirect()->to(base_url('/inicio'));
    }

//--------------------------------------------------------------------------------------------------------------------------

}