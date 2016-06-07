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



//print_r($img);
/*echo "<pre>";
print_r($video);
echo"</pre>";
*/

$content = get_page($post->ID)->post_content;

// echo "<pre>";
// print_r($content);
// echo"</pre>";

//print_r($content);

echo $content;
?>
	<div class="row">
		<div class="bmwe-menu">
			<?php wp_nav_menu(array('menu' => 'sub-menu', 'menu_class' => 'ul-menu')); ?>
		</div>
		<center class="not-for-mobile">
			<div id="arrow-down-home"><span class="glyphicon glyphicon-chevron-down"></span></div>
		</center>
	</div>
</div>
<div id="div-ourServices" class="row margin-top-ourServices">
	<div class="col-md-12">
		<h3><em class="with-font-title">Our services</em></h3>
	</div>
	<div class="col-md-12 col-xs-12 clear center padding-right0">
		<a href="#" class="col-md-4 col-xs-12 col-sm-6 img-venues highlight-element">
			<p>VENUES</p>
		</a>
		<a href="#" class="col-md-4 col-xs-12 col-sm-6 img-catering highlight-element">
			<p>CATERING</p>
		</a>
		<a href="#" class="col-md-4 col-xs-12 col-sm-6 img-staffing highlight-element">
			<p>STAFFING</p>
		</a>			
		

		<a href="#" class="col-md-4 col-xs-12  col-sm-6 img-decor highlight-element">
			<p>DECOR</p>
		</a>	
		<a href="#" class="col-md-4 col-xs-12  col-sm-6 img-music highlight-element">
			<p><span>MUSIC</span><span>AND</span><span>ENTERTAINMENT</span></p>
		</a>	
		<a href="#" class="col-md-4 col-xs-12  col-sm-6 img-production highlight-element">
			<p><span>PRODUCTION</span><span>AND</span><span>LIGHTING</span></p>
		</a>			
			
	</div>
</div>
<div id="div-awards" class="row">
	<div class="img-logofe col-md-12"></div>
	<div class="col-md-12 img-award-purple center margin-top20">	
		<p><span><?php echo $awardText; ?></span></p>
		<div class="col-md-4 col-md-offset-4 col-xs-6 col-xs-offset-3 line"></div>
	</div>
	<div class="col-md-12 margin-top20">
		<div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6 col-xs-12">
			<div class="col-md-4 col-sm-4 col-xs-4 img-aw4"></div>
			<div class="col-md-4 col-sm-4 col-xs-4 img-aw1"></div>
			<div class="col-md-4 col-sm-4 col-xs-4 img-aw2"></div>
		</div>
	</div>
</div>
<div class="blue-background"><h2>What our clients say about Fetes & Events</h2></div>
<?php get_template_part( 'template-parts/part', 'testimonies' ); ?>
              
<?php get_footer(); ?>