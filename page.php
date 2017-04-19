<?php
/*
Template Name: Empty Canvas
*/

get_header(); 

//Get venue post types to list 
$content = get_page($post->ID)->post_content;

$revslider = types_render_field("page-slider");
?>

<?php get_template_part( 'template-parts/menu', 'top' ); ?>

<?php if($revslider and $revslider!='') putRevSlider($revslider); ?>

<?php echo do_shortcode($content); ?>

<?php get_footer(); ?>