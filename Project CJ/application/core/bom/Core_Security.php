<?php
class Core_Security implements BusinessObjectModel {
	
	/*public function __construct($args) {
		
	}*/
	
	public static function encryptPassword($password) {
		return md5($password);
	}
	
	
	
}