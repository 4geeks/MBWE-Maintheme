<?php

$venue = get_post();
$postId = $venue->ID;

$venuePermalink = "";
if(is_page('gallery')) $venuePermalink = get_post_permalink($venue->ID);
$blueprint = get_post_meta( $postId, 'wpcf-venue-blueprint', true);
$tour = get_post_meta( $postId, 'wpcf-venue-360-tour', false);
$weddingURL = get_post_meta( $postId, 'wpcf-venue-weddings', true);
?>
			<div class="top-venue-menu not-for-phone">
		        <ul class="ul-menu">
		            <li><a href="<?php echo $venuePermalink; ?>#primary"><?php _e( 'GENERAL INFO', 'bmw-website' ) ?></a></li>
		            <?php if($blueprint != ''){?>
		                <li><a href="<?php echo $venuePermalink; ?>#div-venue-blueprint"><?php _e( 'AREAS', 'bmw-website' ) ?></a></li>
		            <?php } ?>
		            <?php if($tour != ''){?>
		                <li><a id="a-360-tour" href="#animatedModal"><?php _e( '360° TOUR', 'bmw-website' ) ?></a></li>
		            <?php } ?>
		            <li><a href='<?php echo get_home_url()."/gallery/?post_id=".$postId."&is_event=false"; ?>'><?php _e( 'GALLERY', 'bmw-website' ) ?></a></li>
		            <li><a href="<?php echo $venuePermalink; ?>#div-venue-location"><?php _e( 'LOCATION', 'bmw-website' ) ?></a></li>
					<?php if($weddingURL and $weddingURL!=''){ ?>
		            <li><a href="<?php echo $weddingURL; ?>">Weddings</a></li>
					<?php } ?>
		        </ul>
		    </div>