<?php

namespace App\Controllers;

use App\Models\User_model;

class Login extends BaseController
{
    public function index()
    {
        if (session()->get('TIENE_ACCESO')) {
            return redirect()->to(base_url('home'));
            die;
        }

        $data = [];
        //$data['footer_texto'] = view('includes/footer_texto');
        echo view('login/index', $data);
    }

    public function validar()
    {
        //$session = session();
        $inputRUC = $this->request->getPost('inputRUC');
        $inputUser = $this->request->getVar('inputUser');
        $inputPassword = $this->request->getVar('inputPassword');
        $inputRecordar = $this->request->getVar('inputRecordar');

        $USER = new User_model();
        $RU = $USER->login($inputRUC, $inputUser, $inputPassword)->getRow();

        if ($RU !== null) {
            $ses_data = [
                'IDX' => $RU->idx,
                'TIENE_ACCESO' => true,
                'RUC' => $inputRUC,
                'USU' => $inputUser,
                'NOM' => $RU->nom,
            ];
            $this->session->set($ses_data);

            return redirect()->to('/home');
        }
        $this->session->setFlashdata('msg', 'Verifique los datos de acceso...');

        //return redirect()->back()->withInput();
        return redirect()->to('/');
    }

    public function salir()
    {
        $this->session->destroy();

        return redirect()->to('/');
    }
}
