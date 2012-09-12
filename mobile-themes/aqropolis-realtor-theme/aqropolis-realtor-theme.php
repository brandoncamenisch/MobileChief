<?php

/* ----------------------------------------------------------------------------
	Register Theme
---------------------------------------------------------------------------- */

		$plchf_msb_themes[] = array(
			'Theme'		=> array(
				'Theme Name' 			=> 'aQRopolis Realtor Theme',
				'Slug'						=> 'aqropolis_realtor_theme',
				'Version'					=> '1.0',
				'Author Name'			=> 'Jason Bahl',
				'Author URL'			=> 'http://visioniz.com',
				'Theme Path'			=> PLUGINCHIEFMSB_PATH . '/mobile-themes/aqropolis-realtor-theme/',
				'Theme Root'			=> PLUGINCHIEFMSB . 'mobile-themes/aqropolis-realtor-theme/',
				'Multiple Pages'	=> 'Yes',
				'Screenshot'			=> 'screenshot.png',
				'Page Elements'		=> 'Yes',
				'Settings Panel'	=> 'Yes',
				'Description'			=> 'This is the theme description.'
			),
		);

/* ----------------------------------------------------------------------------
	Set the Theme Root
---------------------------------------------------------------------------- */

	function plchf_msb_aqropolis_realtor_theme_redirect_theme(){

		// Set the Theme Root
		return dirname( __FILE__ ) . '/theme/';

	}

	add_filter('plchf_msb_theme_root_aqropolis_realtor_theme','plchf_msb_aqropolis_realtor_theme_redirect_theme');

/* ----------------------------------------------------------------------------
	Set the Current Page
---------------------------------------------------------------------------- */

	function plchf_msb_aqropolis_realtor_theme_redirect_page(){

		// Set the Page Template
		return 'standard.php';

	}

	add_filter('plchf_msb_theme_page_aqropolis_realtor_theme','plchf_msb_aqropolis_realtor_theme_redirect_page');

/* ----------------------------------------------------------------------------
	Add Site Settings Panels
---------------------------------------------------------------------------- */

	function plchf_msb_aqropolis_realtor_theme_settings_panels() {

		$panels[] = array(
			'panel_name'=> 'realtor Settings',
			'fields' 	=> array(
				array(
					'type' 					=> 'image',
					'name'		 			=> 'Site Logo',
					'id' 						=> '_logo_',
					'tooltip' 			=> 'Upload a Site Logo',
					'placeholder' 	=> 'Logo should be .jpg or .png',
				),
				array(
					'type'	 				=> 'text',
					'name' 					=> 'Realtor Name',
					'id' 						=> '_realtor_name_',
					'tooltip' 			=> 'Enter the Realtor\'s Name',
					'placeholder' 	=> 'The realtor\'s name displays at the top right',
				),
				array(
					'type' 					=> 'image',
					'name' 					=> 'Realtor Name',
					'id' 						=> '_realtor_portrait_',
					'tooltip' 			=> 'Upload the Realtor\'s Portrait',
					'placeholder' 	=> 'The realtor\'s portrait displays at the top right',
				),
			),

		);

		$panels[] = array(
			'panel_name'=> 'Style Settings',
			'fields' 	=> array(
				array(
					'type' 					=> 'colorpicker',
					'name' 					=> 'Primary Color',
					'id' 						=> '_primary_color_',
					'tooltip' 			=> 'Select the Primary Color',
					'placeholder' 	=> '#cc3333',
				),
			),

		);

		plchf_site_settings_settings_panel($panels);

	}

	add_action('plchf_msb_site_settings_content_aqropolis_realtor_theme','plchf_msb_aqropolis_realtor_theme_settings_panels');