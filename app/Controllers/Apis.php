<?php

namespace App\Controllers;

class Apis extends BaseController
{
    public function index()
    {
        $data = [];
        echo view('includes/header');
        echo view('productos/index', $data);
    }

    public function buscar_ruc()
    {
        sleep(2);
        echo json_encode(['resp' => true, 'raz' => 'JSJ CONSULTORES INFORMATICOS', 'dir' => 'AV. MIRAFLORES 123 - MIRAFLOES']);
    }
}
