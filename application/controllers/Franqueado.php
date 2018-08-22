<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Franqueado extends MY_Controller
{
    const BASE_URL = 'franqueado';
    private $dados = array();

    public function __construct()
    {
        parent::__construct();
        $this->load->model('franqueado_model');
        $this->load->model('cidade_model');
        $this->load->model('situacao_model');
        $this->load->model('entrevista_model');
        $this->load->model('parametro_model');
        $this->dados['cidades'] = $this->listar();
        $this->load->library('EmailPapasCone');
        $this->dados['configEmail'] = $this->emailpapascone->obterConfiguracao();
        $this->dados['listaSituacao'] = $this->situacao_model->obterSitaucaoPorOrdem();
    }

    public function index()
    {
        $this->dados['franqueados'] = $this->franqueado_model->obterCandidatoSituacaoCidade();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/pesquisa', $this->dados);
    }

    public function inserir()
    {
        $this->dados['cidades'] = $this->listar();
        $this->template->load(parent::TEMPLATE, self::BASE_URL . '/inserir', $this->dados);
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

            redirect('/'.self::BASE_URL);
        }
        catch (Exception $e) {
            echo 'Exceção capturada: ', $e->getMessage(), "\n";
        }
    }

    public function listar()
    {
        $results = $this->cidade_model->getAll();
        $list    = array();
        foreach ($results as $result) {
            $list[$result->id] = $result->nome;
        }
        return $list;
    }



    public function editar($id = NULL)
    {
        if ($id != NULL) {
            $this->dados['franqueado']    = $this->franqueado_model->getById($id);
            $id_situacao                  = $this->dados['franqueado']->id_situacao;
            
            $this->dados['listaCidadePorUsuario'] = $this->cidade_model->obterCidadesPorFranqueado($id);
            $this->template->load(parent::TEMPLATE, 'franqueado/editar', $this->dados);
        }
    }

    public function alterarSituacao()
    {
        $id          = $this->input->post('id');
        $idSituacaoFranqueado = $this->input->post('select-situacao');

        $this->dados = array(
            'id_situacao' => $this->input->post('select-situacao')
        );
        $this->franqueado_model->save($id, $this->dados);

        if ($this->input->post('id_situacao') != 5) {
            $entrevista = $this->entrevista_model->obterEntrevistaPorFranqueado($this->input->post('id'));
            if (isset($entrevista)) {
                $this->entrevista_model->delete($entrevista->id);
            }
        }

        if ($idSituacaoFranqueado == 4){
            $this->preaprovar($id);
        } else if ($idSituacaoFranqueado == 3){
            $this->reprovar($id);
        }

        redirect('/'.self::BASE_URL);
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

    function validar()
    {

        $this->form_validation->set_rules('nome', 'Nome', 'required|min_length[5]|max_length[50]', array(
            'required' => 'Campo %s obrigatorio'
        ));
        $this->form_validation->set_rules('telefone', 'Telefone', 'required', array(
            'required' => 'Campo %s obrigatorio'
        ));
        $this->form_validation->set_rules('email', 'E-mail', 'required|valid_email', array(
            'required' => 'Campo %s obrigatorio'
        ));
//   $this->form_validation->set_rules('select_cidades', 'Cidades', 'required|is_natural', array('required' => 'Campo %s obrigatorio'));       
    }

    public function preaprovar($pId)
    {
        $SITUACAO_PRE_APROVADA = 4;

        $this->franqueado_model->save($pId, array('id_situacao' => $SITUACAO_PRE_APROVADA));

        $this->dados['franqueado']    = $this->franqueado_model->getById($pId);

        $this->enviarEmailPreAprovacao($this->dados['franqueado']);

        redirect('/'.self::BASE_URL);
    }

    public function reprovar($pId)
    {
        $SITUACAO_REPROVADA = 3;

        $this->franqueado_model->save($pId, array('id_situacao' => $SITUACAO_REPROVADA));

        $this->dados['franqueado']    = $this->franqueado_model->getById($pId);

        $this->enviarEmailReprovacao($this->dados['franqueado']);

        redirect('/'.self::BASE_URL);
    }

    public function franquear($pId)
    {
        $SITUACAO_FRANQUEADO = 2;
        $this->franqueado_model->save($pId, array('id_situacao' => $SITUACAO_FRANQUEADO));
        redirect('/franqueado');
    }

    function enviarEmailPreAprovacao($dados)
    {
        $bEnviarEmail = $this->parametro_model->obterParametroPorSigla('ENVIAR_EMAIL_ADMIN');

        if ($bEnviarEmail->valor == 'TRUE') {

            $this->email->initialize($this->dados['configEmail']);
            $remetenteEmail = $this->parametro_model->obterParametroPorSigla('EMAIL_ADMIN');
            $this->email->from($remetenteEmail->valor, 'Administrador');
            $this->email->subject("Papas Cone - Aviso pré Aprovação de solicitação da franquia");
            $this->email->reply_to($remetenteEmail->valor);
            $this->email->to($this->dados['franqueado']->email);
            $conteudo_msg = $this->load->view('templates_email/cof', $dados, TRUE);
            $this->email->attach(base_url().'./assets/resources/docs/COF.docx');

            $this->email->message($conteudo_msg);
            if ($this->email->send() == false) {
                print_r($this->email->print_debugger());
            }
        }
    }

    function enviarEmailReprovacao($dados)
    {
        $bEnviarEmail = $this->parametro_model->obterParametroPorSigla('ENVIAR_EMAIL_ADMIN');

        if ($bEnviarEmail->valor == 'TRUE') {
            $this->email->initialize($this->dados['configEmail']);
            $remetenteEmail = $this->parametro_model->obterParametroPorSigla('EMAIL_ADMIN');
            $this->email->from($remetenteEmail->valor, 'Administrador');
            $this->email->subject("Papas Cone - Aviso reprovação de solicitação da franquia");
            $this->email->reply_to($remetenteEmail->valor);
            $this->email->to($this->dados['franqueado']->email);
            $conteudo_msg = $this->load->view('templates_email/reprovacao', $dados, TRUE);

            $this->email->message($conteudo_msg);
            if ($this->email->send() == false) {
                print_r($this->email->print_debugger());
            }
        }
    }

    public function limpar()
    {
        $this->template->load(parent::TEMPLATE, 'franqueado/index');
    }

    public function remover($id = NULL)
    {
        if ($id != NULL) {

            $query = $this->franqueado_model->getById($id);
            if ($query != NULL) {
                $this->franqueado_model->delete($query->id);
            }

            redirect('/'.self::BASE_URL);
        }
    }

    public function cancelar($pId)
    {
        $SITUACAO_CANCELADO = 6;
        $this->franqueado_model->save($pId, array('id_situacao' => $SITUACAO_CANCELADO));
        redirect('/'.self::BASE_URL);
    }

    public function search() {
        $nome_pesquisa = $this->input->post('nome_pesquisa');
        $idSituacaoFranqueado = $this->input->post('select-situacao');

        if (!empty($nome_pesquisa) || (!empty($idSituacaoFranqueado))) {
            $this->dados['franqueados'] = $this->franqueado_model->getFranqueadosPorNome($nome_pesquisa, $idSituacaoFranqueado);
            $this->template->load(parent::TEMPLATE, 'franqueado/pesquisa', $this->dados);
        } else{
            $this->dados['franqueados'] = $this->franqueado_model->obterCandidatoSituacaoCidade();
            $this->template->load(parent::TEMPLATE, 'franqueado/pesquisa', $this->dados);
        }
    }
}