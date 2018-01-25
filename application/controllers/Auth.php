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
		if ($this->form_validation->run() == FALSE) {
			$this->session_akun();
		} else {
			$this->load->model('Auth/Mauth');
			if ($this->Mauth->authlogin()) {
				$this->main();
			} else {
				$this->view();
			}
		}
	}

	public function view(){
		$this->load->model('Templates');
		$data['tracking_code'] = $this->Templates->get_tracking_code();
		$this->load->view('login',$data);
	}

	public function main(){
		if($urlRedirect != "") {
			$this->session->unset_userdata('urlredirect');
			header("Location:".base_url($urlRedirect.'.zul'));
		} else {
			header("Location:".base_url());
		}
	}

	public function session_egov(){
        $getToken = $this->input->get('token');
        $username = $this->input->get('no');
        $getApp = $this->input->get('app');
        $token=hash('sha512', '@#b4pp3n45').'9'.hash('sha512', $username).'9'.hash('sha512', '54n3pp4b$^&%').'==';
        $app=hash('sha512', '54n3pp4b$^&%').'9'.hash('sha512', 'eperformance'.$username).'9'.hash('sha512', '@#b4pp3n45').'==';
        if ($token == $getToken && $app == $getApp) {
			$this->load->model('Auth/Mauth');
			$ok = $this->Mauth->login_sso($username);
			if ($ok) {
				$this->main();
			} else {
				$this->load->view('no_access');
			}
        } else $this->load->view('forbidden');
		//$coba = json_decode($this->curl->simple_get($this->API.'/welcome', array('token' => $app)));
	}

	public function session_akun(){
		$this->load->model('libcontrol');
		$dataUM = $this->libcontrol->getData();
		if(isset($dataUM->data[0])){
			$this->load->model('Auth/Mauth');
			$ok = $this->Mauth->login_sso($dataUM->data[0]->userid);
			if ($ok) {
				//$this->session->set_userdata('sso_akun', $this->libcontrol->getSesID());
				$this->main();
			} else {
				$this->load->view('no_access');
			}
		} else $this->view();
	}
}