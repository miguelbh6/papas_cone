<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MY_Controller
{
    
    const BASE_URL = 'faq';
    private $dados = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model('faq_model');
    }
    
    public function index()
    {
        $this->dados['listaFaq']  = $this->faq_model->getAll();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/listar', $this->dados);
    }
    
    public function inserir()
    {
        $this->template->load(parent::TEMPLATE, 'faq/inserir');
    }
    
    public function salvar()
    {
        
        $this->validar();
        
        if ($this->form_validation->run()) {
            
            $now   = date('Y-m-d H:i:s');
            $dados = array(
                'pergunta' => $this->input->post('pergunta'),
                'resposta' => $this->input->post('resposta'),
                'posicao' => $this->input->post('posicao'),
                'data_inclusao' => $now
            );
            
            $id = $this->input->post('id');
            
            if ($id != NULL) {
                $this->faq_model->save($id, $dados);
                $this->msg_success('alterado');
                $this->editar($id);
                redirect('/faq');
                
            } else {
                $this->faq_model->save(null, $dados);
                $this->msg_success('inserido');
                $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir', $dados);
            }
        } else {
            $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir');
        }
    }
    
    private function validar()
    {
        $this->form_validation->set_rules('pergunta', 'Pergunta', 'required');
        $this->form_validation->set_rules('resposta', 'Resposta', 'required');
        $this->form_validation->set_rules('posicao', 'Posição', 'required');
    }
    
    
    public function editar($id = NULL)
    {
        
        if ($id != NULL) {
            $this->dados['faq'] = $this->faq_model->getById($id);
            $this->template->load(parent::TEMPLATE, self::BASE_URL . '/editar', $this->dados);
        }
    }
    
    public function remover($id = NULL)
    {
        
        if ($id != NULL) {
            
            $query = $this->faq_model->getById($id);
            if ($query != NULL) {
                $this->faq_model->delete($query->id);
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