<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Introducao extends MY_Controller
{

    const BASE_URL = 'introducao';
    private $dados = array();

    function __construct()
    {
        parent::__construct();
        $this->load->model('introducao_model');
    }

    public function index()
    {
        $this->dados['lista']  = $this->introducao_model->getAll();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/listar', $this->dados);
    }

    public function inserir()
    {
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir');
    }

    public function salvar()
    {
        $dados = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao')
        );

        $id = $this->input->post('id');

        if ($id != NULL) {
            $this->introducao_model->save($id, $dados);
            $this->msg_success('alterado');
            $this->editar($id);
            redirect('/'. self::BASE_URL);

        } else {
            $this->introducao_model->save(null, $dados);
            $this->msg_success('inserido');
            $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir', $dados);
        }
    }


    public function editar($id = NULL)
    {

        if ($id != NULL) {
            $this->dados['item'] = $this->introducao_model->getById($id);
            $this->template->load(parent::TEMPLATE, self::BASE_URL . '/editar', $this->dados);
        }
    }

    public function remover($id = NULL)
    {

        if ($id != NULL) {

            $query = $this->introducao_model->getById($id);
            if ($query != NULL) {
                $this->introducao_model->delete($query->id);
            }

            redirect('/faq');
        }
    }

    public function msg_success($tipo = NULL)
    {

        if ($tipo != NULL) {
            $this->session->set_flashdata('msg', 'Registro ' . $tipo . ' com sucesso');
        }
    }

}