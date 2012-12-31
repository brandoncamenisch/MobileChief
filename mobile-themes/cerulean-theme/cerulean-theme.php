<?php
	define('PLUGINCHIEFMSB_CERULEANTHEME', plugin_dir_url(__FILE__));
	define('PLUGINCHIEFMSB_CERULEANTHEME_PATH', plugin_dir_path(__FILE__));
	$pluginchiefmsb_ceruleantheme_dir = plugin_dir_url(__FILE__);
	global $pluginchiefmsb_ceruleantheme_dir;

/* ----------------------------------------------------------------------------
	Register Theme
---------------------------------------------------------------------------- */

		$plchf_msb_themes[] = array(
			'Theme'		=> array(
				'Theme Name' 	=> 'Cerulean Theme',
				'Slug'			=> 'cerulean_theme',
				'Version'		=> '1.0',
				'Author Name'	=> 'PluginChief',
				'Author URL'	=> 'http://pluginchief.com',
				'Theme Path'	=> PLUGINCHIEFMSB_CERULEANTHEME_PATH . '/',
				'Theme Root'	=> PLUGINCHIEFMSB_CERULEANTHEME . '',
				'Multiple Pages'=> 'Yes',
				'Screenshot'	=> 'screenshot.png',
				'Page Elements'	=> 'Yes',
				'Settings Panel'=> 'Yes',
				'Description'	=> 'The cerulean theme is the cerulean theme, to be used as a starting point.'
			),
		);

/* ----------------------------------------------------------------------------
	Set the Theme Root
---------------------------------------------------------------------------- */

	function plchf_msb_cerulean_theme_redirect_theme(){

		// Set the Theme Root
		return dirname( __FILE__ ) . '/theme/';

	}

	add_filter('plchf_msb_theme_root_cerulean_theme','plchf_msb_cerulean_theme_redirect_theme');

/* ----------------------------------------------------------------------------
	Set the Current Page
---------------------------------------------------------------------------- */

	function plchf_msb_cerulean_theme_redirect_page(){

		// Set the Page Template
		return 'index.php';

	}

	add_filter('plchf_msb_theme_page_cerulean_theme','plchf_msb_cerulean_theme_redirect_page');

/* ----------------------------------------------------------------------------
	Default Theme Menu Manager
---------------------------------------------------------------------------- */

	function plchf_msb_cerulean_theme_menu_manager() {

		// Get the Site Theme Slug
		$theme = plchf_msb_get_theme_info('Slug');

		// Only Add to the Default Dark Theme
		if ($theme == 'cerulean_theme') {

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
	add_action('plchf_msb_before_site_settings','plchf_msb_cerulean_theme_menu_manager');

/* ----------------------------------------------------------------------------
	Default Theme Site Options
---------------------------------------------------------------------------- */

	function plchf_msb_cerulean_theme_site_options() {

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

	add_action('plchf_msb_site_settings_content_cerulean_theme','plchf_msb_cerulean_theme_site_options');

	plchf_msb_compile_theme_less_files(PLUGINCHIEFMSB_CERULEANTHEME_PATH . "theme/css/bootswatch.less", PLUGINCHIEFMSB_CERULEANTHEME_PATH . "theme/css/style.css");