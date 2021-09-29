<?php

namespace App\Controllers;

class Usuario extends BaseController
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [];
        echo view('login/index', $data);
    }

    public function configuracion()
    {
        $data = [];

        echo view('includes/header');
        echo view('usuario/configuracion');
        echo view('includes/footer', $data);
    }

    public function actualizar()
    {
        print_r($this->request->getPost());
    }
}
