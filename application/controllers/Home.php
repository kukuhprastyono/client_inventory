<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

	public function index()
	{
		$this->load->library('session');
		if ($this->session->userdata('id_user') != null && $this->session->userdata('id_user') != '') {

			$this->load->view('template');
		} else {
			redirect('login');
		}
	}
}
