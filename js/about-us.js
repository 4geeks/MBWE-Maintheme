(function ($, root, undefined) {
	$(function () {

		
		

		$(".item-our-team").hover,function(){
			var imgFun = $(this).find('.imgFun').val());
			$( this ).css( "background-image", "url("+imgFun+")");
		},function(){
			var imgNormal = $(this).find('.imgNormal').val());
			$( this ).css( "background-image", "url("+imgNormal+")");
		});

 		// console.log($(".detail-package"));

    });
})(jQuery, this);