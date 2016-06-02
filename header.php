<?php header("Access-Control-Allow-Origin: *");  ?>
<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

	<link href="//www.google-analytics.com" rel="dns-prefetch">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/favicon.ico" rel="shortcut icon">
	<link href="<?php echo get_template_directory_uri(); ?>/img/icons/touch.png" rel="apple-touch-icon-precomposed">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php bloginfo('description'); ?>">

	<?php wp_head(); ?>	

	<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
        	assets: '<?php echo get_template_directory_uri(); ?>',
        	tests: {}
        });
    </script>

</head>

<?php 
$blueprint = types_render_field("venue-blueprint");
$blueprintImage = types_render_field("venue-blueprint-image",array("url" => "true"));
$tour = types_render_field("venue-360-tour");

?>

<body <?php body_class(); ?>>
	<!-- wrapper -->
	<div class="wrapper">
		<nav id="my-sidebar">
			<div id="div-menu-logo">
				<a href="<?php echo home_url(); ?>">
					<img id="logo-header" width="240" height="auto" src="<?php bloginfo('template_url'); ?>/img/logof&e.png" alt="Best Miami Weddings" class="img-responsive logo" />
				</a>			
			</div>
			<div id="div-menu-button">
				<button class="btn btn-info">Request a quote</button>
			</div>
			<div class="scroll">
				<div class="min-height">
					<?php wp_nav_menu( array(
						'menu' => 'hamburger')); 
						?>	
						<div class="for-phone">
							<ul>
								<li><a href="#primary">GENERAL INFO</a></li>
								<?php if($blueprint != ''){?>
								<li><a href="#div-venue-blueprint">BLUEPRINT</a></li>
								<?php } ?>
								<?php echo "<li><a href='".get_home_url()."/gallery/?post_id=".get_post()->ID."'>GALLERY</a></li>";?>
								<li><a href="#div-venue-location">LOCATION</a></li>
							</ul>
						</div>	
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
							<a href="http://www.pinterest.com/" target="_blank"><i class="fa fa-pinterest"></i></a>
						</div>
						<span class="copyright">Social Networks <?php //echo get_option('4gacademy_op-company_name', 'Company LLC'); ?></span>        
					</div>
				</div>
			</nav>
			<header class="header clear" role="banner">
				<div id="my-sidebar-toggle">	        						
					<i class="fa fa-navicon"></i> <span>Menu</span>									
				</div>
			</header>

			<?php if (is_front_page()){ ?>
				<div class="menu-small">
			      <div class="row">  
			        <div class="col-md-12">
			          <div class="bmwe-menu">
						<?php wp_nav_menu(array('menu' => 'sub-menu', 'menu_class' => 'ul-menu')); ?>
					</div>
			        </div>
			      </div>    
			    </div>
		    <?php } ?>
			<!-- header -->
			<!-- /header -->
