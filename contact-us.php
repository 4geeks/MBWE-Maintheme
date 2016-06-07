<?php
/*
Template Name: Contactus
*/

get_header(); 

//Get venue post types to list 

?>
	<!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
    <div id="page-contact-us">
    	<!-- ========== MENU TOP ========== -->
        <?php get_template_part( 'template-parts/part', 'contact-us' ); ?>
        <!-- ========== MENU TOP ========== -->        
    </div>

<?php get_footer(); ?>