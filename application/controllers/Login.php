<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login');
		
		$this->load->model("pessoa_model");
	}


	public function RealizarLogin () {

		$email = $this-> input -> post ("login");
		$senha = md5($this-> input -> post ("senha"));

		$this->load->model('Pessoa_model');

		$id = $this->Pessoa_model->login($email, $senha);
	

		if (!empty($id)) {
			$this->session->set_userdata('admin', $id);

			echo json_encode (array ('true' => 'false'));
			
			
		} else {
			echo json_encode (array ('false' => 'false'));
		}

	}

	public function sair()
	{
		unset($this->session->admin);
		redirect('login');
	}
}