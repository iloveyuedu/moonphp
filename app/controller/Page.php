<?php

namespace app\controller;

class Page extends \moon\Controller {
	public function index($req, $res) {
		$res->set_view_data(array(
			'name'=>'zhangsan',
			'age'=>20,
		));
		
		$res->set_view_path('page/index.php');
		$res->set_header('selfdefined', 'hello world');
	}
	
	public function show_article($req, $res) {
		$res->disView = true;	
		echo __METHOD__;
		echo "<br />";
		
		echo 'to show_article';
	}
	
	public function test_json($req, $res) {
		$res->json(array('name'=>'zhangsan', 'age'=>20));
	}
	
	public function test_db($req, $res) {
		$res->disView = true;
		$db = \moon\Singleton::new_single("\moon\Db");
		var_dump($db);
	}
	
	public function name($req, $res, $parms) {
		$name = $req->get(0, '');
		$age = $req->get(1, '');
		$res->set_view_data(array(
			'name'=>$name,
			'age'=>$age,
		));
		$res->set_view_path("page/name.php");
	}
}

?>