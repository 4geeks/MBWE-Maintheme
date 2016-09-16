<?php 

$testimonies = types_child_posts('testimonie');

?>

<?php if(count($testimonies)==0) { ?>                   
<div id="testimonies" class="container">
    <div class="row">
        <div class="col-md-12">
            <h2>Some client's testimonies</h2>
        </div>
    </div>
    <div class="row">
        <?php foreach ($testimonies as $t) { ?>
            <div class="col-md-6 item-testimonie">
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
</div>
<?php } ?> 