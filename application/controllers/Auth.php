<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	//var $API ="";
    
    public function __construct(){
        parent::__construct();
        if($this->session->userdata('username')) redirect('main');
        //$this->API="https://e-gov.bappenas.go.id/new_naskahdinas/index.php/service/";
    }

	public function index(){
		$this->form_validation->set_rules('username', 'Username', 'required|trim', array('required' => 'Harus input %s.'));
		$this->form_validation->set_rules('password', 'Password', 'required|trim', array('required' => 'Harus input %s.'));
		$this->load->model('Auth/Mauth');
		if ($this->Mauth->authlogin()) {
			redirect('main');
		} else {
			$this->load->view('login');
		}
	}

}