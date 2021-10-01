<?php

namespace App\Models;

use CodeIgniter\Model;

class Proveedor_model extends Model
{
    protected $table = 'tbl_proveedor';
    protected $primaryKey = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['RUC_', 'nro', 'nom', 'giro', 'direccion', 'telefono', 'correo', 'web', 'contacto', 'detalles', 'estado'];
    protected $useTimestamps = true;
    protected $createdField = 'creacion';
    protected $updatedField = 'act';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}
