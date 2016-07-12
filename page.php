<?php
/*
Template Name: Thanks
*/

get_header(); 

//Get venue post types to list 
$content = get_page($post->ID)->post_content;

?>
<?php echo $content; ?>
<?php get_footer(); ?>