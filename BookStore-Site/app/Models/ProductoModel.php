<?php 
namespace App\Models;

use CodeIgniter\Model;


//extends indica herencia
class ProductoModel extends Model{
    protected $table      = 'producto';
  
    protected $primaryKey = 'id_prod';


    //acticar acceso a las columnas
    protected $allowedFields = ["nombre","autor", "descripcion", "precioUni", "imagen","stock","stock_min","id_categ","activo"];

    
    


}


