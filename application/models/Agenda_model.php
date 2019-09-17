<?php

class Agenda_model extends CI_Model{

    public function store(array $dados)
    {
        $this->db->insert('agenda', $dados);
    }

    public function update(array $dados, $id)
    {	
        $this->db->where('id', $id);
    
        $this->db->update('agenda', $dados);
    }

}


