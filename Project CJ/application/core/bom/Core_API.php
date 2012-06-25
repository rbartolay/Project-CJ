<?php
class Core_API implements BusinessObjectModel {
	private static  $API_KEY = "EDDRO2ZBTN7TM3KYFV604";
	
	public static final function getKey() {
		return self::$API_KEY;
	}

	public static function isKeyCorrect($API) {
		return $API === self::$API_KEY;
	}
	
}