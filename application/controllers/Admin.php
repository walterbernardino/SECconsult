<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() 
    {
        Parent::__construct();

        if (empty($this->session->admin)) {
            redirect("/Login");
        }

    }

    public function index()
	{
        $this->load->model('Agenda_model');
        $dados ['agenda'] = $this->Agenda_model->get();
        $this-> load -> view ("admin", $dados);

    }

    public function cadastro()
    {
        $nome = $this->input->post('nome');
        $endereco = $this->input->post('endereco');
        $descricao = $this->input->post('descricao');
        $dt = $this->input->post('data');
    
        $cadastro['nome'] = $nome;
        $cadastro['dateAgenda'] = $dt;
        $cadastro['descricao'] = $descricao;
        $cadastro['endereco'] = $endereco;

        $this -> load -> model('Agenda_model');

        $this -> Agenda_model -> store($cadastro);

        echo "cadastrado";
    }

}