<?php
/*
Template Name: Planners
*/

get_header(); 

//Get venue post types to list 

$args = array('post_type' => 'wedding-planner');
$planners = new WP_Query( $args );

$args = array('post_type' => 'testimonie');
$testimonies = new WP_Query( $args );

$content = get_page($post->ID)->post_content;

function getYoutubeID($url = '')
{
    $video_id = null;

    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
        $video_id = $match[1];
    }

    return $video_id;
}

function getNickname($plannerId = 0)
{
    $nickname = get_post_meta($plannerId, "wpcf-planner-nickname", true);
    if(!$nickname)
    {
        $fullname = get_post_meta( $plannerId, 'wpcf-planner-full-name', true);
        $names = split(" ", $fullname);
        if(count($names)>0) $nickname = $names[0];
    }

    return $nickname;
}

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
                    $plannerExperience = get_post_meta( $planner->ID, 'wpcf-planner-experience', false)[0];
                    
                    $plannerVideo = get_post_meta( $planner->ID, 'wpcf-planner-video', false)[0];
                    if($plannerVideo and $plannerVideo!='') $plannerVideo = getYoutubeID($plannerVideo);  
                    else $plannerVideo = null;

                    $total_weddings = get_post_meta($planner->ID, "wpcf-planner-total-weddings", true);
                    if(!$total_weddings or $total_weddings=="") $total_weddings = "0";
                    $number_years = get_post_meta($planner->ID, "wpcf-planner-years-of-experience", true);
                    if(!$number_years or $number_years=="") $number_years = "0";
                ?>                        
                    <div class="col-sm-6 col-md-4 planner-element">
                        <div class="div-planner-image" style="background-image: url('<?php echo get_post_meta( $planner->ID, 'wpcf-planner-photo', false)[0]; ?>')">                                
                            <?php if($plannerVideo){ 
                                if(function_exists('lyte_preparse')) { echo lyte_preparse($plannerVideo); }
                                else echo '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$plannerVideo.'?rel=0&amp;&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';
                            } ?>
                        </div>
                        <h3><?php echo get_post_meta( $planner->ID, 'wpcf-planner-full-name', false)[0]; ?></h3>
                        <small><?php echo $serviceArea; ?></small>
                        <div class="row">
                            <div class="col-xs-7"> 
                                <h5><?php echo $total_weddings; ?> <?php _e( 'weddings successfully planned', 'bmw-website' ) ?>.</h5>
                            </div>
                            <div class="col-xs-5"> 
                                <h5><?php echo $number_years; ?> <?php _e( 'years in the industry', 'bmw-website' ) ?>.</h5>
                            </div>
                        </div>
                        <div class="div-planner-experience">
                            <?php echo substr($plannerExperience,0,430); ?>..
                            <p><a href="<?php echo get_permalink($planner->ID); ?>"><?php _e( 'Learn more about', 'bmw-website' ) ?> <?php echo getNickname($planner->ID); ?></a></p>
                        </div> 
                        <?php if($certified) { ?>  
                        <!--                             
                        <div class="div-planner-certified">
                            <div class="col-xs-4 col-sm-2"> 
                                <img class="certification-badge" src="<?php bloginfo('template_url'); ?>/img/aw4.png" alt="Miami Wedding Planner Certificate Badge" class="pull-left logo" />
                            </div>
                            <div class="col-xs-8 col-sm-10"> 
                                <p><?php echo $certified; ?></p>
                            </div>
                        </div>
                        -->
                        <?php }?>
                    </div>
               <?php }?>
            </div>         
            <div class="blue-background"><h2><?php _e( 'What our clients say about our planners', 'bmw-website' ) ?></h2></div>   
            <!-- ========== MENU TOP ========== -->
            <?php get_template_part( 'template-parts/part', 'testimonies' ); ?>
            <!-- ========== MENU TOP ========== -->        

            <!-- ========== WHY FETES & EVENTS PART ========== -->
            <?php get_template_part( 'template-parts/part', 'why-fetes-events' ); ?>
            <!-- ========== WHY FETES & EVENTS PART ========== -->

		</main>
	</div> 

<?php get_footer(); ?>