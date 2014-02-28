<?php

require_once("/protected/view/linkAddedView.php");
require_once("/protected/view/homeView.php");
require_once("/protected/model/tblLinkModel.php");
require_once("/protected/model/tblContactModel.php");

//Controller class for the home page requests
class addLinkController extends baseController{

	private $view;
	private $viewData;
	private $contData;
	private $data;
	private $model;
	private $dbConn;

	private function getRequestParams(){
		
		$this->data["url"] = $_REQUEST["inpLink"];
		$this->data["price"] = $_REQUEST["inpTarget"];
		$this->data["email"] = $_REQUEST["inpEmail"];
		$this->data["product"] = $_REQUEST["inpProName"];
		
	}


	private function tryToAddLink($url,$host){

		$linkId = 0;	
		$tblLinkModel = new tblLinkModel($this->dbConn);	
		$linkId = $tblLinkModel->addLink($url,$host);
		$tblContactModel = new tblContactModel($this->dbConn);
		$tblContactModel->addTargetEmail($this->data["email"],$this->data["price"],$linkId);
	}

	public function init($data){		
		$this->data = $data;
		$this->getRequestParams();		
		$host = $this->getHost($this->data["url"]);
		$is_valid_host = $this->checkIfValidHost($host);
		if(!$is_valid_host){
			$err = "<span>Oops we are not currently supporting this website.</span><br/>";
		}

		if(!is_numeric($this->data['price'])){
			$err .= "<span>There is some problem with the price that you entered.</span><br/>";
		}

		if(!filter_var($this->data['email'], FILTER_VALIDATE_EMAIL)){
			$err .= "<span>There is some problem with the email that you entered.</span><br/>";
		}

		if(!isset($err)){
			$this->dbConn = $this->acquireDbConn();
			$this->tryToAddLink($this->data["url"],$host);
			$this->view  = new linkAddedView();
			$this->viewData = $this->data;
			$this->view->init($this->viewData);
		}else{
			$this->view  = new homeView();
			$this->viewData = $this->data;
			$this->viewData["ERROR"] = $err;
			$this->view->init($this->viewData);			
		}

	}

}