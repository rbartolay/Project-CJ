<?php
/**
 * Abstract class for the concrete classes of parsing xml,
 * uses the XML Parser Core class for
 * @author Ryan Bartolay
 */
abstract class XML {

	protected $xml = null;
	private $xml_file;
	private $parser;

	protected function __construct($xml_file) {
		$this->setXMLfile($xml_file);
	}

	abstract function retrieveAll();
	abstract function retrieveObjectById($id);

	private function setXMLfile($xml_file) {
		$this->xml_file = $xml_file;
	}

	protected function getParsedXML() {
		$this->xml = file_get_contents($this->xml_file);
		$this->parser = new Core_XMLParser($this->xml);
		$this->parser->Parse();
		return $this->parser->document;
	}

	protected function getParsedXMLObjectArray() {		
		$xml = $this->getParsedXML();		
		$xml_obj_array = array();

		if(count($xml->tagChildren) > 0) {
			$xml_obj_array[$xml->tagName] = $this->childBuilder($xml->tagChildren);
		}
		return $xml_obj_array;
	}

	private function childBuilder($children) {
		$build_children = array();

		foreach($children as $c) {
				
			$child = new stdClass();
				
			foreach($c->tagAttrs as $key => $attribute) {
				$key = strtolower($key);
				$child->$key = $attribute;
			}
			$build_children[intval($child->id)] = $child;
				
		}
		return $build_children;
	}

	protected function search($key, $value)
	{
		$results;
		$this->search_r($this->getParsedXMLObjectArray(), $key, $value, $results);
		return $results;
	}

	private function search_r($array, $key, $value, &$results)
	{
		if(is_object($array)) {
			$array = (array)$array;
		}
		
		if (!is_array($array)) {
			return;
		}

		if (@$array[$key] == $value) {
			$results = $array;
			return;
		}

		foreach ($array as $subarray) { 
			$this->search_r($subarray, $key, $value, $results);
		}
	}
}