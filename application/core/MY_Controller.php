<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

	const TEMPLATE = 'commons/template_gerenciador_conteudo';

    public function __construct() {
        parent::__construct();
        $logged = $this->session->userdata("logged");
        
        if (!isset($logged) || $logged != true) {
            redirect('usuario');
        } 
    }
}