<?php
/*
Template Name: Gallery
*/
header('X-Frame-Options: GOFORIT');
get_header(); 

$gallery = get_post_gallery($_GET["post_id"],false);
$post = get_post($_GET["post_id"]);

//Get venue post types to list in dropdown list 
$postType = $post->post_type;


$args = array(
    'post_type' => $postType,
    'meta_query' => array(
        array(
            'key' => 'wpcf-venue-visibility',
            'value' => array('1','2'),
            'compare' => 'IN'
        )
    ),
    'posts_per_page'=>-1
    ); 
$venues = new WP_Query( $args );



$ids = explode( ",", $gallery['ids'] );

foreach( $ids as $id ) {

    $newImg = array(
        'id' => $id, 
        'thumbnail' => wp_get_attachment_image_src( $id ,'large'), 
        'default' => wp_get_attachment_image_src( $id, 'full'), 
        );
    $imgs[] = $newImg;
} 

$name = get_post_meta( $_GET['post_id'], 'wpcf-venue-name', false)[0];
$mainImage = get_post_meta( $_GET['post_id'], 'wpcf-venue-main-image', false)[0];
$tour = (isset(get_post_meta( $_GET['post_id'], 'wpcf-venue-360-tour', false)[0])?get_post_meta( $_GET['post_id'], 'wpcf-venue-360-tour', false)[0]:null);    
$blueprint = (isset(get_post_meta( $_GET['post_id'], 'wpcf-venue-blueprint', false)[0])?get_post_meta( $_GET['post_id'], 'wpcf-venue-blueprint', false)[0]:null);    
$weddings = (isset(get_post_meta( $_GET['post_id'], 'venue-weddings', false)[0])?get_post_meta( $_GET['post_id'], 'venue-weddings', false)[0]:null);    


?>
	<div id="div-blur-background">
        <img src="<?php echo $mainImage; ?>" id="img-fondo" data-adaptive-background='1'>
    </div>
    <div id="div-top-menu" class="row" style="background: #474747;">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <div class="top-venue-menu not-for-phone">
                <ul class="ul-menu">
                    <?php echo "<li><a href='".get_home_url()."/".$postType."/".$post->post_name."'>INFO & LOCATION</a>"?>
                    <?php if ($blueprint != null)
                            echo "<li><a href='".get_home_url()."/".$postType."/".$post->post_name."#div-venue-blueprint'>AREAS</a>"                        
                    ?>
                    <?php if ($tour != null){ ?>
                       <li><a id="a-360-tour" href="#animatedModal">360° TOUR</a></li>
                    <?php } ?>
                    <?php echo "<li><a href='#'>PHOTO GALLERY</a></li>";?>
                    <?php if($weddings != ''){?>
                        <li><a href="<?php echo $weddings; ?>" target="_blank">WEDDINGS</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div id="menu-desplegable" class="col-md-4">
            <span class="col-md-11"><?php echo $name ?> &#8203; </span> <span id="icon-dropdown" class="glyphicon glyphicon-collapse-down"></span>
            <ul id="sub-menu" class="style-scroll-1 scrollbar">
            <?php
                //list all venues in post types
                foreach ($venues->posts as $venue) {
                    echo "<li style='background-image: url(". get_post_meta( $venue->ID, 'wpcf-venue-main-image', false)[0].")'><a class='with-font-title' href='".get_home_url()."/".$postType."/".$venue->post_name."'>".$venue->post_title."</a></li>";
                }
            ?>
            </ul>
        </div>
    </div>
	<div id="primary" class="full-width-page no-sidebar">
		<main id="main">
			<div class="grid" id="venuegallery">
				<?php 

					foreach( $imgs as $img ) {
						echo "<div class='div-image' data-imgid='".$img['id']."' data-src='".$img['default'][0]."' data-img='".$img['thumbnail'][0]."' data-width='".$img['thumbnail'][1]."' data-height='".$img['thumbnail'][2]."'>";
                            echo "<img style='display:none;' src='".$img['thumbnail'][0]."' />";
                        echo "</div>";
					}
				?>
			</div>
			<div id="animatedModal">
                <div class="col-md-12 modal-menu">
                    <div class="top-venue-menu">
                        <ul class="ul-menu">
	                        <?php echo "<li><a href='".get_home_url()."/".$postType."/".$post->post_name."'>GENERAL INFO</a>"?>
			                <?php if ($blueprint != null)
                                echo "<li><a href='".get_home_url()."/".$postType."/".$post->post_name."#div-venue-blueprint'>AREAS</a>"                        
                            ?>
                            <?php if ($tour != null){ ?>
                                <li><a id="a-360-tour" href="#animatedModal">360° Tour</a></li>
                            <?php } ?>
			                 <?php echo "<li><a href='".get_home_url()."/gallery/?post_id=".get_post()->ID."'>PHOTO GALLERY</a></li>";?>
			                <?php echo "<li><a href='".get_home_url()."/".$postType."/".$post->post_name."#div-venue-location'>LOCATION</a>"?>
                        </ul>
                    </div>
                    <div class="close-animatedModal btn-close"> 
                        <span class="glyphicon glyphicon-remove" style="color:white"></span>
                    </div>                    
                </div>
                <div class="modal-content">
                    <?php 
                        if ($tour != null){
                            echo "<iframe src=".$tour." width='100%' height='100%'></iframe>"; 
                        }
                        ?>
                </div>
            </div>

		</main>
	</div>