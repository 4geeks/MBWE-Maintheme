<?php
/**
 * The template for displaying all single posts.
 *
 * @package Tesseract
 */
header('X-Frame-Options: GOFORIT');
get_header(); 

$primary_class = 'full-width-page no-sidebar';
$name = types_render_field("downloadable-title");
$dexcerpt = types_render_field("downloadable-excerpt");
$fileSlug = types_render_field("downloadable-slug");
$mainImage = types_render_field("downloadable-image",array("url" => "true"));
$mainFile = types_render_field("downloadable-file",array("url" => "true"));

$post = get_post();

?>
	<!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
	<div id="downloadable-content" class="container">
        <!-- First Featurette -->
        <div class="row">
            <div class="col-md-6">
	            <h1>
	            	<?php  echo $name;?>
	            </h1>
	            <p>
	            	<?php echo $dexcerpt; ?>
	            </p>
			        <?php 
			            $gravityForm = null;
			            
			            if(isset($current_post_id) and $current_post_id!="" and $current_post_id>0) {
			                $gravityForm = get_post_meta( $current_post_id, 'downloadable-gravity-form', true );
			                if(empty($gravityForm)) $gravityForm = get_post_meta( $current_post_id, 'wpcf-downloadable-gravity-form', true );
			            }

			            if(!empty($gravityForm) and $gravityForm!="" and $gravityForm!=null) gravity_form( $gravityForm, false, false, true, "array('downloadable-slug' => '".$fileSlug."')", true ); 
			            else
			                gravity_form( 9, false, false, true, array('downloadable-slug' => $fileSlug), true ); 

			            ?>  
	        </div>
        	<div class="col-md-6">
            	<img class="img-circle img-responsive pull-right" src="<?php echo $mainImage; ?>">
            </div>
        </div>
        <hr class="featurette-divider">
        <div class="row text-center">
        	<h2>FREQUENTLY ASKED QUESTIONS</h2>
    	</div>
        <div class="row text-center">
        	<div class="col-md-12">
            	<?php the_content(); ?>
        	</div>
        </div>
        <div class="row text-center">
        	<div class="col-md-12">
				<span class='st_facebook_hcount' displayText='Facebook'></span>
				<span class='st_twitter_hcount' displayText='Tweet'></span>
				<span class='st_pinterest_hcount' displayText='Pinterest'></span>
				<span class='st_linkedin_hcount' displayText='LinkedIn'></span>
				<span class='st_googleplus_hcount' displayText='Google +'></span>
				<span class='st__hcount' displayText=''></span>
        	</div>
        </div>
        <hr class="featurette-divider">
        <div class="row text-center">
        	<h2>FREQUENTLY ASKED QUESTIONS</h2>
    	</div>
        <div class="row text-center">
        	<div class="col-md-6">
        		<h4>Why do I need to fill out the information requested?</h4>
        		<p>We will always keep your personal information safe. We ask for your information in exchange for a valuable resource in order to (a) improve your browsing experience by personalizing the HubSpot site to your needs; (b) send information to you that we think may be of interest to you by email or other means; (c) send you marketing communications that we think may be of value to you. </p>
        	</div>
        	<div class="col-md-6">
        		<h4>Is this really free?</h4>
        		<p>Absolutely. Just sharing some free knowledge that we hope you’ll find useful. Keep us in mind next time you have marketing questions!</p>
        	</div>
        </div>
    </div>
<?php get_footer(); ?>