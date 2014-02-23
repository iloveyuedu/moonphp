<?php

require __DIR__.DIRECTORY_SEPARATOR."constant.php";
require __DIR__.DS."gfunctions.php";

// 框架文件自动加载
if (defined('CAUTOLOAD') && (CAUTOLOAD === FALSE)) {
	spl_autoload_register(function($className) {
		$classPath = str_replace("\\", DIRECTORY_SEPARATOR, $className) . '.php';
		
		$filename = "";
		if (strpos($className, 'moon') === 0) {
			$filename = MOON.str_replace('moon', "", $className).".php";
		} else if (strpos($className, APPNAME) === 0) {
			$filename = APP.str_replace(APPNAME, "", $className).".php";
		}
		
		// echo $filename . "<br />";
		if (is_file($filename)) {
			require $filename;
		}
	});
}

// 自动加载所有配置文件
foreach(list_dir_files(CONFIGPATH) as $file) {
	if (is_file($file)) {
		require $file;
	}
}



?>