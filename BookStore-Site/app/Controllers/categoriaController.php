<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\CategoriaModel;


class CategoriaController extends Controller
{

    protected $categorias;

    public function __construct()
    {

        $this->categorias = new CategoriaModel();
    }



    //listar todos las categorias que estan activas
    public function listarCategorias($activo = 1)
    {

        $data['titulo'] = 'Listar categorias';
        echo view("templates/head.php", $data);
        echo view("templates/menuAdmin.php");
        $categorias = $this->categorias->where('activo', $activo)->findAll();
        $data = [
            'datos' => $categorias
        ];

        echo view('plantillas/categorias/categorias', $data);

        echo view("templates/piePagina.php");

    }


    //--------------------------------------------------------------------------------------------------------------------------------------

    //METODOS PARA AGREGAR CATEGORIAS.
    public function agregarCategoria()
    {
        $data['titulo'] = 'Agregar categorias';
        echo view("templates/menuAdmin.php");
        echo view("templates/head.php", $data);
        echo view("plantillas/categorias/agregarCategorias.php");
        echo view("templates/piePagina.php");
    }


    public function guardarCategoria()
    {

        
        $session = session();
        //me permite capturar la informacion y guardarla a la base de datos.
        $categoriaModel = new CategoriaModel();

        //validacion.
        $validacion = $this->validate([


            'descripcion' => 'required'


        ]);



        if (!$validacion) { //si no se da la validacion.
            $session = session();
            $session->setFlashdata('mensaje', 'revise la informacion');

            return $this->response->redirect(base_url('/agregarCategorias'));
        } else {
            $datos = [


                'descripcion' => $this->request->getVar('descripcion'),

            ];

            $categoriaModel->insert($datos);
            $session->setFlashdata('mensaje', 'La categoria se agrego de forma existosa');

            return $this->response->redirect(base_url('/categorias'));

        }



    }


    public function bajaCategoria($id_categ = null)
    {
        
        $session = session();
        // Obtener el modelo de categorias
        $categoriaModel = new CategoriaModel();

        // Obtener el producto por su ID
        $categoria = $categoriaModel->find($id_categ);

        if ($categoria) {
            // Actualizar el campo activo a 0 para indicar que el producto está inactivo
            $categoria['activo'] = 0;

            // Guardar los cambios en la base de datos
            $categoriaModel->save($categoria);
        }
        $session->setFlashdata('mensaje', 'La categoria se dio de baja de forma existosa');
        return redirect()->to(base_url('/categorias'));
    }

    public function altaCategoria($id_categ = null)
    {
        
        $session = session();
        // Obtener el modelo de categorias
        $categoriaModel = new CategoriaModel();

        // Obtener el producto por su ID
        $categoria = $categoriaModel->find($id_categ);

        if ($categoria) {
            // Actualizar el campo activo a 1 para indicar que el producto está inactivo
            $categoria['activo'] = 1;

            // Guardar los cambios en la base de datos
            $categoriaModel->save($categoria);
        }
        $session->setFlashdata('mensaje', 'La categoria se dio de alta de forma existosa');
        return redirect()->to(base_url('/categorias'));
    }


    public function modificarCategoria($id_categ = null)
    {

        $data['titulo'] = 'Modificar categoria';

        echo view("templates/head.php", $data);
        echo view("templates/menuAdmin.php");

        //me permite capturar la informacion y guardarla a la base de datos
        $categoriaModel = new CategoriaModel();

        $datos['categorias'] = $categoriaModel->where('id_categ', $id_categ)->first();
        echo view('plantillas/categorias/modificarCategorias', $datos);

        echo view("templates/piePagina.php");
    }

    public function actualizarCategoria()
    {

        
        $session = session();


        //me permite capturar la informacion y guardarla a la base de datos
        $categoriaModel = new CategoriaModel();

        $datos = [

            'descripcion' => $this->request->getVar('descripcion'),



        ];

        $id_categ = $this->request->getVar('id_categ');
        $categoriaModel->update($id_categ, $datos); //actualiza la informacion

        //validacion



        $categoriaModel->update($id_categ, $datos);

        //redirecciona
        $session->setFlashdata('mensaje', 'La categoria se modifico de forma existosa');
        return $this->response->redirect(base_url('/categorias'));


    }

    public function cateEliminado($activo = 0)
    {
        
        $session = session();

        $data['titulo'] = 'Listar categorias';
        echo view("templates/head.php", $data);
        echo view("templates/menuAdmin.php");
        $categorias = $this->categorias->where('activo', $activo)->findAll();
        $data = [
            'datos' => $categorias
        ];
       
        echo view('plantillas/categorias/categoriaEliminados', $data);

        echo view("templates/piePagina.php");

    }


    public function obtenerCategorias()
{
    $categoriaModel = new CategoriaModel();
    $categorias = $categoriaModel->findAll();

    return $categorias;
}

    





}