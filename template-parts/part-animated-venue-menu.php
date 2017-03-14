<?php
$postId = get_post()->ID;
$blueprint = get_post_meta( $postId, 'wpcf-venue-blueprint', true);
$tour = get_post_meta( $postId, 'wpcf-venue-360-tour', true);
$weddings = get_post_meta( $postId, 'wpcf-venue-weddings', true);
?>
				<div id="animatedModal">
                    <div class="col-md-12 modal-menu">
                        <div class="top-venue-menu">
                            <ul class="ul-menu">
                                <li><a class="close-animatedModal" href="#primary"><?php _e( 'INFO & LOCATION', 'bmw-website' ) ?></a></li>
                                <?php if($blueprint != ''){?>
                                    <li><a class="close-animatedModal" href="#div-venue-blueprint"><?php _e( 'AREAS', 'bmw-website' ) ?></a></li>
                                <?php } ?>
                                <?php echo "<li><a href='".get_home_url()."/gallery/?post_id=".get_post()->ID."'>PHOTOS</a></li>";?>
                                <?php if($weddings != ''){?>
                                    <li><a href="<?php echo $weddings; ?>" target="_blank"><?php _e( 'WEDDINGS', 'bmw-website' ) ?></a></li>
                                <?php } ?>
                            </ul>
                            <div class="close-animatedModal btn-close"> 
                                <span class="glyphicon glyphicon-remove" style="color:white"></span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-content">
                        <?php echo "<iframe src=".$tour." width='100%' height='100%'></iframe>"; ?>
                    </div>
                </div>