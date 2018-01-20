<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

$config['es_server'] = "http://localhost:"+getenv('ELASTIC_SEARCH_PORT');
$config['index'] = '';