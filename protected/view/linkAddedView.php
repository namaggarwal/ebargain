<?php

require_once("baseView.php");

class linkAddedView extends baseView{


	public function init($data){

		$this->renderPage($data);
	}

	function getPageSpecificBody($params){

		$html  = "<div class='contaniner'>";
		$html .= "Thank You! You will be notified";
		$html .= "</div>";

		return $html;
	}

}