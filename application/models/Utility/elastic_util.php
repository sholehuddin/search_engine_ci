<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}
function create_elastic_index() {
	$this->elastic_client->create_elastic_index();
}

function search_data($object) {
	$search_data = [];
	foreach ($this->search_data_fields as $field) {
		$search_data[$field] = $object[$field];
	}
	return json_encode($search_data);
}

function reindex($object) {
	$this->elastic_client->reindex($this->search_data($object), $this->id);
}
?>