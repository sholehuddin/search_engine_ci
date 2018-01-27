<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	public $data, $current_user;
	function __construct() {
		parent::__construct();
		$this->load->model('Muser');
		$this->current_user = new Muser($this->session->userdata('user'));

		if (!$this->current_user->is_logged_in() && $this->uri->segment(1) != 'auth') {
			redirect('auth');
		}
		$this->data['current_user'] = $this->current_user;
	}

	public function load_view($views, $data, $opt = []) {
		//Page Title
		$this->data = array_merge($this->data, $data);

		$default_data = array('title' => 'Beranda',
			'unit_kerja' => 'Pusintek',
			'utama' => 'Beranda',
			'url_utama' => base_url(),
			'icon_utama' => 'fa fa-dashboard',
			'menu_dash' => 'active');
		foreach ($default_data as $key => $value) {
			if (!isset($this->data[$key])) {
				$this->data[$key] = $value;
			}
		}
		if (isset($opt['template'])) {
			$template = $opt['template'];
		} else {
			$template = 'none';
		}

		//Load Template
		$this->load->model('Templates');
		$this->Templates->top_template($this->data, $template);
		if (is_array($views)) {
			foreach ($views as $view) {
				$this->load->view($view, $this->data);
			}
		} else {
			$this->load->view($views, $this->data);
		}
		$this->Templates->bottom_template($template);

	}
}
