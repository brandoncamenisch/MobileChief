<?php

/* ----------------------------------------------------------------------------
	Register Theme
---------------------------------------------------------------------------- */	
		
		$plchf_msb_themes[] = array(
			'Theme'		=> array(
				'Theme Name' 	=> 'Jarred Theme',
				'Slug'			=> 'clean_theme',
				'Version'		=> '1.0',
				'Author Name'	=> 'Jason Bahl',
				'Author URL'	=> 'http://visioniz.com',
				'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/clean-theme/',
				'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/clean-theme/',
				'Multiple Pages'=> 'Yes',
				'Screenshot'	=> 'clean_screenshot.png',
				'Page Elements'	=> 'Yes',
				'Settings Panel'=> 'Yes',
				'Description'	=> 'Jarred smells'
			),
		);
		
/* ----------------------------------------------------------------------------
	Set the Theme Root
---------------------------------------------------------------------------- */	
	
	function plchf_msb_clean_theme_redirect_theme(){
		
		// Set the Theme Root
		return dirname( __FILE__ ) . '/theme/';
		
	}
	
	add_filter('plchf_msb_theme_root_clean_theme','plchf_msb_clean_theme_redirect_theme');

/* ----------------------------------------------------------------------------
	Set the Current Page
---------------------------------------------------------------------------- */
	
	function plchf_msb_clean_theme_redirect_page(){
		
		// Set the Page Template
		return 'standard.php';
		
	}
	
	add_filter('plchf_msb_theme_page_clean_theme','plchf_msb_clean_theme_redirect_page');

/* ----------------------------------------------------------------------------
	Add Site Settings Panels
---------------------------------------------------------------------------- */
	
	function asdgfasdgsdfgsdfgserg() {
	
		$settings = array(
			'1' => 'One',
			'2' => 'Two'
		);
	
		plchf_site_settings_settings_panel('Goo', $settings);
		
	}
	
	add_action('plchf_msb_site_settings_content_clean_theme','asdgfasdgsdfgsdfgserg');