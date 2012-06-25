<?php 
class Form {
	public static function quickSearch() {
		$html = "<form method='GET' action='". Configuration::getURLPath() ."/search/quick'>";
		$html.= "<table>";
		$html.= "<tr>";
		$html.= "<td><input type='text' name='keyword' placeholder='Search Job by Keyword, Company Name, Description' size='50' value='". @$_GET['keyword'] ."'></td>";
		$html.= "<td><input type='submit' class='button' value='Search Jobs'></td>";
		$html.= "</tr>";
		$html.= "</table>";
		$html.= "</form>";
		
		return $html;
	}
}
?>