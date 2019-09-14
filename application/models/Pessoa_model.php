<?php

class Pessoa_model extends CI_Model{

    public function login($email, $senha)
    {
        $this->db->where('email', $email);
        $this->db->where('senha', $senha);
        $dados = $this->db->get('pessoa')->row_array();
         if($dados['id']){
            return $dados['id'];
        }
    }
}
?>