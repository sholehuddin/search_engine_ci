<?php
/**
 * Elasticsearch Library
 *
 * @package OpenLibs
 *
 */
class ElasticSearch {
	public $index, $ch;

	/**
	 * constructor setting the config variables for server ip and index.
	 */

	public function __construct($index) {
		$ci = &get_instance();
		$ci->config->load("elasticsearch");
		$this->server = 'www.local.host:9200';
		$this->index = $index;
	}
	/**
	 * Handling the call for every function with curl
	 *
	 * @param type $path
	 * @param type $method
	 * @param type $data
	 *
	 * @return type
	 * @throws Exception
	 */

	private function call($path, $method = 'GET', $data = null, $opt = []) {
		if (!$this->index) {
			throw new Exception('$this->index needs a value');
		}
		$url = $this->server . '/' . $this->index . '/' . $path;
		if (is_array($data)) {
			$data = json_encode($data);
		}

		$this->ch = $this->prepare_curl($url);

		switch ($method) {
		case 'GET':
			break;
		case 'POST':
			curl_setopt($this->ch, CURLOPT_POST, true);
			curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
			break;
		case 'PUT':
			curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'PUT');
			curl_setopt($this->ch, CURLOPT_POSTFIELDS, $data);
			break;
		case 'DELETE':
			curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
			break;
		}

		return json_decode($this->do_request(), true);
	}

	/**
	 * create a index with mapping or not
	 *
	 * @param json $map
	 */

	public function create($map = false) {
		if (!$map) {
			$this->call(null, 'PUT');
		} else {
			$this->call(null, 'PUT', $map);
		}
	}

	/**
	 * get status
	 *
	 * @return array
	 */

	public function status() {
		return $this->call('_status');
	}

	/**
	 * count how many indexes it exists
	 *
	 * @param string $type
	 *
	 * @return array
	 */

	public function count($type) {
		return $this->call($type . '/_count?' . http_build_query(array(null => '{matchAll:{}}')));
	}

	/**
	 * set the mapping for the index
	 *
	 * @param string $type
	 * @param json   $data
	 *
	 * @return array
	 */

	public function map($type, $data) {
		return $this->call($type . '/_mapping', 'PUT', $data);
	}

	/**
	 * set the mapping for the index
	 *
	 * @param type $type
	 * @param type $id
	 * @param type $data
	 *
	 * @return type
	 */

	public function add($type, $id, $data) {
		return $this->call($type . '/' . $id, 'PUT', $data);
	}

	/**
	 * delete a index
	 *
	 * @param type $type
	 * @param type $id
	 *
	 * @return type
	 */

	public function delete($type, $id) {
		return $this->call($type . '/' . $id, 'DELETE');
	}

	/**
	 * make a simple search query
	 *
	 * @param type $type
	 * @param type $q
	 *
	 * @return type
	 */

	public function query($type, $q) {
		return $this->call($type . '/_search?' . http_build_query(array('q' => $q)));
	}

	/**
	 * make a advanced search query with json data to send
	 *
	 * @param type $type
	 * @param type $query
	 *
	 * @return type
	 */

	public function advancedquery($type, $query) {
		return $this->call($type . '/_search', 'POST', $query);
	}

	/**
	 * make a search query with result sized set
	 *
	 * @param string  $type  what kind of type of index you want to search
	 * @param string  $query the query as a string
	 * @param integer $size  The size of the results
	 *
	 * @return array
	 */

	public function query_wresultSize($type, $query, $size = 999) {
		return $this->call($type . '/_search?' . http_build_query(array('q' => $q, 'size' => $size)));
	}

	/**
	 * get one index via the id
	 *
	 * @param string  $type The index type
	 * @param integer $id   the indentifier for a index
	 *
	 * @return type
	 */

	public function get($type, $id) {
		return $this->call($type . '/' . $id, 'GET');
	}

	/**
	 * Query the whole server
	 *
	 * @param type $query
	 *
	 * @return type
	 */

	public function query_all($query) {
		return $this->call('_search?' . http_build_query(array('q' => $query)));
	}

	/**
	 * get similar indexes for one index specified by id - send data to add filters or more
	 *
	 * @param string  $type
	 * @param integer $id
	 * @param string  $fields
	 * @param string  $data
	 *
	 * @return array
	 */

	public function morelikethis($type, $id, $fields = false, $data = false) {
		if ($data != false && !$fields) {
			return $this->call($type . '/' . $id . '/_mlt', 'GET', $data);
		} else if ($data != false && $fields != false) {
			return $this->call($type . '/' . $id . '/_mlt?' . $fields, 'POST', $data);
		} else if (!$fields) {
			return $this->call($type . '/' . $id . '/_mlt');
		} else {
			return $this->call($type . '/' . $id . '/_mlt?' . $fields);
		}
	}

	/**
	 * make a search query with result sized set
	 *
	 * @param type $query
	 * @param type $size
	 *
	 * @return type
	 */
	public function query_all_wresultSize($query, $size = 999) {
		return $this->call('_search?' . http_build_query(array('q' => $query, 'size' => $size)));
	}

	/**
	 * make a suggest query based on similar looking terms
	 *
	 * @param type $query
	 *
	 * @return array
	 */
	public function suggest($query) {
		return $this->call('_suggest', 'POST', $query);
	}

	public function bulk_reindex($type, $data) {
		$data_request = [];
		var_dump($data);
		$url = $this->server . '/' . $this->index;
		$this->ch = $this->prepare_curl($url);
		curl_setopt($this->ch, CURLOPT_POST, true);
		curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($data));
		return json_encode($this->do_request());
	}

	public function create_index($type) {
		$url = $this->server . '/' . $this->index;
		$this->ch = $this->prepare_curl($url);
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'PUT');
		return json_encode($this->do_request());
	}

	public function delete_index($type) {
		$url = $this->server . '/' . $this->index;
		$this->ch = $this->prepare_curl($url);
		curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
		return json_encode($this->do_request());
	}

	function prepare_curl($url) {

		$headers = array('Accept: application/json', 'Content-Type: application/json');

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		return $ch;
	}

	function do_request() {
		$response = curl_exec($this->ch);
		$code = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
		return $response;
	}

}