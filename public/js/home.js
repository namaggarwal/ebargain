var homePage  = (function(){

	var currPrice = 0;

	//Private functions
	var attachEvents = function(){

		$("#inpLink").on("change",onInputUrlChange);
		$("#frmInpLink").on("submit",onSubmitClick);
		$("input").on("focus",onInputFocus);

	},
	onSubmitClick = function(event){
		var targetPrice = parseInt($("#inpTarget").val(),0);
		console.log(targetPrice,currPrice);
		if(currPrice == 0){
			$(".error-text").html("We do not support this website at this time.");
			$(".error-text").fadeIn();
			event.preventDefault();
			event.stopPropagation();
			return false;

		}
		else if(targetPrice >= currPrice){
			$(".error-text").html("Current price of the product is already lower.");
			$(".error-text").fadeIn();
			event.preventDefault();
			event.stopPropagation();
			return false;

		}
		if(!$(this)[0].checkValidity()){
			return false;
		}

		//return false;
		

	},
	onInputUrlChange = function(event){

		var inpObj = $(this),
			url    = $.trim(inpObj.val());
		
		if(!IsValidURL(url)){

			return;
		}
		hideInfo();
		showUrlInfo(url);



	},
	onInputFocus = function(event){

		hideError();
	},
	hideError = function(){
		$(".error-text").fadeOut();
	},
	// taken from stackoverflow 
	// give credits
	IsValidURL = function(str) {

	  var pattern = new RegExp('^(https?:\\/\\/)?'+ // protocol
  					'((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|'+ // domain name
					'((\\d{1,3}\\.){3}\\d{1,3}))'+ // OR ip (v4) address
  					'(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*'+ // port and path
  					'(\\?[;&a-z\\d%_.~+=-]*)?'+ // query string
  					'(\\#[-a-z\\d_]*)?$','i'); // fragment locator
	  if(!pattern.test(str)) {	    
	    return false;
	  } else {
	    return true;
	  }
	},
	hideInfo = function(){
		$("#infoBox").fadeOut();
		currPrice = 0;
	},

	showUrlInfo = function(url){
		
		$.ajax({

			url :common.baseUrl+"getLinkDet",
			data:{"url":url},
			type:"POST",
			success : function(data){
				var infoBox = $("#infoBox"),
					webName = infoBox.find(".websiteName"),
					proName = infoBox.find(".proName"),
					proPrice = infoBox.find(".proPrice");					

				data = $.parseJSON(data);
				
				webName.html(data["WEBSITE"]);
				proName.html(data["PRODUCT"]);
				proPrice.html(data["PRICE"]);
				$("#inpProName").val(data["PRODUCT"]);
				currPrice = parseInt(data["PRICE"],10);
				infoBox.fadeIn();
			},
			error:function(err){
				console.log(err);
			}

		});

	};


	// Public functions

	var init = function(){

		attachEvents();

	};


	return {
		init:init
	};



})();


$(document).ready(function(){

	homePage.init();

});