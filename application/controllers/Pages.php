<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function index()
	{
		$this->load->view('pages/home');
	}
	public function daftar_kendaraan()
	{
		$this->load->view('pages/daftar_kendaraan');
	}
}