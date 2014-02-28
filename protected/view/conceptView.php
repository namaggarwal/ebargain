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
		$html .= "<div id='conceptCont'>";
		$html .= "<div class='heading'>";
		$html .= "<h1>Concept</h1>";		
		$html .= "</div>";
		$html .= "<div id='detCont'>";
		$html .= "<ul>";
		$html .= "<li>";		
		$html .= "Its common for people to ask for discount when visiting a local store. Why not online ?";
		$html .= "</li>";
		$html .= "<li>";		
		$html .= "This website is win-win for both customers and ecommerce websites.";
		$html .= "</li>";
		$html .= "<li>";
		$html .= "E-commerce websites change the prices very often.";
		$html .= "</li>";
		$html .= "<li>";
		$html .= "With eBargain you can quote your price and get notified when the price reaches at the level.";
		$html .= "</li>";
		$html .= "<li>";
		$html .= "E-commerce websites can request anonymous data, to understand at what price customers need a specific product.";
		$html .= "</li>";																
		$html .= "</ul>";
		$html .= "</div>";
		$html .= "</div>";

	
		return $html;
	}

}