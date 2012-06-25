<?php
class APISources extends XML {
	/**
	* filename is the main file of the countries xml file, you do not
	* need to place the directory of the xml file, because its already set
	* in the global Configuration class
	*/
	private $xml_file = "APISource.xml";
		
	/**
	 * Class constructor initiates parent class and sends all the
	 * required parameters to the parent
	 */
	public function __construct() {
		parent::__construct(Configuration::getXMLPath() . $this->xml_file);
	}
	
	/**
	 * @see XML::retrieveAll()
	 */
	public function retrieveAll() {
		return $this->getParsedXMLObjectArray();
	}
	
	public function retrieveObjectById($id) {
		$domains = $this->getParsedXMLObjectArray();
		return array_key_exists($id, $domains['apis']) ? $domains['apis'][$id] : null;
	}
}