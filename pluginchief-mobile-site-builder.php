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
	define('PLUGINCHIEFMSB', plugin_dir_url(__FILE__));
	define('PLUGINCHIEFMSB_PATH', plugin_dir_path(__FILE__));
	$pluginchiefmsbdir = plugin_dir_url(__FILE__);
	global $pluginchiefmsbdir;

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