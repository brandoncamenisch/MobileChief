<?php

/* ----------------------------------------------------------------------------
	Register Theme
---------------------------------------------------------------------------- */	
		
		$plchf_msb_themes[] = array(
			'Theme'		=> array(
				'Theme Name' 	=> 'Polaroid Theme',
				'Slug'			=> 'polaroid_theme',
				'Version'		=> '1.0',
				'Author Name'	=> 'Jason Bahl',
				'Author URL'	=> 'http://visioniz.com',
				'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/polaroid-theme/',
				'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/polaroid-theme/',
				'Multiple Pages'=> 'Yes',
				'Screenshot'	=> 'polaroid_screenshot.png',
				'Page Elements'	=> 'Yes',
				'Settings Panel'=> 'Yes',
				'Description'	=> 'The clean theme'
			),
		);
		
/* ----------------------------------------------------------------------------
	Set the Theme Root
---------------------------------------------------------------------------- */	
	
	function plchf_msb_polaroid_theme_redirect_theme(){
		
		// Set the Theme Root
		return dirname( __FILE__ ) . '/theme/';
		
	}
	
	add_filter('plchf_msb_theme_root_polaroid_theme','plchf_msb_polaroid_theme_redirect_theme');

/* ----------------------------------------------------------------------------
	Set the Current Page
---------------------------------------------------------------------------- */
	
	function plchf_msb_polaroid_theme_redirect_page(){
		
		// Set the Page Template
		return 'standard.php';
		
	}
	
	add_filter('plchf_msb_theme_page_polaroid_theme','plchf_msb_polaroid_theme_redirect_page');