<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Produtoscategoria_model extends MY_Model {

    function __construct() {
        parent::__construct();
        $this->setTabela('produtos_categoria');
    }
}