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
            <div id="list-content" class="container-fluid">
                <?php foreach ($planners->posts as $planner) {
                    $serviceArea = get_post_meta( $planner->ID, 'wpcf-planner-service-area', false)[0];
                    if(!$serviceArea or $serviceArea=='') $serviceArea = "Miami / Fort Lauderdale area.";

                    $certified = get_post_meta( $planner->ID, 'wpcf-planner-certified', false)[0];
                    if(!$certified or $certified=='') $certified = null;

                    $plannerExperience = null;
                    $plannerExperience = get_post_meta( $planner->ID, 'wpcf-planner-experience', false)[0]
                    
                    $plannerVideo = get_post_meta( $planner->ID, 'wpcf-planner-video', false)[0];
                    if(!$plannerVideo or $plannerVideo=='') $plannerVideo = null;
                ?>                        
                    <div class="col-sm-6 col-md-4 planner-element">
                        <div class="div-planner-image" style="background-image: url('<?php echo get_post_meta( $planner->ID, 'wpcf-planner-photo', false)[0]; ?>')">                                
                        </div>
                        <h3><?php echo get_post_meta( $planner->ID, 'wpcf-planner-full-name', false)[0]; ?></h3>
                        <small><?php echo $serviceArea; ?></small>
                        <div class="div-planner-experience">
                            <?php echo substr($plannerExperience,0,450); ?>
                            <?php if($plannerExperience and strlen($plannerExperience)>450) echo "..."; ?>
                        </div> 
                        <?php if($certified) { ?>                               
                        <div class="div-planner-certified row">
                            <div class="col-xs-4 col-sm-2"> 
                                <?php if($plannerVideo){ ?>
                                <iframe width="100%" height="100%" src="<?php echo $plannerVideo; ?>?rel=0&amp;controls=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
                                <?php } else { ?>
                                <img class="certification-badge" src="<?php bloginfo('template_url'); ?>/img/aw4.png" alt="Miami Wedding Planner Certificate Badge" class="pull-left logo" />
                                <?php }?>
                            </div>
                            <div class="col-xs-8 col-sm-10"> 
                                <p><?php echo $certified; ?></p>
                            </div>
                        </div>
                        <?php }?>
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