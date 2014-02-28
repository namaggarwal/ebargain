<?php

class tblContactModel{

	
	private $dbConn;


	function tblContactModel($dbConn){

		$this->dbConn = $dbConn;
	}

	public function getContactsByLinkId($linkId){

		$query = "Select * from ".config::CONTACT_TAB_NAME." where linkid=".$linkId." and delete_flag=0";
		$result = $this->dbConn->query($query);
		//Returns 0 if query fails
		return $result;
			
		
	}

	public function addTargetEmail($email,$price,$linkId){

		$query = "INSERT into ".config::CONTACT_TAB_NAME."(email,linkid,target) 
				  values ('".$email."',
			  			   ".$linkId.",
				           ".$price."
				          );";
		$this->dbConn->query($query);
		//Returns 0 if query fails
		return $this->dbConn->insert_id;
			
		
	}

	public function markContactsForDeletion($id_array){

		$query = "Update ".config::CONTACT_TAB_NAME." set delete_flag=1 where id in (".implode(",", $id_array).");";
		$this->dbConn->query($query);
		
	}

}