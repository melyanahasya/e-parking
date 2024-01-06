<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Componen extends CI_Controller {
	public function index()
	{
		$this->load->view('componen/navbar');
	}
	public function footer()
	{
		$this->load->view('componen/footer');
	}
}