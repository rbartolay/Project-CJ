<?php
/**
 * Session class is the main class implementation or the business logic thats focused in the
 * session variable. 
 * @author rbartolay
 *
 */
class Session extends Security  {
	
	/**
	* Creates new instance of Session variable
	* @param unknown_type $User
	*/
	public static function createSession($index = null, $data) {
		if($index != null or die(get_class($this) . "Index variable must not be null."));
		$_SESSION[$index] = $data;
	}
	
	public static function getUser() {
		if(isset($_SESSION['User'])) {
			return  (object) $_SESSION['User'];
		}
		return null;
	}
	
	public static function getUserModuleRights() {
		if(isset($_SESSION['ModuleRights'])) {
			return $_SESSION['ModuleRights'];
		}
		return null;
	}
	
	public static function getUserDetails() {
		if(isset($_SESSION['UserDetails'])) {
			return  (object) $_SESSION['UserDetails'];
		}
		return null;
	}
	
	public static function getUserModuleRightsById($id) {
		if(isset($_SESSION['ModuleRights'][$id])) {
			return $_SESSION['ModuleRights'][$id];
		}
		return null;
	}
	
	public static function getUserAssessment() {
		if(isset($_SESSION['Assessment'])) {
			return $_SESSION['Assessment'];
		}
		return null;
	}
	
	public function __toString() {
		var_dump($_SESSION);
	}
}