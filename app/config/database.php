<?php

use \moon\Config;

Config::write('db', array(
	'dsn'=>'mysql:host=localhost;dbname=test',
	'username'=>'root',
	'password'=>'root',
));

?>