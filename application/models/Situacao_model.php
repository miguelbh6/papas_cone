<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Situacao_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->setTabela('situacao');
    }

    public function obterProximaSituacao($id){
    	return $this->db->where('id >=', $id)->get($this->tabela)->result();
    }

    public function obterSitaucaoPorOrdem()
    {
    	return $this->db->order_by('id', 'ASC')->get($this->tabela)->result();	
    }
}