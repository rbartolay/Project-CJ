<?php 
class IndeedDao extends DataAccessObject {
	
	public function insertRecord($record) {
		
		$jobkeys = $this->getAllJobsKey();
		
		$cBom = new CompaniesBom();
		$companies = $cBom->getAllCompanyNames();
		
		$this->getConnection()->beginTransaction();
		
		$company = $cBom->getCompanyIDByCompanyName($record->company);
		
		if(is_null($company)) {
			$data = new stdClass();
			$data->name = $record->company;
		
			$cBom->insertRecord($data);
			$record->company_id = $this->getConnection()->getLastInsertID();
		} else {
			$record->company_id = $company->company_id;
		}
		
		unset($record->company);
		// checks if job key is already existing on our database
		if(in_array($record->jobkey, $jobkeys)) {
			$condition = array('jobkey' => $record->jobkey);
			echo "Update " . $record->jobkey . "<br>";
			unset($record->formattedlocation, $record->date, $record->onmousedown, $record->formattedlocationfull, $record->jobkey, $record->formattedrelativetime);
			var_dump($this->getConnection()->update("jobs", $record, $condition));
		} else {
			$record->date_posted = Calendar::formatStringToSQLDateAndTime($record->date);
			$record->date_created = Calendar::getSQLDateTime();
			echo "Insert " . $record->jobkey . "<br>";
			unset($record->formattedlocation, $record->date, $record->onmousedown, $record->formattedlocationfull, $record->formattedrelativetime);
			var_dump($this->getConnection()->insert("jobs", $record));
		}
		
		return $this->getConnection()->commitTransaction();
	}	
	
	public function getAllJobsKey() {
		$jBom = new JobsBom();
		return $jBom->getAllJobsKeyByAPISourceId(1);
	}
}

?>