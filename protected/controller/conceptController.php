<?php

require_once("/protected/view/conceptView.php");

//Controller class for the home page requests
class conceptController {

	private $view;
	private $viewData;
	private $data;


	public function init($data){
		$this->data = $data;
		$this->viewData = $data;
		$this->view  = new conceptView();
		$this->view->init($this->viewData);
	}
}