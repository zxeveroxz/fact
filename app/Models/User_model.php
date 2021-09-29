<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'tbl_usuario';
    protected $primaryKey = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['RUC_', 'user', 'pass', 'nom', 'estado'];
    protected $useTimestamps = false;
    protected $createdField = 'creacion';
    protected $updatedField = 'act';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function login(string $ruc, string $usu, string $paz)
    {
        return $this->db->table($this->table)
                 ->select('*')
                 ->where(['RUC_' => $ruc, 'user' => $usu, 'pass' => $paz])
                 ->get();

        //return $this->db->query('select now()');
    }
}
