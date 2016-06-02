(function ($, root, undefined) {
	$(function () {

		var sidebar = jQuery('#my-sidebar'),
        sidebarToggleButton = jQuery('#my-sidebar-toggle'),
        sidebarToggleText = jQuery('#my-sidebar-toggle span'),
        sidebarToggleButtonIcon = jQuery('#my-sidebar-toggle .fa');

	    sidebar.css('left', - ( sidebar.width() ) );

	    var toggleSidebar = function(){
	        sidebar.toggleClass('show');
	    };

	    sidebarToggleButton.click(function(){
	        toggleSidebar();
	        if (sidebar.hasClass('show')) {
	            sidebar.css('left', 0);
	            jQuery('#my-sidebar-toggle span').html('Close');
	            sidebarToggleButtonIcon
	                .removeClass('fa-navicon')
	              	  .addClass('fa-times')
	            			  .css('transition', 'none');
	            sidebarToggleButton
	                .css('left', sidebar.width() + 10)
	                // .addClass('foldOut');
	        } else{
	            jQuery('#my-sidebar-toggle span').html('Menu');
	            sidebar.css('left', - (sidebar.width()));
	            sidebarToggleButtonIcon
	                .removeClass('fa-times')
	                  .addClass('fa-navicon')
	          	        .css('transition', 'none');
	            sidebarToggleButton
	                // .addClass('foldIn')
	                  .css('left', 20)
	        }


	        setTimeout(function(){
	            sidebarToggleButton.removeClass('foldOut foldIn');
	            sidebarToggleButtonIcon
	                  .css('transition', '.4s');
	        },600);
	    });
		
	  $(".menu-small").hide();
      $(window).scroll(function() {                
            var scroll = $(window).scrollTop();
            if (scroll >= 600) {
                $(".menu-small").slideDown("fast");
            } else {
                $(".menu-small").hide();
            }
        });
    });
})(jQuery, this);