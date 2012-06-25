<?php 
class SearchController extends Controller {
	public function index() {
		$cBom = new CompaniesBom();
		$template = new Core_Template("default", "search", "advance");
		$template->setAttribute("companies", $cBom->getRecentActiveCompanies());
	}
	
	public function quick() {
		$keyword = $this->Request->get->keyword;
		
		$jBom = new JobsBom();
		$template = new Core_Template("default", "search", "results");
		$template->setAttribute("results", $jBom->getAllJobsByQuickSearch($keyword));
		$template->setAttribute("keyword", $keyword);
	}
}

?>