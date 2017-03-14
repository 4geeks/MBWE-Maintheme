<?php
/**
 * The template for displaying all weddign planner posts.
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
$uniqueness = types_render_field("planner-uniqueness");

$min_price = types_render_field("planner-minimum-price");
$max_price = types_render_field("planner-maximun-price");

$plannerBlog = types_render_field("planner-blog-post");

$funFacts = types_render_field("planner-fun-facts");
$number_weddings = types_render_field("planner-total-weddings");
$number_weddings_year = types_render_field("planner-weddings-a-year");
$number_years = types_render_field("planner-years-of-experience");

$nickname = types_render_field("planner-nickname");
if(!$nickname)
{
    $names = split(" ", $fullname);
    if(count($names)>0) $nickname = $names[0];
}

$funFacts = types_render_field("planner-fun-facts");
$past_weddings = types_child_posts('wedding');

$revslider = types_render_field("planner-revslider");
if(!$revslider or $revslider=='') $revslider = 'planner-bio';

$weddings = types_render_field("venue-weddings",array("output" => "raw"));

?>  
    <!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>

    <?php putRevSlider($revslider); ?>

    <!-- ========== MENU TOP ========== -->
    <div id="primary" class="<?php echo $primary_class; ?>">
        <main id="main">
            <div id="div-venue-description" class="row">                
                <div class="col-xs-10 col-xs-offset-1 col-md-10 col-md-offset-1 container">
                    <h2 class="text-center"><?php _e( 'Call now!', 'bmw-website' ) ?> <a href="tel:<?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?>" class="tracking-phone-number"><?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?></a> <?php _e( 'to schedule an appointment with <?php echo $nickname; ?>,<br /> or fill the following form and we will email you with availability', 'bmw-website' ) ?>:</h2>
                    <?php 
                        gravity_form( 'Planner Appointment', false, false, true, array('planner-slug' => $post->slug), true ); 
                        ?>   
                </div>
            </div>
            <div class="row main-planner-content">
                <div class="col-md-6 col-sm-12">
                    <div class="row text-center">
                        <div class="col-xs-12">
                            <h2><?php printf(( 'What makes %s unique', 'bmw-website' ),$nickname); ?></h2>
                            <?php echo $uniqueness; ?>
                            <?php if($plannerBlog){ ?>
                                <a href="<?php echo $plannerBlog; ?>"><?php printf(( 'Read more about %s here', 'bmw-website' ),$nickname); ?>.</a>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-12  text-center">
                    <div class="row planner-fact">
                        <div>
                            <h2><?php printf(( 'Fun Facts about %s', 'bmw-website' ),$nickname); ?></h2>
                            <?php echo $funFacts; ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row planner-section" style="background: #474747; color: white; font-size: 30px;">
                <div class="col-sm-4">
                    <h2 class="planner-fact-data"><?php echo $number_weddings; ?></h2>
                    Weddings Planned Succesfully
                </div>
                <div class="col-sm-4">
                    <h2 class="planner-fact-data"><?php echo $number_weddings_year; ?></h2>
                    Weddings each year
                </div>
                <div class="col-sm-4">
                    <h2 class="planner-fact-data"><?php echo $number_years; ?></h2>
                    Years of experience
                </div>
            </div>
            <div class="row planner-price-fact">
                <div class="col-xs-12">
                    <h2>Pricing</h2>
                    <strong><?php echo $nickname; ?>'s prices can vary from $<?php echo number_format($min_price); ?> to $<?php echo number_format($max_price); ?> depending on the number of hours, vendors and other factors.</strong>
                </div>
            </div>
            <?php get_template_part( 'template-parts/part', 'testimonies' ); ?>
            <?php include( locate_template( 'template-parts/planner-reviews.php', false, false ) ); ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer(); ?>
