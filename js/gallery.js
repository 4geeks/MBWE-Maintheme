(function ($, root, undefined) {
	$(function () {

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
		    thumbnail:true
		}); 

    });
})(jQuery, this);