<?php
/**
 * Email Bom class for email sending all notifications. 
 * @author levi.bautista
 *
 */
class Core_Email implements BusinessObjectModel {
	
	private $from_email = "info@bpocareerhub.com";
	private $from_name = "BPO Career Hub";
	private $recipients = "";
	private $subject = "BPO Career Hub";
	private $attachments = array();
	
	protected $email_template = null;
	protected $variables = array();
	/**
	 * Initialiaze template in constructor
	 * @param unknown_type $email_template
	 */
	public function __construct($email_template="default") {
		$this->email_template = $email_template . ".php";
	}
	/**
	 * Set Attritubes to be used for email template
	 * @param unknown_type $name
	 * @param unknown_type $value
	 */
	public function setAttributes($name, $value) {
		$this->variables[$name] = $value;
	}
	/**
	 * Set email recipients
	 * @param unknown_type $recipients
	 */
	public function setRecipients($recipients) {		
		$this->recipients = $recipients;
	}
	/**
	 * Load email template
	 */
	public function loadTemplate() {
		ob_start();
		extract($this->variables);
		include_once $this->emailTemplate();
		
		$contents = ob_get_contents();
		ob_end_clean();
		
		return $contents;
	}
	/**
	 * Get email template
	 */
	public function emailTemplate() {
		if(file_exists(Configuration::getTemplatesPath()."emails".DS.$this->email_template)) {
			return Configuration::getTemplatesPath()."emails".DS.$this->email_template;
		}
	}
	/**
	 * Set file attachments
	 * @param unknown_type $attachments
	 */
	public function setAttachment($attachments) {
		$this->attachments = $attachments;
	}
	/**
	 * Set From Email
	 * @param unknown_type $email
	 */
	public function setFromEmail($email) {
		$this->from_email = $email;
	}
	/**
	 * Set From Name
	 * @param unknown_type $name
	 */
	public function setFromName($name) {
		$this->from_name = $name;
	}
	/**
	 * Set Email Subject
	 * @param unknown_type $subject
	 */
	public function setSubject($subject) {
		$this->subject = $this->subject . " : " . $subject;
	}
	/**
	 * Get Email Subject
	 */
	public function getSubject() {
		return $this->subject;
	}
	/**
	 * Get Email Recipients
	 */
	public function getRecipients() {
		return $this->recipients;
	}
	/**
	 * Parsed Email recipients delimited by comma (,)
	 */
	private function parseRecipients() {
		return is_array($this->getRecipients()) ? implode(",",$this->getRecipients()) : $this->getRecipients();
	}
	/**
	 * Send email
	 */
	private function send() {
		$subject = $this->getSubject();
		$to = $this->parseRecipients();
		
		$message = $this->loadTemplate();
		
		$headers  = "From: ".$this->from_name." <".$this->from_email.">\r\n";
		$headers .= "Content-type: text/html\r\n";
		
		try {
			mail($to, $subject, $message, $headers);
		} catch (Exception $e) {
			$e->getMessage();
		}
	}
	
	public function __destruct() {
		$this->send();
	}
}