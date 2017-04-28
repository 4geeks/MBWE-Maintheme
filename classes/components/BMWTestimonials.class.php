<?php

require_once("BMWVisualComposerComponent.class.php");

class BMWTestimonials extends BMWVisualComposerComponent{

	const COMPONENT_KEYNAME = 'bmwtestimonials';
	const COMPONENT_NAME = 'Bride Testimonials';

	function __construct(){
		
		$this->createComponent();

		add_shortcode( self::COMPONENT_KEYNAME, array($this,'renderComponent' ));
	}	

	function createComponent(){

		$args = array(
			'post_type' => 'testimonie',
			'posts_per_page' => 0,
		);
		$testimonies = new WP_Query( $args );
		$auxTestimonies = array();
		foreach ($testimonies->posts as $t) {
			$auxTestimonies[$t->post_title] = $t->ID;
		}
		//die(print_r($auxTestimonies));
	   	vc_map( array(
	      	"name" => __( self::COMPONENT_NAME, BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	      	"base" => self::COMPONENT_KEYNAME,
	      	"category" => __( BMWVisualComposerComponent::CATEGORY_NAME, BMWVisualComposerComponent::WEBSITE_CONTEXT),
	      	"params" => array(
	            array(
	                "type" => "dropdown",
	                "class" => "",
	                "heading" => __( "First Testimonie", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "param_name" => "testimonial_a",
	                "value" => $auxTestimonies,
	                "description" => __( "The textimonial on the left", BMWVisualComposerComponent::WEBSITE_CONTEXT )
	            ),
	            array(
	                "type" => "dropdown",
	                "class" => "",
	                "heading" => __( "Second Testimonie", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "param_name" => "testimonial_b",
	                "value" => $auxTestimonies,
	                "description" => __( "The textimonial on the right", BMWVisualComposerComponent::WEBSITE_CONTEXT )
	            )
	   		)
	   	));
	}

	function renderComponent( $atts , $content = null) {
	    extract( shortcode_atts( array(
	      'testimonial_a' => '',
	      'testimonial_b' => ''
	   ), $atts ) );

		Twig_Autoloader::register();
		$loader = new Twig_Loader_Filesystem(__DIR__.'/templates/');
		$twig = new Twig_Environment($loader);

		$args = array();
		$args['testimonial_a'] = $this->getTestimonial($testimonial_a);
		$args['testimonial_b'] = $this->getTestimonial($testimonial_b);
	   return $twig->render('testimonies.html',$args);
	}

	private function getTestimonial($postId){
		$t = get_post($postId);
		return array(
			"description" => $t->post_content,
			"bride" => get_post_meta( $postId, 'wpcf-testimonies-author', true ),
			"thumb" => get_post_meta( $postId, 'wpcf-testimonies-photo', true ),
			"id" => $postId
			);
	}
}