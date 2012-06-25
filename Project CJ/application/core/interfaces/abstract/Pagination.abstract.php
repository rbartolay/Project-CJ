<?php
abstract class Pagination {
	
	/**
	 * flags if the instance enables the inheritance of this object
	 * @param boolean
	 */
	private $pagination = false;
	protected $Connection = null;
	private $page = 1;
	private $row_count = 10;
	protected $sql = null;
	private $records_count = null;
	private  $range = 3;
	
	/**
	* Upon invoke creates a database instance to local property
	* @param unknown_type $name
	*/
	public function __construct($name= "default"){
		$this->Connection = Database::getInstance($name);
	}
	
	abstract function getNumRows($sql);
	
	public function enablePagination() {
		$this->setPagination(true);
	}
	
	public function disablePagination() {
		$this->setPagination(false);
	}
	
	/**
	 * Sets the local property pagination
	 * @param boolean pagination 
	 */
	private function setPagination($pagination) {
		$this->pagination = $pagination;
	}
	
	public function isPagination() {
		return $this->pagination;
	}
	
	public function setData($data) {
		$this->data = $data;
	}
	
	public function getData() {
		return $this->data;
	}
	
	public function setPage($page = null) {
		$this->page = $page != null ? $page : 1;
	}
	
	public function getPage() {
		return $this->page;
	}
	
	public function setRowCount($row_count) {
		$this->row_count = $row_count;
	}
	
	public function getRowCount() {
		return $this->row_count;	
	}
	
	/**
	 * Returns the total record count of the supplied sql.
	 */
	public function getRecordsCount() {
		
		if($this->records_count == null) {			
			$this->records_count = $this->getNumRows($this->sql);
		}
		return $this->records_count;
	}
	
	protected function getSQLLimitString() {
		return " limit " . $this->computeOffset() . ", " . $this->row_count;
	}
	
	private function computeOffset() {
		return ($this->page * $this->row_count) - $this->row_count;
	}
	
	public function getPages() {
		return $this->buildPages();
	}
	
	public function getTotalPages() {
		return $count = &ceil($this->getRecordsCount() / $this->row_count) <= 0 ? 1 : $count; 
	}
	
	private function buildPages() {	
		$pages = array();
		
		if($this->buildFirst() != null) {
			$pages['first'] = $this->buildFirst();
		}
		if($this->buildPrevious() != null) {
			$pages['previous'] = $this->buildPrevious();
		}
		
		for ($i = ($this->page - $this->range); $i < (($this->page + $this->range) + 1); $i++) {
			if (($i > 0) && ($i <= $this->getTotalPages())) {
				$page = new stdClass();
				$page->page = $i;
				$page->url = $this->buildURL($i);
				$pages[$i] = $page;
			} 
		} 
	
		
		if($this->buildNext() != null) {
			$pages['next'] = $this->buildNext();
		}
		
		if($this->buildLast() != null) {
			$pages['last'] = $this->buildLast();
		}
	
		return $pages;
	}
	
	private function buildPrevious() {
		
		if($this->page > 1) {
			$previous = new stdClass();
			$previous->page = "prev";
			$previous->url = $this->buildURL($this->page - 1);
			return $previous;
		}
		
		return null;
	}
	
	private function buildNext() {
		if($this->page != $this->getTotalPages()) {
			$next = new stdClass();
			$next->page = "next";
			$next->url = $this->buildURL($this->page + 1);
			return $next;
		}
		return null;
	}
	
	private function buildFirst() {		
		if($this->page > 1 && $this->page!=1 && ($this->page - $this->range) > 1) {
			$first = new stdClass();
			$first->page = "first";
			$first->url = $this->buildURL(1);
			return $first;
		}
		return null;
	}
	
	private function buildLast() {
		if($this->page < $this->getTotalPages() && ($this->page + $this->range) != $this->getTotalPages()) {
			$last = new stdClass();
			$last->page = "last";
			$last->url = $this->buildURL($this->getTotalPages());
			return $last;
		}
		return null;
	}
	
	public function pageDetails() {
		
		$start = ($this->page!='') ? (($this->getRowCount() * $this->page) - $this->getRowCount()) : (($this->getRowCount() * $this->page) - $this->getRowCount());
		$start = ($this->getRecordsCount()<$start) ? 0  : (($this->getRowCount() * $this->page) - $this->getRowCount());
		
		$showpage = (($start+$this->getRowCount()) > $this->getRecordsCount()) ? $this->getRecordsCount() : ($start+$this->getRowCount());
		$start = $start+1;
		$showing =  $start." - ".$showpage." of ".$this->getRecordsCount();
		$page_details = "Showing  ". $showing;
		
		return $page_details;
	}
	
	private function buildURL($page) {
		return Core_URL::getBASEURL() . "/" . Core_URL::getCleanURL() . "?page=" . $page;
	}
	
}