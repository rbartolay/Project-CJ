<?php 
class JobsController extends Controller {
	
	public function index() {
		$page = isset($this->Request->get->page) ? $this->Request->get->page : 1; 
		
		$jBom = new JobsBom();
		$template = new Core_Template("default", "jobs");
		$template->setAttribute("jobs", $jBom->getAllJobs($page));
	}
	
	public function view($job_id) {
		$jBom = new JobsBom();
		$apis = new APISources();		
		
		$template = new Core_Template("default", "jobs", "view");
		$job = $jBom->getJobByJobId($job_id);
		$template->setAttribute("job", $job);
		$template->setAttribute("other_jobs", $jBom->getJobsByCompanyName($job->company));
		$template->setAttribute("api", $apis->retrieveObjectById($job->api_source_id));
	}
}
?>