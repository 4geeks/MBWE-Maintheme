<?php 
/*
Template Name: Manual Lead Input
*/
get_header(); 
?>

<div class="div-single-page">
<?php gravity_form( 'Lead Manual Input', true, true, true, array(), false ); ?>
</div>
<?php 
get_footer();
?>   