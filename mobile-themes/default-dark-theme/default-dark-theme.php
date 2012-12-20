<?php

/* ----------------------------------------------------------------------------
	Register Theme
---------------------------------------------------------------------------- */	
		
		$plchf_msb_themes[] = array(
			'Theme'		=> array(
				'Theme Name' 	=> 'Default Dark Theme',
				'Slug'			=> 'default_dark_theme',
				'Version'		=> '1.0',
				'Author Name'	=> 'PluginChief',
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
	
/* ----------------------------------------------------------------------------
	Dark Theme Menu Manager
---------------------------------------------------------------------------- */

	function plchf_msb_dark_theme_menu_manager() {
		
		// Get the Site Theme Slug
		$theme = plchf_msb_get_theme_info('Slug');
		
		// Only Add to the Default Dark Theme
		if ($theme == 'default_dark_theme') {
		
			$panels[] = array(
				'panel_name'=> 'Pages',			
				'fields' 	=> array(
					array(
						'type' 			=> 'menu_manager',
						'name' 			=> 'Pages',
						'id' 			=> '_pages_',
						'tooltip' 		=> 'Add New / Re-Order Pages',
					),
				),
			);
			
			// Create the Panel
			plchf_site_settings_settings_panel($panels);
		
		}
		
	}
	
	// Add the Panel ABOVE the Site Settings Form
	add_action('plchf_msb_before_site_settings','plchf_msb_dark_theme_menu_manager');

/* ----------------------------------------------------------------------------
	Dark Theme Site Options
---------------------------------------------------------------------------- */
	
	function plchf_msb_dark_theme_site_options() {
		
		$panels[] = array(
			'panel_name'=> 'General Settings',			
			'fields' 	=> array(
				array(
					'type' 			=> 'text',
					'name' 			=> 'Site Name',
					'id' 			=> '_site_name_',
					'tooltip' 		=> 'Enter the Site Name',
					'placeholder' 	=> 'Site Name',
				),
				array(
					'type' 			=> 'text',
					'name' 			=> 'Footer Text',
					'id' 			=> '_footer_text_',
					'tooltip' 		=> 'Enter text to display in the footer',
					'placeholder' 	=> '©2012 PluginChief.com',
				),
			),
		
		);
		
		// Create the Panel
		plchf_site_settings_settings_panel($panels);
		
	}
	
	add_action('plchf_msb_site_settings_content_default_dark_theme','plchf_msb_dark_theme_site_options');
