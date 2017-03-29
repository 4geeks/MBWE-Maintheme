(function ($, root, undefined) {
	$(function () {
		
		'use strict';		
 		
 		/*
		* 	Config modal full screen 360-tour
		*/

 		$("#a-360-tour").animatedModal({
 			animatedIn: 'bounceInUp',
 			animatedOut: 'bounceOutDown',
 			overflow:'hidden',
 			beforeOpen: function() {
 				$("#videoVenue").get(0).pause();
			},
			afterOpen: function() {
				$(".modal-menu").slideDown("slow");
			},
			beforeClose: function() {
				$("#videoVenue").get(0).play();
			},
			afterClose: function(){
				$(".modal-menu").css('display','none');
			}
 		});

		/*
		*	Config Maps
		*/	
		function addMarker(location)
		{		
			var markersArray = [];
			var marker = new google.maps.Marker({
			    position: location,
			    map: map
			});
			markersArray.push(marker);		  

		}
		var longi = $('#inpt-longitude').val();//"-77.03604698181152";
    	var lati = $('#inpt-latitude').val();	//"-12.087667262738698";
    	
    	if (longi != undefined && lati != undefined){
			var geocoder = new google.maps.Geocoder();
			var latlng = new google.maps.LatLng(lati, longi);
			var zoom = 15;
			var options = {
							mapTypeId: google.maps.MapTypeId.ROADMAP,
							scaleControl: false,
							zoomControl: false,
							scaleControl: false,
							scrollwheel: false,
							draggable: false,
							disableDoubleClickZoom: true
						};
	    	var map = new google.maps.Map(document.getElementById("div-venue-maps"), options);

	    	geocoder.geocode({'latLng': latlng}, function(results, status) {	        
	            map.setCenter(results[0].geometry.location);
	            map.setZoom(zoom);            
	            addMarker(results[0].geometry.location);	        
		    });
    	}


		/*
		*	Config smooth scrolling with links
		*/
		$('a[href*="#"]:not([href="#"])').click(function() {
			//Get top menu heignt
			var topVenueMenuHeight = $('.top-venue-menu').height();
	  		var topVenueMenuPadding = parseInt($('.top-venue-menu').css('padding-top').substring(0,2));
	  		var divTopMenuHeight = $('#div-top-menu').height();
			var menuHeight = topVenueMenuHeight + topVenueMenuPadding + divTopMenuHeight;
			
			if($(this.hash).selector != '#animatedModal'){
			    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			      var target = $(this.hash);
			      //Get the space to ignore top height menu in venues
			      var space = $(this.hash).selector == '#div-venue-location' || '#primary' || '#div-venue-blueprint' || '#div-venue-location' ? menuHeight : 0;
			      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			      if (target.length) {
			        $('html, body').animate({
			          scrollTop: target.offset().top - space
			        }, 1000);
			        return false;
			      }
			    }			
			}
	  	});	  	

	  	/*
	  	* Config arrow-down button
	  	*/

	  	$("#arrow-down").click(function() {
	  		var topVenueMenuHeight = $('.top-venue-menu').height();
	  		var topVenueMenuPadding = parseInt($('.top-venue-menu').css('padding-top').substring(0,2));
	  		var divTopMenuHeight = $('#div-top-menu').height();

		    $('html, body').animate({
		        scrollTop: ($("#div-venue-description").offset().top - divTopMenuHeight - topVenueMenuHeight - topVenueMenuPadding)
		    }, 1000);

		});


	  	$("#lightSlider").lightSlider({
	  		item: 5,
        	autoWidth: false,
        	pager: false,
        	slideMargin: 0,
        	thumbMargin: 1,
        	controls: true
	  	}); 
		
	});	
})(jQuery, this);