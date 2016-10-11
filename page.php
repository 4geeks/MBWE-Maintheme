<?php
/*
Template Name: Thanks
*/

get_header(); 

//Get venue post types to list 
$content = get_page($post->ID)->post_content;

$revslider = types_render_field("page-slider");
?>
<?php if($revslider and $revslider!='') putRevSlider($revslider); ?>
<?php echo $content; ?>
<?php get_footer(); ?>