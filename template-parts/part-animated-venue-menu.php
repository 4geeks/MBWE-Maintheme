<?php
$postId = get_post()->ID;
$blueprint = get_post_meta( $postId, 'wpcf-venue-blueprint', true);
$tour = get_post_meta( $postId, 'wpcf-venue-360-tour', true);
$weddings = get_post_meta( $postId, 'wpcf-venue-weddings', true);
?>
				<div id="animatedModal">
                    <div class="col-md-12 modal-menu">
                        <div class="top-venue-menu">
                            <div class="close-animatedModal btn-close"> 
                                <span class="glyphicon glyphicon-remove" style="color:white"></span>
                                CLOSE TOUR
                            </div>
                        </div>
                    </div>
                    <div class="modal-content">
                        <?php echo "<iframe src=".$tour." width='100%' height='100%'></iframe>"; ?>
                    </div>
                </div>