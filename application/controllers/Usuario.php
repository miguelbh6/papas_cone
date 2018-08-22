<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

    const TEMPLATE = 'commons/template_comum';

    public function __construct() {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    public function index() {
        $this->template->load(self::TEMPLATE, 'usuario/index');
    }

    public function login() {

        if ($this->usuario_model->validar_usuario()) { // VERIFICA LOGIN E SENHA
            $data = array(
                'username' => $this->input->post('username'),
                'logged' => true
            );
            $this->session->set_userdata($data);
            redirect('franqueado');
        } else {
            redirect($this->index());
        }
    }

    public function logout() {
        $this->session->unset_userdata("logged");
        $this->session->unset_userdata("username");
        redirect(base_url('usuario'));
    }

}
