<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entrevista extends CI_Controller
{
    
    const BASE_URL = 'entrevista';
    private $dados = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model(self::BASE_URL . '_model');
        $this->load->model('franqueado_model');
    }
    
    public function index()
    {
        
        $code                      = isset($_REQUEST['code']) ? $_REQUEST['code'] : NULL;
        $this->dados['franqueado'] = $this->franqueado_model->getByCodigoRandom($code);
        if (isset($this->dados['franqueado'])) {
            $this->load->view(self::BASE_URL . '/agendar', $this->dados);
        }else{
            echo '<h1>Usuário inexistente</h1>';
        }
        
    }
    
    public function agendar()
    {
        
        $codigo = $this->input->post('id');
        if (!$this->entrevista_model->existeEntrevistaAgendada($codigo)) {
            
            $this->form_validation->set_rules('data-entrevista', 'Data', 'required', array(
                'required' => 'Campo %s obrigatorio'
            ));
            if ($this->form_validation->run()) {
                
                $now         = date('Y-m-d H:i:s');
                $this->dados = array(
                    'data_entrevista' => $this->input->post('data-entrevista'),
                    'id_franqueado' => $this->input->post('id'),
                    'data_inclusao' => $now
                );
                
                $result           = $this->franqueado_model->getById($this->input->post('id'));
                //print_r($this->input->post('id'));
                $dadosEmail       = array(
                    "nome" => $result->nome,
                    "data" => $this->input->post('data-entrevista'),
                    "email" => $result->email
                );
                
                //$this->enviarEmail($dadosEmail);
                
                $this->entrevista_model->save(null, $this->dados);
                
                $this->dados = array(
                    'id_situacao' => 2
                );
                $this->franqueado_model->save($this->input->post('id'), $this->dados);
                
                
                echo '<h1>Entrevista agendada com sucesso</h1>';
            } else {
                
                redirect('/entrevista');
            }
        } else {
            echo '<h1>Entrevista já agendada</h1>';
        }
    }
    
    function enviarEmail($dados)
    {
        
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = 465;
        $config['smtp_user'] = 'miguelbh6@gmail.com';
        $config['smtp_pass'] = 'umbrella6';
        $config['protocol']  = 'smtp';
        $config['validate']  = TRUE;
        $config['mailtype']  = 'html';
        $config['charset']   = 'utf-8';
        $config['newline']   = "\r\n";
        $this->email->initialize($config);
        $this->email->from("miguelbh6@gmail.com", 'Administrador');
        $this->email->subject("Papas Cone - Bem vindo");
        $this->email->reply_to("miguelbh6@gmail.com");
        $this->email->to("miguelbh6@gmail.com");
        $conteudo_msg = $this->load->view('templates_email/entrevista_agendada', $dados, TRUE);
        
        $this->email->message($conteudo_msg);
        if ($this->email->send() == false) {
            print_r($this->email->print_debugger());
        }
    }

    public function listarAgendadas()
    {
        
        $this->dados['listaEntrevistas'] = $this->entrevista_model->obterEntrevistasAgendadas();
        $this->template->load('commons/template_gerenciador_conteudo', self::BASE_URL . '/listar', $this->dados);
    }
}