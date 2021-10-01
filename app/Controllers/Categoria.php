<?php

namespace App\Controllers;

use App\Models\Categoria_model;

class Categoria extends BaseController
{
    protected $RUC_;

    public function __construct()
    {
        $this->RUC_ = session()->get('RUC');
    }

    public function index()
    {
        $data = [];
        echo view('includes/header');
        echo view('categoria/index', $data);
    }

    public function listar_json()
    {
        $offset = $this->request->getGet('offset');
        $limit = $this->request->getGet('limit');
        $campo = $this->request->getGet('campo');
        $valor = $this->request->getGet('valor');

        $categoria = new Categoria_model();

        $DATA = [];
        $DATA['rows'] = null;
        $DATA['total'] = $categoria->like($campo, $valor)->where(['estado' => 1, 'RUC_' => $this->RUC_])->countAllResults();
        //echo $this->db->getLastQuery();
        $cat = $categoria->select('idx, nom, detalles')->like($campo, $valor)->where(['estado' => 1, 'RUC_' => $this->RUC_])->findAll($limit, $offset);
        //echo $this->db->getLastQuery();
        //  print_r($cat);
        foreach ($cat as $row) {
            $DATA['rows'][] = $row;
        }
        echo json_encode($DATA);
    }

    public function form($tipo = 'nuevo', $idx = 0)
    {
        $data = [];
        $data['tipo'] = $tipo;
        $data['datos'] = null;
        if ($tipo == 'editar' && $idx > 0) {
            $categoria = new Categoria_model();
            $datos = $categoria->where('RUC_', session()->get('RUC'))->find($idx);
            //echo $this->db->getLastQuery();
            if (!$datos) {
                echo Ayuda_link_atras();
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Categoria NO Encontrado');
            }

            $data['datos'] = $datos;
        }

        echo view('includes/header');
        echo view('categoria/form', $data);
    }

    public function save()
    {
        try {
            $categoria = new Categoria_model();
            $r = $categoria->save($this->request->getPost());
            if ($r) {
                $this->session->setFlashdata('ok', 'Operacion Realizada Correctamente');
            } else {
                $this->session->setFlashdata('error', 'Error en la Operacion');
            }
        } catch (\Exception $e) {
            //die($e->getMessage());
            $this->session->setFlashdata('error', 'Error en la Operacion '.$e->getMessage());
        }

        //die;

        return redirect()->back();
    }

    public function editar($idx)
    {
        $data = [];
        $categoria = new Categoria_model();
        $datos = $categoria->find($idx);
        if (!$datos) {
            echo Ayuda_link_atras();
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Categoria NO Encontrado');
        }

        $data['datos'] = $datos[0];
        echo view('includes/header');
        echo view('categoria/configuracion', $data);
        //echo view('includes/footer', $data);
    }

    public function actualizar()
    {
        $categoria = new Categoria_model();
        $r = $categoria->save($this->request->getPost());
        if ($r) {
            $this->session->setFlashdata('ok', 'Datos Actualizados');
        } else {
            $this->session->setFlashdata('error', 'Error en la Actualizacion');
        }

        return redirect()->back();
    }
}
