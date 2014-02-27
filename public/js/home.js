var homePage  = (function(){


	//Private functions
	var attachEvents = function(){

		$("#inpLink").on("change",onInputUrlChange);

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