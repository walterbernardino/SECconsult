 <?php

class Prontuario_model extends CI_Model{

    public function insert ($id,$prontuario){

       $this->db->where('id',$id);

        return $this->db->update('paciente', array(
            'prontuario' => $prontuario
        ));
    }

    public function insertProtuario($id, $prontuario)
    {
        return $this->db->insert('prontuario', array(
            'id_paciente' => $id,
            'prontuario' => $prontuario
        ));
    }

    public function getProtuarios()
    {
        return $this->db->get('prontuario')->result_array();
    }

    public function getProntuario($id)
    {
        $query = $this->db->query("
            SELECT * FROM prontuario where prontuario.id_paciente = '$id'
        ");

        return $query->result_array();
    }

}