<?php 
class JobsBom implements BusinessObjectModel {
	
	private $jDao;
	
	public function __construct() {
		$this->jDao = new JobsDao();
	}
	
	public function getAllJobs($page) {
		$jDao = new JobsDao();
		$jDao->getConnection()->enablePagination();
		$jDao->getConnection()->setPage($page);
		
		$Response = new stdClass();
		$Response->data = $jDao->retrieveAll();
		$Response->record_count = $jDao->getConnection()->getRecordsCount();
		$Response->pages = $jDao->getConnection()->getPages();
		$Response->current_page = $jDao->getConnection()->getPage();
		 
		return $Response;
	}
	
	public function getAllRecentJobs() {
		return $this->jDao->retrieveRecentJobs();
	}
	
	public function getAllJobsByCompanyName($company) {
		return $this->jDao->retrieveAllByCompanyName(urldecode($company));
	}
	
	public function getJobsByCompanyName($company) {
		return $this->jDao->retrieveJobsByCompanyName(urldecode($company));
	}
	
	public function getJobByJobId($job_id) {
		return $this->jDao->retrieveJobByJobId($job_id);
	}
	
	public function getAllJobsByQuickSearch($keyword) {
		$results = $this->jDao->retrieveByQuickSearch($keyword);		
		return $results;
	}
	
	public function getTrendingJobs() {
		return $this->jDao->retrieveTrendingJobs();
	}
	
	public function insertRecord($data) {
		return $this->jDao->insertRecord($data);
	}
	
	public function updateRecord($data, $condition) {
		return $this->jDao->updateRecord($data, $condition);
	}
	
	public function getAllJobsByAPISourceId($api_source_id) {
		return $this->jDao->retrieveAllByAPISourceId($api_source_id);
	}
	
	public function getAllJobsKeyByAPISourceId($api_source_id) {
		return $this->jDao->retrieveJobKeysByAPISourceId($api_source_id);
	}
}
?>
