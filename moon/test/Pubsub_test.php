<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . "Pubsub.php";

use \moon\Pubsub;

class PubsubTest extends PHPUnit_Framework_TestCase {
	public function testPs() {
		$uid = Pubsub::sub('news', function($name) {
			echo $name. " 你妈妈喊你回家吃饭了。" . PHP_EOL;
		}, 'zhangsan');
		
		Pubsub::trigger('news','zhangsan');
		Pubsub::trigger('news','zhangsan');
		Pubsub::trigger('other', '');
		Pubsub::unsub('news', $uid);
		Pubsub::trigger('news','zhangsan');
	}
}

?>