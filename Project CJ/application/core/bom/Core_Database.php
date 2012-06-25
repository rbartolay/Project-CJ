<?php
/**
 * Database class is the main bom (Business Object Model) for the database connection.
 * the class is represented as a singleton, thus, this limits the opening and closing of
 * the database in a page.
 *
 * by definition, Database first creates a connection and saves in its own class variable
 * second connection checks if the first a connection is open,
 *
 * returns the opened database connection to stop the constant opening and closing of a connection
 * @author Ryan Kristoffer Bartolay
 *
 * Usage :
 * 
 * $dbconnection = Database::getInstance();
 * $result_set = $dbconnection->getResultSetObjectArray("select * from table_name");
 * var_dump($result_set);
 */
class Core_Database extends Pagination implements Singleton {
	/**
	 * The static instances table is a cache of database connection objects.
	 * If a database object has already been created within this page context,
	 * the same object will be returned again.
	 * This is most useful for the 'default' database, which would otherwise
	 * be instantiated multiple times.
	 */

	private static $instances = array();

	/**
	 * defaults as false, when true query will not be executed until commitTransaction
	 * beginTransaction sets this as true
	 */
	private $transaction = false;

	/**
	 * The link is a reference to the open database connection.
	 */
	protected $link;

	/**
	 * Log object for the database use
	 */
	private static $Log = null;

	/**
	 * Gets an instance of the database class for a particular database type
	 * and object id.
	 * Database type refers to one of the preconfigured types in Configuration.
	 * Object id is used for sharding.  Not all database types use the id.
	 *
	 * @param name
	 * @param id
	 * @returns
	 */
	public static function getInstance($name = 'default', $id = '') {
		
		
		if (isset(self::$instances[$name])) {
			return self::$instances[$name];
		}
		
		$settings = Configuration::getDatabaseSettings($name);
		if (!$settings) {
			$this->Log->LogFATAL("Unrecognized database configuration: ". $name);
			die('Unrecognized database configuration: ' . $name);
		}

		$db = new Core_Database($settings);
		self::$instances[$name] = $db;
		
		return $db;
	}

	/**
	 * Creates a new BCH_Database object.
	 */
	function __construct($settings) {
		
		$db = $settings['host'] . ':' . $settings['port'];
		$un = $settings['username'];
		$pw = $settings['password'];
			
		$this->link = mysql_connect($db, $un, $pw);

		if (!$this->link) {			
			die('Could not connect: ' . mysql_error());
		}

		$selected = mysql_select_db($settings['databaseName'], $this->link);

		if (!$selected) {			
			die('Could not select: ' . mysql_error());
		}		
	}

	/**
	 * Will execute when object is used as string
	 * @return string
	 */
	public function __toString() {
		$str = "Instance Connection/s \n";
		foreach (self::$instances as $key => $value) {
			$str .= $key . " " . $value . "\n";
		}
		return $str;
	}

	/**
	 * Destroys the database object and closes the active connection.
	 */
	public function __destruct() {
		mysql_close($this->link);
	}

	/**
	 * Escapes quotes and other special characters for safe SQL.
	 * All user provided strings should run through this method before execution.
	 *
	 * @param text
	 * @returns
	 */
	public function escape($text) {
		return mysql_real_escape_string($text, $this->link);
	}

	/**
	 * Executes a SQL query and returns a reference to the result set.
	 *
	 * @param sql
	 * @return 
	 */
	public function query($sql) {
		if(Configuration::isDebug()) {
			echo $sql . "<br>";
		}
		$this->sql = $sql;		
		if($this->isPagination()) {
			 $sql.= $this->getSQLLimitString();
			
		}
	
		try {
			if($this->transaction) {
				return mysql_query($sql, $this->link);
			} else {
				return mysql_query($sql, $this->link);
			}
		} catch (Exception $e) {
			return false;			
			die("BCH_Database.query.bom: Error in SQL query: " . $this->error() . " Exception : " . $e->getMessage());
		}
	}

	/**
	 * Insert query, automatically builds the query from the Data passed in the method
	 * @param String $table_name
	 * @param Object $Data
	 */
	public function insert($table_name, $Data) {
		$columns = implode(", ", array_keys((array) $Data));
		$val = array_values((array) $Data);
		
		$values = array();
		foreach($val as $value) {
			$values[] = "\"" . $this->escape($value) . "\"";
		}
		$values = implode(", ", $values);
		
		$sql = "insert into `". $table_name ."` (". $columns .") values (". $values .")";
	
		if($this->query($sql)) {
			return true;
		}
		return false;
	}
	
	/**
	* Update query, automatically builds the query from the Data passed in the method,
	* requirement is the condition
	* @param String $table_name
	* @param Object $Data
	*/
	public function update($table_name, $Data, $condition = null) {
		if($condition != null or die("Database.core.update: condition must not be null")); 
		$data = (array) $Data;
		$string = "";
		$counter = 1;
		
		foreach($data as $key => $value) {
		
			$string.= $key . " = \"" . $this->escape($value) . "\"";
			
			if($counter < count($data)) {
				$string.= ", ";
			}
			$counter++;
		}
		
		$cond = "";
		foreach ((array)$condition as $key => $value) {
			$cond.= (string)$key . " = \"" . $value . "\"";
			if($counter < count($condition)) {
				$cond.= ", ";
			}
			$counter++;
		}
	
		$sql = "update `". $table_name ."` set ". $string ." where ". $cond ."";
		if($this->query($sql)) {
			return true;
		}
		
		return false;
	}
	
	/**
	 * Fetches the next row for a result set.
	 * Returns FALSE if no more rows are available.
	 *
	 * @param result
	 * @returns
	 */
	private function fetch($result) {
		return mysql_fetch_array($result);
	}

	/**
	 * Frees a result set.
	 *
	 * @param result
	 */
	private function free($result) {
		mysql_free_result($result);
	}
	
	/**
	 * Gets an array of objects from the result of the SQL query.
	 *
	 * @param sql
	 * @returns object
	 */
	public function getResultSet($sql) {
		$rs = $this->query($sql);
		if($row = mysql_fetch_object($rs)) {
			return $row;
		}
		return null;
	}
	
	/**
	 * Gets an array of objects from the result of the SQL query.
	 * Object properties are based on the names of the SQL columns.
	 *
	 * @param sql
	 * @returns
	 */
	public function getResultSetObjectArray($sql) {
		$rs = $this->query($sql);

		$results = array();		
		
		while ($row = mysql_fetch_object($rs)) {
			$results[] = $row;
		}

		mysql_free_result($rs);

		return $results;
	}
	
	/**
	* Gets an array of objects from the result of the SQL query.
	* Object properties are based on the names of the SQL columns.
	*
	* @param sql
	* @returns
	*/
	public function getResultSetSingleColumn($sql, $column_name) {
		$rs = $this->query($sql);
	
		$results = array();
	
		while ($row = mysql_fetch_object($rs)) {
			$results[] = $row->$column_name;
		}
	
		mysql_free_result($rs);
	
		return $results;
	}
	
	/**
	 * The same result with getResultSetObjectArray but set a primary key for the array index.
	 * this is essential if the resultset is unique for every element
	 * @param String $sql
	 * @param String $pk_name
	 */
	public function getResultSetObjectArrayPK($sql, $pk_name = null) {
		
	
		if($pk_name != null or die('BCH_Database.getResultSetObjectArrayPK.BOM : pk name must not be null'));

		$rs = $this->query($sql);
		$results = array();

		while ($row = mysql_fetch_object($rs)) {
			$results[$row->$pk_name] = $row;
		}

		mysql_free_result($rs);

		return $results;
	}

	/**
	 * Get an objects from the result of the SQL query.
	 * Object properties are based on the names of the SQL columns.
	 *
	 * @param sql
	 */
	public function getObject($sql) {
		$array = $this->getObjectArray($sql);
		return $array[0];
	}

	public function getNumRows($sql) {
		return mysql_num_rows(mysql_query($sql,$this->link));
	}

	/**
	 * Gets a single value from the given SQL query.
	 * Only looks at the first column from the first row.
	 *
	 * @param sql
	 * @returns
	 */
	public function getValue($sql) {
		$rs = $this->query($sql);

		if (!$rs) {
			die('Error in SQL query: ' . mysql_error());			
		}

		$row = mysql_fetch_array($rs);

		if (!$row) {
			die('No results in SQL query.');
		}

		$result = $row[0];
		mysql_free_result($rs);
		return $result;
	}


	/**
	 * Gets the last insert ID.
	 *
	 * @returns
	 */
	public function getLastInsertID() {
		return mysql_insert_id($this->link);
	}

	/**
	 * Starts new transaction
	 */
	public function beginTransaction() {
		$this->query("BEGIN");
		$this->transaction = true;
	}

	private function rollbackTransaction() {
		try {
			$this->query("ROLLBACK");
			$this->transaction = false;
		} catch (Exception $e) {
			die($e->getLine() . " " . $e->getMessage());
		}
	}

	public function commitTransaction() {
		$Response = new stdClass();
		try {
			$this->query("COMMIT");
			$this->transaction = false;
			$Response->success = true;
		} catch (Exception $e) {
			$Response->success = false;
			$Response->message = $e->getLine() . " " . $e->getMessage();
			$this->rollbackTransaction();			
		}
		return $Response;
	}

	/**
	 * Returns the last executed query error/ warning, returns FALSE if theres no error
	 * @returns
	 */
	private function error() {		
		return mysql_error();
	}
}
?>
