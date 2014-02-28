<?php

require_once("../view/conceptView.php");

//Controller class for the home page requests
class conceptController {

	private $view;
	private $viewData;
	private $data;


	public function init($data){
		$this->data = $data;
		$this->viewData = $data;
		$this->viewData["TITLE"] = "eBargain - Concept";
		$this->view  = new conceptView();
		$this->view->init($this->viewData);
	}
}