<?php

namespace moon;

/**
 * 订阅/发布 模式
 */
class Pubsub {
	private static $container = array();
	public static function sub($topic, $callback) {
		if (!isset(self::$container[$topic])) {
			self::$container[$topic] = array();
		}
		
		array_push(self::$container[$topic], $callback);
		end(self::$container[$topic]);
		return key(self::$container[$topic]);
	}
	
	public static function unsub($topic, $id) {
		unset(self::$container[$topic][$id]);
		
		return TRUE;
	}
	
	public static function trigger($topic, $params) {
		if (!isset(self::$container[$topic])) {
			return FALSE;
		}
		foreach(self::$container[$topic] as $callback) {
			$callback($params);
		}
		
		return TRUE;
	}
	
	public static function get_container() {
		return self::$container;
	}
}

?>