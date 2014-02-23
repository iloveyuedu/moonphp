<?php

namespace moon;

/**
 * 框架路由控制
 */
class Router {
	private $uri;
	private $controller;
	private $action;
	private $params;
	
	public function __construct() {
		static $instanced = false;
		if ($instanced) {
			return $this;
		}
		$this->uri = $this->get_uri_from_env();
		$this->parse_route();
		$this->route_override();
		$instanced = true;
	}
	
	public function get_controller() {
		return $this->controller;
	}
	
	public function get_action() {
		return $this->action;
	}
	
	public function get_params() {
		return $this->params;
	}
	
	private function parse_route() {
		$uriSeg = explode('/', $this->uri);
		$this->controller = ucwords(strtolower(array_shift($uriSeg)));
		$this->action = strtolower(array_shift($uriSeg));
		$this->params = $uriSeg;
		return TRUE;
	}
	
	private function route_override() {
		$route = \moon\Config::get('route');
		$overrideRoute = isset($route[$this->controller.'/'.$this->action])?$route[$this->controller.'/'.$this->action]:array();
		if (!empty($overrideRoute)) {
			$this->controller = ucwords(strtolower(array_shift($overrideRoute)));
			$this->action = ucwords(strtolower(array_shift($overrideRoute)));
		}
	}
	
	private function get_uri_from_env() {
		$uri = $_SERVER['REQUEST_URI'];
		$phpPos = strpos($uri, '.php');
		return substr($uri, $phpPos+4+1);
	}
}

?>