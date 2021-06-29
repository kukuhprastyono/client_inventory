<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

	public function index()
	{
		$this->load->library('session');
		if ($this->session->userdata('id_user') != null && $this->session->userdata('id_user') != '') {
			redirect('home');
		} else {
			$this->load->view('login');
		}
	}

	public function setSession()
	{
		$this->load->library('session');
		$id_user = $this->input->post('id_user');
		$email = $this->input->post('email');
		$level = $this->input->post('level');
		$nama = $this->input->post('nama');
		$this->session->set_userdata('id_user', $id_user);
		$this->session->set_userdata('email', $email);
		$this->session->set_userdata('level', $level);
		$this->session->set_userdata('nama', $nama);
	}

	public function logout()
	{
		$this->load->library('session');
		$this->session->sess_destroy();
		redirect('login');
	}
}
