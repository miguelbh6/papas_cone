<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Lojapromocao_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->setTabela('lojas_promocao');
    }
}