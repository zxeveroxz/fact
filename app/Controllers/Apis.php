<?php

namespace App\Controllers;

class Apis extends BaseController
{
    /*
    public function index()
    {
        $data = [];
        echo view('includes/header');
        echo view('productos/index', $data);
    }
    */

    public function buscar_ruc()
    {
        $this->response->setContentType('application/json');
        sleep(1);
        echo json_encode(['resp' => true, 'raz' => 'JSJ CONSULTORES INFORMATICOS', 'dir' => 'AV. MIRAFLORES 123 - MIRAFLOES']);
    }
}
