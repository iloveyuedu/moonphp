<?php
// 框架全局可见函数

// 返回变量本身，链式调用时很有用
function entity($var) {
	return $var;
}

// 获取客户端ip
function get_client_ip() {
	if( isset($_SERVER['HTTP_X_FORWARDED_FOR']) ) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} elseif( isset($_SERVER['HTTP_CLIENTIP']) ) {
		$ip = $_SERVER['HTTP_CLIENTIP'];
	} elseif( isset($_SERVER['REMOTE_ADDR']) ) {
		$ip = $_SERVER['REMOTE_ADDR'];
	} else {
		$ip = '127.0.0.1';
	}

	$pos = strpos($ip, ',');
	if( $pos > 0 ) {
		$ip = substr($ip, 0, $pos);
	}

	return trim($ip);
}

// 列出所有目录下所有文件
function list_dir_files($path) {
	static $allFilePath = array();
	$dir = opendir($path);
	
	while(($file = readdir($dir)) !== FALSE) {
		if (in_array($file, array('.', '..'))) {
			continue;
		}
		
		$cfile = $path . DS . $file;
		if (is_file($cfile)) {
			$allFilePath[] = $cfile;
		} else if (is_dir($cfile)) {
			list_dir_files($path . DS . $cfile);
		}
	}
	closedir($dir);
	return $allFilePath;
}

?>