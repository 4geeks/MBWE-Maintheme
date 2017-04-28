<?php

require "vendor/Twig/Autoloader.php";
require "components/BMWBadges.class.php";
require "components/BMWTestimonials.class.php";

Class VisualComposerSettings {


	function __construct() {
		add_action( 'vc_before_init', array($this,'init'));
		add_action('wp_enqueue_scripts', array($this,'enqueStyles'));
	}

	function enqueStyles(){
	    wp_enqueue_style('vccomposercss', get_template_directory_uri() . '/css/visualcomposer.styles.css', false, '1.1', 'all');
	    wp_enqueue_style('vccomposercss');
	}

	function init() 
	{
	   $badges = new BMWBadges();
	   $testimonials = new BMWTestimonials();
	}

}

//Your "container" content element should extend WPBakeryShortCodesContainer class to inherit all required functionality
if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_coderepl extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_codepreview extends WPBakeryShortCode {}
    class WPBakeryShortCode_codehighliter extends WPBakeryShortCode {}
}
