<?php

namespace App\Controllers;

use App\Models\Usuario_model;

class Usuario extends BaseController
{
    public function index()
    {
        $data = [];
        echo view('login/index', $data);
    }

    public function configuracion()
    {
        $data = [];
        $USUARIO = new Usuario_model();
        $datos = $USUARIO->find(session()->get('idx'));
        if (!$datos) {
            echo Ayuda_link_atras();
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Usuario NO Encontrado');
        }

        $data['datos'] = $datos[0];
        echo view('includes/header');
        echo view('usuario/configuracion', $data);
        //echo view('includes/footer', $data);
    }

    public function actualizar()
    {
        $usuario = new Usuario_model();
        $r = $usuario->save($this->request->getPost());
        if ($r) {
            $this->session->setFlashdata('ok', 'Datos Actualizados');
        } else {
            $this->session->setFlashdata('error', 'Verifique los datos de acceso...');
        }

        return redirect()->back();
    }
}
