<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Parametro_model extends MY_Model {

	function __construct() {
		parent::__construct();
		$this->setTabela('parametro');
	}

	public function obterOrdenado()
	{
		return $this->db->order_by('sigla', 'ASC')->get($this->tabela)->result();	
	}

	public function obterParametroPorSigla($pSigla)
	{
		return $this->db->where('sigla', $pSigla)->get($this->tabela)->row();
	}
	
}