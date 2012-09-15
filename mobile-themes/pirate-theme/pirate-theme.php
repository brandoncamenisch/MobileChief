<?php

/* ----------------------------------------------------------------------------
	Register Theme
---------------------------------------------------------------------------- */	
		
		$plchf_msb_themes[] = array(
			'Theme'		=> array(
				'Theme Name' 	=> 'Default Theme',
				'Slug'			=> 'default_theme',
				'Version'		=> '1.0',
				'Author Name'	=> 'Jason Bahl',
				'Author URL'	=> 'http://visioniz.com',
				'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/default-theme/',
				'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/default-theme/',
				'Multiple Pages'=> 'Yes',
				'Screenshot'	=> 'default_screenshot.png',
				'Page Elements'	=> 'Yes',
				'Settings Panel'=> 'Yes',
				'Description'	=> 'Jarred smells'
			),
		);
		
/* ----------------------------------------------------------------------------
	Set the Theme Root
---------------------------------------------------------------------------- */	
	
	function plchf_msb_default_theme_redirect_theme(){
		
		// Set the Theme Root
		return dirname( __FILE__ ) . '/theme/';
		
	}
	
	add_filter('plchf_msb_theme_root_default_theme','plchf_msb_default_theme_redirect_theme');

/* ----------------------------------------------------------------------------
	Set the Current Page
---------------------------------------------------------------------------- */
	
	function plchf_msb_default_theme_redirect_page(){
		
		// Set the Page Template
		return 'standard.php';
		
	}
	
	add_filter('plchf_msb_theme_page_default_theme','plchf_msb_default_theme_redirect_page');