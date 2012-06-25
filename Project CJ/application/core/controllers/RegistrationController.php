<?php
class RegistrationController extends Controller {
	public function index() {
		$template = new Core_Template("default", "registration", "jobseeker");
	}
	
	public function employer() {
		$template = new Core_Template("default", "registration", "employer");
	}
}