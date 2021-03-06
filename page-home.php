<?php
/*
Template Name: home
*/

get_header(); 
$introText = get_post_meta($post->ID, 'intro_text', true);
$awardText = get_post_meta($post->ID, 'award_text', true);

$img = get_attached_media( 'image' , $post->ID); 
$img = array_pop($img);
$video = get_attached_media( 'video' , $post->ID); 
$video = array_pop($video);

$content = get_page($post->ID)->post_content;

$revslider = types_render_field("page-slider");
if(!$revslider or $revslider=='') $revslider = 'home-slider';

?>

<?php putRevSlider($revslider); ?>
</div>

<div id="div-ourServices" class="row margin-top-ourServices">
	<div class="col-md-12">
		<center><h1><?php _e( 'Our services', 'bmw-website' ) ?></h1></center>
	</div>
	<div class="col-md-12 col-xs-12 clear center padding-right0">
		<div class="col-md-6 col-xs-12 col-sm-6 img-venues highlight-element-services services-venues">
				<div class="col-md-12"><p class="services-title"><?php _e( 'Wedding Venues', 'bmw-website' ) ?></p></div>
			<div id="divServicesContent-venues" class="col-md-12 center">
				<div class="col-md-12"><p class="services-content"><?php _e( "Picking a date should be the first step of every wedding, that's why the first thing you should do is booking your venue on a specific date. We have a selection of more than 25 spectacular locations", 'bmw-website' ) ?>.</p></div>
				<div class="col-md-12"><a class="btn btn-lg btn-warning" href="<?php echo get_permalink( get_page_by_path( 'wedding-venues-locations' ) ); ?>"><?php _e( 'Tour the venues', 'bmw-website' ) ?></a></div>
			</div>
		</div>
		<div class="col-md-6 col-xs-12 col-sm-6 img-decor highlight-element-services services-packages">
				<div class="col-md-12"><p class="services-title"><?php _e( 'Wedding Packages', 'bmw-website' ) ?></p></div>
			<div id="divServicesContent-packages" class="col-md-12 center">
				<div class="col-md-12"><p class="services-content"><?php _e( 'Choosing a wedding package is the best way to get an aproximate budget, once you have a budget you can start customizing everything to make it your way', 'bmw-website' ) ?>.</p></div>
				<div class="col-md-12"><a class="btn btn-lg btn-warning" href="<?php echo get_permalink( get_page_by_path( 'wedding-packages' ) ); ?>"><?php _e( 'Review our wedding packages', 'bmw-website' ) ?></a></div>
			</div>
		</div>	



		
		<!--a href="#" class="col-md-4 col-xs-12 col-sm-6 img-catering highlight-element">
			<p>CATERING</p>
		</a>
		<a href="#" class="col-md-4 col-xs-12 col-sm-6 img-staffing highlight-element">
			<p>STAFFING</p>
		</a>			
		

		<a href="#" class="col-md-4 col-xs-12  col-sm-6 img-music highlight-element">
			<p><span>MUSIC</span><span>AND</span><span>ENTERTAINMENT</span></p>
		</a>	
		<a href="#" class="col-md-4 col-xs-12  col-sm-6 img-production highlight-element">
			<p><span>PRODUCTION</span><span>AND</span><span>LIGHTING</span></p>
		</a-->			
			
	</div>
</div>
<?php get_template_part( 'template-parts/part', 'awards' ); ?>
<div id="div-awards" class="row fix-margin-row">
	<div class="img-logofe col-md-12"></div>
	<div class="img-award-purple col-md-12 col-xs-12 fix-margin-row">
		<div class="custom-overlay-home col-md-12 col-xs-12 fix-margin-row"></div>
		<div id="divTextAwards" class="col-md-12 center margin-top20">
			<span><pre><?php echo $awardText; ?></pre></span>
			<div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3 line"></div>		
		</div>
	</div>	
	<div class="col-md-12 col-xs-12 margin-top20">
		<div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12">
			<div class="col-md-4 col-sm-4 col-xs-4 img-aw4"></div>
			<div class="col-md-4 col-sm-4 col-xs-4 img-aw1"></div>
			<div class="col-md-4 col-sm-4 col-xs-4 img-aw2"></div>
		</div>
	</div>
</div>
<div class=""></div>
<?php get_template_part( 'template-parts/part', 'testimonies' ); ?>
              
<?php get_footer(); ?>