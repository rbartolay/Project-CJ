<?php
class Core_ModuleSecurity extends XML {

	private $filename = "Modules.xml";	
	private $parsedData;
	private $module_format = null;

	public function __construct() {
		$this->setXMLfile(Configuration::getXMLPath() . $this->filename);
		$this->parsedData = $this->getParsedXML();		

		if($this->module_format == null) {
			$this->module_format = $this->retrieveAll();
		}
	}

	/**
	 * Basically returns all of the modules inside the module.xml if formatted object array
	 * @see XML::retrieveAll()
	 */
	public function retrieveAll() {
		return $this->buildParsedData();
	}
	
	public function retrieveValueById($arg) {
		
	}
	 
	public function retriveAllChildByTitle($module_title) {
		$module_id = $this->retrieveIdByModuleTitle($module_title);
		return $this->getModuleById($module_id)->rights;
	}

	public function retrieveChildIdbyTitle($module_title) {
		$module_titles = $this->retriveAllChildByTitle($this->module_title);
		if(in_array($module_title, $module_titles)) {
			return array_search($module_title, $module_titles);
		}
		return null;
	}

	/**
	 * Basically returns the id of the module if the module is present in the modules list.
	 * @return int module_id
	 */
	public function retrieveAllModuleTitles() {
		$module_titles = array();

		foreach($this->retrieveAll() as $module_id => $module) {
			$module_titles[$module_id] = $module->title;
		}
		return $module_titles;
	}
	
	public function retrieveAllModuleUrls() {
		$module_titles = array();
		
		foreach($this->retrieveAll() as $module_id => $module) {
			$module_titles[$module_id] = $module->url;
		}
		return $module_titles;
	}

	public function retrieveIdByModuleTitle($module_title) {
		$module_titles = $this->retrieveAllModuleTitles();
		if(in_array($module_title, $module_titles)) {
			return array_search($module_title, $module_titles);
		}
		return null;
	}

	/**
	 * return the title of the given module id parameter
	 * @param int $module_id
	 * @return String title
	 */
	public function retrieveModuleTitleById($module_id) {
		return $this->getModuleById($module_id)->title;
	}

	/**
	 * return the description of the given module id parameter
	 * @param int $module_id
	 * @return String title
	 */
	public function retrieveModuleDescriptionById($module_id) {
		return $this->getModuleById($module_id)->description;
	}

	/**
	 * Checks if the current user have an access in the module
	 * @param unknown_type $module_id
	 */
	public function isModuleRequireSession() {
		$module_id = $this->retrieveIdByModuleTitle($this->module_title);
		return isset($this->getModuleById($module_id)->session) ? $this->getModuleById($module_id)->session : null;
	}
	
	public static function getModuleDirectory($module_name) {
		$C_MS = new Core_ModuleSecurity();
		$modules = $C_MS->buildParseDataUrlAsPK();
		return $modules[strtolower($module_name)]->url;
	}
	
	public static function isModule($module_name) {
		$C_MS = new Core_ModuleSecurity();
		return in_array($module_name, $C_MS->retrieveAllModuleTitles());
	}

	/**
	 * This method will build the constructed parsed data that was built using the parent methods of XML
	 * class. This is essential in retrieving standard format of the module rights.
	 * @return Object Modules - returns the formatted object format of the modules.xml file
	 */
	private function buildParsedData() {
		$Modules = array();
		foreach($this->parsedData->tagChildren as $module) {
			$Module = new stdClass();
			$Module->title = $module->tagAttrs['title'];
			$Module->session = isset($module->tagAttrs['session']) ? (boolean) $module->tagAttrs['session'] : true;
			$Module->description = isset($module->tagAttrs['description']) ? $module->tagAttrs['description'] : null;
			$Module->directory = isset($module->tagAttrs['directory']) ? $module->tagAttrs['directory'] : null;
			$Module->url = isset($module->tagAttrs['url']) ? $module->tagAttrs['url'] : null;
			$Module->rights = null;

			if(count($module->tagChildren) > 0) {
				foreach($module->tagChildren as $right) {
					$Module->rights[$right->tagAttrs['id']] = $right->tagAttrs['title'];
				}
			}

			$Modules[$module->tagAttrs['id']] = $Module;
		}

		return $Modules;
	}
	
	private function buildParseDataUrlAsPK() {
		$Modules = array();
		foreach($this->parsedData->tagChildren as $module) {
			$Module = new stdClass();
			$Module->title = $module->tagAttrs['title'];
			$Module->session = isset($module->tagAttrs['session']) ? (boolean) $module->tagAttrs['session'] : true;
			$Module->description = isset($module->tagAttrs['description']) ? $module->tagAttrs['description'] : null;
			$Module->directory = isset($module->tagAttrs['directory']) ? $module->tagAttrs['directory'] : null;
			$Module->url = isset($module->tagAttrs['url']) ? $module->tagAttrs['url'] : null;
			$Module->rights = null;
		
			if(count($module->tagChildren) > 0) {
				foreach($module->tagChildren as $right) {
					$Module->rights[$right->tagAttrs['id']] = $right->tagAttrs['title'];
				}
			}
		
			$Modules[$module->tagAttrs['url']] = $Module;
		}
		
		return $Modules;
	}

	/**
	 *  This method will return the full array of the Module with its parameters and rights
	 * @return will be defaulted to null if the Module is not found.
	 * @param int $module_id
	 */
	private function getModuleById($module_id) {
		if(in_array($module_id, array_keys($this->module_format))) {
			return $this->module_format[$module_id];
		}
		return null;
	}

	public function isUserHasModuleRights($moduleName) {
		return in_array($this->retrieveIdByModuleTitle($moduleName), array_keys(Session::getUserModuleRights()));
	}

	public function __toString() {
		var_dump($this->filename);
		var_dump($this->parsedData);
	}
}