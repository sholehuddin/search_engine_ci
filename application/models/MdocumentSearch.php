<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/*
Developed by Muhammad Sholehuddin Al-Ayyubi
Copyright 2016
 */
require_once "application/core/MY_Search.php";

class MdocumentSearch extends MY_Search {
	public $category_id;
	function __construct($keyword, $argument) {
		parent::__construct($keyword, $argument);
		$this->table = 'documents';
	}

	function default_argument() {
		if (isset($this->argument['category_id'])) {
			$filter_query = array('term' => ['category_id' => $this->category_id]);
		} else {
			$filter_query = [];
		}
		if ($this->keyword != '') {
			$query = array('match' => array('category_id' => $this->keyword,
			));
		} else {
			$query = [];
		}
		$params = array('index' => $this->table,
			'size' => $this->per_page,
			'from' => $this->page * $this->per_page,
			'type' => $this->table,
			'body' => array(
				'query' => $query,
			));
		return $params;
	}

	function result() {
		return $this->elasticsearch->search($this->default_argument());
	}
}