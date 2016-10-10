(function ($, root, undefined) {
	$(function () {

		
		

		$(".detail-package").animatedModal({
			animatedIn: 'bounceInUp',
 			animatedOut: 'bounceOutDown',
 			overflow:'hidden',
 			modalTarget: 'animatedModalP',
 			beforeOpen: function(e){
 				console.log(e);
 			},
 		});

 		// console.log($(".detail-package"));

    });
})(jQuery, this);