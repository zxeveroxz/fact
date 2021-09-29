<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        //helper('cookie');
        //$session = session();
        //$db = \Config\Database::connect();
        //$this->db->query('select now()')->getResult();
        //print_r($q);

        $data = [];

        echo view('includes/header');
        echo view('home/index');
        echo view('includes/footer', $data);

        //$_COOKIE['RECORDAR'] = 'SI SALIO BIENaaaaa';

        print_r($_COOKIE);
    }

    public function index2()
    {
        //print_r($this->session->get());
        echo 'hi';
    }
}
