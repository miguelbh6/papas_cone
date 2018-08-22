<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Promocao extends MY_Controller
{

    const BASE_URL = 'promocao';
    private $dados = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model(self::BASE_URL . '_model');
    }
    
    public function index()
    {

        $this->dados['lista']     = $this->promocao_model->getAll();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/listar', $this->dados);
    }
    
    public function inserir()
    {
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir');
    }
    
    public function salvar()
    {

        $nome_imagem_1 = rand() . '.jpg';
        $fileimg01    = $_FILES['fileimg01'];
        $configuracao = array(
            'upload_path' => './upload/img/promocao/',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => $nome_imagem_1,
            'max_size' => '3500'
        );
        $this->upload->initialize($configuracao);
        if (!$this->upload->do_upload('fileimg01'))
            echo $this->upload->display_errors();

        $dados = array(
            'descricao' => $this->input->post('descricao'),
            'img' => $nome_imagem_1,
        );

        $this->promocao_model->save(null, $dados);
        $this->msg_success('inserido');
        redirect(self::BASE_URL);
    }
    
    public function remover($id = NULL)
    {

        if ($id != NULL) {

            $query = $this->promocao_model->getById($id);
            if ($query != NULL) {
                $this->promocao_model->delete($query->id);
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