<?php

namespace App\Controllers;

use App\Models\Sunat_producto_model;

class Sunat_producto extends BaseController
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
        echo view('sunat_producto/index', $data);
    }

    public function listar_json()
    {
        $offset = $this->request->getGet('offset');
        $limit = $this->request->getGet('limit');
        $campo = $this->request->getGet('campo');
        $valor = $this->request->getGet('valor');
        $sort = $this->request->getGet('sort');
        $order = $this->request->getGet('order');

        $model = new Sunat_producto_model();

        $DATA = [];
        $DATA['rows'] = [];
        $DATA['total'] = $model->like($campo, $valor)->countAllResults() ?? [];
        //echo $this->db->getLastQuery();
        $cat = $model->select('*')->like($campo, $valor)->orderBy($sort, $order)->findAll($limit, $offset);
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
            $categoria = new Sunat_producto_model();
            $datos = $categoria->where('RUC_', session()->get('RUC'))->find($idx);
            //echo $this->db->getLastQuery();
            if (!$datos) {
                echo Ayuda_link_atras();
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Producto Sunat NO Encontrado');
            }

            $data['datos'] = $datos;
        }

        echo view('includes/header');
        echo view('categoria/form', $data);
    }

    public function save()
    {
        try {
            $categoria = new Sunat_producto_model();
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
}
