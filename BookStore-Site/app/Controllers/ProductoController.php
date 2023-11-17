<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductoModel;
use App\Models\CategoriaModel;


class ProductoController extends Controller
{
    protected $categorias;
    protected $productoModel;
    protected $producto;

    public function __construct(){

     $this->categorias= new CategoriaModel ();
     $this->productoModel= new ProductoModel ();

    }
 

//--------------------------------------------------------------------------------------------------------------------------------------

    //METODO PARA LISTAR PRODUCTOS.
    public function listarProducto()
    {
        $data['titulo'] = 'Listar Productos';
        echo view("templates/head.php", $data);
        echo view("templates/menuAdmin.php");

        //me permite capturar la informacion y guardarla a la base de datos
        $productoModel = new ProductoModel();

        //le asignamos un indice,ordene la informacion de acuerdo al id, y de forma ascendente y que busque todos los registros 
        //y depositar en $datos['productos'] 
        
        $datos['productos'] = $productoModel->where('activo', 1)->orderBy('id_prod', 'ASC')->findAll();

        echo view('plantillas/producto/listar', $datos);
        echo view("templates/piePagina.php");
    }


 //--------------------------------------------------------------------------------------------------------------------------------------

    //METODOS PARA AGREGAR PRODUCTOS.
    public function agregarProductos()
    {
        $categoriaModel = new CategoriaModel();
        $datos['categorias'] = $categoriaModel->where('activo', 1)->findAll();
       
        $data['titulo'] = 'Agregar productos';
        echo view("templates/menuAdmin.php");
        echo view("templates/head.php", $data);
        echo view("plantillas/producto/agregarProductos1.php",$datos);
        echo view("templates/piePagina.php");
    }


    public function guardarProducto()
    {
        //me permite capturar la informacion y guardarla a la base de datos.
        $productoModel = new ProductoModel();
        
        //validacion.
        $validacion = $this->validate([

            'nombre' => 'required',
            'autor' => 'required',
            'descripcion' => 'required',
            'precioUni' => 'required',
            'stock' => 'required',
            'id_categ' => 'required',
            'imagen' => [
                'uploaded[imagen]',
                //exista una imagen
                'mime_in[imagen, image/jpg,image/jpeg,image/png]',
                //tenga un formato
                'max_size[imagen,1024]',
                //un tamaño maximo (validacion simple)
            ]
        ]);
        
    

        if (!$validacion) {       //si no se da la validacion.
            $session = session();
            $session->setFlashdata('mensaje', 'revise la informacion');
          
            return $this->response->redirect(base_url('/agregarProductos'));
        }

        if ($imagen = $this->request->getFile('imagen')) {

            $session = session();
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('assets/img/productos/', $nuevoNombre);
            $datos = [

                'nombre' => $this->request->getVar('nombre'),
                'autor' => $this->request->getVar('autor'),
                'descripcion' => $this->request->getVar('descripcion'),
                'precioUni' => $this->request->getVar('precioUni'),
                'stock' => $this->request->getVar('stock'),
                'id_categ' => $this->request->getVar('id_categ'),
                'imagen' => $nuevoNombre
            ];

            $productoModel->insert($datos);
            $session->setFlashdata('mensaje', 'El producto se agrego de forma existosa');

            
            return $this->response->redirect(base_url('/listar'));

        }



    }

    public function borrar($id_prod = null)
{

    $session = session();
    // Obtener el modelo de productos
    $productoModel = new ProductoModel();

    // Obtener el producto por su ID
    $producto = $productoModel->find($id_prod);

    if ($producto) {
        // Actualizar el campo activo a 0 para indicar que el producto está inactivo
        $producto['activo'] = 0;

        // Guardar los cambios en la base de datos
        $productoModel->save($producto);
    }
    $session->setFlashdata('mensaje', 'El producto se dio de baja de forma existosa');

    return redirect()->to(base_url('/listar'));
}

public function altaProd ($id_prod = null)
{
    $session = session();
    // Obtener el modelo de productos
    $productoModel = new ProductoModel();

    // Obtener el producto por su ID
    $producto = $productoModel->find($id_prod);

    if ($producto) {
        // Actualizar el campo activo a 1 para indicar que el producto está inactivo
        $producto['activo'] = 1;

        // Guardar los cambios en la base de datos
        $productoModel->save($producto);
    }
    $session->setFlashdata('mensaje', 'El producto se dio de alta de forma existosa');
    return redirect()->to(base_url('/eliminados'));
}


    public function modificar($id_prod = null)

    {

        $categoriaModel = new CategoriaModel();
        $datos['categorias'] = $categoriaModel->where('activo', 1)->findAll();

        $data['titulo'] = 'Modificar Productos';
        

        echo view("templates/head.php", $data);
        echo view("templates/menuAdmin.php");

        //me permite capturar la informacion y guardarla a la base de datos
        $productoModel = new ProductoModel();
       

        

        $datos['producto'] = $productoModel->where('id_prod', $id_prod)->first();

        

        echo view('plantillas/producto/modificar', $datos);

        echo view("templates/piePagina.php");
        
        

        

        
    }

    public function actualizar()
    {
        $session = session();
        $productoModel = new ProductoModel();
        $id_prod = $this->request->getVar('id_prod');
    
        // Obtener los datos actuales del producto
        $datosProducto = $productoModel->find($id_prod);
    
        // Validar la imagen solo si se proporciona una
        $validacion = $this->validate([
            'imagen' => [
                'uploaded[imagen]',
                'mime_in[imagen,image/jpg,image/jpeg,image/png]',
                'max_size[imagen,1024]',
            ]
        ]);
    
        // Actualizar los demás datos del producto
        $datos = [
            'nombre' => $this->request->getVar('nombre'),
            'descripcion' => $this->request->getVar('descripcion'),
            'precioUni' => $this->request->getVar('precioUni'),
            'stock' => $this->request->getVar('stock'),
            'id_categ' => $this->request->getVar('id_categ'),
        ];
    
        // Procesar la imagen solo si se proporciona una nueva
        if ($validacion && $imagen = $this->request->getFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($datosProducto['imagen'] && file_exists('assets/img/productos/' . $datosProducto['imagen'])) {
                unlink('assets/img/productos/' . $datosProducto['imagen']);
            }
    
            $nuevoNombre = $imagen->getRandomName();
            $imagen->move('assets/img/productos/', $nuevoNombre);
    
            $datos['imagen'] = $nuevoNombre;
        } else {
            // Mantener la imagen existente
            $datos['imagen'] = $datosProducto['imagen'];
        }
    
        $productoModel->update($id_prod, $datos);
        $session->setFlashdata('mensaje', 'El producto se modifico de forma existosa');
        // Redireccionar
        return redirect()->to(base_url('/listar'));
    }
    

    public function catalogo2($id_categ = null)
    {

        
     
            $productoModel = new ProductoModel();
            $data['titulo'] = 'Catálogo';
        
            if ($id_categ) {
                // Si se proporciona una categoría, filtramos los productos por esa categoría
                $productos = $productoModel->where('id_categ', $id_categ)->findAll();
            } else {
                // Si no se proporciona una categoría, mostramos todos los productos
                $productos = $productoModel->findAll();
            }
        
            $data['productos'] = $productos;
        
            echo view("templates/head.php", $data);
            echo view("templates/menu.php");
            echo view('plantillas/catalogo', $data); // La vista "catalogo.php" que mostrará los productos filtrados
            echo view("templates/piePagina.php");
        }
        
    
    
    

    public function eliminados ($activo = 0) {

        $data['titulo'] = 'Listar Productos';
        echo view("templates/head.php", $data);
        echo view("templates/menuAdmin.php");
        $productos= $this->productoModel->where('activo', $activo)->findAll();
        $data= [
             'datos'=>$productos
        ];
        
        echo view('plantillas/producto/eliminados',$data );

        echo view("templates/piePagina.php");
    
    }

 

    public function mostrarPorCategoria($id_categ) {
        $productos = new ProductoModel();
        $data['productos'] = $productos->getProductosPorCategoria($id_categ);
    
        return view('plantillas/catalogo', $data);
    }


    
}


