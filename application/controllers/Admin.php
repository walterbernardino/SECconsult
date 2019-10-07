<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index(){
        
        $this->load->model("pessoa_model");

        $dt['tipo'] = $this->pessoa_model->getTipo();

        $this->load->view('estrutura/cabPage',$dt);
        $this->load->view('corpo/index_corpo');
        $this->load->view('estrutura/rodapePage');
    }
}