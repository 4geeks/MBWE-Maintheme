<?php 
/*
Template Name: Manual Lead Input
*/
get_header(); 
?>

<div class="div-single-page">
<?php gravity_form( 'Lead Manual Input', true, true, true, array(), true ); ?>
</div>
<?php 
get_footer();
?>   