<?php
/*
Plugin Name: Plugin Chief Mobile Site Builder
Plugin URI: http://visioniz.com
Description: Mobile Site Builder
Version: 1.0
Author: Visioniz, Jason Bahl, Brandon Camenisch
Author URI: http://visioniz.com/
License: GPLv2 or later

____   ____.__       .__              .__
\   \ /   /|__| _____|__| ____   ____ |__|_______
 \   Y   / |  |/  ___/  |/  _ \ /    \|  \___   /
  \     /  |  |\___ \|  (  <_> )   |  \  |/    /
   \___/   |__/____  >__|\____/|___|  /__/_____ \
                   \/               \/         \/


*/

/* ---------------------------------------------------------------------------- */
/* Plugin Structure Explanation
/* ---------------------------------------------------------------------------- */

	// Plugin Structure:

	// functions/ - directory to help abstract common functions, for organization
	// themes/ - directory to house built-in themes
	// settings/ - directory to house built-in settings pages
	// page-elements/ - directory to house built-in page elements

/* ---------------------------------------------------------------------------- */
/* Set Up Plugin Constants
/* ---------------------------------------------------------------------------- */

	// NOTE: PLUGINCHIEFMSB = Plugin Chief Mobile Site Builder

	// Url to plugin Folder
	define('PLUGINCHIEFMSB', plugin_dir_url(__FILE__));

	// Path to Plugin Folder
	define('PLUGINCHIEFMSB_PATH', plugin_dir_path(__FILE__));

	// URL to Plugin Folder
	$pluginchiefmsbdir = plugin_dir_url(__FILE__);
	global $pluginchiefmsbdir;

	// Gets options from the plugin options table
	$plchf_msb_options = get_option('plugin_chief_msb');
	global $plchf_msb_options;

/* ---------------------------------------------------------------------------- */
/* Inlcude Plugin Files
/* ---------------------------------------------------------------------------- */

	// This includes all top-level files within the plugin sub-directories.
	// Any deeper files that need to be included, need to be included from those files.
	foreach (glob(PLUGINCHIEFMSB_PATH . "/*/*.php") as $files){
		require_once $files;
	}

/* ---------------------------------------------------------------------------- */
/* Inlcude Built-In Theme Files
/* ---------------------------------------------------------------------------- */

	// This includes all top-level files within the plugin sub-directories.
	// Any deeper files that need to be included, need to be included from those files.
	foreach (glob(PLUGINCHIEFMSB_PATH . "/mobile-themes/*/*.php") as $files){
		require_once $files;
	}

/* ---------------------------------------------------------------------------- */
/* Updater
/* ---------------------------------------------------------------------------- */

	function plchf_msb_plugin_updater() {
		if (class_exists('PluginUpdateChecker')) {
			$PluginChief_MSB_Stats_AddOn = new PluginUpdateChecker( 'http://pluginchief.com/wp-content/plugins/pluginchief-updatechief/json/pluginchief-mobilechief.json', __FILE__,'pluginchief-mobilechief');

		}
	}
	add_action('plugins_loaded','plchf_msb_plugin_updater');