<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Franquias extends MY_Controller
{
    
    const BASE_URL = 'franquias';
    private $dados = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model(self::BASE_URL . '_model');
    }
    
    public function index()
    {
        
        $this->dados['lista']     = $this->franquias_model->getAll();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/listar', $this->dados);
    }
    
    public function inserir()
    {
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir');
    }
    
    public function salvar()
    {
        
        //$this->validar();
        
        $nome_imagem = rand() . '.jpg';
        
        if ($this->input->post('id') == NULL) {
            $fileimg01    = $_FILES['fileimg01'];
            $configuracao = array(
                'upload_path' => './upload/img/franquias/',
                'allowed_types' => 'gif|jpg|png',
                'file_name' => $nome_imagem,
                'max_size' => '3500'
            );
            
            $this->upload->initialize($configuracao);
            if (!$this->upload->do_upload('fileimg01'))
                echo $this->upload->display_errors();
        }
        
        //if ($this->form_validation->run() == TRUE) {
            
            $now   = date('Y-m-d H:i:s');
            $dados = array(
                'titulo' => $this->input->post('titulo'),
                'sub_titulo' => $this->input->post('sub-titulo'),
                'descricao' => $this->input->post('descricao'),
                'img_1' => $nome_imagem
            );
            
            $id = $this->input->post('id');
            
            if ($id != NULL) {
                $this->franquias_model->save($id, $dados);
                $this->msg_success('alterado');
                $this->editar($id);
                redirect('/' . self::BASE_URL);
                
            } else {
                $this->franquias_model->save(null, $dados);
                $this->msg_success('inserido');
                redirect(self::BASE_URL);
            }
        //} else {
          //  $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir');
        //}
    }
    
    private function validar()
    {
        $this->form_validation->set_rules('titulo', 'Titulo', 'required');
        $this->form_validation->set_rules('sub-titulo', 'Sub titulo', 'required');
        $this->form_validation->set_rules('descricao', 'Descrição', 'required');
    }
    
    
    public function remover($id = NULL)
    {
        
        if ($id != NULL) {
            
            //  Remover produto
            $query = $this->franquias_model->getById($id);
            if ($query != NULL) {
                $this->franquias_model->delete($query->id);
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