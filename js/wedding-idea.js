jQuery(document).ready(function(){
	console.log('hello');
	jQuery('.grid').masonry({
	  columnWidth: '.grid-sizer',
	  gutter: '.gutter-sizer',
	  percentPosition: true
	});
});