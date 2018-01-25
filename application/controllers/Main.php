<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
	Developed by Muhammad Sholehuddin Al-Ayyubi
	Copyright 2016
 */

class Main extends CI_Controller {
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('username')) {
        	$this->session->set_userdata('urlredirect', uri_string());
			//redirect('auth');
		}
    }

	public function index()
	{
		//Page Title
		$data['title'] = "Beranda";
		$data['unit_kerja'] = "Pusintek";
		$template = "none";

		//Activate Menu bar
		$data['menu_dash'] = 'active';

		//Breadcrumb
		$data['utama'] = 'Dashboard';
		$data['url_utama'] = base_url();
		$data['icon_utama'] = 'fa fa-dashboard';
		//$data['child1'] = 'Dashboard';
		//$data['child2'] = 'Dashboard';

		//Load Template
		$this->load->model('Templates');
		$this->Templates->top_template($data,$template);
		$this->load->view('blank');
		$this->Templates->bottom_template($template);
	}
}