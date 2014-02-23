<?php
// moon入口文件

namespace moon;

class Context {
	public static function start() {
		new View(new Response(new Request(new Router())));
	}
}
?>