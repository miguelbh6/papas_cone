<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos extends MY_Controller
{

    const BASE_URL = 'produtos';
    private $dados = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model(self::BASE_URL . '_model');
        $this->load->model(self::BASE_URL . 'categoria' . '_model');
    }
    
    public function index()
    {
        $this->dados['lista']     = $this->produtos_model->obterProtudosCategoria();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/listar', $this->dados);
    }
    
    public function inserir()
    {
        $this->dados['listaCategorias']     = $this->produtoscategoria_model->getAll();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir', $this->dados);
    }
    
    public function salvar()
    {

        $nome_imagem_1 = rand() . '.jpg';
        $fileimg01    = $_FILES['fileimg01'];
        $configuracao = array(
            'upload_path' => './upload/img/produtos/',
            'allowed_types' => 'gif|jpg|png',
            'file_name' => $nome_imagem_1,
            'max_size' => '3500'
        );
        $this->upload->initialize($configuracao);
        if (!$this->upload->do_upload('fileimg01'))
            echo $this->upload->display_errors();

        $fileimg02    = $_FILES['fileimg02'];
        $fileimg03 = $_FILES['fileimg03'];
        $nome_imagem_2 = null;
        $nome_imagem_3 = null;

        //print_r('size img 2: ' . $fileimg02['size']) ;

        if ($fileimg02['size'] > 0) {
            
            $nome_imagem_2 = rand() . '.jpg';
            $configuracao_2 = array(
                'upload_path' => './upload/img/produtos/',
                'allowed_types' => 'gif|jpg|png',
                'file_name' => $nome_imagem_2,
                'max_size' => '3500'
            );
            $this->upload->initialize($configuracao_2);
            if (!$this->upload->do_upload('fileimg02'))
                echo $this->upload->display_errors();
        }
        
        if ($fileimg03['size'] > 0) {
            $nome_imagem_3 = rand() . '.jpg';
            $fileimg03    = $_FILES['fileimg03'];
            $configuracao_3 = array(
                'upload_path' => './upload/img/produtos/',
                'allowed_types' => 'gif|jpg|png',
                'file_name' => $nome_imagem_3,
                'max_size' => '3500'
            );
            $this->upload->initialize($configuracao_3);
            if (!$this->upload->do_upload('fileimg03'))
                echo $this->upload->display_errors();
        } 

        $now   = date('Y-m-d H:i:s');
        $dados = array(
            'titulo' => $this->input->post('titulo'),
            'descricao' => $this->input->post('descricao'),
            'img_1' => $nome_imagem_1,
            'img_2' => $nome_imagem_2,
            'img_3' => $nome_imagem_3,
            'id_categoria' => $this->input->post('id_categoria')
        );

        $this->produtos_model->save(null, $dados);
        $this->msg_success('inserido');
        redirect(self::BASE_URL);
    }
    
    public function remover($id = NULL)
    {

        if ($id != NULL) {

            $query = $this->produtos_model->getById($id);
            if ($query != NULL) {
                $this->produtos_model->delete($query->id);
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