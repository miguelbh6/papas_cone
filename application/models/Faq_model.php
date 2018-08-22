<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Faq_model extends MY_Model {

	function __construct() {
		parent::__construct();
		$this->setTabela('faq');
	}

	public function obterFaqOrdenada()
	{
		return $this->db->order_by('posicao, id', 'ASC')->get($this->tabela)->result();	
	}
}