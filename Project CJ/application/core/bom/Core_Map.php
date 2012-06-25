<?php 
class Core_Map {
	
	private $credentials = "AloMM5K5WX7QJXJwz94c4G9EtMp2jIn66JLr4tYEhxfm3ktuqsJk4XFyF_yLASEQ";
	private $latitude;
	private $longitude;
	
	public function __construct($latitude = null, $longitude = null) {
		$this->latitude = $latitude;
		$this->longitude = $longitude;
	}
	
	public function setLatitude($latitude) {
		$this->latitude = $latitude;
	}
	
	public function getLatitude() {
		return $this->latitude;
	}
	
	public function setLongitude($longitude) {
		$this->longitude = $longitude;
	}
	
	public function getLongitude() {
		return $this->longitude;
	}
	
	private function loadJavaScripts() {
		$html = '<script type="text/javascript" src="http://dev.virtualearth.net/mapcontrol/mapcontrol.ashx?v=7.0"></script>';
		$html.= '<script type="text/javascript" src="'. Configuration::getJSPath() .'jquery-1.7.2.js"></script>';
		return $html;
	}
	
	public function loadBody() {
		$html = '<script type="text/javascript">
					var map = null;
					
					function GetMap()
					{
					// Initialize the map
					map = new Microsoft.Maps.Map(document.getElementById("myMap"),
					{credentials:"AloMM5K5WX7QJXJwz94c4G9EtMp2jIn66JLr4tYEhxfm3ktuqsJk4XFyF_yLASEQ"});
					// Define the pushpin location (latitude, longitude)
					var loc = new Microsoft.Maps.Location('. $this->getLatitude() .', '. $this->getLongitude() .');
					// Add a pin to the map
					var pin = new Microsoft.Maps.Pushpin(loc);
					map.entities.push(pin);
					// Center the map on the location
					map.setView({center: loc, zoom: 10});
					}
					
					$(function() {
						GetMap();	
					});
				</script>';
		$html.= '<div id="myMap" style="position:relative; width:300px; height:300px;"></div>';
		return $html;
	}
	
	private function loadMap() {
		echo $this->loadJavaScripts();
		echo $this->loadBody();
	}
	
	public function __toString() {
		$html = "credentials : " . $this->credentials . "<br>latitude : " . $this->latitude . "<br>longitude : " . $this->longitude;
		return $html;
	}
	
	public function __destruct() {
		$this->loadMap();
	}
}

?>