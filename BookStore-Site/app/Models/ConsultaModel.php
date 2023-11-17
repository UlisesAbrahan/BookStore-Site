<?php

namespace App\Models;

use CodeIgniter\Model;

class ConsultaModel extends Model
{
    protected $table      = 'consulta';
    protected $primaryKey = 'id_consulta';
   
    protected $useSoftDeletes = false;

     //acticar acceso a las columnas
     protected $allowedFields = ["nombre","apellido","email","mensaje","estado","fecha_alta","fecha_edit"];

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