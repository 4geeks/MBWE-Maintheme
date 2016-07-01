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
		<div class="col-md-12 contact-title highlight-p">
		   <center><p>Responsiveness is one of our main values, <br /> we guaranty you a response in less than 10min</p></center>       
		</div>
		<!-- <div class="row"> -->
		    <div class="col-md-5 col-xs-12 contact-call-us">
		        <p>Call us now!</p>
		        <p class="highlight-p with-font-sub-title"><?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?></p>
		        <p>Or chat with us</p>
		    </div>
		    <div class="col-md-7 col-xs-12 div-form-contact-us highlight-p">
		        <?php gravity_form( 4, false, false, false, '', true ); ?>           
		    </div>        
		<!-- </div> -->
		</div>     
    </div>

<?php get_footer(); ?>