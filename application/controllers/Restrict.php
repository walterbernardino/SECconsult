<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Restrict extends CI_Controller {

	public function index()
	{
	$this->load->view('restrict');

	$this->load->view('pessoa_model');
	}

}