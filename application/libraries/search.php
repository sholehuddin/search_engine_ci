<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');

}

/**
* Search class for search using elastic
return elasticsearch object
*/
class Search
{
	
	function __construct($keyword, $argument)
	{
		$this->page = $argument['page'];
		if (is_null($this->page)) {
			$this->page = 1;
		}

		$this->per_page = $argument['per_page'];
		if (is_null($this->per_page)) {
			$this->per_page = 20;
		}

		$this->keyword = $keyword
		if (is_null($this->keyword)) {
			$this->keyword = '';
		};
	}

	public function result()
	{
		
	}

	public function FunctionName($value='')
	{
		
	}
}

?>