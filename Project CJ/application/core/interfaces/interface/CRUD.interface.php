<?php
interface CRUD {
	public function addRecord($Object);
	public function retrieveAll();
	public function updateRecord($Object);
	public function deleteRecord($Object);
}