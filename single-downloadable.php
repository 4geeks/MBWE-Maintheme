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
$fileSlug = types_render_field("downloadable-slug");
$mainImage = types_render_field("downloadable-image",array("url" => "true"));
$mainFile = types_render_field("downloadable-file",array("url" => "true"));

$post = get_post();

?>
	<!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
	<div class="container">
        <!-- First Featurette -->
        <div class="row">
            <div class="col-md-6">
	            <h2 class="featurette-heading">
	            	<?php  echo $name;?>
	            </h2>
	            <p class="lead">
	            	<?php the_content(); ?>
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
	            </p>
	        </div>
        	<div class="col-md-6">
            	<img class="img-circle img-responsive pull-right" src="<?php echo $mainImage; ?>">
            </div>
        </div>
        <hr class="featurette-divider">
    </div>
<?php get_footer(); ?>