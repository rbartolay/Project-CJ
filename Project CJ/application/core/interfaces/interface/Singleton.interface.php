<?php
/**
 * Singleton interface, forces class to implement singleton
 * @author Ryan Bartolay 
 */
interface Singleton {
	public static function getInstance();
	public function __toString();
	public function __destruct();
}