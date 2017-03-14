<?php
/*
Template Name: Venues Taxonomy
*/

get_header(); 

//Get venue post types to list 

// vars
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  

$headline = types_render_termmeta( "tax-sub-headline");
$gravity_form_id = types_render_termmeta( "tax-gravity-form-slug");
$bgvalignment = types_render_termmeta( "tax-background-image-valign");
$bgImageURL = types_render_termmeta("tax-background-image",array("url" => "true"));
//$bgVideoURL = types_render_termmeta('wpcf-tax-background-video',array("url" => "true"));

?>
    <!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
	
	<div id="primary" class="full-width-page no-sidebar">
		<main id="main">
		<?php if($bgImageURL and $bgImageURL!=''){ ?>
			<div class="container-fluid landing-with-form" style="background-image: url('<?php echo $bgImageURL; ?>'); background-position: <?php echo $bgvalignment; ?> center;">
		<?php } else { ?>
			<div class="container-fluid landing-with-form" style="background-image: url('http://new.bestmiamiweddings.com/wp-content/uploads/sites/3/2016/05/Vizcaya.png');">
		<?php } ?>
		        <div class="row landing-headline-content">
					<div class="col-md-12">
						<h1 class="with-font-title"><?php printf(single_cat_title( '', false ) . '' ); ?> </h1>
						<?php if($headline and $headline!=''){ ?>
							<p class="landing-headline"><?php echo $headline; ?></p>
						<?php } ?>				
					</div>
				</div>
		        <div class="row">
		        	<div class=" col-md-2 hidden-xs">
		        	</div>
		            <div class=" col-md-8">
		            	<div class="row template-form">
				            <div class=" col-md-6">
						          <?php
						            // Show an optional term description.
						            $term_description = term_description();
						            if ( ! empty( $term_description ) ) :
						              printf( '<div class="taxonomy-description">%s</div>', $term_description );
						            endif;
						          ?>
					        </div>
				            <div class="col-md-6">
							        <?php 
							        	if($gravity_form_id and $gravity_form_id!='') gravity_form( $gravity_form_id, false, false, true, null, true ); 
							        	else gravity_form( 'Venue Simple Contact Us', false, false, true, null, true ); 
							            ?>  
					        </div>
				    	</div>
				    </div>
		        </div>
			</div>
			<div class="content-header-description">
				<div class="container">
					<h3><?php _e( 'Click on any of the following venues for more details: Photos, Capacity, Blueprints, Map Address, 360° Tour and more.', 'bmw-website' ) ?></h3>
				</div>
			</div>
            <div id="list-content" class="row">   
            <?php                  
				while ( have_posts() ) {
				the_post();
				$venueId = get_the_ID();
	        ?>
                    <div class="col-sm-12 col-md-6 col-lg-4  venue-element">
                        <div class="col-sm-12 inner-venue-element">
                            <div class="col-sm-12 div-venue-image linkeable highlight-element" style="background-image: url('<?php echo get_post_meta( $venueId, 'wpcf-venue-main-image', true); ?>')">
                            </div>
                            <div class="col-sm-12 div-description">
                                <center><h2><?php echo get_post_meta( $venueId, 'wpcf-venue-name', true); ?></h2></center>
                                <div class="col-sm-12">
                                    <h4><?php echo get_post_meta( $venueId, 'wpcf-venue-direction', true); ?></h4>
                                </div>
                                <div class="col-sm-12">
                                    <a href="<?php echo get_permalink(); ?>" class="btn btn-info btn-sm"><?php _e( 'Read more', 'bmw-website' ) ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php }?>
            </div>
            <!-- <div class="blue-background"><h2>What our clients say about our venues</h2></div> -->
            <!-- ========== testimonies TOP ========== -->
            <?php  //get_template_part( 'template-parts/part', 'testimonies' ); ?>
            <!-- ========== testimonies TOP ========== -->        

            <!-- ========== WHY FETES & EVENTS PART ========== -->
            <?php //get_template_part( 'template-parts/part', 'why-fetes-events' ); ?>
            <!-- ========== WHY FETES & EVENTS PART ========== -->
		</main>
	</div>

<?php get_footer(); ?>