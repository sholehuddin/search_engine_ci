<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

/**
 * Document Model
 */
class Mdocument extends MY_Model {
	public $table = 'documents';

	function __construct($argument = []) {
		parent::__construct();
	}

	function search_data_fields() {
		return ['id', 'document_title', 'document_name', 'description', 'category_id', 'state'];
	}

}

?>