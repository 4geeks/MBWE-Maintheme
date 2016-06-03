<?php
/**
 * The template for displaying all single posts.
 *
 * @package Tesseract
 */

get_header(); ?>

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

$post = get_post();

$isClubOfKnigth = ($post->post_name == 'club-of-knight');

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
                    <?php echo "<li><a href='".get_home_url()."/gallery/?post_id=".get_post()->ID."'>GALLERY</a></li>";?>
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
                        echo "<li style='background-image: url(". get_post_meta( $venue->ID, 'wpcf-venue-main-image', false)[0].")'><a class='with-font-sub-title' href='".get_home_url()."/venue/".$venue->post_name."'>".$venue->post_title."</a></li>";
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
                    <video id="videoVenue" loop="" muted="" autoplay="" class="fullscreen-bg__video" poster="<?php echo $mainImage; ?>">
                        <source src="<?php echo $mainVideo; ?>">
                    </video>
                </div>            
                <div id="div-venue-name">
                    <span class="with-font-sub-title" <?php echo ($isClubOfKnigth? " style='font-size:90px;' ":'') ?>><?php  echo $name;?></span> <br />
                    <span id="direction" <?php echo ($isClubOfKnigth? " style='top:25px'; ":'') ?> > <?php echo $direction ?></span>
                </div>
                <div id="div-venue-button">
                   <button class="btn btn-warning btn-lg">Request a quote</button>
                   <p class="highlight-p">or call now! 305-985-4663</p>
                </div>
                <div id="arrow-down"><span class="glyphicon glyphicon-chevron-down"></span></div>     
            </div>

            <div id="div-venue-description">                
                <div class="col-md-8 container"><?php echo $generalInfo ?></div>
                <div class="col-md-4 container">
                    <div class="col-md-1">
                        <span class="important glyphicon glyphicon-user"></span>
                    </div>
                    <div class="col-md-5"><?php echo $maxCapacity ?> people capacity</div>

                    <div class="col-md-1">
                        <span class="important glyphicon glyphicon-time"></span>
                    </div>
                    <div class="col-md-5">The event must end by <?php echo $curfew ?> </div>
                </div>
            </div>
            <div id="div-venue-location" class="row">
                <div class="col-md-6">
                    <div id="div-venue-maps">
                        
                    </div>                
                </div>
                <div id="p-location" class="col-md-6" >
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
                                        echo "<div class='col-md-3 image-acommodation' style='background-image: url(".$child_post->fields['thumbnail']."')> </div>";

                                        echo "<div class='col-md-9 name-acommodation'>".
                                                $child_post->fields['name_nerby']."<br>".
                                                $child_post->fields['direction_acommodation'].
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
                            <p><?php echo $parking ?></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4" id="div-venue-transportation">
                        <div>
                            <h2>Transportation</h2>
                            <p><?php echo $transportation ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <?php if($blueprint != ''){ ?>
                <div id="div-venue-blueprint" class="row">
                    <div class="container">
                        <h3 class="with-font-sub-title">Areas and distribution</h3>
                        <p> <?php echo $blueprint?> </p>
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
                                <?php echo "<li><a href='".get_home_url()."/gallery/?post_id=".get_post()->ID."'>GALLERY</a></li>";?>
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
<?php get_footer(); ?>
