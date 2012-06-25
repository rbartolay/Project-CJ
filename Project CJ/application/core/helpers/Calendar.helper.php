<?php
/**
 * Calendar constant class this will handle all requests regarding date,
 * time, week, months, years, etc......
 * 
 * @author Ryan Bartolay
 */
class Calendar extends XML {
	
	private $filename = "Months.xml"; //xml file, full directory is defined in global Configuration class
	
	private $parseData; // The xml format of the parser from parent, @var unknown_type
	
	/**
	* Class constructor initiates parent class and sends all the
	* required parameters to the parent
	*/
	public function __construct() {
		$this->setXMLfile(Configuration::getXMLPath() . $this->filename);
		$this->parsedData = $this->getParsedXML();
	}
	public function retrieveObjectById($id) {
		
	}
	/**
	 * Returns the formatted time that is compatible with sql,
	 * this is essential for inserting or updating dates.
	 * @return String
	 */
	public static function getSQLDateTime($unix_timestamp = null) {
		return $unix_timestamp != null ? date('Y-m-d H:i:s',$unix_timestamp) : date('Y-m-d H:i:s');
	}
	
	public static function getSQLTime($unix_timestamp = null) {
		return $unix_timestamp != null ? date('Y-m-d H:i:s',$unix_timestamp) : date('Y-m-d H:i:s');
	}
	
	public static function getSQLDate($unix_timestamp = null) {
		return $unix_timestamp != null ? date('Y-m-d',$unix_timestamp) : date('Y-m-d');
		
	}
	
	public static function formatStringToSQLDateAndTime($date) {
		$dt = new DateTime($date);
		return $dt->format("Y-m-d h:i:s");
	}
	
	public static function getUnixTimeStamp() {
		return time();
	}
	
	public static function formatDate($unix_timestamp) {
		return $unix_timestamp > 0 ? date("F d, Y", $unix_timestamp) : "";
	}

	public static function formatTime($unix_timestamp) {
		return $unix_timestamp > 0 ? date("h:i a", $unix_timestamp) : "";
	}
	
	public static function formatDateAndTime($unix_timestamp) {
		return $unix_timestamp > 0 ? date("F d, Y h:i", $unix_timestamp) : "";
	} 
	
	public function retrieveAll() {}
	
	public function retrieveValueById($arg) {}
	
	/**
	 * Retrieves all months in object array format
	 * @return multitype:stdClass
	 */
	public static function getMonths() {
		$selfInstance = new Calendar();
		return $selfInstance->buildMonthsObjectArray();
	}
	
	/**
	* builds the list by object array
	* array[] => object('id' => "string", 'value' => "string")
	*/
	private function buildMonthsObjectArray() {
		$Months = array();
	
		foreach($this->parsedData->tagChildren as $month) {
			$Month = new stdClass();
			$Month->id = $month->tagAttrs['id'];
			$Month->value = $month->tagData;
			$Months[] = $Month;
		}
	
		return $Months;
	}
}