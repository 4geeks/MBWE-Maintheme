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
    	<div class="contact-us">
		<div class="col-md-12 contact-title">
		   <center><h2><?php _e( 'Responsiveness is one of our main values, <br /> we guarantee you a response in less than 10min', 'bmw-website' ) ?></h2></center>       
		</div>
		<!-- <div class="row"> -->
		    <div class="col-md-5 col-xs-12 contact-call-us">
		        <p><?php _e( 'Call us now!', 'bmw-website' ) ?></p>
		        <a href="tel:<?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?>" class="highlight-p with-font-sub-title tracking-phone-number"><?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?></a>
		    </div>
		    <div class="col-md-7 col-xs-12 div-form-contact-us">
		        <?php gravity_form( 4, false, false, false, '', true ); ?>           
		    </div>        
		<!-- </div> -->
		</div>     
    </div>

<?php get_footer(); ?>