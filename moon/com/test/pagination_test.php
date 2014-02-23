<?php

require dirname(__dir__) . DIRECTORY_SEPARATOR . 'Pagination.php';
use moon\com\Pagination;

class PaginationTest extends PHPUnit_Framework_TestCase {
	private $page = null;
	
	public function SetUp() {
		$this->page = new Pagination(2, 4, 20, 'http://a.com/index.php?page=');
	}
	
	public function testPage() {
		echo $this->page->as_html();
	}
	
	//public function testPageexists() {
	//	var_dump($this->page);
	//}
}

?>