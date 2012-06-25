<?php
class Core_URL implements BusinessObjectModel {

	private $url;
	private $module;
	private $controller;
	private $method;
	private $queryString;

	public function __construct() {
		$this->url = self::getCleanURL() != null ? self::getCleanURL() : Configuration::getDefaultURL();
		$this->parseURL();
	}

	private function parseURL() {
		$urlArray = array();
		$urlArray = explode("/", $this->url);

		$module = strlen($urlArray[0]) > 0 ? $urlArray[0] : Configuration::DEFAULT_CONTROLLER;
		$this->module = ucfirst($module);
		$this->controller = $this->module . "Controller";

		array_shift($urlArray);
		$this->method = strlen(@$urlArray[0]) > 0 ? $urlArray[0] : Configuration::DEFAULT_METHOD;

		if(count($urlArray) > 0) {
			array_shift($urlArray);
			$this->queryString = $urlArray;
		} else {
			$this->queryString = array();
		}
	}

	public static function getDomain()	{
		$noprefix = str_replace(Configuration::getDomainPrefixes(),'',$_SERVER['HTTP_HOST']);
		$name = str_replace(Configuration::getDomainSuffixes(),'',$noprefix);
		
		$domain = parse_url($name);
		if(!empty($domain["host"]))	{
			return strtolower($domain["host"]);
		} else	{
			return strtolower($domain["path"]);
		}
	}

	public static function getCleanURL() {
		$url = explode("?", @substr($_SERVER['REQUEST_URI'], 1));
		return $url[0];
	}

	public static function getBASEURL() {
		$pageURL = 'http';

		if (isset($_SERVER['HTTPS'])) {
			if($_SERVER["HTTPS"] == "on") {
				$pageURL .= "s";
			}
		}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"];
		}
		return $pageURL;
	}

	public function getModule() {
		return $this->module;
	}

	public function getController() {
		return $this->controller;
	}

	public function getMethod() {
		return $this->method;
	}

	public function getQueryString() {
		return $this->queryString;
	}
}