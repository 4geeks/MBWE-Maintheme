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

$headline = types_render_termmeta( "tax-sub-headline", array( "term_id" => $term_id));
$gravity_form_id = types_render_termmeta( "tax-gravity-form-slug", array( "term_id" => $term_id));
$bgvalignment = types_render_termmeta( "tax-background-image-valign", array( "term_id" => $term_id));
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
			<div class="container-fluid landing-with-form" style="background-image: url('http://new.bestmiamiweddings.com/wp-cosntent/uploads/sites/3/2016/05/Vizcaya.png');">
		<?php } ?>
		        <div class="row landing-headline-content">
					<div class="col-md-12">
						<h1 class="with-font-title">Wedding <?php printf(single_cat_title( '', false ) . '' ); ?> in Miami</h1>
						<?php if($headline and $headline!=''){ ?>
							<p class="landing-headline"><?php echo $headline; ?></p>
						<?php } ?>				
					</div>
				</div>
			</div>
            <div id="list-content" class="row">   
                <div class="col-sm-10 col-sm-offset-1">
					<div class="grid">
						<div class="grid-sizer"></div>
						<div class="gutter-sizer"></div>
            <?php                  
				while ( have_posts() ) {
				the_post();
				$postId = get_the_ID();
	        ?>
					  <div class="grid-item wedding-idea">
				  		<a href="<?php //echo get_permalink(); ?>#">
					  		<img src="<?php echo get_post_meta( $postId, 'wpcf-wedding-idea-img-background', false)[0]; ?>">
					  		<h3>
					  			<?php echo get_post_meta( $postId, 'wpcf-wedding-idea-title', true); ?>
					  		</h3>
				  		</a>
					  </div>
               <?php }?>
					</div>
				</div>
            </div>
			<div class="row pricing-form-content">                
                <div class="col-xs-12 col-sm-6 col-md-offset-1 col-md-4">
                    <h3 class="text-right">Call now! <a href="tel:305-662-4742" class="tracking-phone-number">305-662-4742</a> to request more information and pricing or fill the following form:</h3>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-6">
                    <?php 
			        	if($gravity_form_id and $gravity_form_id!='') gravity_form( $gravity_form_id, false, false, true, null, true ); 
			        	else gravity_form( 'Wedding Idea Contact Us', false, false, true, null, true ); 
		            ?>  
                </div>
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