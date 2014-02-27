<?php


require_once("baseController.php");

class scraper extends baseController{
	
	private $price;
	private $product;
	private $website;
	private $urlContent;

	
	private function getPriceFromUrlContent($host,$urlContent){

		switch (strtoupper($host)) {
			case 'FLIPKART':
				# code...
					return $this->getFlipkartLinkPrice($urlContent);
				break;
			
			default:
				# code...
				break;
		}

	}


	private function getProductFromUrlContent($host,$urlContent){

		switch (strtoupper($host)) {
			case 'FLIPKART':
				# code...
					return $this->getFlipkartProductName($urlContent);
				break;
			
			default:
				# code...
				break;
		}

	}

	private function getUrlContent($url){

		 return file_get_contents($url);
	}

	private function getFlipkartLinkPrice($urlContent){
		$regex = '/<span class=\"[a-zA-z\- ]+pprice [a-zA-z\- ]+\">[A-Za-z\. ]+([\d]+)<\/span>/';
		preg_match($regex,$urlContent,$match);
		return $match[1];
	}

	private function getFlipkartProductName($urlContent){

		$regex = '/<h1 itemprop=\"name\">([a-zA-z0-9\s]+)<\/h1>/';
		preg_match($regex,$urlContent,$match);	
		return trim($match[1]);

	}




	////////////////////////////PUBLIC Functions /////////////////////////////////////////


	public function init($url){
		
		$this->website = $this->getHost($url);

		if($this->checkIfValidHost($this->website)){

			$this->urlContent       = $this->getUrlContent($url);
			$this->price            = $this->getPriceFromUrlContent($this->website,$this->urlContent);
			$this->product          = $this->getProductFromUrlContent($this->website,$this->urlContent);

		}else{

			throw new Exception("Not a valid Host",10000);
		}	

		
	}

	public function getWebsiteName(){
		
		return $this->website;
	}

	public function getPrice(){
		
		return $this->price;
	}

	public function getProductName(){
		
		return $this->product;
	}



}
