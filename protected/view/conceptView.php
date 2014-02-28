<?php

require_once("baseView.php");

class conceptView extends baseView{


	public function init($data){

		$this->renderPage($data);
	}

	function getPageSpecificHead($params){

		$html = "<link type='text/css' rel='stylesheet' href='".config::BASE_URL."/public/css/concept.css' />";

		return $html;
	}

	function getPageSpecificBody($params){

		$html  = "";
		$html .= "This is concept page";

	
		return $html;
	}

}