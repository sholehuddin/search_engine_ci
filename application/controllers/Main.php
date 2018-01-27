<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Developed by Muhammad Sholehuddin Al-Ayyubi
Copyright 2016
 */

class Main extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {

		$this->load_view('main', []);

	}
}