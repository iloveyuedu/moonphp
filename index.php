<?php

error_reporting(E_ALL);
// 是否有composer自动加载
define('CAUTOLOAD', false);

define('APP', __DIR__.DIRECTORY_SEPARATOR.'app');
define('MOON', __DIR__.DIRECTORY_SEPARATOR.'moon');
require __DIR__ . DIRECTORY_SEPARATOR . "moon/autoload.php";

\moon\Context::start();



?>