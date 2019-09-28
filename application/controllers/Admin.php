<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index(){
        
        $this->load->view('estrutura/cabPage');
        $this->load->view('corpo/index_corpo');
        $this->load->view('estrutura/rodapePage');
    }
}