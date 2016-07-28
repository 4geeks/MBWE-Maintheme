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
		$('.div-image').on('click',function(event){
			event.preventDefault();
			//fire the href brother element
			// console.log($('#animatedModal').html());
			$(this).find("a").click();
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

		$('#venuegallery').lightGallery({
		    thumbnail:true,
		    selector:'.img-to-slideshow'
		}); 

    });
})(jQuery, this);