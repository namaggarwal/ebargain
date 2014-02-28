<?php


class tblLinkModel{

	
	private $dbConn;


	function tblLinkModel($dbConn){

		$this->dbConn = $dbConn;
	}

	public function checkIfLinkPresent($url){

		
	}

	public function getAllLinks(){
				
		$query = "Select * from ".config::LINK_TAB_NAME." where delete_flag=0";
		$result = $this->dbConn->query($query);
		return $result;
	}

	public function addLink($url,$host){

		$query = "INSERT into ".config::LINK_TAB_NAME."(url,host) values ('".$url."','".$host."');";
		$this->dbConn->query($query);
		//Returns 0 if query fails
		return $this->dbConn->insert_id;
		
	}	


	public function markLinksForDeletion($id_array){

		$query = "Update ".config::LINK_TAB_NAME." set delete_flag=1 where id in (".implode(",", $id_array).");";
		$this->dbConn->query($query);
		
	}
}