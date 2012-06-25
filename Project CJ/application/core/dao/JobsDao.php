<?php 
class JobsDao extends DataAccessObject {
	
	public function retrieveAll() {
		$sql = "select j.*, c.name as company, unix_timestamp(j.date_posted) as unix_date_posted, c.logo
				from jobs as j inner join companies as c on j.company_id = c.company_id 
				order by j.date_posted desc";
		return $this->getConnection()->getResultSetObjectArrayPK($sql, "job_id");
	}
	
	public function retrieveRecentJobs() {
		$sql = "select j.*, c.name as company, unix_timestamp(j.date_posted) as unix_date_posted, c.logo
				from jobs as j inner join companies as c on j.company_id = c.company_id 
				order by j.date_posted desc limit 10";
		return $this->getConnection()->getResultSetObjectArrayPK($sql, "job_id");
	}
	
	public function retrieveAllByAPISourceId($api_id) {
		$sql = "select *, unix_timestamp(date_posted) as unix_date_posted from jobs where api_source_id = " . $api_id . " order by date_posted desc";
		return $this->getConnection()->getResultSetObjectArrayPK($sql, "job_id");
	}
	
	public function retrieveJobByJobId($job_id) {
		$sql = "select j.*, unix_timestamp(j.date_posted) as unix_date_posted, c.name as company, c.logo
				from jobs as j inner join companies as c on j.company_id = c.company_id 
				where j.job_id = " . $job_id . "  order by j.date_posted desc";
		return $this->getConnection()->getResultSet($sql);
	}
	
	public function retrieveAllByCompanyName($company) {
		$sql = "select j.*, unix_timestamp(j.date_posted) as unix_date_posted, c.name as company
				from jobs as j left join companies as c on j.company_id = c.company_id 
				where c.name = '". $company ."'	order by j.date_posted desc";
		return $this->getConnection()->getResultSetObjectArrayPK($sql, "job_id");
	}
	
	public function retrieveJobsByCompanyName($company) {
		$sql = "select j.*, unix_timestamp(j.date_posted) as unix_date_posted, c.name as company 
				from jobs as j inner join companies as c on j.company_id = c.company_id 
				where c.name = '". $company ."' 
				order by j.date_posted desc limit 3";
		return $this->getConnection()->getResultSetObjectArrayPK($sql, "job_id");
	}
	
	public function retrieveTrendingJobs() {
		$sql = "select jobtitle, unix_timestamp(date_posted) as unix_date_posted, count(jobtitle) as job_count from jobs group by jobtitle order by job_count desc, date_posted desc limit 10";
		return $this->getConnection()->getResultSetObjectArray($sql);
	}
	
	public function retrieveByQuickSearch($keyword) {
		$sql = "select j.*, unix_timestamp(j.date_posted) as unix_date_posted, c.name as company 
				from jobs as j left join companies as c on j.company_id = c.company_id 
				where j.jobtitle like '%". $keyword ."%' or c.name like '%". $keyword ."%' 
				or j.snippet like '%". $keyword ."%'";
		return $this->getConnection()->getResultSetObjectArray($sql);
	}
	
	/**
	 * This is very essential for Indeed jobs, they have unique jobkey
	 * @param int $api_id
	 */
	public function retrieveJobKeysByAPISourceId($api_id) {
		$sql = "select jobkey from jobs where api_source_id = " . $api_id;
		return $this->getConnection()->getResultSetSingleColumn($sql, "jobkey");
	}
	
	/**
	 * Career Jet jobs doesnt have unique identifier so we have chosen their url links for parsing	 
	 * @param int $api_id
	 */
	public function retrieveURLByAPISourceId($api_id) {
		$sql = "select url from jobs where api_source_id = " . $api_id;
		return $this->getConnection()->getResultSetSingleColumn($sql, "url");
	}
	
	public function insertRecord($data) {
		return $this->getConnection()->insert("jobs", $data);
	}
	
	public function updateRecord($data, $condition) {
		return $this->getConnection()->update("jobs", $data, $condition);		
	}
}
?>
