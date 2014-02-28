<?php

require_once(dirname(dirname(__FILE__))."/view/homeView.php");

//Controller class for the home page requests
class homeController {

	private $view;
	private $viewData;
	private $data;


	public function init($data){
		$this->data = $data;
		$this->viewData = $data;
		$this->view  = new homeView();
		$this->view->init($this->viewData);
	}
}