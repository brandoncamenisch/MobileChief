<?php

/* ----------------------------------------------------------------------------
	Register Theme
---------------------------------------------------------------------------- */	
		
		$plchf_msb_themes[] = array(
			'Theme'		=> array(
				'Theme Name' 	=> 'Diamond Theme',
				'Slug'			=> 'diamond_theme',
				'Version'		=> '1.0',
				'Author Name'	=> 'Jason Bahl',
				'Author URL'	=> 'http://visioniz.com',
				'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/diamond-theme/',
				'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/diamond-theme/',
				'Multiple Pages'=> 'Yes',
				'Screenshot'	=> 'diamond_screenshot.png',
				'Page Elements'	=> 'Yes',
				'Settings Panel'=> 'Yes',
				'Description'	=> 'The diamond theme'
			),
		);
		
/* ----------------------------------------------------------------------------
	Set the Theme Root
---------------------------------------------------------------------------- */	
	
	function plchf_msb_diamond_theme_redirect_theme(){
		
		// Set the Theme Root
		return dirname( __FILE__ ) . '/theme/';
		
	}
	
	add_filter('plchf_msb_theme_root_diamond_theme','plchf_msb_diamond_theme_redirect_theme');

/* ----------------------------------------------------------------------------
	Set the Current Page
---------------------------------------------------------------------------- */
	
	function plchf_msb_diamond_theme_redirect_page(){
		
		// Set the Page Template
		return 'standard.php';
		
	}
	
	add_filter('plchf_msb_theme_page_diamond_theme','plchf_msb_diamond_theme_redirect_page');