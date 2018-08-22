<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lojapromocao extends MY_Controller
{

    const BASE_URL = 'lojapromocao';
    private $dados = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model(self::BASE_URL . '_model');
    }
    
    public function index()
    {

        $this->dados['lista']     = $this->lojapromocao_model->getAll();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/listar', $this->dados);
    }
    
    public function inserir()
    {
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir');
    }
    
    public function salvar()
    {

        $dados = array(
            'descricao' => $this->input->post('descricao'),
            'nome' => $this->input->post('nome')
        );

        $this->lojapromocao_model->save(null, $dados);
        $this->msg_success('inserido');
        redirect(self::BASE_URL);
    }
    
    public function remover($id = NULL)
    {

        if ($id != NULL) {

            $query = $this->lojapromocao_model->getById($id);
            if ($query != NULL) {
                $this->lojapromocao_model->delete($query->id);
            }
            
            redirect('/' . self::BASE_URL);
        }
    }
    
    public function msg_success($tipo = NULL)
    {

        if ($tipo != NULL) {
            $this->session->set_flashdata('msg', 'Registro ' . $tipo . ' com sucesso');
        }
    }
    
}