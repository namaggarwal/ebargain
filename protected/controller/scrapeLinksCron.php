<?php

require_once("baseController.php");
require_once("scraper.php");
require_once("../model/tblLinkModel.php");
require_once("../model/tblContactModel.php");



class scrapeLinksCron extends baseController{
	
	private $linksData;
	private $dbConn;
	private $linkIdForDeletions = array();
	private $contactIdForDeletions = array();


	private function getAllLinksData(){

		$linkModel = new tblLinkModel($this->dbConn);

		$this->linksData = $linkModel->getAllLinks();

		$scraperObj;

		while($row = $this->linksData->fetch_object()){

			$scraperObj = new scraper();
			$scraperObj->init($row->url);

			$price = $scraperObj->getPrice();
			$name = $scraperObj->getProductName();
			$this->comparePriceAndSendMail($row->id,$price,$name);


		}

	}
	
	private function comparePriceAndSendMail($linkId,$curr_price,$name){

		$contactModel = new tblContactModel($this->dbConn);
		$contacts = $contactModel->getContactsByLinkId($linkId);
		$totalRows = $contacts->num_rows;
		$count = 0;
		while($row=$contacts->fetch_object()){

			if($curr_price <= $row->target){

				$count++;
				$this->sendMailToContact($row->email,$row->target,$curr_price,$name);
				//Mark this contact for deletion
				array_push($this->contactIdForDeletions,$row->id);

			}
		}

		if($count == $totalRows){//Mark this link for deletion
			array_push($this->linkIdForDeletions,$linkId);			
		}


	}

	private function sendMailToContact($mailId,$targetPrice,$curr_price,$name){

		mail($mailId,"Price at your level"," target price ".$targetPrice." current price ".$curr_price." Product ".$name);
	}


	public function init(){
		

		$this->dbConn = $this->acquireDbConn();

		$this->getAllLinksData();

		/*$data = file_get_contents('http://www.flipkart.com/riverstone-full-sleeve-solid-sweatshirt/p/itmdpnkzbfcyhmwk');
		$regex = '/<span class=\"[a-zA-z\- ]+pprice [a-zA-z\- ]+\">[A-Za-z\. ]+([\d]+)<\/span>/';
		preg_match($regex,$data,$match);
		print $match[1];*/
	}

}


$slc = new scrapeLinksCron();
$slc->init();