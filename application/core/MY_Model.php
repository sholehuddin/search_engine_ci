<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Base Model
 */
class MY_Model extends CI_Model {
	public $table, $elastic_client;

	function __construct($argument = []) {
		parent::__construct();
		$this->load->library('Elastic');
		$this->elastic_client = new Elastic($this->table);
	}

	function create($data) {
		try {
			if ($this->db->insert($this->table, $data)) {
				$this->elastic->save_to_elastic($data);
				true;
			} else {
				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}

	function update($query, $data) {
		try {
			$this->db->where($query);
			$this->db->update($this->table, $data);
			$this->db->select('id');
			$objects = $this->db->get($this->table);
			$this->db->
				$this->elastic->save_to_elastic($data, $objects->result_array());
			return true;

		} catch (Exception $e) {
			return false;
		}
	}

	function create_elastic_index() {
		$this->elastic_client->create_elastic_index();
	}

	function search_data($object) {
		$search_data = [];
		if (!is_array($object)) {
			$object = json_decode(json_encode($object), True);
		}
		foreach ($this->search_data_fields() as $key) {
			if (isset($object[$key])) {
				$search_data[$key] = $object[$key];
			}
		}
		return $search_data;
	}

	function reindex($object) {
		var_dump($this->elastic_client->reindex($this->search_data($object)));
	}

	function bulk_reindex($objects) {
		$params = [];
		$j = -1;
		foreach ($objects as $object) {
			$j++;
			$params['body'][] = array(
				'index' => array(
					'_index' => $this->table,
					'_type' => $this->table,
					'_id' => $object->id,
				),
			);
			$params['body'][] = $this->search_data(json_decode(json_encode($object), True));
			if ($j % 1000) {
				$responses = $this->elastic_client->bulk_reindex($params);
				$params = array();
			}
		}
	}

}

?>