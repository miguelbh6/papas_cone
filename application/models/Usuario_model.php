<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {

    function validar_usuario() {
        $this->db->where('usuario', $this->input->post('username'));
        $this->db->where('senha', md5($this->input->post('password')));
        $query = $this->db->get('usuario');
        if ($query->num_rows() == 1) {
            return true;
        } else {
            return false;
        }
    }
}