<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR."Config.php";

class ConfigTest extends PHPUnit_Framework_TestCase {
	
	private $conf;
	public function SetUp() {
		$this->conf = new \moon\Config();
	}
	
	public function testWrite() {
		$this->conf->write('a.b.c', 1);
		$this->conf->write('a.b.a', 1);
		$this->conf->write('a.b.a', 2);
		$this->conf->write('password', 1);
		$this->conf->write('username', 1);
		
		//var_dump($this->conf->get());
		//$expectedConf = array(
		//	'a'=>array(
		//		'b'=>array(
		//			'c'=>1
		//		)
		//	)
		//);
		//
		//$this->assertEquals($this->conf->get(), $expectedConf);
	}
	
	public function testGet() {
		$this->conf->write('a.b.c', 1);
		
		//var_dump($this->conf->get('a.b.c'));
		//var_dump($this->conf->get('a'));
		//var_dump($this->conf->get('a.b'));
	}
	//
	public function testDelete() {
		$this->conf->write('a.b.c', 21);
		
		$this->conf->delete('a.b.c');
		var_dump($this->conf->get('a.b.c'));
		
		$this->assertEquals($this->conf->get('a.b.c'), 21);
	}
}

?>