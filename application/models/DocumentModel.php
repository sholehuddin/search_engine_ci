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
}

?>