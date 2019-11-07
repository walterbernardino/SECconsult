<?php


class Paciente_model extends CI_Model {
    
    public function salvar($dados){
        $this->db->insert('paciente',$dados);
        return $this->db->insert_id();
    }

    public function buscar() {
        return $this->db->get('paciente')->result_array();
    }

    public function get($id) {
        $query = $this->db->query("
            SELECT * FROM paciente where paciente.id = '$id'
        ");

    return $query->row_array();
    }

    public function getConfirmados(){
        return $this->db->get_where('paciente', array(
            'color' => "#228B22"
        ))->num_rows();
    }

    public function getCancelados(){
        return $this->db->get_where('paciente', array(
            'color' => "#8B0000"
        ))->num_rows();
    }

    public function getAconfirmar(){
        return $this->db->get_where('paciente', array(
            'color' => "#FFD700"
        ))->num_rows();
    }

    public function getReagendados(){
        return $this->db->get_where('paciente', array(
            'color' => "#0071c5"
        ))->num_rows();
    }

}


?>