(function ($, root, undefined) {
	$(function () {

		

		/*
		* Set grid-item for Masonry Gallery
		*/

		$('.grid').find('div').each(function(i){
			var img = $( this ).data("img");
			var imgHeight = $( this ).data("height");
			var imgWidth = $( this ).data("width");
			
			$( this ).css( "background-position","center");
			$( this ).css( "background-image", "url("+img+")");

			//Resize backcground image smart proportional
			if ( imgWidth >= imgHeight ){
				$( this ).addClass("grid-item");
				$( this ).css( "background-size", "auto "+$( this ).height()+"px");
			}else{
				$( this ).addClass("grid-item grid-item--height2");
				$( this ).css( "background-size", ($( this ).width()+80)+"px auto");
			}

			$( this ).hover(
				function () {
					// $(this).animate({opacity:'1'},300);
					$(this).addClass("mansonry-hover");
				},
				function () {
					$(this).removeClass("mansonry-hover");
					// $(this).animate({opacity:'0'},300);
				}
			)

		});

		/*
		* Config Masonry Gallery
		*/

		$('.grid').masonry({
				  itemSelector: '.grid-item',
				  columnWidth: 320,
				  isFitWidth: true
				});
		$('.div-image').on('click',function(){
			//fire the href brother element
			// console.log($('#animatedModal').html());
			$(this).next().click()
		})

		$('#aa-360-tour').on('click',function(){
			console.log(nuevoContenido);
			var nuevoContenido = $('#animatedModal').html();
			$('#imgAnimatedModal').html(nuevoContenido);
		});

		$("#a-360-tour").animatedModal({
 			animatedIn: 'bounceInUp',
 			animatedOut: 'bounceOutDown',
 			overflow:'hidden',
 			beforeOpen: function(e){
 				$(".top-venue-menu").removeClass("scrollingMenu");
		        $(".top-venue-menu").addClass("noScrollingMenu");
		    },
			afterOpen: function() {
				$(".modal-menu").slideDown("slow");
			},
			beforeClose: function() {
				$(".top-venue-menu").addClass("scrollingMenu");
		        $(".top-venue-menu").removeClass("noScrollingMenu");
			},
			afterClose: function(){
				$(".modal-menu").css('display','none');
			}
 		});

		$(".detail-image").animatedModal({
 			animatedIn: 'bounceInUp',
 			animatedOut: 'bounceOutDown',
 			overflow:'hidden',
 			modalTarget: 'imgAnimatedModal',
 			beforeOpen: function(e){
 				$(".top-venue-menu").removeClass("scrollingMenu");
		        $(".top-venue-menu").addClass("noScrollingMenu");
 				var img = $(e).data("img");

 				$("#detail-modal-content").css( "width", "100%" );
 				$("#detail-modal-content").css( "height", "100%" );

 				$("#detail-modal-content").css( "position", "relative" );
				$("#detail-modal-content").css( "background-position","center");
				$("#detail-modal-content").css( "background-image", "url("+img+")");
				$("#detail-modal-content").css( "background-size","contain");
				$("#detail-modal-content").css( "background-repeat","no-repeat");
				 

 			},
			afterOpen: function() {
				$(".modal-menu").slideDown("slow");
			},
			beforeClose: function() {
				$(".top-venue-menu").addClass("scrollingMenu");
		        $(".top-venue-menu").removeClass("noScrollingMenu");
			},
			afterClose: function(){
				$(".modal-menu").css('display','none');
			}
 		});

	    $('#imageGallery').lightGallery({
	        gallery:true,
	        item:1,
	        loop:true,
	        thumbItem:9,
	        slideMargin:0,
	        enableDrag: true,
	        currentPagerPosition:'left',
	        onSliderLoad: function(el) {
	            el.lightGallery({
	                selector: '#imageGallery .lslide'
	            });
	        }   
	    }); 

    });
})(jQuery, this);