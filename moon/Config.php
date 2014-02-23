<?php

namespace moon;

class Config {
	/**
	 * 配置容器
	 */
	private static $Conf = array();
	
	/**
	 * @param string $ckey 配置键
	 * @param mixed $cvalue 值
	 * @return 成功返回true
	 */
	public static function write($ckey, $cvalue) {
		if (!$ckey) {
			return FALSE;
		}
		
		$ckeyArr = explode('.', $ckey);
		$lastCkey = array_pop($ckeyArr);
		$tConf = &self::$Conf;
		foreach($ckeyArr as $k) {
			if (!isset($tConf[$k])) {
				$tConf[$k] = array();
			}
			$tArr = &$tConf[$k];
			unset($tConf);
			$tConf = &$tArr;
		}
		
		$tConf[$lastCkey] = $cvalue;
		
		return TRUE;
	}
	
	/**
	 * 获取配置值
	 * @param string $ckey 配置键
	 * @return mixed 指定的配置值, 不存在返回null
	 */
	public static function get($ckey = NULL, $default = NULL) {
		if (!$ckey) {
			return self::$Conf;
		}
		
		$ckeyArr = explode('.', $ckey);
		$firstKey = array_shift($ckeyArr);
		$dvalue = self::$Conf[$firstKey];
		foreach($ckeyArr as $k) {
			if (!isset($dvalue[$k])) {
				return $default;
			}
			$dvalue = $dvalue[$k];
		}
		
		return is_null($dvalue)?$default:$dvalue;
	}
	
	/**
	 * 删除配置值
	 * @param string $ckey 需删除的配置键
	 * @return 成功返回true
	 */
	public static function delete($ckey) {
		$ckeyArr = explode('.', $ckey);
		$lastCkey = array_pop($ckeyArr);
		
		$dvalue = &self::$Conf;
		foreach($ckeyArr as $k) {
			if (!isset($dvalue[$k])) {
				return TRUE;
			}
			$tArr = &$dvalue[$k];
			unset($dvalue);
			$dvalue = &$tArr;
		}
		
		if (isset($dvalue[$lastCkey])) {
			unset($dvalue[$lastCkey]);
		}
		return TRUE;
	}
}

?>