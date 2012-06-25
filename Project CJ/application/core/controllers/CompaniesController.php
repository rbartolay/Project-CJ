<?php
class CompaniesController extends Controller {
	
	public function index($param = null) {
		$param = $param == null ? 'A' : $param;
		$cBom = new CompaniesBom();
		$template = new Core_Template("default", "companies");
		$template->setAttribute("companies", $cBom->getAllCompaniesByFirstChar($param));
		$template->setAttribute("current", $param);	
	}
	
	public function view($param = null) {
		$jBom = new JobsBom();
		$template = new Core_Template("default", "companies", "view");
		$template->setAttribute("jobs", $jBom->getAllJobsByCompanyName($param));
		$template->setAttribute("company", urldecode($param));		
	}
	
	public function info($param) {
		$cBom = new CompaniesBom();
		$jBom = new JobsBom();
		$company = $cBom->getCompanyByCompanyName($param);
		$template = new Core_Template("default", "companies", "info");
		$template->setAttribute("company", $company);
		$template->setAttribute("latest_jobs", $jBom->getJobsByCompanyName($company->name));
	}
}