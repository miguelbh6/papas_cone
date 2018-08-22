<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Cidade_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->setTabela('cidade');
    }

    public function obterCidadesPorFranqueado($id){
    	$this->db->select('c.id, c.nome'); 
        $this->db->from('franqueado f');
        $this->db->join('franqueado_cidade fc', 'f.id = fc.id_franqueado', 'inner'); 
        $this->db->join('cidade c', 'c.id = fc.id_cidade', 'inner'); 
        $this->db->where('f.id', $id); 
        return $this->db->get()->result();
    }

}
