<?php

// 框架常量

define('DS', DIRECTORY_SEPARATOR);
$_ = explode(DIRECTORY_SEPARATOR, APP);
define('APPNAME', array_pop($_));
unset($_);

// 配置文件目录
define('CONFIGPATH', APP.DS.'config');

// 视图目录
define('VIEWPATH', APP.DS."view");

?>