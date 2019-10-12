<?php

class Prontuario_model extends CI_Model{

    public function buscar(){
        return $this->db->get('eventos')->result_array();
    }

    public function salvar($id,$prontuario){
        $this->db->insert('eventos',$prontuario);
    }

    public function insert ($id,$prontuario){

       $this->db->where('id',$id);

        return $this->db->update('eventos', array(
            'prontuario' => $prontuario
        ));
    }

}