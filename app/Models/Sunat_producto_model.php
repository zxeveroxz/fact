<?php

namespace App\Models;

use CodeIgniter\Model;

class Sunat_producto_model extends Model
{
    protected $table = 'sunat_producto_vista';
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
