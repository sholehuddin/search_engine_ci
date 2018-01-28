<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Elastic Libraries
 */

require 'vendor/autoload.php';

class Elastic {
	public $table, $id, $elasticsearch;
	function __construct($table = []) {
		$this->table = $table;
		$this->elasticsearch = Elasticsearch\ClientBuilder::create()->build();
	}

	function reindex($data) {
		array_merge($data, array('index' => $this->table, 'type' => $this->table));
		return $this->elasticsearch->index($this->build_params($data));
	}

	function create_elastic_index() {
		$this->elasticsearch->create_index($this->table);
	}

	function delete_elastic_index() {
		$this->elasticsearch->delete_index($this->table);
	}

	function bulk_reindex($params) {
		return $this->elasticsearch->bulk($params);
	}

	function build_params($data) {
		$params = array('index' => $this->table,
			'type' => $this->table,
			'id' => $data['id'],
			'body' => $data);
		return $params;

	}
}

?>