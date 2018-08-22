<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    private $dados = array();

    public function __construct() {
        parent::__construct();
        $this->load->model('quemsomos_model');
        $this->load->model('produtos_model');
        $this->load->model('produtoscategoria_model');
        $this->load->model('cidade_model');
        $this->load->model('franqueado_model');
        $this->load->model('franquias_model');
        $this->load->model('lojas_model');
        $this->load->model('faq_model');
        $this->load->model('parametro_model');
        $this->load->model('introducao_model');
        $this->load->library('EmailPapasCone');
        $this->dados['configEmail'] = $this->emailpapascone->obterConfiguracao();
    }

    public function index()	{
        $this->dados['quemsomos'] = $this->quemsomos_model->getAll();
        $this->dados['produto'] = $this->produtoscategoria_model->getAll();
        $this->dados['franquias'] = $this->franquias_model->getAll();
        $this->dados['lojas'] = $this->lojas_model->getAll();
        $this->dados['cidades'] = $this->listar();
        $this->dados['introducao'] = $this->introducao_model->getAll();
        $this->template->load('site/template_site', 'index', $this->dados);
    }

    private function listar() {
        $results = $this->cidade_model->getAll();
        $list = array();
        foreach ($results as $result) {
            $list[$result->id] = $result->nome;
        }
        return $list;
    }

    public function salvar()
    {
        try {
            $now   = date('Y-m-d H:i:s');
            $dados = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'telefone' => $this->input->post('telefone'),
                'mensagem' => $this->input->post('mensagem'),
                'id_situacao' => '1',
                'data_inclusao' => $now,
                'codigo_random' => mt_rand()
            );

            $citys = $this->input->post('select_cidades');

            $this->franqueado_model->inserirFraqueadoComCidades($dados, $citys);

            $this->enviarEmail($dados);

            $this->session->set_flashdata('msg', 'Contato enviado com sucesso');

            redirect('/#form1-b');
        }
        catch (Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n";
        }
    }

    private function carregarDados() {
        $dados['quemsomos'] = $this->quemsomos_model->getAll();
        $dados['produto'] = $this->produtos_model->getAll();
        $dados['cidades'] = $this->listar();
        return $dados;

    }

    function enviarEmail($dados)
    {

        $bEnviarEmail = $this->parametro_model->obterParametroPorSigla('ENVIAR_EMAIL_ADMIN');

        if ($bEnviarEmail->valor == 'TRUE') {
            $this->email->initialize($this->dados['configEmail']);
            $remetenteEmail = $this->parametro_model->obterParametroPorSigla('EMAIL_ADMIN');
            $this->email->from($remetenteEmail->valor, 'Administrador');
            $this->email->subject("Papas Cone - Bem vindo");
            $this->email->reply_to($remetenteEmail->valor);
            $this->email->to($this->input->post('email'));
            $conteudo_msg = $this->load->view('templates_email/bemvindo', $dados, TRUE);

            $this->email->message($conteudo_msg);
            if ($this->email->send() == false) {
                print_r($this->email->print_debugger());
            }
        }
    }

    public function faq()
    {
        $this->dados['listaFaq']  = $this->faq_model->obterFaqOrdenada();
        $this->load->view('site/faq', $this->dados);
    }

    public function detalhefranquias()
    {
        $this->dados['listaFranquias']  = $this->franquias_model->getAll();
        $this->template->load('site/template_site', 'site/detalhefranquias', $this->dados);
    }

    public function detalheproduto($id = null)
    {
        $this->dados['detalheproduto']  = $this->produtos_model->obterProtudosPorCategoria($id);
        $this->template->load('site/template_site', 'site/detalheproduto', $this->dados);
    }

}