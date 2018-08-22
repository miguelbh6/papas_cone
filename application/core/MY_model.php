<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_model extends CI_Model {

	protected $tabela;

    public function setTabela($tabela) {
        $this->tabela = $tabela;
    }

    public function getAll() {
        return $this->db->get($this->tabela)->result();
    }

     public function getById($id) {
        return $this->db->where('id', $id)->get($this->tabela)->row();
    }

     public function save($id, $dados) {
       
       	if ($id) {
       		$this->db->where('id',$id);
       		$this->db->update($this->tabela, $dados);
       	}else{
       		$this->db->insert($this->tabela, $dados);
       	}
    }

    public function delete($id) {
        return $this->db->where('id', $id)->delete($this->tabela);
    }
}