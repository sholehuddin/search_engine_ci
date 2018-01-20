<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $data;
	function __construct() {
		parent::__construct();
		$this->load->model('UserModel');
		$current_user = null;
		if (!is_null($this->session->userdata('user'))) {
			$current_user = $this->UserModel->db->where('id', $this->session->userdata('user')['id'])->get();
		}
		if (is_null($current_user)) {
			$current_user = new UserModel($this->session->userdata('user'));
		}
		$this->data['current_user'] = $current_user;
	}
}
