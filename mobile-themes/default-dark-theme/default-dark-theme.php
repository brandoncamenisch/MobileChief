<?php

/* ----------------------------------------------------------------------------
	Register Theme
---------------------------------------------------------------------------- */	
		
		$plchf_msb_themes[] = array(
			'Theme'		=> array(
				'Theme Name' 	=> 'Default Dark Theme',
				'Slug'			=> 'default_dark_theme',
				'Version'		=> '1.0',
				'Author Name'	=> 'Jason Bahl',
				'Author URL'	=> 'http://visioniz.com',
				'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/default-dark-theme/',
				'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/default-dark-theme/',
				'Multiple Pages'=> 'Yes',
				'Screenshot'	=> 'default_dark_screenshot.png',
				'Page Elements'	=> 'Yes',
				'Settings Panel'=> 'Yes',
				'Description'	=> 'Jarred smells'
			),
		);
		
/* ----------------------------------------------------------------------------
	Set the Theme Root
---------------------------------------------------------------------------- */	
	
	function plchf_msb_default_dark_theme_redirect_theme(){
		
		// Set the Theme Root
		return dirname( __FILE__ ) . '/theme/';
		
	}
	
	add_filter('plchf_msb_theme_root_default_dark_theme','plchf_msb_default_dark_theme_redirect_theme');

/* ----------------------------------------------------------------------------
	Set the Current Page
---------------------------------------------------------------------------- */
	
	function plchf_msb_default_dark_theme_redirect_page(){
		
		// Set the Page Template
		return 'index.php';
		
	}
	
	add_filter('plchf_msb_theme_page_default_dark_theme','plchf_msb_default_dark_theme_redirect_page');