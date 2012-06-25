<?php
class CompaniesLayout {
	
	public static function formatList($list) {
		$html = "";

		if(count($list) > 0) {
			$html.= "<table width='100%' cellpadding='10'>";
			foreach($list as $element) {
				$html.= "<tr>";
				$html.= self::formatElement($element);
				$html.= "</tr>";
			}
			$html.= "</table>";
		} else {
			$html.= "<center><span class='error'>No Companies Found.</span></center>";
		}
		
		return $html;
	}
	
	public static function featureCompany($company) {
		$html = '<script type="text/javascript">';
		$html.= '$(function () {';
		$html.= '$(\'.bubbleInfo\').each(function () {';
		$html.= 'var distance = 10;';
		$html.= 'var time = 250;';
		$html.= 'var hideDelay = 500;';
		$html.= 'var hideDelayTimer = null;';
		$html.= 'var beingShown = false;';
		$html.= 'var shown = false;';
		$html.= 'var trigger = $(\'.trigger\', this);';
		$html.= 'var info = $(\'.popup\', this).css(\'opacity\', 0);';
		$html.= '$([trigger.get(0), info.get(0)]).mouseover(function () {';
		$html.= 'if (hideDelayTimer) clearTimeout(hideDelayTimer);';
		$html.= 'if (beingShown || shown) {';		
		$html.= 'return;';
		$html.= '} else {';
		$html.= 'beingShown = true;';
		$html.= 'info.css({';
		$html.= 'top: 0, left: -470, display: \'block\'';
		$html.= '}).animate({';
		$html.= 'top: "-=" + distance + "px", opacity: 1';
		$html.= '}, time, "swing", function() {';
		$html.= 'beingShown = false; shown = true;';
		$html.= '});';
		$html.= '}';
		$html.= 'return false;';
		$html.= '}).mouseout(function () {';
		$html.= 'if (hideDelayTimer) clearTimeout(hideDelayTimer);';
		$html.= 'hideDelayTimer = setTimeout(function () {';
		$html.= 'hideDelayTimer = null;';
		$html.= 'info.animate({';
		$html.= 'top: "-=" + distance + "px", opacity: 0';
		$html.= '}, time, "swing", function () {';
		$html.= 'shown = false;';
		$html.= 'info.css("display", "none");';
		$html.= '});';
		$html.= '}, hideDelay);';
		$html.= 'return false;';
		$html.= '});';
		$html.= '});';
		$html.= '});';
		$html.= '</script>';
		
		$html.= '<div class="bubbleInfo">
		<div class="trigger">
		<img src="'. Configuration::getCompanyImagesPath() . $company->logo .'" width="200">
		</div>
		<table id="dpop" class="popup">
		<tbody>
		<tr>
		<td>
		<div class="popup-contents">
		<table width="400px" align="center">
		<tbody>
		<tr>
		<td><h1>'. $company->name .'</h1>	</td>
		</tr>';
		if($company->website != "") {
			$html.= '<tr>
						<td><a href="http://'. $company->website .'" target="_blank">'. $company->website .'</a><br></td>
					</tr>';	
		}
		
		$html.= '   <tr>
						<td><p>'. $company->description .'</p></td>
					</tr>
					<tr>
						<td>Total Job Posts : <b>'. $company->total_job_count .'</b></td>
					</tr>
					<tr>
						<td>'. JobLayout::getViewAllJobsByCompanyNameButton($company->name) .'</td>
					</tr>
					</tbody>
				</table>
		</div>
				</td>
				</tr>
				</tbody>
			</table>
		</div>';

		return $html;
	}
	
	public static function formatElement($element) {
		$relative_time = RelativeTime::getInstance();
		$html = "";
		$html.= "<td>";
		$html.= "<a href='". Configuration::getURLPath() ."/companies/view/". $element->company ."'>" . $element->company . "</a> (" . $element->job_count . ") <br> Last entry : " . $relative_time->getTextForSQLDate($element->last_entry);
		$html.= "</td>";		

		return $html;
	}
	
	public static function getViewAllCompaniesButton() {
		$html = "<button class='button' onclick='document.location=\"". Configuration::getURLPath() . "/companies\"'>View All Companies</button>";
		return $html;
	}
		
	public static function getViewCompanyInfoButton($company) {
		$html = "<button class='button like' onclick='document.location=\"". Configuration::getURLPath() . "/companies/info/". $company ."\"'>Company Info</button>";
		return $html;
	}
	
	public static function getVisitCompanyWebsiteButton($website) {
		$html = "<a class='button play' target='_blank' href='http://". $website . "'>Visit Company Website</a>";
		return $html;
	}
	
	public static function getAlphabeticalPagination($default = 'A') {
		$alphabet = range('A', 'Z');
		
		$html = "<ul id='pagination'>";
		foreach($alphabet as $letter) {
			$current = $default == $letter ? "class='current'" : "";
			$html.= "<li><a href='". Configuration::getURLPath() . "/companies/index/". $letter ."' ". $current .">". $letter ."</a></li>";
		}
		$html.= "</ul>";
		
		return $html;
	}
	
}