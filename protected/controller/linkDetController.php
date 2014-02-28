<?php

require_once("./scraper.php");

//Controller class for the home page requests
class linkDetController {

		
	private $data;
	private $url;
	private $urlDet;



	private function getUrlDetails($url){

		$detObj = array();

		$scraperObj = new scraper();
		$scraperObj->init($url);

		$detObj["PRICE"] = $scraperObj->getPrice();
		$detObj["WEBSITE"] = $scraperObj->getWebsiteName();
		$detObj["PRODUCT"] = $scraperObj->getProductName();

		return $detObj;


	}

	////////////////////////////Public Function /////////////////////////////////////

	public function init($data){
		$this->data = $data;

		$this->url = $_POST['url'];
		try{

			$this->urlDet = $this->getUrlDetails($this->url);
			$this->urlDet["CODE"] = 200;
			print json_encode($this->urlDet);

		}catch(Exception $e){

			$this->urlDet["CODE"] = 10000;
			$this->urlDet["ERROR"] = "This website is not supported";
			print json_encode($this->urlDet);
			
		}
		
	}


}