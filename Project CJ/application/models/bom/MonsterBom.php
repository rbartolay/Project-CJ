<?php
class MonsterBom implements BusinessObjectModel {
	
	private $jDao;
	private $country;
	
	
	public function __construct() {
		$this->jDao = new JobsDao();
	}
	
	public function setCountry($country) {
		$this->country = $country;
	}
	
	public function getCountry() {
		return $this->country;
	}
	
	public function insertRecords($records) {
		
		$urls = $this->jDao->retrieveURLByAPISourceId(6);
		
		foreach($records as $record) {
			
			$parse = $this->parseDescription($record->description);
			$record->company = $parse->company;
			$record->location = $parse->location;
			$record->jobkey = $parse->ref;
			$record->snippet = $parse->summary;
			$record->date_created = Calendar::getSQLDateTime();
			$record->jobtitle = $record->title;
			$record->url = $record->link;
			$record->country = strtoupper($this->getCountry());
			$record->date_posted = str_replace("&#x3A;", ":", $record->pubdate);
			$record->api_source_id = 6;
			unset($record->title, $record->pubdate, $record->description, $record->guid, $record->link);
			if(in_array($record->url, $urls)) {
				$condition = array('url' => $record->url);
				echo "Update " . $record->jobkey;
				var_dump($this->jDao->updateRecord($record, $condition));
			} else {
				echo "Insert " . $record->jobkey;
				var_dump($this->jDao->insertRecord($record));
			}
		}
		
	}
	
	private function parseDescription($description) {
		$return_array = new stdClass();
		
		$description = str_replace(array("<span>", "</span>", "<b>", "</b>"), "", $description);
		$description = explode("<br>", $description);
		
		foreach($description as $desc) {
			
			$elements = explode(":", $desc);
			if(isset($elements[0]) && isset($elements[1])) {
				$str = strtolower($elements[0]);
				$return_array->$str = $elements[1];
			}
						
		}
		return $return_array;		
	}
}
?>