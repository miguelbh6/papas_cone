<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametro extends MY_Controller
{
    
    const BASE_URL = 'parametro';
    private $dados = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('parametro_model');
    }
    
    public function index()
    {
        $this->dados['lista']  = $this->parametro_model->getAll();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/listar', $this->dados);
    }
    
    public function inserir()
    {
        $this->template->load(parent::TEMPLATE,  self::BASE_URL .'/inserir');
    }
    
    public function salvar()
    {
        
            $dados = array(
                'sigla' => $this->input->post('sigla'),
                'valor' => $this->input->post('valor')
            );
            
            $id = $this->input->post('id');
            
            if ($id != NULL) {
                $this->parametro_model->save($id, $dados);
                $this->msg_success('alterado');
                $this->editar($id);
                redirect('/' . self::BASE_URL);
                
            } else {
                $this->parametro_model->save(null, $dados);
                //$this->msg_success('inserido');
                //$this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir', $dados);
                redirect('/' . self::BASE_URL);
            }
        
    }
    
    public function editar($id = NULL)
    {
        
        if ($id != NULL) {
            $this->dados[self::BASE_URL] = $this->parametro_model->getById($id);
            $this->template->load(parent::TEMPLATE, self::BASE_URL . '/editar', $this->dados);
        }
    }
    
    public function remover($id = NULL)
    {
        
        if ($id != NULL) {
            
            $query = $this->parametro_model->getById($id);
            if ($query != NULL) {
                $this->parametro_model->delete($query->id);
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