<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lojas extends MY_Controller {

    const BASE_URL = 'lojas';
    private $dados = array();

    function __construct() {
        parent::__construct();
        $this->load->model(self::BASE_URL . '_model');
    }

    public function index() {

        $this->dados['lista'] = $this->lojas_model->getAll();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/listar', $this->dados);
    }

    public function inserir() {
        $this->template->load(parent::TEMPLATE, self::BASE_URL .'/inserir');
    }

    public function salvar() {

        $this->validar();

        if ($this->form_validation->run() == TRUE) {
            
            $now = date('Y-m-d H:i:s');
            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'sub_titulo' => $this->input->post('sub-titulo'),
                'descricao' => $this->input->post('descricao')
            );

            $id = $this->input->post('id');

            if ($id != NULL) {
                $this->lojas_model->save($id, $dados);
                $this->msg_success('alterado');
                $this->editar($id);
                redirect('/'. self::BASE_URL);

            } else {
                $this->lojas_model->save(null, $dados);
                $this->msg_success('inserido');
                //$this->template->load(parent::TEMPLATE, self::BASE_URL . '/listar', $dados);
                redirect('/lojas');
            }
        } else {
            $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir');
        }
    }

    private function validar() {
        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('sub-titulo', 'Sub titulo', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
    }

    
    public function remover($id = NULL) {

        if ($id != NULL) {

            //  Remover produto
            $query = $this->lojas_model->getById($id);
            if ($query != NULL) {
                $this->lojas_model->delete($query->id);
            }

            redirect('/'. self::BASE_URL);
        }
    }

    public function msg_success($tipo = NULL) {

        if ($tipo != NULL) {
            $this->session->set_flashdata('msg', 'Registro ' . $tipo . ' com sucesso');
        }
    }

}