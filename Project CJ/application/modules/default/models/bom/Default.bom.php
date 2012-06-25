<?php
require_once Configuration::getModulesPath().'default'. DS .'models'. DS .'dao'. DS .'Default.dao.php';

/**
 * The business object model for the default module
 * @author Ryan Bartolay
 */
class DefaultBom {
	
	/**
	 * Validates the login, returns true if validation is satisfied
	 * @param unknown_type $Request
	 */
	public function validateLogin($Request) {		
		$Response = new stdClass();
		$Response->success = false;
		$Response->message = Messages::errorLogin();
		
		$dDao = new DefaultDao();
		$User = $dDao->retrieveUserByEmail($Request->email);
		
		if($User != null) {
			if($User->password === md5($Request->password)) {
				if($User->group_id == 2) {
					$this->checkUserProfileDetailAndSummary($User->user_id);
				}
				$Response->success = true;
				$Response->data = $User;
			}
		}
		
		return $Response;
	}
	
	private function checkUserProfileDetailAndSummary($user_id) {
		$dDao = new DefaultDao();
		$user = new stdClass();
		$user->user_id = $user_id;
		if(!$dDao->retrieveUserProfileDetail($user_id)) {
			$dDao->insertProfileDetail($user);
		}
		if(!$dDao->retrieveUserProfileSummary($user_id)) {
			$dDao->insertProfileSummary($user);
		}
	}
	
	/**
	 * Builds the user session by getting and generating data from the database
	 * and sets the values to the session
	 * @param unknown_type $user_id
	 */
	public function buildUserSession($user_id) {
		$Response = new stdClass();
		$Response->success = false;
		
		$dDao = new DefaultDao();
		$User = $dDao->retrieveUserLoginDetailsByUserId($user_id);
		
		if($User != null) {
			Session::createSession('User', $User->User);
			$obj_merged = (object)array_merge((array)$User->UserDetails, (array)$User->UserParentDetails);
			Session::createSession('UserDetails', $obj_merged);
			Session::createSession('ModuleRights', $this->moduleRights($User->Rights));
			$Response->success = true;
		}
	
		return $Response;
	}
	
	private function moduleRights($object) {
		$module_rights = array();
		
		foreach($object as $module) {
			$module_rights[$module->module_id][] = $module->module_rights_id;
		}
		return $module_rights;
	}
	
}