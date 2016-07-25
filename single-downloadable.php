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

$post = get_post();

?>
	<!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
	<div class="container">
        <hr class="featurette-divider">
        <!-- First Featurette -->
        <div class="featurette" id="about">
            <img class="featurette-image img-circle img-responsive pull-right" src="<?php echo $mainImage; ?>">
            <h2 class="featurette-heading">
            	<?php  echo $name;?>
            </h2>
            <p class="lead"><?php the_content(); ?></p>
        </div>
        <hr class="featurette-divider">
    </div>
        <?php 
            $gravityForm = null;
            
            if(isset($current_post_id) and $current_post_id!="" and $current_post_id>0) {
                $gravityForm = get_post_meta( $current_post_id, 'special_gravity_form', true );
                if(empty($gravityForm)) $gravityForm = get_post_meta( $current_post_id, 'wpcf-special_gravity_form', true );
            }

            if(!empty($gravityForm) and $gravityForm!="" and $gravityForm!=null) gravity_form( $gravityForm, false, false, false, "array('downloadable-slug' => '".$fileSlug."')", true ); 
            else
                gravity_form( 3, false, false, false, array('downloadable-slug' => $fileSlug), true ); 

            ?>  
<?php get_footer(); ?>