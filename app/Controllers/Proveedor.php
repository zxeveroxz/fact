<?php

namespace App\Controllers;

use App\Models\Proveedor_model;

class Proveedor extends BaseController
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
        echo view('proveedor/index', $data);
    }

    public function listar_json()
    {
        $offset = $this->request->getGet('offset');
        $limit = $this->request->getGet('limit');
        $campo = $this->request->getGet('campo');
        $valor = $this->request->getGet('valor');

        $model = new Proveedor_model();
        $DATA = [];
        $DATA['rows'] = null;
        $DATA['total'] = $model->like($campo, $valor)->where(['RUC_' => $this->RUC_])->countAllResults();
        $cat = $model->select('*')->like($campo, $valor)->where(['RUC_' => $this->RUC_])->findAll($limit, $offset);
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
            $model = new Proveedor_model();
            $datos = $model->where('RUC_', session()->get('RUC'))->find($idx);
            if (!$datos) {
                echo Ayuda_link_atras();
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Proveedor NO Encontrado');
            }

            $data['datos'] = $datos;
        }

        echo view('includes/header');
        echo view('proveedor/form', $data);
    }

    public function save()
    {
        try {
            $model = new Proveedor_model();
            $r = $model->save($this->request->getPost());
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
}
