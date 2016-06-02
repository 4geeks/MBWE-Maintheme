<?php
/*
Template Name: Planners
*/

get_header(); 

//Get venue post types to list 

$args = array('post_type' => 'planner');
$planners = new WP_Query( $args );

$args = array('post_type' => 'testimonie');
$testimonies = new WP_Query( $args );

$content = get_page($post->ID)->post_content;

?>
	<!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
	<div id="primary" class="full-width-page no-sidebar">
		<main id="main">
            <?php echo $content; ?>
            <div id="list-content">                    
                <?php foreach ($planners->posts as $planner) {?>                        
                    <div class="col-md-4 planner-element">
                        <div class="col-md-12 inner-planner-element">
                            <div class="col-md-12 div-planner-image" style="background-image: url('<?php echo get_post_meta( $planner->ID, 'wpcf-planner-photo', false)[0]; ?>')">                                
                            </div>
                            <div class="col-md-12">
                                <h3><?php echo get_post_meta( $planner->ID, 'wpcf-planner-full-name', false)[0]; ?></h3>
                                <div class="col-md-12 div-planner-experience">
                                    <?php echo get_post_meta( $planner->ID, 'wpcf-planner-experience', false)[0]; ?>
                                </div>                                
                                <br></br>
                                <div class="col-md-12 div-planner-certified">
                                    <strong><?php echo get_post_meta( $planner->ID, 'wpcf-planner-full-name', false)[0]; ?>'s top qualities? </strong><br />
                                    <?php echo get_post_meta( $planner->ID, 'wpcf-planner-certified', false)[0]; ?>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php }?>
            </div>         
            <div class="blue-background"><h2>What our clients say about our planners</h2></div>   
            <!-- ========== MENU TOP ========== -->
            <?php get_template_part( 'template-parts/part', 'testimonies' ); ?>
            <!-- ========== MENU TOP ========== -->        

            <!-- ========== WHY FETES & EVENTS PART ========== -->
            <?php get_template_part( 'template-parts/part', 'why-fetes-events' ); ?>
            <!-- ========== WHY FETES & EVENTS PART ========== -->

		</main>
	</div> 

<?php get_footer(); ?>