<?php
class APIMonster extends APIParser {

	/**
	 * 22 = IT
	 * 14 = Marketing & Communications
	 * 3 = Customer Service/ Call Centre/ BPO
	 * 907 = Admin/Secretarial
	 * 18 = Purchase/ Logistics/ Supply Chain
	 * 17 = Manufacturing/ Engineering/ R&D
	 * 23 = Telecom/ ISP
	 * 19 = Retail Chains
	 * 16 = Pharmaceutical/ Biotechnology
	 * 5 = Advertising/Entertainment/Media
	 * 10 = Hotels/ restaurants
	 * 24 = Travel/ Airlines
	 * 20 = Sales/ Business Development
	 * 7 = Finance & Accounts
	 * 11 = Human Resources
	 * 13 = Legal
	 * 2 = Banking, Insurance & Financial Services
	 * 786 = Construction
	 * 1000 = Education/ Teaching
	 * 785 = Oil & Gas
	 * 9 = Health Care
	 * 6 = Export/ Import
	 * 908 = Real Estate
	 * 15 = Others
	 * 
	 * @var unknown_type
	 */
	private $cat = array(22, 14,13,907,18,17,23,19,16,5,10,24,20,7,11,13,2,786,1000,785,9,6,908,15);
	private $category;
	private $country;

	public function __construct($country, $category) {
		$this->setDomain("http://jobsearch.monster.com.". $country ."/category/rss_jobs.html");
		$this->country = $country;
		$this->category = $category;
		$this->url =$this->getDomain() . "?cat=" . $this->category; 
	}	

	public function setCountry($country) {
		$this->country = $country;
	}
	
	public function getCountry() {
		return $this->country;
	}
	
	public function setCategory($category) {
		$this->category = $category;
	}
	
	public function getCategory() {
		return $this->category;
	}
	
	public function getClassQueryString() {
		
		$class_vars = get_class_vars(get_class($this));
		$queryString = "?";
		
		$restrictions = array("cat", "country");

		
		foreach ($class_vars as $name => $value) {			
			if(!is_null($value) && !in_array($name, $restrictions)) {
				
				reset($class_vars);
				if($name !== key($class_vars)) {
					$queryString.= "&";
				}
				$queryString.= $name."=".$value;
			}
		}
		
		return $queryString;
	}

	public function getResults() {
		$results = array();

		$data = $this->parseContents();		

		foreach($data->channel[0]->item as $child) {
			$results[] = $this->buildChild($child);		
		}
		return $results;
	}
}

?>