<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriaModel extends Model
{
    protected $table      = 'categoriaProd';
    protected $primaryKey = 'id_categ';
    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

     //acticar acceso a las columnas
     protected $allowedFields = ["descripcion","activo"];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'fecha_alta';
    protected $updatedField  = 'fecha_edit';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
   
 


}