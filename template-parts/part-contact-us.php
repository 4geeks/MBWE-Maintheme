<div class="contact-us">
    <div class="col-xs-offset-1 col-xs-6 col-md-5 contact-title visible-sm">
           <center>
                <img class="navbar-logo" src="<?php bloginfo('template_url'); ?>/img/logo_bmw_new.png" />
                <h3><?php _e( 'Responsiveness is one of our main values, <br /> we guarantee you a response in less than 10min', 'bmw-website' ) ?></h3>
           </center>         
    </div>
    <!-- <div class="row"> -->
        <div class="col-md-4 col-xs-12 contact-call-us center-text">
            <center class='visible-md visible-lg'>
                <img class="navbar-logo" src="<?php bloginfo('template_url'); ?>/img/logo_bmw_new.png" />
            </center> 
            <p>Call us now!</p> 
            <a href="tel:<?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?>" class="with-font-sub-title tracking-phone-number"><?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?></a>
        </div>
        <div class="col-md-8 col-md-offset-0 col-xs-10 col-xs-offset-1 div-form-contact-us highlight-p">
        <?php 
            $gravityForm = null;
            
            if(isset($current_post_id) and $current_post_id!="" and $current_post_id>0) {
                $gravityForm = get_post_meta( $current_post_id, 'special_gravity_form', true );
                if(empty($gravityForm)) $gravityForm = get_post_meta( $current_post_id, 'wpcf-special_gravity_form', true );
            }

            if(!empty($gravityForm) and $gravityForm!="" and $gravityForm!=null) gravity_form( $gravityForm, false, false, false, '', true ); 
            else
                gravity_form( 'Default contact form', false, false, false, '', true ); 

            ?>           
        </div>
    <!-- </div> -->
</div>