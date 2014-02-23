<?php

namespace moon;

/**
 * 请求对象
 */
class Request {
	public $router;
	private $isPost, $isGet, $isPut, $isDelete, $hasUploadFile;
	public function __construct($router) {
		$this->router = $router;
		
		$this->isPost = strtoupper($_SERVER['REQUEST_METHOD']) === 'POST';
		$this->isGet = strtoupper($_SERVER['REQUEST_METHOD']) === 'GET';
		$this->isPut = strtoupper($_SERVER['REQUEST_METHOD']) === 'PUT';
		$this->isDelete = strtoupper($_SERVER['REQUEST_METHOD']) === 'DELETE';
		$this->hasUploadFile = !empty($_FILES);
	}
	
	public function get($key, $default) {
		return isset($this->router->get_params()[$key])?$this->router->get_params()[$key]:$default;
	}
	
	public function post($key, $default) {
		return isset($_POST[$key])?$_POST[$key]:$default;
	}
}

?>