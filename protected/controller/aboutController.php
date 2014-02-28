<?php

require_once(dirname(dirname(__FILE__))."/view/aboutView.php");

//Controller class for the home page requests
class aboutController {

	private $view;
	private $viewData;
	private $data;


	public function init($data){
		$this->data = $data;
		$this->viewData = $data;
		$this->viewData["TITLE"] = "Naman Aggarwal";
		$this->view  = new aboutView();
		$this->view->init($this->viewData);
	}
}