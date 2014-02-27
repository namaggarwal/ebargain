<?php

require_once("baseView.php");

class homeView extends baseView{

	private $html = "";

	public function init($data){

		$data["url"]   = isset($data["url"])?$data["url"]:"";
		$data["price"] = isset($data["price"])?$data["price"]:"";
		$data["email"] = isset($data["email"])?$data["email"]:"";
		$this->renderPage($data);
	}

	function getPageSpecificHead($params){

		$html = "<link type='text/css' rel='stylesheet' href='".config::BASE_URL."/public/css/home.css' />";


		return $html;
	}

	function getPageSpecificBody($params){

		$html  = "<div class='container'>";
		$html .= "<div class='page-header'>";
		$html .= "<div class='head-links'>";
		$html .= "<a href='".config::BASE_URL."/aboutus'>ABOUT</a>";
		$html .= "</div>";
		$html .= "</div>";
		$html .= "<div class='page-body'>";
		$html .= "<div class='head-text'>";
		$html .= "<h1>Get Notified on Lowest Price</h1>";
		$html .= "</div>";
		
		$html .= "<div>";

		$html .= "<div id='infoBox'>";
		$html .= "<div class='websiteName'>";
		$html .= "Flipkart";
		$html .= "</div>";
		$html .= "<div class='hrLine'></div>";
		$html .= "<div class='proInfo'>";
		$html .= "<div class='proLine'>";
		$html .= "<div class='proLabel'>";
		$html .= "Product";
		$html .= "</div>";		
		$html .= "<div class='proValue proName'>";		
		$html .= "</div>";		
		$html .= "</div>";		
		$html .= "<div class='proLine'>";
		$html .= "<div class='proLabel'>";
		$html .= "Price";
		$html .= "</div>";		
		$html .= "<div class='proValue proPrice'>";		
		$html .= "</div>";				
		$html .= "</div>";		
		$html .= "</div>";		
		$html .= "</div>";
		$html .= "<form id='frmInpLink' action='".config::BASE_URL."/addLink' method='POST'>";
		if(isset($params["ERROR"])){
			$html .= "<div class='error-text'>";
			$html .= $params["ERROR"];
			$html .= "</div>";	
		}
		
		$html .= "<div>";
		$html .= "<input type='url' id='inpLink' name='inpLink' required placeholder='Enter a link' value='".$params["url"]."'/>";
		$html .= "</div>";
		$html .= "<div>";
		$html .= "<input type='number' id='inpTarget' name='inpTarget' required placeholder='Enter your target Price' value='".$params["price"]."' />";
		$html .= "</div>";
		$html .= "<div>";
		$html .= "<input type='email' id='inpEmail' name='inpEmail' required placeholder='Enter your Email to get notified.' value='".$params["email"]."'/>";
		$html .= "</div>";
		$html .= "<div>";
		$html .= "<input class='btnSubmit' type='submit' value='Notify me'>";
		$html .= "</div>";
		$html .= "</form>";
		$html .= "</div>";
		$html .= "</div>";
		$html .= "</div>";

		return $html;

	}


	function getPageSpecificEndScript($params){

		$html = "";
		$html .= "<script type='text/javascript' src='".config::BASE_URL."/public/js/home.js'></script>";

		return $html;
	}
};