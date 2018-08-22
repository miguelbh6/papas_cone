<?php

//if(!defined('BASEPATH')) exit('No direct script access allowed');
defined('BASEPATH') OR exit('No direct script access allowed');

class EmailPapasCone {

	public function __construct()
	{
        //parent::__construct();
        //$this->load->model('parametro_model', 'parametro_model');
	}

	function obterConfiguracao()
	{
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'miguelbh6@gmail.com';
		$config['smtp_pass'] = 'umbrella6';
		$config['protocol']  = 'smtp';
		$config['validate']  = TRUE;
		$config['mailtype']  = 'html';
		$config['charset']   = 'utf-8';
		$config['newline']   = "\r\n";
		return $config;
	}
}