<?php
require_once Configuration::getInterfacesPath() . "BusinessObjectModel.interface.php";

class Validation extends Security implements BusinessObjectModel {
	/**
	* Input text validation
	* @param unknown_type $string
	* @return boolean
	*/
	public static function isEmpty($string) {
		if(self::isInteger($string)) {
			return strlen($string) <= 0 ? true : false;
		}
		return empty($string);
	}
	
	public static function isNotEmpty($string) {
		return !self::isEmpty($string);
	}
	/**
	 * Email validation
	 * @param unknown_type $email
	 * @return boolean
	 */
	public static function isValidEmail($email) {
		$regex = '|^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$|i';
		return (preg_match($regex, $email)) ? true : false;
	}
	
	public static function isNotValidEmail($email) {
		return !self::isValidEmail($email);
	}
	
	/**
	 * Number validation whether integer or float
	 * @param unknown_type $number
	 * @return boolean
	 */
	public static function isNumber($number) {
		return is_numeric($number);
	}
	
	public static function isInteger($number) {
		return is_int($number);
	}
	
	public static function isNotNumber($number) {
		return !self::isNumber($number);
	}
	
	public static function isPasswordSizeAccepted($password) {
		return strlen($password) > 6 && strlen($password) < 24;
	}
	
	public static function isMobileNumSizeAccepted($number) {
		return strlen($number) == 11;
	}
	
	public static function isPasswordTheSame($password, $confirm_password) {
		return $password === $confirm_password;
	} 
}