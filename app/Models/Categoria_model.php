<?php

namespace App\Models;

use CodeIgniter\Model;

class Categoria_model extends Model
{
    protected $table = 'tbl_categoria';
    protected $primaryKey = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['RUC_', 'user', 'nom', 'detalles', 'estado'];
    protected $useTimestamps = true;
    protected $createdField = 'creacion';
    protected $updatedField = 'act';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    
}
