<?php
/**
 * The template for displaying all single posts.
 *
 * @package Tesseract
 */
header('X-Frame-Options: GOFORIT');
get_header(); 
?>

<?php

$post = get_post();

$mainImage = types_render_field("venue-main-image",array("url" => "true"));
$child_posts = types_child_posts('acommodation');
$fullname = types_render_field("planner-full-name");
$nickname = types_render_field("planner-nickname");

$revslider = types_render_field("planner-revslider");
if(!$revslider or $revslider=='') $revslider = 'planner-bio';

$weddings = types_render_field("venue-weddings",array("output" => "raw"));

//Get venue post types to list in dropdown list 
$args = array(
    'post_type' => 'venue',
    'meta_query' => array(
        array(
            'key' => 'wpcf-venue-visibility',
            'value' => array('1', '2'),
            'compare' => 'IN'
        )
    ),
    'posts_per_page'=>-1
    ); 
$venues = new WP_Query( $args );

?>  
    <!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>

    <?php putRevSlider($revslider); ?>

    <!-- ========== MENU TOP ========== -->
    <div id="primary" class="<?php echo $primary_class; ?>">
        <main id="main">
            <div id="div-venue-description" class="row">                
                <div class="col-md-10 col-md-offset-1 container">
                    <h2 class="text-center">Schedule an appointment with <?php echo $fullname; ?></h2>
                    <?php 
                        gravity_form( 'Planner Appointment', false, false, true, array('planner-slug' => $post->slug), true ); 
                        ?>   
                </div>
            </div>
            <div id="div-venue-nerby">
                <div class="container">
                    <div class="col-md-8 col-sm-12">
                        <h2><?php echo $nickname; ?> Past Weddings</h2>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="row">
                            <div>
                                <h2>Fun Facts about <?php echo $nickname; ?></h2>
                            </div>
                        </div>
                        <div class="row">
                            <h2>Certifications</h2>
                            <div class="row">
                                <div class="col-sm-3">
                                    <img class="certification-img" src="<?php bloginfo('template_url'); ?>/img/aw4.png">
                                </div>
                                <div class="col-sm-9 div-planner-certifications">
                                    Nationally certified Wedding and Event Planner through LWPI And Miami Dade College
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div>
                                <h2>Experience</h2>
                                23232332
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php get_template_part( 'template-parts/part', 'testimonies' ); ?>
            <?php if($tour != ''){ ?>
                <div id="animatedModal">
                    <div class="col-md-12 modal-menu">
                        <div class="top-venue-menu">
                            <ul class="ul-menu">
                                <li><a class="close-animatedModal" href="#primary">INFO & LOCATION</a></li>
                                <?php if($blueprint != ''){?>
                                    <li><a class="close-animatedModal" href="#div-venue-blueprint">AREAS</a></li>
                                <?php } ?>
                                <?php echo "<li><a href='".get_home_url()."/gallery/?post_id=".get_post()->ID."'>PHOTOS</a></li>";?>
                                <?php if($weddings != ''){?>
                                    <li><a href="<?php echo $weddings; ?>" target="_blank">WEDDINGS</a></li>
                                <?php } ?>
                            </ul>
                            <div class="close-animatedModal btn-close"> 
                                <span class="glyphicon glyphicon-remove" style="color:white"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-content">
                        <?php echo "<iframe src=".$tour." width='100%' height='100%'></iframe>"; ?>
                    </div>
                </div>
            <?php } ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer(); ?>
