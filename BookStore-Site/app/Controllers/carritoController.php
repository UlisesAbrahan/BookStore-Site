<?php
namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\ProductoModel;
use App\Models\CabeceraModel;
use App\Models\DetalleModel;
use App\Models\UsuarioModel;
use CodeIgniter\I18n\Time;

$cart=\Config\Services::cart();


class CarritoController extends Controller 
{

    public function __construct(){

       helper(['form','url','cart']);
       $session= session();
       $cart= \Config\Services::cart();
       $cart->contents();
       }    

       public function control(){
        $cart=\Config\Services::cart();
        $response=$cart->contents();
        $data=json_encode($response);
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    
       }
 
       public function carrito() {

        $data['titulo'] = 'Listar Productos';
        echo view("templates/head.php", $data);
        echo view("templates/menu.php");
        echo view('plantillas/carrito');
        echo view("templates/piePagina.php");
       }

       public function agregarCarrito() {

           $cart = \Config\Services::cart();
           $request = \Config\Services::request();
           $producto = new productoModel();
       
           $productId = $request->getPost('id');
           $product = $producto->find($productId);
      
           //si stock es mayor a 0
           if ($product['stock'] > 0) {
               // Restar 1 al stock del producto
               $newStock = $product['stock'] - 1;
               $product['stock'] = $newStock;
               $producto->update($productId, $product);
       
               // Agregar el producto al carrito ,con el stock actualizado como opción.
               $cart->insert(array(
                   'id' => $productId,
                   'qty' => 1,
                   'price' => $request->getPost('price'),
                   'name' => $product['nombre'],
                   'imagen' => $product['imagen'], // Agregamos la imagen al carrito
                ));
               session()->setFlashdata('mensaje', 'El producto se agrego de forma exitosa');
               return $this->response->redirect(base_url('/catalogo'));

               
           } else {
            session()->setFlashdata('mensaje', 'El producto no está en stock');
            return $this->response->redirect(base_url('/catalogo'));
           }
       }
       

    public function eliminarElemento($rowid) {


    $cart=\Config\Services::cart();
    $producto=new productoModel();
   
    $a=$producto->where('id_prod',$cart->getItem($rowid)['id'])->first();
    
    //actualiza el stock
    $asociar=[
       'stock'=>$a['stock']=$a['stock']+$cart->getItem($rowid)['qty'] ,
    ];
    $producto->where('id_prod',$cart->getItem($rowid)['id'])->update($cart->getItem($rowid)['id'],$asociar);
    
    $cart->remove($rowid); //elimina items
    return redirect()->to(base_url('carrito'));
   }

   public function cancelarCompra(){
          $cart=\Config\Services::cart();
          $producto=new productoModel();
           foreach($cart->contents() as $key=>$items){ 
             
             $a=$producto->where('id_prod',$items['id'])->first();
             
             $asociar=[
                'stock'=>$a['stock']=$a['stock']+ $items['qty'],
             ];
             $producto->where('id_prod',$items['id'])->update($items['id'],$asociar);

            };
         
         $cart->destroy(); //destruye carrito
         return redirect()->to(base_url('carrito'));
        }
   
   

   public function confirmarCompra()
   {
       $cart = \Config\Services::cart();
       $productos = $cart->contents();
       $session = session();
       $idUsuario = $session->get('id_usuario');
       $montoTotal = 0;
   
       foreach ($productos as $producto) {
           $montoTotal += $producto["subtotal"];
       }
   
       $ventaCabecera = new CabeceraModel();
       $idCabecera = $ventaCabecera->insert(["total" => $montoTotal, "id_usuario" => $idUsuario]);
   
       $ventaDetalle = new DetalleModel();
       $productoModel = new ProductoModel();
   
       foreach ($productos as $producto) {
           $ventaDetalle->insert([
               "id_cabecera" => $idCabecera,
               "id_prod" => $producto["id"],
               "cantidad" => $producto["qty"],
               "precioUni" => $producto["price"],
               
             ]);
   }
   
       // Limpia el carrito después de confirmar la compra
       $cart->destroy();
       session()->setFlashdata('mensaje', 'Muchas gracias por tu compra, te estaremos mandando un correo con tu numero de pedido y instrucciones para la entrega .');
       return redirect()->to(base_url('mostrarCabeceraFactura/' . $idCabecera));

   }



       }
   

