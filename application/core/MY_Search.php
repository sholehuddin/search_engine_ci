<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');

}

/**
 * Search class for search using elastic
return elasticsearch object
 */
class MY_Search {
	public $page, $per_page, $keyword, $argument, $table, $elasticsearch;

	function __construct($keyword, $argument) {
		if (isset($argument['page'])) {
			$this->page = $argument['page'];
		} else {
			$this->page = 1;
		}

		if (isset($argument['per_page'])) {
			$this->per_page = $argument['per_page'];
		} else {
			$this->per_page = 10;
		}

		if (!is_null($keyword)) {
			$this->keyword = $keyword;
		} else {
			$this->keyword = '';
		}
		$this->elasticsearch = Elasticsearch\ClientBuilder::create()->build();
	}

}

?>