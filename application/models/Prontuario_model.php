<?php

class Prontuario_model extends CI_Model{

    public function buscar(){
        return $this->db->get('eventos')->result_array();
    }
    
}