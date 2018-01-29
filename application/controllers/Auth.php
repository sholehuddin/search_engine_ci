<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

	public function __construct() {
		parent::__construct();

	}

	public function index() {
		$this->check_login();
		$this->form_validation->set_rules('username', 'Username', 'required|trim', array('required' => 'Harus input %s.'));
		$this->load->model('Auth/Mauth');
		if ($this->Mauth->cek_user()) {
			$this->data['user_name'] = $this->input->post('username');
		} else {
		}
		$this->load->view('login', $this->data);
	}

	public function cek_pass() {
		$this->check_login();
		$this->form_validation->set_rules('password', 'Password', 'required|trim', array('required' => 'Harus input %s.'));
		$this->load->model('Auth/Mauth');
		if ($this->Mauth->authlogin()) {
			redirect('main');
		} else {
			$this->load->view('login');
		}
	}

	function logout() {
		$this->session->unset_userdata('user');
		redirect('auth');
	}

	function check_login() {
		if ($this->current_user->is_logged_in()) {
			redirect('main');
		}
	}
}