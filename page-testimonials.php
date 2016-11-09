<?php
/*
Template Name: Testimonials
*/

get_header(); 

//Get venue post types to list 

$args = array(
	'post_type' => 'testimonie',
	'posts_per_page' => 9,
	'meta_query' => array(
		array(
			'key'     => 'wpcf-testimonies-photo',
	        'value'   => array(''),
	        'compare' => 'NOT IN'
		)
	)
);
$testimonies = new WP_Query( $args );
$cont = 0;

?>
<script type="text/javascript">

jQuery( document ).ready(function() {
  // Handler for .ready() called.
	jQuery('[data-toggle="popover"]').popover({
		"html": true,
		"placement":"bottom"
	});
});
</script>
<div class="black-bar">
	<center><img width="90" height="90" src="<?php bloginfo('template_url'); ?>/img/logof&e.png" alt="Best Miami Weddings" class="img-responsive logo" /></center>
</div>
<div class="container">
	<div class="row stars-container">
		<div class="col-xs-12">
			<h1 class="stars-container-title">Work with the best, our reputation precede us </h1>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star" aria-hidden="true"></i>
			<i class="fa fa-star-half-o" aria-hidden="true"></i>
			<h3>Average 4.8 rating within all available review systems, <a tabindex="0" role="button" html="true" placement="botom" data-toggle="popover" data-trigger="focus" title="Review score" data-content="<span class='popoverText'>The aggregated rating  was compiled from multiple sources (WeddingWire, Facebook, Yelp, Google, etc.), including merchants, third party aggregators, editorial sites and users. Collected from more than 250 reviews total across all sources.</span> <ul class='review-source-icons'><li><img src='<?php bloginfo('template_url'); ?>/img/icons/weddingwire-icon.png'><img src='<?php bloginfo('template_url'); ?>/img/icons/facebook-icon.png'><img src='<?php bloginfo('template_url'); ?>/img/icons/yelp-icon.png'><img src='<?php bloginfo('template_url'); ?>/img/icons/knot-icon.png'><img src='<?php bloginfo('template_url'); ?>/img/icons/google-icon.png'><img src='<?php bloginfo('template_url'); ?>/img/icons/bbb-icon.png'></li></ul>">learn more.</a></h3>
		</div>
	</div>
	<div class="row">
	<?php foreach($testimonies->posts as $test){ 
	$tdescription = get_post_meta( $test->ID, 'wpcf-testimonies-testimonie', true);
	$tphoto = get_post_meta( $test->ID, 'wpcf-testimonies-photo', true);
	$tauthor = get_post_meta( $test->ID, 'wpcf-testimonies-author', true);
	$cont++;
	?>

	<?php if($cont % 3 == 0) { echo '<div class="row">'; } ?>
		<div class="col-xs-12 col-sm-4">
		<figure class="snip1204">
		  <blockquote><?php echo $tdescription; ?> </blockquote>
		  <div class="author">
		    <img src="<?php echo $tphoto; ?>" alt="sq-sample7"/>
		    <h5><?php echo $tauthor; ?></h5>
		    <!-- <span>LittleSnippets</span> -->
		  </div>
		</figure>
	</div>

	<?php if($cont % 3 == 0) { echo '</div>'; } ?>
	<?php } ?>
	</div>
</div>

<?php get_footer(); ?>