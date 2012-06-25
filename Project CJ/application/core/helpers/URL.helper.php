<?php
/**
 * URL Helper class used mostly like in url redirection, html anchor, etc.
 * @author levi.bautista
 *
 */
class URL {
	/**
	 * URL Redirect method used to redirect to specific path 
	 * @param unknown_type $object
	 * @param unknown_type $path
	 */
	public static function redirect($object,$path) {
		if($object->success) {
			header("Location: ".Configuration::getURLPath()."/".$path."/".urlencode($object->message));
		} else {
			header("Location: ".Configuration::getURLPath()."/".$path."/".urlencode($object->message));
		}
	}
	
	/**
	 * Anchor method creates standard html anchor link
	 * @param unknown_type $url
	 * @param unknown_type $text
	 * @param unknown_type $attributes
	 */
	public static function anchor($url,$text,$attributes = null) {
		return "<a href='".Configuration::getURLPath()."/".$url."' ".$attributes.">".$text."</a>";
	}
}