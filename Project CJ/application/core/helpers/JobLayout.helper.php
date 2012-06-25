<?php
class JobLayout {
	
	public static function formatList($list, $simple = false) {
		$html = "<table cellpadding='0'>";
		
		if(count($list) > 0) {
			if(!$simple) {
				foreach($list as $element) {
					$html.= "<tr>";
					$html.= "<td>";
					$html.= self::formatElement($element);
					$html.= "</td>";
					$html.= "</tr>";
				}
			} elseif($simple) {
				foreach($list as $element) {
					$html.= "<tr>";
					$html.= "<td>";
					$html.= self::formatElementSimple($element);
					$html.= "</td>";
					$html.= "</tr>";
				}
			}
		} else {
			$html.= "<center><span class='error'>No Records Found.</span></center>";
		}
		
		$html.= "</table>";
		return $html;
	}
	
	public static function formatElement($element) {
		$relative_time = RelativeTime::getInstance();
		
		$location = self::getLocation($element);
			
		$html = "<div class='element'><table>";
		$html.= "<tr>";
		$html.= "<td>";
		$html.= "<a href='". Configuration::getURLPath() . "/jobs/view/" . $element->job_id ."' id='jobtitle' target='_blank'><b>" . $element->jobtitle . "</b></a><br>";
		$html.= "<span id='company'><a href='". Configuration::getURLPath() ."/companies/info/". $element->company ."'>" . $element->company ."</a></span><br> ". $location . "<br><br>";
		$html.= "</td>";
		$html.= "<td align='right' valign='top'>";
		if(!empty($element->logo)) {
			$html.= "<img src='". Configuration::getCompanyImagesPath() . $element->logo . "' height='70px'>";
		}
		$html.= "</td>";
		
		$html.= "</tr>";
		$html.= "<tr>";
		$html.= "<td colspan='2'>";
		$html.= nl2br($element->snippet) . "<br>";
		$html.= "Posted <a href='#' title='". Calendar::formatDateAndTime($element->unix_date_posted) ."'>" . $relative_time->getTextForSQLDate(date("Y-m-d h:i:s", $element->unix_date_posted)) . "</a><br>";
		$html.= "View Other Jobs from <a href='". Configuration::getURLPath() ."/companies/view/". $element->company ."'>" . $element->company . "</a>";
		$html.= "</td>";
		$html.= "</tr>";
		$html.= "</table></div>";
		return $html;
	}
	
	public static function formatElementSimple($element) {
		$relative_time = RelativeTime::getInstance();
		
		$html = "";
		$html.= "<td>";
		$html.= "<a href='#' id='jobtitle'>" . $element->jobtitle . "</a> (". $element->job_count .")<br>";		
		$html.= "Posted <a href='#' title='". Calendar::formatDateAndTime($element->unix_date_posted) ."'>" . $relative_time->getTextForSQLDate(date("Y-m-d h:i:s", $element->unix_date_posted)) . "</a>";
		$html.= "</td>";
		
		return $html;
	}


	
	private static function getLocation($element) {
		$location = "";
		if($element->api_source_id == 1) {
			$location = "<span id='location'>" . $element->city . ", " . $element->state . "</span>";
		}
		
		if($element->api_source_id == 2) {
			$location = "<span id='location'>" . $element->location . "</span>";
		}
		
		if($element->api_source_id == 6) {
			$location = "<span id='location'>" . $element->location . "</span>";
		}
		return $location;
	}
	
	public static function getSaveThisJobToProfile() {
		$html = "<button class='button spark'>Save this Job</button>";
		return $html;
	}
	
	public static function getApplyNowButton($url) {
		$html = "<button class='button save' onclick=\"window.open('". $url ."')\">Apply Now</button>";
		return $html;
	}
	
	public static function getEmailToFriendButton() {
		$html = "<a href='mailto(\"absolute_ryann@yahoo.com\")' class='button email'>Email to Friend</a>";
		return $html;
	}
	
	public static function getViewOtherJobsButton() {
		$html = "<button class='button' onclick='document.location=\"". Configuration::getURLPath() . "/jobs\"'>View Other Jobs</button>";
		return $html;
	}
	
	public static function getViewAllJobsByCompanyNameButton($company_name) {
		$html = "<button class='button star' onclick='document.location=\"". Configuration::getURLPath() . "/companies/view/". $company_name ."\"'>All Jobs by this Company</button>";
		return $html;
	}
}
