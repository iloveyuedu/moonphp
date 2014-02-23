<?php

namespace moon;

/**
 * 响应对象
 */
class Response {
	private $request;
	private $viewPath = "";
	private $viewData = array();
	private $headers = array();
	private $statuCodeMap = array(
		'200'=>'OK!',
	);
	public $disView = FALSE;
	
	public function __construct($request) {
		$this->request = $request;
		
		// 转发到方法
		$this->position_action();
	}
	
	// 设置头信息
	public function set_header($headKey, $text) {
		$this->headers[$headKey] = $text;
	}
	
	// 发送头信息
	private function send_header() {
		foreach($this->headers as $headKey => $text) {
			if (isset($this->statuCodeMap[$headKey])) {
				header("HTTP/1.1 {$headKey} {$this->statuCodeMap[$headKey]}");
			} else {
				header("{$headKey} {$text}");
			}
		}
	}
	
	public function json($arr, $disView = true) {
		$this->disView = $disView;
		echo json_encode($arr);
	}
	
	private function position_action() {
		$cChild = "\\".APPNAME."\\controller\\".$this->request->router->get_controller();
		if (!class_exists($cChild)) {
			echo $cChild . " not found";
		}
		entity(new $cChild())->{$this->request->router->get_action()}($this->request, $this, $this->request->router->get_params());
		
		// 在视图处理前发送头信息
		$this->send_header();
	}
	
	public function get_view_path() {
		return $this->viewPath?$this->viewPath:strtolower($this->request->router->get_controller()).DS.strtolower($this->request->router->get_action()).'.php';
	}
	
	public function get_view_data() {
		return $this->viewData;
	}
	
	public function set_view_path($path) {
		$this->viewPath = $path;
		
		return TRUE;
	}
	
	public function set_view_data($key, $value = NULL) {
		if (is_array($key)) {
			foreach($key as $k=>$v) {
				$this->set_view_data($k, $v);
			}
		} else {
			$this->viewData[$key] = $value;
		}
		
		return TRUE;
	}
}

?>