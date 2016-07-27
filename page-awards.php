<?php
/*
Template Name: Awards
*/

get_header(); 

$content = get_page($post->ID)->post_content;

$args = array('post_type' => 'award','posts_per_page'=>-1);
$awards = new WP_Query( $args );

?>

<!-- ========== MENU TOP ========== -->
<?php get_template_part( 'template-parts/menu', 'top' ); ?>
    
<div id="div-top-menu-background-awards"></div>
<?php echo $content; ?>

<div id="div-carousel" class="row">
	<?php foreach ($awards->posts as $award) {		
		 if (get_post_meta( $award->ID, 'wpcf-awards-type')[0] == '2'){
		?>
	<div class="col-md-3 col-xs-6 div-news">
		<p>
			"<?php echo get_post_meta( $award->ID, 'wpcf-awards-description')[0]; ?>"
		</p>
		<span>
			<?php echo get_post_meta( $award->ID, 'wpcf-awards-name')[0]; ?>, 2016
		</span>
	</div>	
	<?php }	                
    }?>	
</div>
<div id="awards" class="row">
	<?php foreach ($awards->posts as $award) {		
		 if (get_post_meta( $award->ID, 'wpcf-awards-type')[0] == '1'){
		?>
		<div class="col-md-12 award">
			<div class="col-md-2 aw-img" style="background-image: url('<?php echo get_post_meta( $award->ID, 'wpcf-awards-image', false)[0]; ?>')">
			<span class="pluss-icon">+</span>
			</div>
			<div class="col-md-10">
				<p class="col-md-12 title with-subtitle">
					<span><?php echo get_post_meta( $award->ID, 'wpcf-awards-name')[0]; ?> - 2016</span>
				</p>
				<p class="col-md-12 title">
					<span><?php echo get_post_meta( $award->ID, 'wpcf-awards-description')[0]; ?></span>
				</p>
			</div>
		</div>  
    	<?php }	                
    	}?>	
</div>

<div id="div-other" class="row">
	<center><span>Other Awards</span></center>
	<?php foreach ($awards->posts as $award) {		
		 if (get_post_meta( $award->ID, 'wpcf-awards-type')[0] == '3'){
		?>
	<div class="col-md-12">
		<p class="title with-subtitle"><span><?php echo get_post_meta( $award->ID, 'wpcf-awards-name')[0]; ?></span></p>
		<p class="content"><span><?php echo get_post_meta( $award->ID, 'wpcf-awards-description')[0]; ?></span></p>
	</div>	
	<?php }	                
    }?>	
</div>
<?php get_footer(); ?>