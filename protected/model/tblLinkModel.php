<?php


class tblLinkModel{

	
	private $dbConn;


	function tblLinkModel($dbConn){

		$this->dbConn = $dbConn;
	}

	public function checkIfLinkPresent($url){

		
	}

	public function getAllLinks(){
				
		$query = "Select * from tbllink where delete_flag=0";
		$result = $this->dbConn->query($query);
		return $result;
	}

	public function addLink($url,$host){

		$query = "INSERT into tbllink(url,host) values ('".$url."','".$host."');";
		$this->dbConn->query($query);
		//Returns 0 if query fails
		return $this->dbConn->insert_id;
		
	}	


	public function markLinksForDeletion($id_array){

		$query = "Update tbllink set delete_flag=1 where id in (".implode(",", $id_array).");";
		$this->dbConn->query($query);
		
	}
}