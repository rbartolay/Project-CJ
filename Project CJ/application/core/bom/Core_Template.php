<?php

class Core_Template {
	
	protected $variables = array();
	protected $template_name;
	protected $module;
	protected $action;
	
	private $header_file = "header.php";
	private $footer_file = "footer.php"; 
	private $domain_template = null;
	
	/**
	 * This is the main template constructor, use this by filling up the required parameters
	 * 
	 * @param string $template_name - directory inside the template
	 * @param string $module - view directory
	 * @param string $action - the page the template needs for the content
	 */
	public function __construct($template_name, $module, $action = "index") {		
		global $domains;
		$this->template_name = $template_name;
		$this->module = $module;
		$this->action = $action;
		
		$this->domain_template = $domains->retrieveTemplateByDomainName(Core_URL::getDomain());
	}
	
	public function setAttribute($name, $value) {
		$this->variables[$name] = $value;
	}
	
	public function loadTemplate() {
		extract($this->variables);
		require_once $this->loadHeader();
		require_once $this->loadContent();
		require_once $this->loadFooter();
	}
	
	private function loadHeader() {
		if(file_exists(Configuration::getTemplatesPath() . $this->domain_template . DS . $this->template_name . DS . $this->header_file)) {
			return Configuration::getTemplatesPath() . $this->domain_template . DS . $this->template_name . DS . $this->header_file;
		} else {
			return Configuration::getTemplatesPath() . $this->domain_template . DS . "default" . DS . $this->header_file;
		}
	}
	
	private function loadContent() {		
		if(file_exists(Configuration::getModulesPath() . $this->module . DS . $this->action . ".php")) {
			return Configuration::getModulesPath() . $this->module . DS . $this->action . ".php";
		} else {
			return Configuration::getModulesPath() . "error" . DS . "pageNotFound.php";
		}
	}
	
	private function loadFooter() {
		if(file_exists(Configuration::getTemplatesPath() . $this->domain_template . DS . $this->template_name . DS . $this->footer_file)) {
			return Configuration::getTemplatesPath() . $this->domain_template . DS . $this->template_name . DS . $this->footer_file;
		} else {
			return Configuration::getTemplatesPath() . $this->domain_template . DS . "default" . DS . $this->footer_file;
		}
	}
	
	public function __destruct() {
		$this->loadTemplate();
	}
}