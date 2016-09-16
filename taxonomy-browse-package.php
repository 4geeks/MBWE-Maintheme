<?php
/*
Template Name: Package Taxonomy
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
		        <div class="row">
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
					<h3>Click on any of the following packages for more deatils: Catering, Beverages, Design, Entretainment, Cake and more.</h3>
				</div>
			</div>
            <div id="list-content" class="row">   
            <?php                  
				while ( have_posts() ) {
				the_post();
				$packageId = get_the_ID();
	        ?>
                    <div class="col-xs-12 col-sm-4 col-md-4  package-element">
                        <div class="col-md-12 col-sm-12 inner-package-element">
                            <div class="col-md-12 div-package-name linkeable highlight-element" style="background: url('<?php echo get_post_meta( $packageId, 'wpcf-package-main-image', false)[0]; ?>') no-repeat center center / cover">
                                <h3 class="with-font-title"><?php echo get_post_meta( $packageId, 'wpcf-package-name', false)[0]; ?></h3>                                
                            </div>                            
                            <div class="col-md-12 div-description">
                                <?php echo get_post_meta( $packageId, 'wpcf-package-description', false)[0]; ?>
                            </div>
                            <div class="col-md-12 div-package-btn">
                                <a class="btn btn-info datail-package" href="<?php echo get_permalink($packageId); ?>">Read more</a>
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