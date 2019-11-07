<?php

class Controler_cad_agenda extends CI_Controller{
    
    public function __construct() {
        Parent::__construct();
        $this->verificarLogin();
    }
    public function index(){

        $this->verificarLogin();
        $this->load->model("pessoa_model");
        $this->load->model('Paciente_model');
        $dt['tipo'] = $this->pessoa_model->getTipo();
        $agenda['agenda'] = $this->Paciente_model->buscar();
        
        $this->load->view('estrutura/cabPage',$dt);
        $this->load->view('corpo/agenda_cad', $agenda);
        $this->load->view('estrutura/rodapePage');
     
    }

    private function verificarLogin(){
        if(empty($this->session->admin)){
            redirect('login');

        }
    }
}
