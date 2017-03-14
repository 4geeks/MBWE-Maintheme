<?php
/**
 * The template for displaying all weddign planner posts.
 *
 * @package Tesseract
 */
header('X-Frame-Options: GOFORIT');
get_header(); 
?>

<?php

$post = get_post();

//$mainImage = types_render_field("venue-main-image",array("url" => "true"));
//$child_posts = types_child_posts('acommodation');
$catering = types_render_field("package-catering-experience");
$cateringImage = types_render_field("package-catering-image",array("url" => "true"));
$afterdinner = types_render_field("package-after-dinner-experience");
$afterdinnerImage = types_render_field("package-after-dinner-image",array("url" => "true"));
$design = types_render_field("package-design-experience");
$designImage = types_render_field("package-design-image",array("url" => "true"));
$beverage = types_render_field("package-beverage-experience");
$beverageImage = types_render_field("package-beverage-image",array("url" => "true"));

$revslider = types_render_field("page-slider");
if(!$revslider or $revslider=='') $revslider = 'package-slider';

?>  
    <!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>

    <div class="blackspace-bar visible-xs"></div>
    <?php putRevSlider($revslider); ?>

    <!-- ========== MENU TOP ========== -->
    <div id="primary" class="<?php echo $primary_class; ?>">
        <main id="main">
            <div class="row pricing-form-content">                
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <h3 class="text-right"><?php _e( 'Call now!', 'bmw-website' ) ?> <a href="tel:<?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?>" class="tracking-phone-number"><?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?></a> <?php _e( 'to request more information and pricing <br /> or fill the following form', 'bmw-website' ) ?>:</h3>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-7">
                    <?php 
                        gravity_form( 'Package Pricing Request', false, false, true, array('planner-slug' => $post->slug), true ); 
                        ?>   
                </div>
            </div>
	        <div class="row package-section">
				<div class="section half-section-left">
					<div class="section-bg hidden-xs img-bg" data-bg="<?php echo $cateringImage; ?>" style="background: url(<?php echo $cateringImage; ?>);">&nbsp;</div>
					<div class="container">
						<div class="row">
							<div class="col-sm-offset-6 col-sm-6 col-xs-12 package-section-content">
				        		<h1><?php _e( 'Catering Experience', 'bmw-website' ) ?></h1>
	        					<?php echo $catering; ?>
							</div>
						</div>
					</div>
				</div>
	        </div>
	        <div class="row package-section">
				<div class="section half-section-right">
					<div class="container">
						<div class="row"> 
							<div class="col-sm-6 col-xs-12 package-section-content">
	        					<?php echo $beverage; ?>
							</div>
						</div>
					</div>
					<div class="section-bg hidden-xs img-bg" data-bg="<?php echo $beverageImage; ?>" style="background: url(<?php echo $beverageImage; ?>);">&nbsp;</div>
				</div>
	        </div>
	        <div class="row package-section">
				<div class="section half-section-left">
					<div class="section-bg hidden-xs img-bg" data-bg="<?php echo $afterdinnerImage; ?>" style="background: url(<?php echo $afterdinnerImage; ?>);">&nbsp;</div>
					<div class="container ">
						<div class="row">
							<div class="col-sm-offset-6 col-sm-6 col-xs-12 package-section-content">
	        					<?php echo $afterdinner; ?>
							</div>
						</div>
					</div>
				</div>
	        </div>
	        <div class="row package-section">
				<div class="section half-section-right">
					<div class="container">
						<div class="row">
							<div class="col-sm-6 col-xs-12 package-section-content">
	        					<?php echo $design; ?>
							</div>
						</div>
					</div>
					<div class="section-bg hidden-xs img-bg" data-bg="<?php echo $designImage; ?>" style="background: url(<?php echo $designImage; ?>);">&nbsp;</div>
				</div>
	        </div>
	        <div class="row entretainment-services">
	        	<p><?php _e( 'Entertainment Services available upon request', 'bmw-website' ) ?></p>
	        </div>
            <?php get_template_part( 'template-parts/part', 'testimonies' ); ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer(); ?>
