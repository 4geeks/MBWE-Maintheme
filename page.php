<?php
/*
Template Name: Thanks
*/

get_header(); 

//Get venue post types to list 
$content = get_page($post->ID)->post_content;

?>
<div id="div-thanks">
	<div class="col-md-12 div-thanks highlight-p">
	   <center>
	   	<?php echo $content; ?>
	   </center> 
	</div>
</div>     

<?php get_footer(); ?>