<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario_model extends Model
{
    protected $table = 'tbl_usuario';
    protected $primaryKey = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['RUC_', 'user', 'pass', 'nom', 'correo', 'estado'];
    protected $useTimestamps = true;
    protected $createdField = 'creacion';
    protected $updatedField = 'act';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
