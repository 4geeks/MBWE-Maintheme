<?php
/**
 * The template for displaying all single venues.
 *
 * @package Tesseract
 */
header('X-Frame-Options: GOFORIT');
get_header(); 
?>

<?php

$primary_class = 'full-width-page no-sidebar';
$mainImage = types_render_field("venue-main-image",array("url" => "true"));
$mainVideo = types_render_field("venue-main-video",array("output" => "raw"));
$name = types_render_field("venue-name");
$direction = types_render_field("venue-direction");
$generalInfo = types_render_field("venue-general-info");
$maxCapacity= types_render_field("venue-max-capacity");
$curfew = types_render_field("venue-curfew");
$location = types_render_field("venue-location");
$parking = types_render_field("venue-parking");
$transportation = types_render_field("venue-transportation");
$blueprint = types_render_field("venue-blueprint");
$blueprintImage = types_render_field("venue-blueprint-image",array("url" => "true"));
$child_posts = types_child_posts('acommodation');
$latitude = types_render_field("venue-latitude");
$longitude = types_render_field("venue-longitude");
$tour = types_render_field("venue-360-tour");
$galleryPostId = types_render_field("venue-gallery");
$weddings = types_render_field("venue-weddings",array("output" => "raw"));

$reviewScore = types_render_field("review-total-score");
$facebookScore = types_render_field("review-facebook-score");
$googleScore = types_render_field("review-google-score");
$yelpScore = types_render_field("review-yelp-score");
$weddingwireScore = types_render_field("review-weddingwire-score");
$theknotScore = types_render_field("review-theknot-score");

$thepros = types_render_field("review-thepros");
$thecons = types_render_field("review-thecons");
$reviewSummary = types_render_field("review-summary");


$post = get_post();
//Get the images from the gallery
$gallery = get_post_gallery($post->ID,false);
$ids = explode( ",", $gallery['ids'] );
foreach( $ids as $id ) {
    $newImg = array(
        'id' => $id, 
        'thumbnail' => wp_get_attachment_image_src( $id ,'large'), 
        'default' => wp_get_attachment_image_src( $id, 'full'), 
        );
    $imgs[] = $newImg;
} 

$isClubOfKnigth = ($post->post_name == 'club-of-knight');

?>  
    <!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
    <div id="primary" class="<?php echo $primary_class; ?>">
        <main id="main" class="container-fluid">
            <div id='div-venue-image'>                
                <div class="fullscreen-bg">  
                    <div id="div-only-for-mobile" class="fullscreen-bg__video not-for-pc" style="background-image: url(<?php echo $mainImage; ?>); height: 100vh;" data-adaptive-background="1" data-ab-css-background="1"></div>                  
                    <?php if($mainVideo and $mainVideo!=''){ ?>
                    <video id="videoVenue" loop="" muted="" autoplay="" class="fullscreen-bg__video" style="background-image: url(<?php echo $mainImage; ?>); background-size: cover; background-position: center center;">
                        <source src="<?php echo $mainVideo; ?>">
                    </video  data-adaptive-background="1" data-ab-css-background="1">
                    <?php } ?>
                </div>            
                <div id="div-venue-name">
                    <h1 class="with-font-sub-title" ><?php  echo $name;?></h1>
                    <span id="direction" > <?php echo $direction ?></span>
                </div>
                <div id="div-venue-button">
                    <a class="btn btn-warning modalContact" href="#animatedModalContact"><?php _e( 'Request a quote', 'bmw-website' ) ?></a>
                    <?php _e( 'or call now!', 'bmw-website' ) ?> <a href="tel:<?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?>" class="tracking-phone-number"><?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?></a>
                </div>
                <div id="arrow-down" class="not-for-mobile"><span class="glyphicon glyphicon-chevron-down"></span></div>     
            </div>

            <div id="div-venue-description" class="row">                
                <div class="col-md-7 col-sm-7 container"><?php echo $generalInfo ?></div>
                <div class="col-md-5 col-sm-5 container">
                    <div class="col-md-1 col-xs-1">
                        <span class="important glyphicon glyphicon-user"></span>
                    </div>
                    <div class="col-md-11 col-xs-10"><p><?php echo $maxCapacity ?> <?php _e( 'people capacity', 'bmw-website' ) ?></p></div>

                    <div class="col-md-1 col-xs-1 margin-top20">
                        <span class="important glyphicon glyphicon-time"></span>
                    </div>
                    <div class="col-md-11 col-xs-10 margin-top20"><p><?php _e( 'The event must end by', 'bmw-website' ) ?> <?php echo $curfew ?></p></div>
                </div>
            </div>
            <div id="div-venue-img-gallery" class="row">                
                <div id="lightSlider">
                    <?php foreach( $imgs as $img ) {
                        echo "<div class='div-image' data-imgid='".$img['id']."' data-src='".$img['default'][0]."' data-img='".$img['thumbnail'][0]."' data-width='".$img['thumbnail'][1]."' data-height='".$img['thumbnail'][2]."'>";
                            echo "<img src='".$img['thumbnail'][0]."' />";
                        echo "</div>";
                    }
                    ?>
                </div>
            </div>
            <div id="div-venue-location" class="row">
                <div class="col-md-6">
                    <div id="div-venue-maps">
                        
                    </div>                
                </div>
                <div class="col-md-6 p-location" >
                    <h2 class="with-font-sub-title address-title"><?php _e( 'Address and location for', 'bmw-website' ) ?> <?php  echo $name;?></h2>
                    <div>
                        <?php echo $location ?>
                        <?php if($direction and $direction!=$location) echo $direction; ?>
                    </div>    
                </div>
            </div>
            <?php 
                echo "<input type='hidden' value='".$latitude."' id='inpt-latitude'/>";
                echo "<input type='hidden' value='".$longitude."' id='inpt-longitude'/>";

            ?>

            <div id="div-venue-nerby">
                <div class="container">
                    <div class="col-md-4 col-sm-4" id="div-venue-acommodations">
                        <h2><?php _e( 'Acommodations', 'bmw-website' ) ?></h2>
                        <div class="style-scroll-1 scrollbar">
                            <div id="div-acommodations" class="force-overflow">
                            <?php
                                foreach ($child_posts as $child_post) {
                                    echo "<div class='acommodations-group'>";
                                        echo "<div class='col-md-3 col-xs-2 image-acommodation' style='background-image: url(".$child_post->fields['thumbnail']."')> </div>";

                                        echo "<div class='col-md-9 col-xs-10 name-acommodation'>".
                                                $child_post->fields['name_nerby']."<br>".
                                            "</div>";
                                    echo "</div>";
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4" id="div-venue-parking">
                        <div>
                            <h2><?php _e( 'Parking', 'bmw-website' ) ?></h2>
                            <?php echo $parking ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4" id="div-venue-transportation">
                        <div>
                            <h2><?php _e( 'Transportation', 'bmw-website' ) ?></h2>
                            <?php echo $transportation ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($blueprint != '' or $blueprintImage !=''){ ?>
                <div id="div-venue-blueprint" class="row">
                    <?php if($blueprint != '') {?>
                    <div class="p-location hidden-xs">
                        <h2><?php _e( 'Layout for ', 'bmw-website' ) ?><?php  echo $name;?></h2>
                        <?php echo $blueprint?>
                    </div>
                    <?php } ?>
                    <?php if($blueprintImage != '') {?>
                        <div class="container">
                            <?php echo "<div class='blueprint-image'  style='background-image: url(".$blueprintImage." )'></div>";?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php include( locate_template( 'template-parts/venue-reviews.php', false, false ) ); ?>
            <?php if($tour != ''){ ?>
                <?php get_template_part( 'template-parts/part', 'animated-venue-menu' ); ?>
            <?php } ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer(); ?>
