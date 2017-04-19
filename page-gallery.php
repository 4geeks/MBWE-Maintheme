<?php
/*
Template Name: Gallery
*/
header('X-Frame-Options: GOFORIT');
get_header(); 

$gallery = get_post_gallery($_GET["post_id"],false);
$post = get_post($_GET["post_id"]);

//Get venue post types to list in dropdown list 
$postType = $post->post_type;


$args = array(
    'post_type' => $postType,
    'meta_query' => array(
        array(
            'key' => 'wpcf-venue-visibility',
            'value' => array('1','2'),
            'compare' => 'IN'
        )
    ),
    'posts_per_page'=>-1
    ); 
$venues = new WP_Query( $args );



$ids = explode( ",", $gallery['ids'] );

foreach( $ids as $id ) {

    $newImg = array(
        'id' => $id, 
        'thumbnail' => wp_get_attachment_image_src( $id ,'large'), 
        'default' => wp_get_attachment_image_src( $id, 'full'), 
        );
    $imgs[] = $newImg;
} 

$name = get_post_meta( $_GET['post_id'], 'wpcf-venue-name', false)[0];
$mainImage = get_post_meta( $_GET['post_id'], 'wpcf-venue-main-image', false)[0];
$tour = (isset(get_post_meta( $_GET['post_id'], 'wpcf-venue-360-tour', false)[0])?get_post_meta( $_GET['post_id'], 'wpcf-venue-360-tour', false)[0]:null);    
$blueprint = (isset(get_post_meta( $_GET['post_id'], 'wpcf-venue-blueprint', false)[0])?get_post_meta( $_GET['post_id'], 'wpcf-venue-blueprint', false)[0]:null);    
$weddings = (isset(get_post_meta( $_GET['post_id'], 'venue-weddings', false)[0])?get_post_meta( $_GET['post_id'], 'venue-weddings', false)[0]:null);    


?>
    <!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
	<div id="primary" class="full-width-page no-sidebar venue-gallery">
        <h1 class="with-font-sub-title" ><?php  echo $name;?> Photos</h1>
		<main id="main">
			<div class="grid" id="venuegallery">
				<?php 

					foreach( $imgs as $img ) {
						echo "<div class='div-image' data-imgid='".$img['id']."' data-src='".$img['default'][0]."' data-img='".$img['thumbnail'][0]."' data-width='".$img['thumbnail'][1]."' data-height='".$img['thumbnail'][2]."'>";
                            echo "<img style='display:none;' src='".$img['thumbnail'][0]."' />";
                        echo "</div>";
					}
				?>
			</div>
			<?php get_template_part( 'template-parts/part', 'animated-venue-menu' ); ?>
		</main>
	</div>

<?php get_footer(); ?>