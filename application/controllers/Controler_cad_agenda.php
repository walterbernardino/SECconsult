<?php

class Controler_cad_agenda extends CI_Controller{
    public function index(){

        $this->load->model("pessoa_model");

        $dt['tipo'] = $this->pessoa_model->getTipo();

        $this->load->view('estrutura/cabPage',$dt);
        $this->load->view('Full/index');
        $this->load->view('estrutura/rodapePage');
    }
}
