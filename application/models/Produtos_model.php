<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtos_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->setTabela('produtos');
    }

    public function obterProtudosCategoria()
    {
    	 $this->db->select('p.id, p.titulo, p.img_1, pc.nome as categoria'); 
        $this->db->from('produtos p');
        $this->db->join('produtos_categoria pc', 'pc.id = p.id_categoria', 'inner'); 
        $query = $this->db->get();
        return $query->result();
    }

     public function obterProtudosPorCategoria($idCategoria){
        return $this->db->where('id_categoria', $idCategoria)->get($this->tabela)->result();
    }
}