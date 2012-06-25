<?php
class DomainNames extends XML {
	/**
	* filename is the main file of the countries xml file, you do not
	* need to place the directory of the xml file, because its already set
	* in the global Configuration class
	*/
	private $xml_file = "DomainNames.xml";
		
	/**
	 * Class constructor initiates parent class and sends all the
	 * required parameters to the parent
	 */
	public function __construct() {
		parent::__construct(Configuration::getXMLPath() . $this->xml_file);
	}
	
	public function retrieveAll() {
		return $this->getParsedXMLObjectArray();
	}
	
	public function retrieveObjectById($id) {
		$domains = $this->getParsedXMLObjectArray();
		return array_key_exists($id, $domains['domains']) ? $domains['domains'][$id] : null;
	}
	
	public function retrieveObjectByDomainName($domain_name = null) {
		if($domain_name != null or die(__METHOD__ ." : Requires domain_name"));
		return $this->search("name", $domain_name);
	}
	
	public function isDomainNameExists($domain_name = null) {
		if($domain_name != null or die(__METHOD__ ." : Requires domain_name"));
		return $this->search("name", $domain_name) != null;
	}
	
	public function retrieveTitleByDomainName($domain_name = null) {
		if($domain_name != null or die(__METHOD__ ." : Requires domain_name"));
	
		if($this->isDomainNameExists($domain_name)) {
			$domain = (object)$this->search("name", $domain_name);
			return $domain->title;
		}
	
		return null;
	}
	
	public function retrieveTemplateByDomainName($domain_name = null) {
		if($domain_name != null or die(__METHOD__ ." : Requires domain_name"));
		
		if($this->isDomainNameExists($domain_name)) {
			$domain = (object)$this->search("name", $domain_name);
			return $domain->template;
		}
		
		return null;
	}
}