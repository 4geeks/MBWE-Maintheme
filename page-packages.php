<?php
/*
Template Name: Packages
*/

get_header(); 

//Get venue post types to list 

$args = array('post_type' => 'package'); 
$packages = new WP_Query( $args );
$content = get_page($post->ID)->post_content;
?>
    <!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
    <div id="primary" class="full-width-page no-sidebar">
		<main id="main">            
            <?php echo $content; ?>
            <div id="list-content" class="row">
                <?php foreach ($packages->posts as $package) {?>
                    <div class="col-xs-12 col-sm-4 col-md-4  package-element">
                        <div class="col-md-12 col-sm-12 inner-package-element">
                            <div class="col-md-12 div-package-name highlight-element" style="background: url('<?php echo get_post_meta( $package->ID, 'wpcf-package-main-image', false)[0]; ?>') no-repeat center center / cover">
                                <h3 class="with-font-title"><?php echo get_post_meta( $package->ID, 'wpcf-package-name', false)[0]; ?></h3>                                
                            </div>                            
                            <div class="col-md-12 div-description">
                                <?php echo get_post_meta( $package->ID, 'wpcf-package-description', false)[0]; ?>
                            </div>
                            <div class="col-md-12 div-package-btn">
                                <a class="btn btn-info datail-package" target="_blank" href="<?php echo get_post_meta($package->ID, 'wpcf-package-main-attachment', false)[0];  ?>">Read more</a>
                            </div>                            
                        </div>
                    </div>
                     <div class="clearfix visible-xs-block"></div>
               <?php }?>
            </div>
            <div class="blue-background"><h2>What our clients say about our packages</h2></div>
            <!-- ========== TESTIMONIES PART ========== -->
            <?php get_template_part( 'template-parts/part', 'testimonies' ); ?>
            <!-- ========== TESTIMONIES PART ========== -->

            <!-- ========== WHY FETES & EVENTS PART ========== -->
            <?php get_template_part( 'template-parts/part', 'why-fetes-events' ); ?>
            <!-- ========== WHY FETES & EVENTS PART ========== -->
		</main>
        <div id="animatedModalP">
            <div class="col-md-12 modal-menu">
                <div class="close-animatedModal btn-close">
                    <span class="glyphicon glyphicon-remove" style="color:white"></span>
                </div>
            </div>
            <div class="modal-content">
                adasdas
            </div>
        </div>
	</div>

    <?php get_footer(); ?>