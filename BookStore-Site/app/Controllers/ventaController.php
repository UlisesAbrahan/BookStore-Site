<?php
namespace App\Controllers;

use App\Models\CabeceraModel;
use CodeIgniter\Controller;
use App\Models\DetalleModel;
use App\Models\UsuarioModel;


class ventaController extends Controller
{


 
public function listarVentas()
{
    $data['titulo'] = 'Lista de ventas';

    echo view("templates/head.php", $data);
    echo view("templates/menuAdmin.php");
    //me permite capturar la informacion y guardarla a la base de datos
    $ventaModel = new CabeceraModel();

    //le asignamos un indice,ordene la informacion de acuerdo al id, y de forma ascendente y que busque todos los registros 
    //y depositar en $datos['productos'] 
    
    $datos['datos'] = $ventaModel->orderBy('id_cabecera', 'ASC')->findAll();

    echo view('plantillas/ventas/listarVentas', $datos);
    echo view("templates/piePagina.php");
}


public function actualizarVenta()
{
    $ventaModel = new CabeceraModel();

    // Obtén el estado enviado desde la solicitud AJAX
    $estado = $this->request->getPost('estado');

    // Obtén el ID de la venta desde la solicitud AJAX
    $id_cabecera= $this->request->getPost('id_cabecera');

    // Verifica si se proporcionó un ID de consulta válido
    if (!empty($id_cabecera)) {
        // Define la cláusula "where" para actualizar solo el registro con el ID de consulta proporcionado
        $ventaModel->where('id_cabecera', $id_cabecera)
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
