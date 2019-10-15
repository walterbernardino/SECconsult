<? php

Class Controller_busca extends CI_Controller{

    public function index(){

    $this->load->model('busca_model');

    $dados['usuarios'] = $this->busca_model->usuarios();

    $this->load->view('estrutura/cabPage');
    $this->load->view('corpo/prontuario',$dados);
    $this->load->view('estrutura/rodapePage');

    }

    public function resultado(){

        $this->load->model('busca_model');

        $dados['listagem'] = $this->busca_model->buscar($_POST);

        $this->load->view('estrutura/cabPage');
        $this->load->view('corpo/prontuario',$dados);
        $this->load->view('estrutura/rodapePage');

    }
}


