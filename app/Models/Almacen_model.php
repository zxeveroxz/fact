<?php

namespace App\Models;

use CodeIgniter\Model;

class Almacen_model extends Model
{
    protected $table = 'tbl_almacen';
    protected $primaryKey = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['nom', 'direccion', 'detalles'];
    protected $useTimestamps = true;
    //protected $createdField = 'creacion';
    //protected $updatedField = 'act';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
