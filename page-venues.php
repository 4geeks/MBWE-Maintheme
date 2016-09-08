<?php
/*
Template Name: Venue List
*/

get_header(); 

//Get venue post types to list 

$venue_visibility = array('1','2');
if(isset($_GET["vvisibility"])) $venue_visibility = $_GET["vvisibility"];

$args = array(
    'post_type' => 'venue',
    'meta_query' => array(
        array(
            'key' => 'wpcf-venue-visibility',
            'value' => $venue_visibility,
            'compare' => 'IN'
        )
    ),
    'posts_per_page'=>-1
    ); 
$venues = new WP_Query( $args );

$content = get_page($post->ID)->post_content;

?>
    <!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
	
	<div id="primary" class="full-width-page no-sidebar">
		<main id="main">
            <?php echo $content; ?>
            <div id="list-content" class="row">                    
                <?php foreach ($venues->posts as $venue) {
                    ?>
                    <div class="col-sm-12 col-md-6 col-lg-4  venue-element">
                        <div class="col-sm-12 inner-venue-element">
                            <div class="col-sm-12 div-venue-image linkeable highlight-element" style="background-image: url('<?php echo get_post_meta( $venue->ID, 'wpcf-venue-small-image', false)[0]; ?>')">
                            </div>
                            <div class="col-sm-12 div-description">
                                <center><h2><?php echo get_post_meta( $venue->ID, 'wpcf-venue-name', false)[0]; ?></h2></center>
                                <div class="col-sm-12">
                                    <h4><?php echo get_post_meta( $venue->ID, 'wpcf-venue-direction', false)[0]; ?></h4>
                                </div>
                                <div class="col-sm-12">
                                    <a href="<?php echo get_home_url()."/venue/".$venue->post_name ?>" class="btn btn-info btn-sm">Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php }?>

               <?php if(!isset($_GET["vvisibility"])) { ?>
               <div id="extra-venues" class="col-sm-12 venue-element">
                    <div class="col-sm-12 div-description">
                        <center><a href="/wedding-venues-locations/?vvisibility[]=3">Click here to review some additional venues</a></center>
                    </div>
               </div>
               <?php } ?>
            </div>
            <!-- <div class="blue-background"><h2>What our clients say about our venues</h2></div> -->
            <!-- ========== testimonies TOP ========== -->
            <?php  //get_template_part( 'template-parts/part', 'testimonies' ); ?>
            <!-- ========== testimonies TOP ========== -->        

            <!-- ========== WHY FETES & EVENTS PART ========== -->
            <?php //get_template_part( 'template-parts/part', 'why-fetes-events' ); ?>
            <!-- ========== WHY FETES & EVENTS PART ========== -->
		</main>
	</div>

<?php get_footer(); ?>