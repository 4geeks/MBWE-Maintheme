<?php

require_once("BMWVisualComposerComponent.class.php");

class BMWBadges extends BMWVisualComposerComponent{

	const COMPONENT_KEYNAME = 'bmwbadges';
	const COMPONENT_NAME = 'Credentials Badges';

	function __construct(){
		
		$this->createComponent();

		add_shortcode( self::COMPONENT_KEYNAME, array($this,'renderComponent' ));
	}	

	function createComponent(){

	   	vc_map( array(
	      	"name" => __( self::COMPONENT_NAME, BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	      	"base" => self::COMPONENT_KEYNAME,
	      	"category" => __( BMWVisualComposerComponent::CATEGORY_NAME, BMWVisualComposerComponent::WEBSITE_CONTEXT),
	      	"params" => array(
	            array(
	                "type" => "textfield",
	                "class" => "",
	                "heading" => __( "Title", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "param_name" => "wp_badges_title",
	                "value" => __( "Experience, excelency and dedication", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "description" => __( "The title of the component", BMWVisualComposerComponent::WEBSITE_CONTEXT )
	            ),
	            array(
	                "type" => "textarea_html",
	                "class" => "",
	                "heading" => __( "Description", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "param_name" => "content",
	                "value" => __( "Our experience and rating speak for ourselves. We are very proud to be the one of the top Wedding Caters in Miami.", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "description" => __( "First Badge, on the left of the row.", BMWVisualComposerComponent::WEBSITE_CONTEXT )
	            ),
	            array(
	                "type" => "attach_image",
	                "holder" => "img",
	                "class" => "",
	                "heading" => __( "First Badge", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "param_name" => "first_badge_url",
	                "value" => __( "", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "description" => __( "First Badge, on the left of the row.", BMWVisualComposerComponent::WEBSITE_CONTEXT )
	            ),
	            array(
	                "type" => "attach_image",
	                "holder" => "img",
	                "class" => "",
	                "heading" => __( "Second Badge", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "param_name" => "second_badge_url",
	                "value" => __( "", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "description" => __( "Second Badge, on the middle of the row.", BMWVisualComposerComponent::WEBSITE_CONTEXT )
	            ),
	            array(
	                "type" => "attach_image",
	                "holder" => "img",
	                "class" => "",
	                "heading" => __( "Third Badge", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "param_name" => "third_badge_url",
	                "value" => __( "", BMWVisualComposerComponent::WEBSITE_CONTEXT ),
	                "description" => __( "Third Badge, on the right of the row.", BMWVisualComposerComponent::WEBSITE_CONTEXT )
	            )
	   		)
	   	));
	}

	function renderComponent( $atts , $content = null) {
	    extract( shortcode_atts( array(
	      'wp_badges_title' => '',
	      'first_badge_url' => '',
	      'second_badge_url' => '',
	      'third_badge_url' => ''
	   ), $atts ) );

		$imageOneSrc = wp_get_attachment_image_src($first_badge_url, 'thumbnail');
		$imageTwoSrc = wp_get_attachment_image_src($second_badge_url, 'thumbnail');
		$imageThreeSrc = wp_get_attachment_image_src($third_badge_url, 'thumbnail');

		   $htmlcontent = '
			<div class="bmwbadges">
				<div class="row">
					<div class="col-sm-12 text-center">
						<h3>'.$wp_badges_title.'</h3>
						<p>'.$content.'</p>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-4 text-center badge-container">
						<img src="'.$imageOneSrc[0].'" />
					</div>
					<div class="col-sm-4 text-center badge-container">
						<img src="'.$imageTwoSrc[0].'" />
					</div>
					<div class="col-sm-4 text-center badge-container">
						<img src="'.$imageThreeSrc[0].'" />
					</div>
				</div>
				</section>';

	   return $htmlcontent;
	}
}