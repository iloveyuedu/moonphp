<?php

namespace moon;
class Db extends \PDO {
	private $username;
	private $password;
	private $dsn;
	public function __construct() {
		foreach(Config::get('db') as $key=>$val) {
			$this->$key = $val;
		}
		
		parent::__construct($this->dsn, $this->username, $this->password);
	}
}

?>