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
		        <h3>Call us now!</h3>
		        <h1 class="highlight-p">(305) 662-47-42</h1>
		        <h3>Or chat with us</h3>
		    </div>
		    <div class="col-md-7 col-xs-12 div-form-contact-us highlight-p">
		        <?php gravity_form( 4, false, false, false, '', true ); ?>           
		    </div>        
		<!-- </div> -->
		</div>     
    </div>

<?php get_footer(); ?>