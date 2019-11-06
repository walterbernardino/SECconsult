<?php

class Controler_relatorio extends CI_Controller{

    public function __construct() {
        Parent::__construct();
        $this->verificarLogin();
    }
    public function index(){


        $this->verificarLogin();
        $this->load->model("pessoa_model");
        $this->load->model('Paciente_model');
        $dt['tipo'] = $this->pessoa_model->getTipo();
        $dt['confirmados'] = $this->Paciente_model->getConfirmados();
        $dt['cancelados'] = $this->Paciente_model->getCancelados();
        $dt['aconfirmar'] = $this->Paciente_model->getAconfirmar();
        $dt['reagendados'] = $this->Paciente_model->getReagendados();
        $this->load->view('estrutura/cabPage',$dt);
        $this->load->view('corpo/relatorio');
        $this->load->view('estrutura/rodapePage');
    }

    public function gerarRelatorio(){
        $mpdf = new \Mpdf\Mpdf();

        
        $mpdf->WriteHTML('Hello World');
        
        
        $mpdf->Output();
    }
    
    private function verificarLogin(){
        if(empty($this->session->admin)){
            redirect('login');
        }


    }
}