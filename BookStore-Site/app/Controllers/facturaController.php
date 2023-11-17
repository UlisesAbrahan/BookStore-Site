<?php
namespace App\Controllers;


use CodeIgniter\Controller;
use App\Models\CabeceraModel;
use App\Models\DetalleModel;
use App\Models\UsuarioModel;
use App\Models\ProductoModel;



class facturaController extends Controller
{



    public function mostrarCabeceraFactura($idCabecera)
    {
        
        $data['titulo'] = 'Listar Productos';
        echo view("templates/head.php", $data);
        echo view("templates/menu.php");
        
        
        $cabeceraModel = new CabeceraModel();
        $detalleModel = new DetalleModel();
        $usuarioModel = new UsuarioModel(); // Instanciar el modelo de Usuario
        $productoModel = new ProductoModel();

        // Obtén los datos de la cabecera de la factura por su ID
        $cabecera = $cabeceraModel->find($idCabecera);

        // Obtén los detalles de la factura relacionados con la cabecera por su ID de cabecera
        $detalle = $detalleModel->where('id_cabecera', $idCabecera)->findAll();

        // Obtén el nombre del usuario correspondiente al ID de usuario en la cabecera
        $usuario = $usuarioModel->find($cabecera['id_usuario']);
        $nombreUsuario = $usuario['nombre'] . ' ' . $usuario['apellido']; // Suponiendo que el nombre de usuario está en el campo 'nombre'

        // Obtén el nombre de cada producto en los detalles
    foreach ($detalle as &$item) {
    $producto = $productoModel->find($item['id_prod']);
    $item['nombre_producto'] = $producto['nombre'];
}
        // Pasar los datos a la vista
        $data['factura'] = $cabecera;
        $data['detalle'] = $detalle;
        $data['nombreUsuario'] = $nombreUsuario;
        $data['nombre_Producto'] = $producto; // Pasar el nombre del usuario a la vista

        // Cargar la vista de la factura
        echo view('plantillas/verFactura', $data);
        echo view("templates/piePagina.php");
    }



}