<?php

class Controler_relatorio extends CI_Controller{
    public function index(){

        $this->load->model("pessoa_model");

        $dt['tipo'] = $this->pessoa_model->getTipo();

        $this->load->view('estrutura/cabPage',$dt);
        $this->load->view('corpo/relatorio');
        $this->load->view('estrutura/rodapePage');
    }

    public function gerarRelatorio()
	{
		$mpdf = new \Mpdf\Mpdf();

		
		$mpdf->WriteHTML('Hello World');
		
		
		$mpdf->Output();
	}
}