<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Mauth extends CI_Model {
	function __construct() {
		parent::__construct();
	}

	function cek_user() {
		$username = strtolower($this->input->post('username'));
		if (stripos($username, '@kemenkeu.go.id')) {
			$username = substr($username, 0, -15);
		}

		if ($username == 'muhammad.ayyubi') {
			return TRUE;
		}

	}

	function authlogin() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//For localhost outside office
		if ($username == 'muhammad.ayyubi' && $password == 'jupiter.bappenas') {
			$sessionData['user'] = array('id' => '1',
				'username' => $username,
				'name' => 'Sholeh',
				'state' => '0',
				'role' => '1',
				'nik' => '123');

			$this->session->set_userdata($sessionData);

			$urlRedirect = $this->session->userdata('urlredirect');

			return TRUE;
		} else {
			return FALSE;
		}

		//End
		// $this->load->model('Auth/Ldap');
		// $auth = $this->Ldap->login($username,$password);
		// if ($auth) {
		// 	$userData = $this->getUserData($username);
		// 	exit();
		// 	//$sessionData = $this->set_session($data->result());
		// } else {
		// 	$this->session->set_flashdata('msg_error',"username dan password tidak sesuai");
		// 	return FALSE;
		// }
		$sessionData['tahun'] = $this->input->post('tahun');
		$this->session->set_userdata($sessionData);

		$urlRedirect = $this->session->userdata('urlredirect');

		//$this->setLog($username);
		return TRUE;
	}

	//Set Session
	function set_session($data) {
		foreach ($data as $row) {
			$sessionData['id'] = $row->id;
			$sessionData['username'] = $row->username;
			$sessionData['nama'] = $row->nama;
			$sessionData['kode'] = $row->kode;
			$sessionData['privilage'] = $row->privilage;
			$sessionData['eselon'] = $row->eselon;
			$sessionData['jabatan'] = $row->jabatan;
		}

		return $sessionData;
	}
}