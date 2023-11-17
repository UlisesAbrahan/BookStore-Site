<?php 
namespace App\Models;

use CodeIgniter\Model;

class DetalleModel extends Model{
    protected $table      = 'detalle';
 
    protected $primaryKey = 'id_detalle';

    protected $allowedFields = ["id_prod","id_cabecera","cantidad","precioUni"];
}