<?php
$postId = get_post()->ID;
$blueprint = get_post_meta( $postId, 'wpcf-venue-blueprint', true);
$tour = get_post_meta( $postId, 'wpcf-venue-360-tour', false);
?>
			<div class="top-venue-menu not-for-phone">
		        <ul class="ul-menu">
		            <li><a href="#primary"><?php _e( 'GENERAL INFO', 'bmw-website' ) ?></a></li>
		            <?php if($blueprint != ''){?>
		                <li><a href="#div-venue-blueprint"><?php _e( 'AREAS', 'bmw-website' ) ?></a></li>
		            <?php } ?>
		            <?php if($tour != ''){?>
		                <li><a id="a-360-tour" href="#animatedModal"><?php _e( '360° TOUR', 'bmw-website' ) ?></a></li>
		            <?php } ?>
		            <li><a href='<?php echo get_home_url()."/gallery/?post_id=".$postId."&is_event=false"; ?>'><?php _e( 'GALLERY', 'bmw-website' ) ?></a></li>
		            <li><a href="#div-venue-location"><?php _e( 'LOCATION', 'bmw-website' ) ?></a></li>
		        </ul>
		    </div>