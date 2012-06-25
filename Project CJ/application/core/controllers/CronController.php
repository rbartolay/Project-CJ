<?php
class CronController extends Controller {
	
	public function executeFeedIndeed() {		
		$indeed = new APIIndeed();
		$iBom = new IndeedBom();
		$iBom->insertRecords($indeed->getResults());
	}
	
	public function executeFeedCareerjet() {
		$cj = new APICareerjet();
		$cjBom = new CareerjetBom();
		$cjBom->insertRecords($cj->search(array('location'=>'london' ,'sort'=>'date', 'pagesize' => 50)));
	}
	
	
	/**
	 * Usage 
	 * http://url/sg/14
	 * @param unknown_type $country
	 * @param unknown_type $category
	 */
	public function executeFeedMonster($country = null, $category = null) {
		if($country != null or die(__METHOD__ . " requires country_code"));
		if($category != null or die(__METHOD__ . " requires category_id"));
		
		$mo = new APIMonster($country, $category);		
		$moBom = new MonsterBom();
		$moBom->setCountry($country);
		$moBom->insertRecords($mo->getResults());
	}
}