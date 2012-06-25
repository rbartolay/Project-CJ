<?php
class CompaniesDao extends DataAccessObject {
	
	public function retrieveAllCompanies() {
		$sql = "select company_id, name, 
				unix_timestamp(date_created) as unix_date_created, 
				unix_timestamp(date_modified) as date_modified 
				from companies where flag = 0";
		return $this->getConnection()->getResultSetObjectArrayPK($sql, "company_id");
	}
	
	public function retrieveRandomCompany() {
		$sql = "select c.*, count(j.job_id) as total_job_count
				from companies as c left join jobs as j on c.company_id = j.company_id 
				where c.logo != '' and c.active = 1 and c.flag = 0
				group by c.company_id 
				order by rand() 
				 limit 1";
		return $this->getConnection()->getResultSet($sql);
	}
	
	public function retrieveCompanyByCompanyName($company_name) {
		$sql = "select c.*, count(j.job_id) as total_job_count 
				from companies as c left join jobs as j on c.company_id = j.company_id 
				where c.name = '". $company_name ."' and c.active = 1 and c.flag = 0";
		return $this->getConnection()->getResultSet($sql);
	}
	
	public function insertRecord($record) {
		return $this->getConnection()->insert("companies", $record);
	}
	
	public function retrieveAllCompaniesByFirstChar($char) {
		$sql = "select c.name as company, count(j.job_id) as job_count, j.date_posted as last_entry 
				from companies as c inner join jobs as j on c.company_id = j.company_id  
				where c.name like '". $char ."%' and c.active = 1 and c.flag = 0 group by c.name 
				order by c.name, j.date_posted";
		return $this->getConnection()->getResultSetObjectArray($sql);
	}
	
	public function retrieveRecentActiveCompanies() {
		$sql = "select c.name as company, count(j.job_id) as job_count, j.date_posted as last_entry 
				from companies as c inner join jobs as j on c.company_id = j.company_id group by company 
				order by j.date_posted desc limit 10";
		return $this->getConnection()->getResultSetObjectArray($sql);
	}
	
	public function retrieveCompanyIdByCompanyName($company_name) {
		$sql = "select company_id from companies where name = '". $company_name ."'";
		return $this->getConnection()->getResultSet($sql);
	}

}