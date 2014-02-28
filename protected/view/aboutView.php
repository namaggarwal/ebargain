<?php

require_once("baseView.php");

class aboutView extends baseView{


	public function init($data){

		$this->renderPage($data);
	}

	function getPageSpecificHead($params){

		$html = "<link type='text/css' rel='stylesheet' href='".config::BASE_URL."/public/css/about.css' />";

		return $html;
	}

	function getPageSpecificBody($params){

		$html  = "";
		$html .= "<div id='abtCont'>";
		$html .= "<div id='abtLeft'>";
		$html .= "<div class='heading'>";
		$html .= "<h1>Naman Aggarwal</h1>";		
		$html .= "</div>";
		$html .= "<div class='abtcontent'>";

		$html .= "I am a Computer science graduate student at <span class='bold'>National University of Singapore</span>.";
		$html .= "<br/>I have keen interest in data related subjects such as <span class='bold'>Data mining</span>, <span class='bold'>";
		$html .= "Big data</span>,<span class='bold'>Business intelligent systems</span>, <span class='bold'>Machine learning</span>";
		$html .= " and building <span class='bold'>Javascript webapps</span>. ";
		$html .= "<br/>";
		$html .= "<br/>";
		$html .= "I also have a 2.5 yrs of work experience with Tally solutions pvt ltd. and Mettl.com";		
		$html .= "<br/>";
		$html .= "<br/>";	
		$html .= "Apart from computer science I love to read and travel a lot. A song of Ice and Fire is my favourite read till now ";
		$html .= "and I wish to go on a world tour someday.";
		$html .= "<br/>";
		$html .= "<br/>";
		$html .= "You can read more about me on my <a target='_blank' href='http://www.comp.nus.edu.sg/~naman'>profile page</a>.";
		$html .= "<br/>";
		$html .= "<br/>";
		$html .= "To get the code for this website or view my other projects, visit my <a target='_blank' href='https://github.com/namaggarwal'>Github profile</a>.";
		$html .= "</div>";
		$html .= "</div>";
		$html .= "<div id='abtRight'>";
		$html .= "<div class='img-cont'>";
		$html .= "<img src='".config::BASE_URL."/public/images/naman.jpg' height='100%' width='100%' alt='Naman Aggarwal'/>";
		$html .= "</div>";
		$html .= "<div id='contact-cont'>";
		$html .= "<p>Born : 20<sup>th</sup> February,1990</p>";
		$html .= "<p class='mail-head'>Email";
		$html .= "<p class='mail'>Work : <a href='mailto:naman@comp.nus.edu.sg'>naman@comp.nus.edu.sg</a></p>";
		$html .= "<p class='mail'>Other : <a href='mailto:nam.aggarwal@yahoo.com'>nam.aggarwal@yahoo.com</a></p>";
		$html .= "</p>";
		$html .= "<p>Profile : <a target='_blank' href='http://www.comp.nus.edu.sg/~naman'>www.comp.nus.edu.sg/~naman</a></p>";
		$html .= "<div id='social-cont'>";
		$html .= "<a title='Facebook' class='social-link facebook' target='_blank' href='https://www.facebook.com/namanaggrawal'>";
		$html .= "<div class='link-img'>f</div>";
		$html .= "<div class='link-text'>Stalk Me</div>";
		$html .= "</a>";
		$html .= "<a title='LinkedIn' class='social-link linkedin' target='_blank' href='http://www.linkedin.com/in/namanaggarwal'>";
		$html .= "<div class='link-img'>in</div>";
		$html .= "<div class='link-text'>Hire Me</div>";
		$html .= "</a>";
		$html .= "<a title='Quora' class='social-link quora' target='_blank' href='http://www.quora.com/Naman-Aggarwal-1'>";
		$html .= "<div class='link-img'>Q</div>";
		$html .= "<div class='link-text'>Vote Me</div>";
		$html .= "</a>";
		$html .= "<a title='Twitter' class='social-link twitter' target='_blank' href='https://twitter.com/namagg'>";
		$html .= "<div class='link-img'>t</div>";
		$html .= "<div class='link-text'>Follow Me</div>";
		$html .= "</a>						";
		$html .= "</div>";
		$html .= "</div>";
		$html .= "</div>";
		$html .= "</div>";

	
		return $html;
	}

}