<?php
/**
 * Abstract class for all class under the data access layer,
 * this is a requirement for accessing our database
 * @author Ryan Bartolay
 */
abstract class DataAccessObject {
	protected $Connection = null;
	
	protected $start_id;
	protected $number_of_records;
	
	/**
	 * Gets the database default instance
	 */
	public function __construct($database = 'default') {
		$this->Connection = Core_Database::getInstance($database);
	}
	
	public function getConnection() {
		return $this->Connection;
	}
	
	
	public function __toString() {
		return $this;
	}
	//abstract function retrieveAll();
}