<?php
/*
Template Name: Catering
*/

get_header(); 

//Get venue post types to list 

$args = array('post_type' => 'catering-menu'); 
$menus = new WP_Query( $args );

$pageContent = get_page($post->ID);
$content = $pageContent->post_content;

$revslider = types_render_field("page-slider");
?>
    <!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
    <div id="primary" class="full-width-page no-sidebar">
		<main id="main">     
		<?php if($revslider){ putRevSlider($revslider); }?>       
            <?php else { echo $content; }?>
            <div id="list-content" class="row fix-margin-row">
                <?php foreach ($menus->posts as $menu) {?>
                	<?php //die(print_r($menu)); ?>
                    <div class="col-xs-12 col-sm-4 col-md-4 menu-element">
                        <div class="col-md-12 col-sm-12 inner-menu-element">
                            <div class="col-md-12 div-menu-name linkeable highlight-element" style="background: url('<?php echo get_post_meta( $menu->ID, 'wpcf-menu-main-image', false)[0]; ?>') no-repeat center center / cover">
                                <h3 class="with-font-title"><?php echo $menu->post_title; ?></h3>                                
                            </div>                            
                            <div class="col-md-12 div-description">
                                <?php echo get_post_meta( $menu->ID, 'wpcf-catering-menu-description', false)[0]; ?>
                            </div>
                            <div class="col-md-12 div-menu-btn">
                                
                                <a class="btn btn-info datail-menu" target="_blank" href="<?php echo get_post_meta( $menu->ID, 'wpcf-catering-menu-pdf', true); ?>">Read more</a>
                            </div>                            
                        </div>
                    </div>
                     <div class="clearfix visible-xs-block"></div>
               <?php }?>
            </div>
            <?php get_template_part( 'template-parts/part', 'awards' ); ?>
            <div class="blue-background"><h2>What our clients say about our menu</h2></div>
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
            </div>
        </div>
	</div>

    <?php get_footer(); ?>