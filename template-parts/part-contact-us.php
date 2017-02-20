<div class="contact-us">
    <div class="col-md-12 contact-title highlight-p">
       <center><p>Responsiveness is one of our main values, <br /> we guaranty you a response in less than 10min</p></center>       
    </div>
    <!-- <div class="row"> -->
        <div class="col-md-5 col-xs-12 contact-call-us highlight-p">
            <p>Call us now!</p> 
            <a href="tel:<?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?>" class="with-font-sub-title tracking-phone-number"><?php echo $GLOBALS['BMW_PHONE_NUMBER']; ?></a>
        </div>
        <div class="col-md-7 col-xs-12 div-form-contact-us highlight-p">
        <?php 
            $gravityForm = null;
            
            if(isset($current_post_id) and $current_post_id!="" and $current_post_id>0) {
                $gravityForm = get_post_meta( $current_post_id, 'special_gravity_form', true );
                if(empty($gravityForm)) $gravityForm = get_post_meta( $current_post_id, 'wpcf-special_gravity_form', true );
            }

            if(!empty($gravityForm) and $gravityForm!="" and $gravityForm!=null) gravity_form( $gravityForm, false, false, false, '', false ); 
            else
                gravity_form( 3, false, false, false, '', false ); 

            ?>           
        </div>
    <!-- </div> -->
</div>