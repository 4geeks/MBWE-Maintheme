<?php
/*
Template Name: Planner Taxonomy
*/

get_header(); 

//Get venue post types to list 

// vars
$queried_object = get_queried_object(); 
$taxonomy = $queried_object->taxonomy;
$term_id = $queried_object->term_id;  

$headline = types_render_termmeta( "tax-sub-headline");
$gravity_form_id = types_render_termmeta( "tax-gravity-form-slug");
$bgvalignment = types_render_termmeta( "tax-background-image-valign");
$bgImageURL = types_render_termmeta("tax-background-image",array("url" => "true"));
//$bgVideoURL = types_render_termmeta('wpcf-tax-background-video',array("url" => "true"));

function getYoutubeID($url = '')
{
    $video_id = null;

    if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match)) {
        $video_id = $match[1];
    }

    return $video_id;
}

?>
    <!-- ========== MENU TOP ========== -->
    <?php get_template_part( 'template-parts/menu', 'top' ); ?>
    <!-- ========== MENU TOP ========== -->
	
	<div id="primary" class="full-width-page no-sidebar">
		<main id="main">
		<?php if($bgImageURL and $bgImageURL!=''){ ?>
			<div class="container-fluid landing-with-form" style="background-image: url('<?php echo $bgImageURL; ?>'); background-position: <?php echo $bgvalignment; ?> center;">
		<?php } else { ?>
			<div class="container-fluid landing-with-form" style="background-image: url('http://new.bestmiamiweddings.com/wp-content/uploads/sites/3/2016/05/Vizcaya.png');">
		<?php } ?>
		        <div class="row">
					<div class="col-md-12">
						<h1 class="with-font-title"><?php printf(single_cat_title( '', false ) . '' ); ?></h1>
						<?php if($headline and $headline!=''){ ?>
							<p class="landing-headline"><?php echo $headline; ?></p>
						<?php } ?>				
					</div>
				</div>
		        <div class="row">
		        	<div class=" col-md-2 hidden-xs">
		        	</div>
		            <div class=" col-md-8">
		            	<div class="row template-form">
				            <div class=" col-md-6">
						          <?php
						            // Show an optional term description.
						            $term_description = term_description();
						            if ( ! empty( $term_description ) ) :
						              printf( '<div class="taxonomy-description">%s</div>', $term_description );
						            endif;
						          ?>
					        </div>
				            <div class="col-md-6">
							        <?php 
							        	if($gravity_form_id and $gravity_form_id!='') gravity_form( $gravity_form_id, false, false, true, null, true ); 
							        	else gravity_form( 'Venue Simple Contact Us', false, false, true, null, true ); 
							            ?>  
					        </div>
				    	</div>
				    </div>
		        </div>
			</div>
			<div class="content-header-description">
				<div class="container">
					<h3>Click on any of the following planners for more details: Experience, Weddings, Prices and more.</h3>
				</div>
			</div>
            <div id="list-content" class="container-fluid">
            <?php                  
				while ( have_posts() ) {
				the_post();
				$plannerId = get_the_ID();
                $fullname = get_post_meta( $plannerId, 'wpcf-planner-full-name', true);
                
                $serviceArea = get_post_meta( $plannerId, 'wpcf-planner-service-area', false)[0];
                if(!$serviceArea or $serviceArea=='') $serviceArea = "Miami / Fort Lauderdale area.";

                $certified = get_post_meta( $plannerId, 'wpcf-planner-certified', false)[0];
                if(!$certified or $certified=='') $certified = null;

                $plannerExperience = null;
                $plannerExperience = get_post_meta( $plannerId, 'wpcf-planner-experience', false)[0];
                
                $plannerVideo = get_post_meta( $plannerId, 'wpcf-planner-video', false)[0];
                if($plannerVideo and $plannerVideo!='') $plannerVideo = getYoutubeID($plannerVideo);  
                else $plannerVideo = null;

				$nickname = get_post_meta("wpcf-planner-nickname", true);
				if(!$nickname)
				{
				    $names = split(" ", $fullname);
				    if(count($names)>0) $nickname = $names[0];
				}

				$total_weddings = get_post_meta($plannerId, "wpcf-planner-total-weddings", true);
				if(!$total_weddings or $total_weddings=="") $total_weddings = "0";
				$number_years = get_post_meta($plannerId, "wpcf-planner-years-of-experience", true);
				if(!$number_years or $number_years=="") $number_years = "0";
	        ?>
                    <div class="col-sm-6 col-md-4 planner-element">
                        <div class="div-planner-image" style="background-image: url('<?php echo get_post_meta( $plannerId, 'wpcf-planner-photo', false)[0]; ?>')">                                
                            <?php if($plannerVideo){ 
                                if(function_exists('lyte_preparse')) { echo lyte_preparse($plannerVideo); }
                                else echo '<iframe width="100%" height="100%" src="https://www.youtube.com/embed/'.$plannerVideo.'?rel=0&amp;&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>';
                            } ?>
                        </div>
                        <h3><?php echo $fullname; ?></h3>
                        <small><?php echo $serviceArea; ?></small>
                        <div class="row">
                            <div class="col-xs-7"> 
                            	<h5><?php echo $total_weddings; ?> weddings successfully planned.</h5>
                            </div>
                            <div class="col-xs-5"> 
                            	<h5><?php echo $number_years; ?> years in the industry.</h5>
                            </div>
                        </div>
                        <div class="div-planner-experience">
                            <?php echo substr($plannerExperience,0,250); ?>
                            <?php if($plannerExperience and strlen($plannerExperience)>250) echo "..."; ?>
                            <a href="<?php echo get_permalink(); ?>">Learn more about <?php echo $nickname; ?></a>
                        </div> 
                    </div>
               <?php }?>
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