<?php
abstract class Controller {
	protected $Request;
	protected $QueryString;
	
	public function __construct() {

		$this->Request = new stdClass();
		$this->Request->post = null;
		$this->Request->get = null;
		$this->Request->files= null;
		
		if(isset($_POST) && count($_POST) > 0) {
			$this->Request->post = (object)$_POST;
		}
		
		if(isset($_GET) && count($_GET) > 0) {
			$this->Request->get = (object)$_GET;
		}
		
		if(isset($_FILES) && count($_FILES) > 0) {
			$this->Request->files = (object)$_FILES;
		}
	}
	
	public function setQueryString($qs) {
		$this->QueryString = $qs;
	}
	
	protected function requireModuleRightsClear() {
		if(in_array(false, func_get_args())) {
			die();
		}
	}
	
	protected function requireModuleRights() {
		if(in_array(false, func_get_args())) {			
			new Template("account", "error", "requireModuleRights");
			die;
		}
	}
	
	protected function requireUserAccounts() {
		if(in_array(false, func_get_args())) {
			new Template("account", "error", "requireUserAccount");
			die;
		}
	}
	
	public function __toString() {
		var_dump($this->QueryString);
		var_dump($this->Request);
	}
}