<? php 

Class Busca_model extends CI_Model{

    public function usuarios(){

        $this->db->get('eventos')->result_array();

    }

    public function buscar($busca){
		
		if(empty($busca))
       		return array();

		$busca = $this->input->post('busca');

		$this->db->like('title', $busca);
		$query = $this->db->get('eventos');
		return $query->result_array();

	}

}