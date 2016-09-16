<?php

class ClientThemeOptions {

	var $settings_page_slug = "client-theme-settings";
	var $tabs = array( 'generalinfo' => 'ClientTheme General', 'socialmedia' => 'Social Media' );

	function __construct() {
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );

		//require_once('ClientThemeTranslation.options.php')
		//$translations = new ClientThemeTranslationOptions();
	}

	function admin_menu() {
		add_theme_page(
			'Client Theme - Settings',
			'Client Theme Settings',
			'manage_options',
			$this->settings_page_slug,
			array($this,'theme_settings_page')
		);

		foreach ($this->tabs as $tab => $title) {
			add_submenu_page( null, 'Client Theme - '.$title.' Settings', 'none', 'manage_options', $this->settings_page_slug.'-'.$tab, array($this,'theme_settings_page') );
		}

		add_action("admin_init", array( $this, 'register_theme_settings_page' ));
	}

	function display_textinput_element($args)
	{
		?>
	    	<input type="text" name="<?php echo $args["name"]; ?>" id="<?php echo $args["name"]; ?>" value="<?php echo get_option($args["name"]); ?>" />
	    <?php
	}

	function display_textarea_element($args)
	{
		?>
			<textarea style="width: 440px; height: 120px;" id="<?php echo $args["name"]; ?>" name="<?php echo $args["name"]; ?>"><?php echo get_option($args["name"]); ?></textarea>
	    <?php
	}

	function logo_display()
	{
		?>
	        <input type="file" name="logo" /> 
	        <?php echo get_option('logo'); ?>
	   <?php
	}

	function handle_logo_upload()
	{
		if(!empty($_FILES["demo-file"]["tmp_name"]))
		{
			$urls = wp_handle_upload($_FILES["logo"], array('test_form' => FALSE));
		    $temp = $urls["url"];
		    return $temp;   
		}
		  
		return $option;
	}

	function render_options($section_slug)
	{
	    ?>
		    <form method="post" action="options.php">
		        <?php
		            settings_fields($section_slug);
		            do_settings_sections($_GET['page']);      
		            submit_button(); 
		        ?>          
		    </form>
		<?php
	}

	function register_theme_settings_page()
	{
		$this->register_general_options();
		$this->register_socialmedia_options();
	}

	function register_socialmedia_options(){

		$section_slug = 'socialmedia';
		$current_page_section_slug = $this->settings_page_slug.'-'.$section_slug;

		add_settings_section($section_slug, "Social Media", null, $current_page_section_slug);
		add_settings_field("client_op-twitter_username", "Client Twitter Account", array($this,'display_textinput_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-twitter_username'));
	    add_settings_field("client_op-facebook_username", "Client Facebok Account", array($this,'display_textinput_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-facebook_username'));
	    add_settings_field("client_op-instagram_username", "Client Instagram Account", array($this,'display_textinput_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-instagram_username'));
	    add_settings_field("client_op-googleplus_id", "Client Googole+ Account", array($this,'display_textinput_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-googleplus_id'));
    	

	    register_setting($section_slug, "client_op-twitter_username");
	    register_setting($section_slug, "client_op-facebook_username");
	    register_setting($section_slug, "client_op-instagram_username");
	    register_setting($section_slug, "client_op-googleplus_id");
	}

	function register_general_options(){

		$section_slug = 'generalinfo';
		$current_page_section_slug = $this->settings_page_slug.'-'.$section_slug;

		add_settings_section($section_slug, "Client Theme General", null, $current_page_section_slug);
    	//add_settings_field("client_op-company_logo", "Logo", array($this,'logo_display'), $current_page_section_slug, $section_slug);  
    	add_settings_field("client_op-company_name", "Company Name", array($this,'display_textinput_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-company_name'));  
    	add_settings_field("client_op-company_logo", "Company Logo", array($this,'display_textinput_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-company_logo'));  
    	add_settings_field("client_op-company_phone", "Phone", array($this,'display_textinput_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-company_phone'));  
    	add_settings_field("client_op-company_email", "Email", array($this,'display_textinput_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-company_email'));  
    	add_settings_field("client_op-company_address", "Address", array($this,'display_textarea_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-company_address'));  
    	add_settings_field("client_op-company_about_en", "About (English)", array($this,'display_textarea_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-company_about_en'));  
    	add_settings_field("client_op-company_about_es", "About (Spanish)", array($this,'display_textarea_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-company_about_es'));  
    	add_settings_field("client_op-company_latitude", "Latitude", array($this,'display_textinput_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-company_latitude'));  
    	add_settings_field("client_op-company_longitude", "Longitude", array($this,'display_textinput_element'), $current_page_section_slug, $section_slug, array('name'=>'client_op-company_longitude'));  

    	//register_setting($section_slug, "client_op-comapny_logo", "handle_logo_upload");
    	register_setting($section_slug, "client_op-company_about_en");
    	register_setting($section_slug, "client_op-company_about_es");
    	register_setting($section_slug, "client_op-company_name");
    	register_setting($section_slug, "client_op-company_logo");
    	register_setting($section_slug, "client_op-company_address");
    	register_setting($section_slug, "client_op-company_phone");
    	register_setting($section_slug, "client_op-company_email");
    	register_setting($section_slug, "client_op-company_latitude");
    	register_setting($section_slug, "client_op-company_longitude");
	}

	function theme_settings_page( $current = 'generalinfo' ) {
		global $pagenow;

		if (!current_user_can('manage_options')) {
		    wp_die('You do not have sufficient permissions to access this page.');
		}

		$links = array();
		foreach( $this->tabs as $tab => $name ) :
			if ( $tab == $current ) :
				$links[] = "<a class='nav-tab nav-tab-active' href='?page=".$this->settings_page_slug."-$tab'>$name</a>";
			else :
				$links[] = "<a class='nav-tab' href='?page=".$this->settings_page_slug."-$tab'>$name</a>";
			endif;
		endforeach;
		echo '<h2>';
		foreach ( $links as $link )
			echo $link;
		echo '</h2>';

		if ($pagenow == 'themes.php'){
			$breadcrumb = explode("-",$_GET["page"]);
			$this->render_options(array_pop($breadcrumb));
		}
	}
}
