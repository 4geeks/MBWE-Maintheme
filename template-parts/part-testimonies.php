<?php 
$args = array('post_type' => 'testimonie');
$testimonies = new WP_Query( $args );

$customTestimonies = [];
foreach ($testimonies->posts as $testimonie) {
    $customTestimonie = get_post_meta( $testimonie->ID);
    if ($customTestimonie['_wpcf_belongs_page_id'][0] == get_the_ID()){
        if (count($testimonies) > 2){
            if ($customTestimonie['_wpcf-testimonies-outstandin'][0] == 1)
                $customTestimonies[] = $customTestimonie;
        }else{
            $customTestimonies[] = $customTestimonie;
        }
    }
}?>

<div id="testimonies" class="container">
    <div class="container">
        <?php foreach ($customTestimonies as $ct) {?>
            <div class="col-md-6 item-testimonie">
                <?php if (isset($ct['wpcf-testimonies-photo'][0])){ ?>
                    <div class="col-md-12">
                        <div class="img-avatar" style="background-image:url('<?php echo $ct['wpcf-testimonies-photo'][0] ?>');"></div>
                    </div>
               <?php } ?>
                <div class="col-md-12">
                    <p class="p-testimonie"><?php echo $ct['wpcf-testimonies-testimonie'][0]; ?></p>
                    <p class="p-testimonie"><?php echo $ct['wpcf-testimonies-author'][0]?></p>
                </div>
            </div>                    
        <?php } ?>                    
    </div>
</div>