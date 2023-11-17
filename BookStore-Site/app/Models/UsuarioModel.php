<?php 
namespace App\Models; //ruta

use CodeIgniter\Model;

class UsuarioModel extends Model{ //herencia 
    protected $table      = 'usuario';
    
    protected $primaryKey = 'id_usuario';


    //activar columnas de la tabla
    protected $allowedFields = ["nombre", "apellido",  "email", "password", "id_perfil", "activo"];







}