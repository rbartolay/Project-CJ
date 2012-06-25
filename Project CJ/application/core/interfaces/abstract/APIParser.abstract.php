<?php
abstract class APIParser extends Core_CURL {
	
	// domain the default web service url name on where we are going to get the data
	protected $url;
	private $domain;
	private $contents = null;
	
	public function getContents() {
		echo $this->url;
		if($this->contents == null) {
			$this->contents = $this->download($this->url);	
		}
		return $this->contents;
	}
	
	public function setDomain($domain) {
		$this->domain = $domain;
	}
	
	public function getDomain() {
		return $this->domain;
	}
	
	protected function parseContents() {
		#$xml_parser = new Core_XMLParser(file_get_contents(Configuration::getXMLPath()."Monster.xml"));
		$xml_parser = new Core_XMLParser($this->getContents());		
		$xml_parser->Parse();
		return $xml_parser->document;
	}
	
	protected function buildObject($data) {
		$build = new stdClass();
		$name = $data->tagName;
		$build->$name = $data->tagData;
		$build->attributes = new stdClass();		
		$build->children = array();
		if(count($data->tagAttrs) > 0) {
			foreach($data->tagAttrs as $key => $value) {
				$build->attributes->$key = $value;	
			}
		}
		
		if(count($data->tagChildren) > 0) {
			foreach($data->tagChildren as $child) {
				$childName = $child->tagName;
				$build->children[] = $this->buildObject($child);
			}
		}
		
		return $build;
	}
	
	protected function buildChild($data) {
		$child = new stdClass();
		
		if(count($data->tagAttrs) > 0) {
			foreach($data->tagAttrs as $key => $value) {
				$child->attributes->$key = $value;
			}
		}
		
		if(count($data->tagChildren) > 0) {
			foreach($data->tagChildren as $c) {
				$cName = $c->tagName;
				$child->$cName = $c->tagData;
			}
		}
		
		return $child;
	}
	
	// method that will get all the parameters for the api
	abstract function getClassQueryString();
}