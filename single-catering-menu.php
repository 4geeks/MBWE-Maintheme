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

$appetisers = types_render_field("catering-menu-appetisers");
$entree = types_render_field("catering-menu-entree");
$sides = types_render_field("catering-menu-sides");

$revslider = types_render_field("page-slider");
if(!$revslider or $revslider=='') $revslider = 'catering-slider';

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
	        <div class="row text-center">
				<div class="col-sm-12">
	        		<h2><?php _e( "Hors d'oeuvre", 'bmw-website' ) ?></h2>
					<?php echo $appetisers; ?>
	        		<h2><?php _e( 'Entree', 'bmw-website' ) ?></h2>
					<?php echo $entree; ?>
	        		<h2><?php _e( 'Sides', 'bmw-website' ) ?></h2>
					<?php echo $sides; ?>
				</div>
	        </div>
	        <div class="row entretainment-services">
	        	<p><?php _e( 'Entretainment Services available upon request', 'bmw-website' ) ?></p>
	        </div>
            <?php get_template_part( 'template-parts/part', 'testimonies' ); ?>
            <?php if($tour != ''){ ?>
                <div id="animatedModal">
                    <div class="col-md-12 modal-menu">
                        <div class="top-venue-menu">
                            <ul class="ul-menu">
                                <li><a class="close-animatedModal" href="#primary"><?php _e( 'INFO & LOCATION', 'bmw-website' ) ?></a></li>
                                <?php if($blueprint != ''){?>
                                    <li><a class="close-animatedModal" href="#div-venue-blueprint"><?php _e( 'AREAS', 'bmw-website' ) ?></a></li>
                                <?php } ?>
                                <li><a href='<?php echo get_home_url()."/gallery/?post_id=".get_post()->ID; ?>'><?php _e( 'PHOTOS', 'bmw-website' ) ?></a></li>
                                <?php if($weddings != ''){?>
                                    <li><a href="<?php echo $weddings; ?>" target="_blank"><?php _e( 'WEDDINGS', 'bmw-website' ) ?></a></li>
                                <?php } ?>
                            </ul>
                            <div class="close-animatedModal btn-close"> 
                                <span class="glyphicon glyphicon-remove" style="color:white"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-content">
                        <?php echo "<iframe src=".$tour." width='100%' height='100%'></iframe>"; ?>
                    </div>
                </div>
            <?php } ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer(); ?>
