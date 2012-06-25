<?php
/**
 * Utilities class
 * this class will handles all methods that are mostly generic and for single execution only
 * this is independent from the other class and can be extended to other classes
 * @author Ryan Bartolay
 *
 */
class Core_Utilities {
	/**
	 * Cleans the uri request, this is essential for the controllers
	 * search for "?" in the parameter, if found try to explode to separate
	 * the page requestor to the parameters
	 */
	public static function cleanRequestURI($uri) {
		if(strpos($uri, "?")) {
			$arr_uri = explode("?", $uri);
			$uri = $arr_uri[0];
		}
		return strlen($string = str_replace(array("php", "/", ".", "html", "htm", "jsp", "asp"), "", $uri)) <= 0 ? Configuration::getDefaultPage() : $string;
	}

	public static function getAge($unix_timestamp) {
		$t = time();
		$age = ($unix_timestamp < 0) ? ( $t + ($unix_timestamp * -1) ) : $t - $unix_timestamp;
		$year = 60 * 60 * 24 * 365;
		return floor($age / $year);
	}

	public static function getDateLogFile() {
		return date("Ymd");
	}

	/**
	 * Generates random code
	 * Essential in setting an activation code
	 * @return string
	 */
	public static function generateRandomCode() {

		$chars = "abcdefghijkmnopqrstuvwxyz023456789";
		srand((double)microtime()*1000000);
		$i = 0;
		$pass = '' ;

		while ($i <= 20) {
			$num = rand() % 33;
			$tmp = substr($chars, $num, 1);
			$pass = $pass . $tmp;
			$i++;
		}
		return $pass;
	}
	
	public static function json($string) {
		return "(" . json_encode($string) . ")";
	}
	/**
	 * Reset and generate new password
	 * @param int $length
	 * @return string
	 */
	public static function newPassword($length=6) {
		$chars = 'bcdfghjklmnprstvwxzaeiou';
		$result = "";
		for ($p = 0; $p < $length; $p++) {
			$result .= ($p%2) ? $chars[mt_rand(19, 23)] : $chars[mt_rand(0, 18)];
		}
		return $result;
	}

	/**
	 * Starts the clock for the "page generated" timer.
	 */
	public static function startTimer() {
		$starttime = microtime();
		$startarray = explode(" ", $starttime);
		return $startarray[1] + $startarray[0];
	}

	/**
	 * computes for the end time invoke by startTimer
	 * @param unknown_type $startTime
	 * @return number
	 */
	public static function endTimer($startTime) {
		$endtime = microtime();
		$endarray = explode(" ", $endtime);
		$endtime = $endarray[1] + $endarray[0];
		$totaltime = $endtime - $startTime;
		return round($totaltime,5);
	}

	/**
	 * This will format the structure of the object to a safe string for url
	 * @param unknown_type $obj
	 */
	public static function serializedURL($obj) {
		if(is_object($obj) or die("serializedURL: parameter needs to be an object"));
		return base64_encode(urlencode(serialize($obj)));
	}

	/**
	 * This is the counter part of the serializedURL, this decodes the passed parameter using the said method
	 * @param unknown_type $string
	 */
	public static function unserializedURL($string) {
		return unserialize(urldecode(base64_decode($_GET['parameters'])));
	}

	public static function getCalendarMonths() {
		$months = array();
		for($i=1; $i<=12; $i++) {
			$months[$i] = date("F",mktime(0,0,0,$i,1));
		}
		return $months;
	}

	public static function summarizeDescription($string,$count=200) {
		$special_chars = array(
		chr(146) => "\'",
		chr(149) => "&bull;",
			"&#61607;" => "&bull;",
		chr(150) => "-",
			"\r\n" => "<br />",
			"<div>" => "",
			"</div>" => "",
		);

		foreach ($special_chars as $key => $value) {
			$string = str_replace($key, $value, $string);
		}
		return substr($string, 0, $count) . "...";		
	}
	
	public static function highlightString($match, $string){
		return str_ireplace($match, "<span style='background:yellow'>" . strtoupper($match) . "</span>", $string);
	}
}