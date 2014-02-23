<?php

namespace moon;


class View {
	public $response;
	/**
	 * @param Object $res 响应对象
	 */
	public function __construct($response) {
		$this->response = $response;
		
		if ($this->response->disView) {
			return;
		}
		
		$this->render_output();
	}
	
	/**
	 * 渲染并输出视图
	 */
	private function render_output() {
		extract($this->response->get_view_data());
		$viewPath = VIEWPATH.DS.$this->response->get_view_path();
		if (!is_file($viewPath)) {
			echo $viewPath . " not found";
			exit();
		}
		require $viewPath;
	}
}

?>