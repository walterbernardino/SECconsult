<?php


class Paciente_model extends CI_Model {
    public function salvar($dados){
        $this->db->insert('paciente',$dados);
        return $this->db->insert_id();
    }

    public function buscar() {
        return $this->db->get('paciente')->result_array();
    }

    public function get($id)
    {
        $query = $this->db->query("
            SELECT * FROM paciente where paciente.id = '$id'
        ");

    return $query->row_array();
    }
}


?>