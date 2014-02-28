<?php

require_once("baseView.php");

class linkAddedView extends baseView{


	public function init($data){

		$this->renderPage($data);
	}

	function getPageSpecificHead($params){

		$html = "<link type='text/css' rel='stylesheet' href='".config::BASE_URL."/public/css/linkAdd.css' />";

		return $html;
	}

	function getPageSpecificBody($params){

		$html  = "<div id='msg'>";
		$html .= "You will be notified when the price of <span class='colorGreen'>".$params["product"]."</span> goes below <span class='colorGreen'>".$params["price"]."</span>.";
		$html .= "</div>";

		$html .= "<div id='goback'>";
		$html .= "<a href='".config::BASE_URL."'>Click Here</a> to add another link.";
		$html .= "</div>";

	
		return $html;
	}

}