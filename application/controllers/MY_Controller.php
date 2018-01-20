<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $data;
	function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
		if isset($this->session->userdata('user')){
			$current_user = $this->UserModel->get($this->session->userdata('user')['id']);
			if (is_null($current_user)) {
				$current_user = new UserModel($this->session->userdata('user'));
			}
		}
		else{
			redirect('/');
		}
		$this->data['current_user'] = $current_user;
	}
}
