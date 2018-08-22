<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Franqueado_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->setTabela('franqueado');
    }

    public function inserirFraqueadoComCidades($dados, $citys) {

        $this->db->insert('franqueado', $dados);
        $id = $this->db->insert_id();

        foreach ($citys as $key => $val) {
            $post_data = array('id_cidade' => $val, 'id_franqueado' => $id);
            $this->db->insert('franqueado_cidade', $post_data);
        }
    }

    public function obterCandidatoSituacaoCidade(){
        $this->db->select('f.id, f.nome, f.email, f.id_situacao, s.descricao as situacao'); 
        $this->db->from('franqueado f');
        //$this->db->join('franqueado_cidade fc', 'f.id = fc.id_franqueado', 'inner'); 
        //$this->db->join('cidade c', 'c.id = fc.id_cidade', 'inner'); 
        $this->db->join('situacao s', 'f.id_situacao = s.id', 'inner'); 
        $query = $this->db->get();
        return $query->result();
    }

    public function getByCodigoRandom($codigo){
        return $this->db->where('codigo_random', $codigo)->get($this->tabela)->row();
    }


        public function getFranqueadosPorNome($nome, $situacao)
        {

        $this->db->select('f.id, f.nome, f.email, f.id_situacao, s.descricao as situacao'); 
        $this->db->from('franqueado f');
        $this->db->join('situacao s', 'f.id_situacao = s.id', 'inner'); 
        
        if (!empty($situacao)) {
            $this->db->where('f.id_situacao', $situacao);
        }
        
        

        if (!empty($nome)) {
            $this->db->like('f.nome', $nome);
        }
        
        $query = $this->db->get();
        return $query->result();
        }
}
