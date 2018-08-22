<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Entrevista_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->setTabela('entrevista');
    }

    public function existeEntrevistaAgendada($codigo) {
        $this->db->where('id_franqueado', $codigo);
        $query = $this->db->get($this->tabela);
        if ($query->num_rows() >= 1) {
            return true;
        } else {
            return false;
        }
    }

    public function obterEntrevistaPorFranqueado($id) {
        return $this->db->where('id_franqueado', $id)->get($this->tabela)->row();
    }

    public function obterEntrevistasAgendadas(){
        $this->db->select('e.id, e.data_entrevista, f.nome, f.email, f.telefone'); 
        $this->db->from('entrevista e');
        $this->db->join('franqueado f', 'f.id = e.id_franqueado', 'inner'); 
        $this->db->where('e.data_entrevista is not null'); 
        return $this->db->get()->result();
    }
}