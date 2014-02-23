<?php

class A {
	public function __construct() {
		echo 'to: '.__CLASS__;
	}
}

var_dump(new A);

?>