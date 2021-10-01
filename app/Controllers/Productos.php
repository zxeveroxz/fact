<?php

namespace App\Controllers;

class Productos extends BaseController
{
    public function index()
    {
        $data = [];
        echo view('includes/header');
        echo view('productos/index', $data);
    }
}
