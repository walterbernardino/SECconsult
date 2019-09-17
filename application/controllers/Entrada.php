<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Entrada extends CI_Controller {

	public function index()
	{
	$this->load->view('restrict');

	$this->load->view('pessoa_model');

	$this->load->view('admin');

	$agenda ['agenda'] = $this-> Agenda_model -> get();
		$this-> load -> view ("agenda", $agenda);
	}

}