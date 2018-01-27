<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * User Model
 */
class Muser extends CI_Model {
	public $table = 'user';
	public $nik, $name, $state, $role, $username;

	function __construct($argument = []) {
		parent::__construct();
		$this->load->library('Elasticsearch');
		if (count($argument) > 0) {
			$this->nik = $argument['nik'];
			$this->name = $argument['name'];
			$this->state = $argument['state'];
			$this->role = $argument['role'];
			$this->username = $argument['username'];
		}
	}

	function is_admin() {
		return $this->role == 1;
	}

	function is_active() {
		return $this->state == 1;
	}

	function is_logged_in() {
		return isset($this->username);
	}
}

?>