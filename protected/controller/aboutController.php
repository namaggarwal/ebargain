<?php

require_once("/protected/view/aboutView.php");

//Controller class for the home page requests
class aboutController {

	private $view;
	private $viewData;
	private $data;


	public function init($data){
		$this->data = $data;
		$this->viewData = $data;
		$this->view  = new aboutView();
		$this->view->init($this->viewData);
	}
}