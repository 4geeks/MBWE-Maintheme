<?php
/*
Template Name: Gallery
*/
header('X-Frame-Options: GOFORIT');
get_header(); 

$gallery = get_post_gallery($_GET["post_id"],false);
//Get venue post types to list in dropdown list 
$args = array('post_type' => 'venue'); 
$venues = new WP_Query( $args );
$ids = explode( ",", $gallery['ids'] );
$post = get_post($_GET["post_id"]);

foreach( $ids as $id ) {
   $imgs[] = wp_get_attachment_image_src( $id ,'Medium');
} 

$name = get_post_meta( $_GET['post_id'], 'wpcf-venue-name', false)[0];
$mainImage = get_post_meta( $_GET['post_id'], 'wpcf-venue-main-image', false)[0];
$tour = (isset(get_post_meta( $_GET['post_id'], 'wpcf-venue-360-tour', false)[0])?get_post_meta( $_GET['post_id'], 'wpcf-venue-360-tour', false)[0]:null);    
$blueprint = (isset(get_post_meta( $_GET['post_id'], 'wpcf-venue-blueprint', false)[0])?get_post_meta( $_GET['post_id'], 'wpcf-venue-blueprint', false)[0]:null);    


?>
	<div id="div-blur-background">
        <img src="<?php echo $mainImage; ?>" id="img-fondo" data-adaptive-background='1'>
    </div>
    <div id="div-top-menu" class="row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            <div class="top-venue-menu not-for-phone">
                <ul class="ul-menu">
                    <?php echo "<li><a href='".get_home_url()."/venue/".$post->post_name."'>GENERAL INFO</a>"?>
                    <?php if ($blueprint != null)
                            echo "<li><a href='".get_home_url()."/venue/".$post->post_name."#div-venue-blueprint'>AREAS</a>"                        
                    ?>
                    <?php if ($tour != null){ ?>
                       <li><a id="a-360-tour" href="#animatedModal">360° Tour</a></li>
                    <?php } ?>
                    <?php echo "<li><a href='#'>GALLERY</a></li>";?>
                    <?php echo "<li><a href='".get_home_url()."/venue/".$post->post_name."#div-venue-location'>LOCATION</a>"?>
                </ul>
            </div>
        </div>
        <div id="menu-desplegable" class="col-md-4">
            <span class="col-md-11"><?php echo $name ?> &#8203; </span> <span id="icon-dropdown" class="glyphicon glyphicon-collapse-down"></span>
            <ul id="sub-menu" class="style-scroll-1 scrollbar">
            <?php
                //list all venues in post types
                foreach ($venues->posts as $venue) {
                    echo "<li style='background-image: url(". get_post_meta( $venue->ID, 'wpcf-venue-main-image', false)[0].")'><a class='with-font-title' href='".get_home_url()."/venue/".$venue->post_name."'>".$venue->post_title."</a></li>";
                }
            ?>
            </ul>
        </div>
    </div>
	<div id="primary" class="full-width-page no-sidebar">
		<main id="main">
			<div class="grid">
				<?php 

					foreach( $imgs as $img ) {
						echo "<div class='div-image' data-img=".$img[0]." data-width=".$img[1]." data-height=".$img[2].">
								
							</div>";
						echo "<a class='detail-image' data-img=".$img[0]." href='#imgAnimatedModal'> 
								
							</a>";
					}
				?>
			</div>
			<div id="animatedModal">
                <div class="col-md-12 modal-menu">
                    <div class="top-venue-menu">
                        <ul class="ul-menu">
	                        <?php echo "<li><a href='".get_home_url()."/venue/".$post->post_name."'>GENERAL INFO</a>"?>
			                <?php if ($blueprint != null)
                                echo "<li><a href='".get_home_url()."/venue/".$post->post_name."#div-venue-blueprint'>AREAS</a>"                        
                            ?>
                            <?php if ($tour != null){ ?>
                                <li><a id="a-360-tour" href="#animatedModal">360° Tour</a></li>
                            <?php } ?>
			                 <?php echo "<li><a href='".get_home_url()."/gallery/?post_id=".get_post()->ID."'>GALLERY</a></li>";?>
			                <?php echo "<li><a href='".get_home_url()."/venue/".$post->post_name."#div-venue-location'>LOCATION</a>"?>
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

			<div id="imgAnimatedModal">
                <div class="col-md-12 modal-menu">
                    <div class="top-venue-menu">
                        <ul class="ul-menu">
                            <?php echo "<li><a href='".get_home_url()."/venue/".$post->post_name."'>GENERAL INFO</a>"?>
                            <?php if ($blueprint != null)
                                echo "<li><a href='".get_home_url()."/venue/".$post->post_name."#div-venue-blueprint'>BLUEPRINT</a>"                        
                            ?>
                            <?php if ($tour != null){ ?>
	   		                      <li><a id="aa-360-tour" href="#">360° Tour</a></li>
                            <?php } ?>
			                <?php echo "<li><a href='".get_home_url()."/gallery/?post_id=".get_post()->ID."'>GALLERY</a></li>";?>
			                <?php echo "<li><a href='".get_home_url()."/venue/".$post->post_name."#div-venue-location'>LOCATION</a>"?>
                        </ul>
                    </div> 
                    <div class="close-imgAnimatedModal btn-close"> 
                        <span class="glyphicon glyphicon-remove" style="color:white"></span>
                    </div>                    
                </div>
                <div class="modal-content">
                   <div id='detail-modal-content'></div>
                </div>
            </div>
		</main>
	</div>