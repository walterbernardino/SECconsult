<?php

class Controler_cad_agenda extends CI_Controller{
    public function index(){
        $this->load->view('estrutura/cabPage');
        $this->load->view('corpo/agenda_cad');
        $this->load->view('estrutura/rodapePage');
    }
}
