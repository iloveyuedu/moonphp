<?php

namespace moon;
/**
 * 单例对象生成类 辅助
 */
class Singleton {
	public static $newSingleton = array();
	public static function new_single($fullName, $params = array()) {
		if (isset(self::$newSingleton[$fullName])) {
			return self::$newSingleton[$fullName];
		}
		
		return self::$newSingleton[$fullName] = new $fullName($params);
	}
	
	public static function renew_single($fullName, $params) {
		return self::$newSingleton[$fullName] = new $fullName($params);
	}
	
	public static function clear() {
		self::$newSingleton = array();
		return TRUE;
	}
}


?>