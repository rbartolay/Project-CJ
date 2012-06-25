<?php
class CareerjetBom implements BusinessObjectModel {
	
	private $jDao;
	
	public function __construct() {
		$this->jDao = new JobsDao();
	}
	
	public function getAllRecords() {
		return $this->jDao->retrieveAllByAPISourceId(2);
	}
	
	public function insertRecords($records) {
		$urls = $this->jDao->retrieveURLByAPISourceId(2);
		
		foreach($records->jobs as $record) {
			
			
			if(in_array($record->url, $urls)) {
				$record->jobtitle = $record->title;
				$record->location = $record->locations;
				$record->date_posted = Calendar::formatStringToSQLDateAndTime($record->date);
				$record->website = $record->site;
				$record->api_source_id = 2;
				$record->snippet = $record->description;
				$record->source = $record->company;
				$condition = array('url' => $record->url);
				
				
				unset($record->locations, $record->site, $record->salary, $record->description, $record->title, $record->date, $record->url);
				var_dump($this->jDao->updateRecord($record, $condition));
			} else {
				$record->date_created = Calendar::getSQLDateTime();
				$record->jobtitle = $record->title;
				$record->location = $record->locations;
				$record->date_posted = Calendar::formatStringToSQLDateAndTime($record->date);
				$record->website = $record->site;
				$record->api_source_id = 2;
				$record->snippet = $record->description;
				$record->source = $record->company;
				unset($record->locations, $record->site, $record->salary, $record->description, $record->title, $record->date);
				var_dump($this->jDao->insertRecord($record));
			}
		}
	}
	
	
}
?>