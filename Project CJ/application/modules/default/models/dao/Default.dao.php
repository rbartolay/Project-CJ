<?php
/**
 * Default Dao for the Default Module
 * @author Ryan Bartolay
 *
 */
class DefaultDao extends DataAccessObject {

	/**
	 * Gets user most important data from database by email
	 * @param unknown_type $email
	 */
	public function retrieveUserByEmail($email) {
		$sql = "select user_id, email, password, group_id from users where email = '". $email ."'";
		return $this->Connection->getResultSet($sql);
	}

	/**
	 * This method is focused of user logging in 
	 * @param unknown_type $user_id
	 */
	public function retrieveUserLoginDetailsByUserId($user_id) {
		$returnValue = null;

		$this->Connection->beginTransaction();

		// gets user details from users table left joined to groups
		$sql = "select u.user_id, u.email, u.group_id, u.parent_user_id, u.account_type_id, unix_timestamp(u.date_created) as date_created,
				unix_timestamp(u.date_last_login) as date_last_login, u.activated, unix_timestamp(u.date_activated) as date_activated,
				u.active, g.name as group_name from users as u left join groups as g on u.group_id = g.group_id where u.user_id = " . $user_id;
		$User = $this->Connection->getResultSet($sql);
		
		$sql = "select alternate_email, concat(firstname, ' ', lastname) as fullname,profile_picture
				from user_profile where user_id = " . $User->user_id;
		$UserDetails = $this->Connection->getResultSet($sql);
		
		if($User->group_id == 3) {
			$sql = "select employer_id as parent_id, name as parent_name, industry_id, account_owner_user_id from employers where employer_id = " . $User->parent_user_id;
			$UserParentDetails = $this->Connection->getResultSet($sql);
		}
		
		if($User->group_id == 4) {
			$sql = "select partner_id as parent_id, name as parent_name, account_owner_user_id from partners a where partner_id = " . $User->parent_user_id;
			$UserParentDetails = $this->Connection->getResultSet($sql);
		}
		
		// gets user rights
		if($User->group_id == 3 || $User->group_id == 4) {
			$sql = "select module_id, module_rights_id from account_type_rights where account_type_id = " . $User->account_type_id;
		} else {
			$sql = "select module_id, module_rights_id from group_rights where group_id = " . $User->group_id;
		}
		$Rights = $this->Connection->getResultSetObjectArray($sql);

		// updates the user logged in time and date
		$sql = "update users set date_last_login = now() where user_id = " . $User->user_id;
		$this->Connection->query($sql);
		
		$Response = $this->Connection->commitTransaction();

		if($Response->success) {
			$returnValue = (object) array("User" => $User, "UserDetails" => $UserDetails, "Rights" => $Rights, "UserParentDetails"=>$UserParentDetails);
		}
				
		return $returnValue;
	}
	
	public function retrieveUserProfileDetail($user_id) {
		$sql = "select * from user_profile_detail where user_id = '". (int)$user_id;
		return $this->Connection->getResultSet($sql);
	}
	
	public function retrieveUserProfileSummary($user_id) {
		$sql = "select * from user_profile_summary where user_id = '". (int)$user_id;
		return $this->Connection->getResultSet($sql);
	}
	
	public function insertProfileDetail($object) {
		return $this->Connection->insert("user_profile_detail", $object);
	}
	
	public function insertProfileSummary($object) {
		return $this->Connection->insert("user_profile_summary", $object);
	}
}
