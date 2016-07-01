<?php
/*
Template Name: Venue Event
*/
header('X-Frame-Options: GOFORIT');
global $BMW_PHONE_NUMBER;
get_header();


$post = get_post($_GET["post_id"]);

$primary_class = 'full-width-page no-sidebar';

$mainImage = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-main-image', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-main-image', false)[0] : null );



$name = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-name', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-name', false)[0] : null);
$mainVideo = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-main-video', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-main-video', false)[0] : null);
$direction = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-direction', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-direction', false)[0] : null);
$generalInfo = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-general-info', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-general-info', false)[0] : null);
$maxCapacity=  ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-max-capacity', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-max-capacity', false)[0] : null);
$curfew = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-curfew', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-curfew', false)[0] : null);
$location = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-location', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-location', false)[0] : null);
$parking = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-parking', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-parking', false)[0] : null);
$transportation = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-transportation', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-transportation', false)[0] : null);
$blueprint = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-blueprint', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-blueprint', false)[0] : null);
$blueprintImage = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-blueprint-image', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-blueprint-image', false)[0] : null);

$latitude = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-latitude', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-latitude', false)[0] : null);

$longitude = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-longitude', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-longitude', false)[0] : null);
$tour = ( (get_post_meta( $_GET['post_id'], 'wpcf-venue-360-tour', false)) ? get_post_meta( $_GET['post_id'], 'wpcf-venue-360-tour', false)[0] : null);

$childargs = array(
    'post_type' => 'acommodation',
    'numberposts' => -1,
    'meta_key' => 'wpcf-description',
    'orderby' => 'meta_value',
    'order' => 'ASC',
    'meta_query' => array(array('key' => '_wpcf_belongs_venue_id', 'value' => get_the_ID()))
);

$child_posts = get_posts($childargs);

$post = get_post();


//Get venue post types to list in dropdown list 
$args = array('post_type' => 'venue'); 
$venues = new WP_Query( $args );

?>  
    <div id="div-blur-background">
        <img src="<?php echo $mainImage; ?>" id="img-fondo" data-adaptive-background='1'>
    </div>
    <div id="div-top-menu" class="row">    
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <div class="top-venue-menu not-for-phone">
                <ul class="ul-menu">
                    <li><a href="#primary">GENERAL INFO</a></li>
                    <?php if($blueprint != ''){?>
                        <li><a href="#div-venue-blueprint">AREAS</a></li>
                    <?php } ?>
                    <?php if($tour != ''){?>
                        <li><a id="a-360-tour" href="#animatedModal">360° TOUR</a></li>
                    <?php } ?>
                    <?php echo "<li><a href='".get_home_url()."/gallery-event/?post_id=".get_post()->ID."'>GALLERY</a></li>";?>
                    <li><a href="#div-venue-location">LOCATION</a></li>
                </ul>
            </div>
        </div>
        <div id="menu-desplegable" class="col-md-4">
            <span class="col-md-11"><?php echo $name ?> &#8203; </span> <span id="icon-dropdown" class="glyphicon glyphicon-collapse-down"></span>
            <ul id="sub-menu" class="style-scroll-1 scrollbar">
            <?php
                //list all venues in post types
                foreach ($venues->posts as $venue) {
                    if (get_post()->ID != $venue->ID) { 
                        echo "<li style='background-image: url(". get_post_meta( $venue->ID, 'wpcf-venue-main-image', false)[0].")'><a class='with-font-sub-title' href='".get_home_url()."/venue-event/?post_id=".$venue->ID."'>".$venue->post_title."</a></li>";
                    }
                }
            ?>
            </ul>
        </div>
    </div>
    <div id="primary" class="<?php echo $primary_class; ?>">
        <main id="main">
            <div id='div-venue-image'>                
                <div class="fullscreen-bg">  
                    <div id="div-only-for-mobile" class="fullscreen-bg__video not-for-pc" style="background-image: url(<?php echo $mainImage; ?>); "></div>                  
                    <video id="videoVenue" loop="" muted="" autoplay="" class="fullscreen-bg__video" style="background-image: url(<?php echo $mainImage; ?>); background-size: cover; background-position: center center;">
                        <source src="<?php echo $mainVideo; ?>">
                    </video>
                </div>            
                <div id="div-venue-name">
                    <h1 class="with-font-sub-title" ><?php  echo $name;?></h1> <br />
                    <span id="direction" > <p><?php echo $direction ?> </p></span>
                </div>
                <div id="div-venue-button">
                    <a class="btn btn-warning modalContact" href="#animatedModalContact">Request a quote</a>                    
                    <p class="highlight-p">or call now! <?php echo $BMW_PHONE_NUMBER; ?></p>
                </div>
                <div id="arrow-down" class="not-for-mobile"><span class="glyphicon glyphicon-chevron-down"></span></div>     
            </div>

            <div id="div-venue-description" class="row">                
                <div class="col-md-7 col-sm-7 container"><p><?php echo $generalInfo ?></p></div>
                <div class="col-md-5 col-sm-5 container">
                    <div class="col-md-1 col-xs-1">
                        <span class="important glyphicon glyphicon-user"></span>
                    </div>
                    <div class="col-md-11 col-xs-10"><p><?php echo $maxCapacity ?> people capacity</p></div>

                    <div class="col-md-1 col-xs-1 margin-top20">
                        <span class="important glyphicon glyphicon-time"></span>
                    </div>
                    <div class="col-md-11 col-xs-10 margin-top20"><p>The event must end by <?php echo $curfew ?></p></div>
                </div>
            </div>
            <div id="div-venue-location" class="row">
                <div class="col-md-6">
                    <div id="div-venue-maps">
                        
                    </div>                
                </div>
                <div class="col-md-6 p-location" >
                    <h2 class="with-font-sub-title">Location</h2>
                    <div>
                        <p><?php echo $location ?></p>
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
                        <h2>Acommodations</h2>
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
                            <h2>Parking</h2>
                            <?php echo $parking ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4" id="div-venue-transportation">
                        <div>
                            <h2>Transportation</h2>
                            <?php echo $transportation ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($blueprint != ''){ ?>
                <div id="div-venue-blueprint" class="row">
                    <div class="p-location">
                        <h1>Areas and distribution</h1>
                        <?php echo $blueprint ?>
                    </div>
                    <?php if($blueprintImage != '') {?>
                        <div class="container">
                            <?php echo "<div class='blueprint-image'  style='background-image: url(".$blueprintImage." )'></div>";?>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if($tour != ''){ ?>
                <div id="animatedModal">
                    <div class="col-md-12 modal-menu">
                        <div class="top-venue-menu">
                            <ul class="ul-menu">
                                <li><a class="close-animatedModal" href="#primary">GENERAL INFO</a></li>
                                <?php if($blueprint != ''){?>
                                    <li><a class="close-animatedModal" href="#div-venue-blueprint">AREAS</a></li>
                                <?php } ?>
                                <?php echo "<li><a href='".get_home_url()."/gallery-event/?post_id=".get_post()->ID."'>GALLERY</a></li>";?>
                                <li><a class="close-animatedModal" href="#div-venue-location">LOCATION</a></li>
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

