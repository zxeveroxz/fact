<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
    protected $table = 'tbl_user';
    protected $primaryKey = 'idx';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $allowedFields = ['ruc', 'raz', 'usu', 'paz', 'cor', 'niv', 'est', 'img', 'nom', 'ver', 'anexos', 'token'];

    public function login(string $ruc, string $usu, string $paz)
    {
        return $this->db->table($this->table)
                 ->select('*')
                 ->where(['ruc' => $ruc, 'usu' => $usu, 'paz' => $paz])
                 ->get();

        //return $this->db->query('select now()');
    }
}
