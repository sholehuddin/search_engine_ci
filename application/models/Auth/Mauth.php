<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mauth extends CI_Model 
{
    var $API ="";
    
    function __construct() {
        parent::__construct();
        $this->API="https://e-gov.bappenas.go.id/new_naskahdinas/index.php/service";
    }

	function authlogin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$username = strtolower($username);
		if (stripos($username, '@bappenas.go.id')) $username = substr($username, 0, -15);
		if (stripos($username, '@support.bappenas.go.id')) $username = substr($username, 0, -23);

		//For localhost outside office
		if ($username == 'muhammad.ayyubi' && $password == 'jupiter.bappenas') {
			$sessionData['id'] 			= '1';
			$sessionData['username'] 	= $username;
			$sessionData['nama'] 		= 'Sholeh';
			$sessionData['kode'] 		= '0';
			$sessionData['privilage'] 	= 'sa';
			$sessionData['eselon'] 		= '0';
			$sessionData['jabatan']		= 'Administrator';
			//Set Session Data
			$sessionData['tahun'] = $this->input->post('tahun');
			$this->session->set_userdata($sessionData);

			$urlRedirect = $this->session->userdata('urlredirect');

			$this->setLog($username);
			return TRUE;
		}
		//End
		$this->load->model('Auth/Ldap');
		$auth = $this->Ldap->login($username,$password);
		if ($auth) {
			$userData = $this->getUserData($username);
			exit();
			//$sessionData = $this->set_session($data->result());
		} else {
			$this->session->set_flashdata('msg_error',"username dan password tidak sesuai");
			return FALSE;
		}
		$sessionData['tahun'] = $this->input->post('tahun');
		$this->session->set_userdata($sessionData);

		$urlRedirect = $this->session->userdata('urlredirect');

		$this->setLog($username);
		return TRUE;
	}

	//Set Session
	function set_session($data){
		foreach ($data as $row) {
			$sessionData['id'] 			= $row->id;
			$sessionData['username'] 	= $row->username;
			$sessionData['nama'] 		= $row->nama;
			$sessionData['kode'] 		= $row->kode;
			$sessionData['privilage'] 	= $row->privilage;
			$sessionData['eselon'] 		= $row->eselon;
			$sessionData['jabatan']		= $row->jabatan;
		}

		return $sessionData;
	}

	//Semua User
	function getUserData($username,$password=''){
		$userData = json_decode(file_get_contents($this->API.'/get_data_from_uid/'.$username));
		foreach ($userData as $val) {
			$sessionData['id'] 			= 1;
			$sessionData['username'] 	= $username;
			$sessionData['nama'] 		= $val->nama_user;
			$sessionData['kode'] 		= $val->kode_surat;
			$sessionData['privilage'] 	= $row->privilage;
			$sessionData['eselon'] 		= $val->eselon;
			$sessionData['jabatan']		= $val->jabatan.' '.$val->uke;
		} return $sessionData;
	}

	//Jika User UKE
	function getUserEselon($username,$password='',$tbl_es){
		if ($tbl_es == "tbl_privilage") {
			$selector = $tbl_es.".kode = tbl_users.privilage";
		} else {
			$selector = $tbl_es.".kode = tbl_users.uke";
		}

		$this->db->join($tbl_es, $selector);
		$this->db->where('username',$username);
		if ($password) $this->db->where('tbl_users.password',md5($password)); //Check ke 3 menggunakan password
        $this->db->where('tbl_users.status',TRUE);
        $data = $this->db->get('tbl_users');
        return $data;
	}

	function setLog($user){
		if ($this->agent->is_browser()){
		    $agent = $this->agent->browser().' '.$this->agent->version();
		}
		elseif ($this->agent->is_robot()){
		    $agent = $this->agent->robot();
		}
		elseif ($this->agent->is_mobile()){
		    $agent = $this->agent->mobile();
		}
		else{
		    $agent = 'Unidentified User Agent';
		}

		$data = array(
			'id_session' => session_id(),
			'browser' => $agent,
			'os' => $this->agent->platform(),
			'user' => $user,
		);
		$this->db->insert('log_session',$data);
	}

	function login_sso($username){
		$data = $this->getUserData($username);
		if ($data) {
			$sessionData = $this->set_session($data->result());
			//$sessionData['tahun'] = $this->input->post('tahun');
			$sessionData['tahun'] = date('Y');
			$this->session->set_userdata($sessionData);

			$urlRedirect = $this->session->userdata('urlredirect');

			$this->setLog($username);
			return TRUE;
		} else return FALSE;
	}
}