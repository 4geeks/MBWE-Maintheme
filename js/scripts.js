(function ($, root, undefined) {
	
	$(function () {

		$('#img-fondo').hide();

		function abrirMenu(){
			$("#sub-menu").toggleClass("activo");
			
			/*$("#sub-menu").find('li').first().show('slow',function showNext(){
				$(this).next('li').show('fast',showNext);
			});*/

			$("#icon-dropdown").toggleClass("glyphicon-collapse-up");
			return false;
		}
		function cerrarMenu(){
			$("#icon-dropdown").removeClass("glyphicon-collapse-up");
			$("#icon-dropdown").addClass("glyphicon-collapse-down");
			/*$("#sub-menu").find('li').first().hide('slowfast',function hideNext(){
				$(this).next('li').hide('fast',hideNext);
			});*/
			// $("#sub-menu").hide(1000);
		}
		
		$("#menu-desplegable").on("click", abrirMenu);

		$("#sub-menu li").on("click", function(){
			var url = $(this).find('a').attr('href');
			window.location.href = url;
		});

		$(".linkeable").on("click", function(){
			var url = $(this).parent().find('a').attr('href');
			window.location.href = url;
		});

		$(document).on("click", cerrarMenu);

		/*
		* Config background menu whe scroll
	  	*/

	  	$(window).scroll(function() {    
		    
		    var scroll = $(window).scrollTop();

		    if (scroll >= 30) {
		        $(".top-venue-menu").removeClass("noScrollingMenu");
		        $(".top-venue-menu").addClass("scrollingMenu");
		    } else {
		    	$(".top-venue-menu").removeClass("scrollingMenu");
		        $(".top-venue-menu").addClass("noScrollingMenu");
		    }
		});

		$(document).ready(function(){
		  $.adaptiveBackground.run();
		  
		});

		$("#div-angle-double").click(function() {

		    $('html, body').animate({
		        scrollTop: (0)
		    }, 1000);

		});

		if ($(window).width() <= 1024){			
			$('#videoVenue').addClass("not-for-mobile");
			$('#div-only-for-mobile').css('display', 'block');
			$('#div-only-for-mobile').css('background-image', 'url(' + $('#videoVenue').attr('poster') + ')');
			$('#div-only-for-mobile').css('background-attachment', 'fixed');
			//$('#div-only-for-mobile').css('height', '450px');
			$('#div-only-for-mobile').css('background-size', 'cover');
			$('#div-only-for-mobile').css('background-position', 'center center');
		}

		/*
	  	* Config arrow-down button
	  	*/

	  	$("#arrow-down-home").click(function() {

		    $('html, body').animate({
		        scrollTop: ($("#div-ourServices").offset().top - 60)
		    }, 1000);

		});

		/*
		* Config modal Get an instant budget
		*/

		$(".modalContact").animatedModal({
 			animatedIn: 'bounceInUp',
 			animatedOut: 'bounceOutDown',
 			overflow:'hidden',
 			modalTarget: 'animatedModalContact',
 			beforeOpen: function(e){
 				// alert('hola')
 			},
			afterOpen: function() {
			
			},
			beforeClose: function() {
			
			},
			afterClose: function(){
			
			}
 		});
		
	});
	
})(jQuery, this);
