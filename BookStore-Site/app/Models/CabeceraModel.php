<?php

namespace App\Models;

use CodeIgniter\Model;

class CabeceraModel extends Model
{
    protected $table      = 'cabecera';
    protected $primaryKey = 'id_cabecera';
 
    protected $useSoftDeletes = false;

     //acticar acceso a las columnas
     protected $allowedFields = ["id_usuario","fecha_alta","total","estado"];

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