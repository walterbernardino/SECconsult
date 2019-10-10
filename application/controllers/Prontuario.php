<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prontuario extends CI_Controller{
    public function index(){
        
        $this->load->model("pessoa_model");
        $dt['tipo'] = $this->pessoa_model->getTipo();
        $dt2 = $this->pessoa_model->getTipo();
        if ($dt2['tipo'] == 1) {

        

        $this->load->model("Prontuario_model");
        $lista = $this->Prontuario_model->buscar();
        $dados = array('eventos' => $lista);



        $this->load->view('estrutura/cabPage',$dt);
        $this->load->view('corpo/prontuario',$dados);
        $this->load->view('estrutura/rodapePage');
        } else {
            echo "Acesso não permitido";
        }
            
    }

    public function atualizarPaciente(){

    }


}