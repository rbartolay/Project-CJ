<?php 
class IndeedBom implements BusinessObjectModel {
	
	private $iDao;
	
	public function __construct() {
		$this->iDao = new IndeedDao();
	}
	
	public function getAllRecords() {
		$jBom = new JobsBom();
		return $jBom->getAllJobsByAPISourceId(1);
	}
	
	public function insertRecords($records) {
		
		foreach($records as $record) {
			$record->api_source_id = 1;
			$this->iDao->insertRecord($record);
		}
	}	
	
	
}
