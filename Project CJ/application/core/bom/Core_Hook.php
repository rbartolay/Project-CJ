<?php
/**
 * Hook basically calls the objects and methods.
 *
 * @author Ryan Bartolay
 */
class Core_Hook implements BusinessObjectModel {	
	
	private $core_url = null;
	private $module = null;
	private $controller = null;
	private $method = null;
	private $queryString = null;

	public function __construct() {
		$this->core_url = new Core_URL();
		$this->module = $this->core_url->getModule();
		$this->controller = $this->core_url->getController();
		$this->method = $this->core_url->getMethod();
		$this->queryString = $this->core_url->getQueryString();
	}

	public function callController() {
		
		if(Configuration::isSiteOffline()) {
			new Core_Template("clean", "error", "siteMaintenance");
			return;
		}		
		
		// Check first if the controller exists in the controllers
		if (!class_exists($this->controller)) {
			$template = new Core_Template("default", "error", "pageNotFound");
			$template->setAttribute("page", $this->module);
			return;
		}
		
		// Checks if the method doesnt exists in the controller
		if(!method_exists($this->controller, $this->method)) {
			$template = new Core_Template("default", "error", "pageNotFound");
			$template->setAttribute("page", $this->method);
			return;
		}
		
		$dispatch = new $this->controller();
		
		if ((int)method_exists($this->controller, $this->method)) {
			call_user_func_array(array($dispatch, $this->method), $this->queryString);
		}		
	}

	/**
	 * returns string of class properties and attributes
	 * essential for debugging purposes
	 */
	public function __toString() {
		return $this->core_url;
	}
	
	public function __destruct() {
		$this->callController();	
	}
}