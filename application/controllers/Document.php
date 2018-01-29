<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*
Developed by Muhammad Sholehuddin Al-Ayyubi
Copyright 2016
 */
require_once "application/models/MdocumentSearch.php";
class Document extends MY_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('Mdocument');
	}

	public function index() {
		$search_builder = new MdocumentSearch('1', ['per_page' => 1]);
		var_dump($search_builder->result());

	}

	function reindex() {
		$query = $this->db->get('documents');
		$ids = [];
		$this->Mdocument->reindex($query->result()[0]);
	}

	function bulk_reindex() {
		$query = $this->db->get('documents');
		$ids = [];
		$this->Mdocument->bulk_reindex($query->result());
	}
}