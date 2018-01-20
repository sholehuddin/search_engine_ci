<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Document Model
 */
class Document extends CI_Model {
	public $table = 'document';
	function __construct() {
		parent::__construct();
		$this->load->library('elasticsearch');
	}

	function reindex() {
		$id = $this->id;
		$data = array('document_title' => $this->document_title,
			'document_name' => $this->document_name,
			'description' => $this->description,
			'category_id' => $this->category_id,
			'state' => $this->state);
		$this->elasticsearch->add("document", $id, $data);
	}
}

?>