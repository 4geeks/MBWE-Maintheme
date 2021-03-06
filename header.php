<?php 
header("Access-Control-Allow-Origin: *");  
?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?></title>
	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>	

</head>

<?php 
$blueprint = types_render_field("venue-blueprint");
$blueprintImage = types_render_field("venue-blueprint-image",array("url" => "true"));
$tour = types_render_field("venue-360-tour");
$weddings = types_render_field("venue-weddings",array("output" => "raw"));
$f = $GLOBALS['BMW_PHONE_NUMBER'];

?>

<body <?php body_class(); ?> onload="_googWcmGet('tracking-phone-number', '<?php echo $f ?>')">
<?php
	set_query_var('current_post_id', get_the_ID());
?>
	<div class="blackspace-bar"></div>
	<!-- wrapper -->
	<div class="wrapper" class="for-phone">
		<nav id="my-sidebar">
			<div id="div-menu-logo">
				<a href="<?php echo home_url(); ?>">
					<img id="logo-header" width="240" height="auto" src="<?php bloginfo('template_url'); ?>/img/logof&e.png" alt="Best Miami Weddings" class="img-responsive logo" />
				</a>			
			</div>
			<div id="div-menu-button">
				<a class="btn btn-warning modalContact" href="#animatedModalContact">Get an instant a quote</a>
			</div>
			<div class="scroll">
				<div class="min-height">
						<?php if (is_singular('venue') || is_page("gallery")) { ?>
						<div>
							<ul>
								<li><a href="#primary">VENUE INFO</a></li>
								<li><a href="#div-venue-location">VENUE LOCATION</a></li>
								<?php if($blueprint != ''){?>
								<li><a href="#div-venue-blueprint">VENUE BLUEPRINT</a></li>
								<?php } ?>
								<?php echo "<li><a href='".get_home_url()."/gallery/?post_id=".get_post()->ID."'>VENUE PHOTOS</a></li>";?>
			                    <?php if($weddings != ''){?>
			                        <li><a href="<?php echo $weddings; ?>">VENUE WEDDINGS</a></li>
			                    <?php } ?>
							</ul>
						</div>	
						<?php } ?>
					<?php wp_nav_menu( array(
						'menu' => 'hamburger')); 
						?>	
					</div>	
					<div class="social">
						<div class="social-icon instagram">
							<a href="https://www.instagram.com/bestmiamiweddings/" target="_blank"><i class="fa fa-instagram"></i></a>
						</div>
						<div class="social-icon twitter">
							<a href="https://twitter.com/bestmiaweddings" target="_blank"><i class="fa fa-twitter"></i></a>
						</div>
						<div class="social-icon facebook">
							<a href="https://www.facebook.com/BestMiamiWeddings/" target="_blank"><i class="fa fa-facebook"></i></a>
						</div>
						<div class="social-icon youtube">
							<a href="https://www.youtube.com/channel/UCgv-DOYllKT1ihDbKli8NzQ" target="_blank"><i class="fa fa-youtube"></i></a>
						</div>
						<div class="social-icon pinterest">
							<a href="https://www.pinterest.com/bestmiaweddings/" target="_blank"><i class="fa fa-pinterest"></i></a>
						</div>						
					</div>
				</div>
			</nav>

			<header class="header clear for-phone" role="banner">
				<div id="my-sidebar-toggle">	        						
					<i class="fa fa-navicon"></i> <span>Menu</span>			
				</div>
				<?php if (!is_front_page() and !is_singular('church') and !is_singular('venue') and !is_page('venue-event') and !is_page('gallery-event') and !is_page('gallery')){ ?>
					<p id="phone-number-header" class="not-for-mobile"><i class="fa fa-phone" aria-hidden="true"></i> <span class="tracking-phone-number"><?php echo $f; ?></span></p>
				<?php } ?>
			</header>
		    <div id="animatedModalContact" style="display:none">
                <div class="col-md-12 modal-contact-menu">                                             
                    <div class="close-animatedModalContact btn-close"> 
                        <span class="glyphicon glyphicon-remove" style="color:white"></span>
                    </div>                    
                </div>
                <div class="modal-content">                    
		    		<!-- ========== CONTACT US PART ========== -->
        			<?php //include( locate_template( 'template-parts/contact-us.php', false, false ) ); ?>
        			<?php get_template_part( 'template-parts/part', 'contact-us' ); ?>
            		<!-- ========== CONTACT US PART ========== -->
                </div>
            </div>
			<!-- header -->
			<!-- /header -->
