<?php

namespace App\Models;

use CodeIgniter\Model;

class Producto_model extends Model
{
    protected $table = 'tbl_producto';
    protected $primaryKey = 'codigo';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['segmento', 'familia', 'clase', 'nom'];
    protected $useTimestamps = true;
    //protected $createdField = 'creacion';
    //protected $updatedField = 'act';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
