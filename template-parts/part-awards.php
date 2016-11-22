<?php
$args = array(
	'post_type' => 'award',
	'posts_per_page' => 8,
	'meta_query' => array(
		array(
			'key'     => 'wpcf-award-visibility',
			'value'   => 'featured'
		),
	)
);
$awards = new WP_Query( $args );
?>
<section class="awards-template">
	<h2>Awards and Recognition</h2>
	<p>Best Miami Weddings is proud to be recognized<br /> by some of the most important and influential publications <br />and organizations around the world. </p>
	<ul class="list-unstyled list-inline">
	<?php foreach ($awards->posts as $award) {		
		 if ($award->ID and get_post_meta( $award->ID, 'wpcf-awards-type',true) == '1'){
		?>
		<li>
			<img src="<?php echo get_post_meta( $award->ID, 'wpcf-awards-image', true); ?>">
		</li>  
    	<?php }	                
    	}?>	
	</ul>
	<a href="<?php echo get_home_url(); ?>/press-awards"><small>Click here to learn more about our awards.</small></a>
</section>