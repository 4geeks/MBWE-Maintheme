<?php
/*
Template Name: About Us
*/

get_header(); 

$mainImage = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
$customPosts = get_post_meta($post->ID);

$args = array('post_type' => 'team');
$teams = new WP_Query( $args );

$args = array('post_type' => 'partner');
$partners = new WP_Query( $args );
$content = get_page($post->ID)->post_content;

?>

 <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
	<div id="primary" class="full-width-page no-sidebar">
		<main id="main">
            <?php echo $content; ?>
            <div id="section-story">
                <div id="div-logo" class="col-md-12">
					<center><img id="logo-header" width="200" height="200" src="<?php bloginfo('template_url'); ?>/img/logof&e.png" alt="Best Miami Weddings" class="img-responsive logo" /></center>
				</div>
				<div id="div-story" class="container">
					<div class="col-md-6 col-md-offset-3">
						<p><?php echo $customPosts['Story'][0]; ?>	</p>					
					</div>
					<div class="col-md-3"></div>
				</div>
            </div>

            <div id="our-team" class="row">
                
				<center><h1>Our Team</h1></center>
				<?php foreach ($teams->posts as $team) {?>    
					<div class="item-our-team col-md-3 col-xs-3 highlight-element" style="background-image: url('<?php echo get_post_meta( $team->ID, 'wpcf-teams-image', false)[0]; ?>')">	
						<input type="hidden" class="imgNormal" value="<?php echo get_post_meta( $team->ID, 'wpcf-teams-image', false)[0]; ?>" />
						<input type="hidden" class="imgFun" value="<?php echo get_post_meta( $team->ID, 'wpcf-teams-fun-image', false)[0]; ?>" />
						<div class="item-our-team-info text highlight-p">
							<h2><?php echo get_post_meta( $team->ID, 'wpcf-teams-full-name', false)[0]; ?></h2>
							<p><?php echo get_post_meta( $team->ID, 'wpcf-teams-role', false)[0]; ?></p>
						</div>
					</div>                    
                    
               	<?php }?>				
            </div>
			<div class="blue-background"><h2>What our clients say about Fetes & Events</h2></div>
			<?php get_template_part( 'template-parts/part', 'testimonies' ); ?>
            <div id="our-partners" class="row">               

				<center><h1>Some of our partners</h1></center>				
				<div id="" class="container">
					<?php foreach ($partners->posts as $partner) {?>    
						<div class="item-partner col-md-2 col-xs-5 col-xs-offset-1 col-sm-5 col-sm-offset-1" style="background-image: url('<?php echo get_post_meta( $partner->ID, 'wpcf-partner-image', false)[0]; ?>')">
						</div>                   
                    
               		<?php }?>
				</div>

            </div>


        </main>
	</div> 

<?php get_footer(); ?>