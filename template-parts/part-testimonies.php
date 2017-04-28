<?php 

$testimonies = types_child_posts('testimonie');
 
?>
<?php if(count($testimonies)>0) { ?>                   
<div id="testimonies" class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Client's Testimonials</h2>
        </div>
    </div>
    <div class="row">
        <?php foreach ($testimonies as $t) { ?>
                <?php if(count($testimonies)==1) { ?> 
                    <div class="col-sm-offset-1 col-sm-10 col-md-offset-2 col-md-8  col-lg-offset-3 col-lg-6 item-testimonie">                
                <?php } else { ?>
                    <div class="col-md-6 item-testimonie">
                <?php } ?>
                        <?php if (isset($t->fields['testimonies-photo']) and $t->fields['testimonies-photo']!=''){ ?>
                            <div class="img-avatar" style="background-image:url('<?php echo $t->fields['testimonies-photo']; ?>');"></div>
                        <?php } ?>
                        <div class="p-testimonie">
                            <p><?php echo $t->fields['testimonies-testimonie']; ?></p>
                            <p><?php echo $t->fields['testimonies-author']; ?></p>
                        </div>
                </div>                    
        <?php } ?> 
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <small>Read more testimonials by <a href="<?php echo get_home_url().'/testimonials' ?>">clicking here.</a></small>
        </div>
    </div>
</div>
<?php } ?> 