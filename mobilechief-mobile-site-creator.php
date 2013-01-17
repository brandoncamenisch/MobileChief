<?php
/*
Plugin Name: MobileChief - Mobile Site Builder
Plugin URI: http://visioniz.com
Description: MobileChief is a powerful, extendable mobile site builder that makes it easier than ever to create mobile landing pages and mobile sites with an intuitive drag and drop interface. Unlike other WordPress Mobile Plugins, MobileChief doesn't take your existing WordPress site and convert it to a Mobile Optimized Site, rather it lets you create new content in new mobile sites. The ability to create mobile sites like this, allows you to run mobile marketing campaigns with targeted information, rather than sending a user to a full website where they may get lost and never find the information you're trying to provide.
Version: 1.5.6
Author: Visioniz, Jason Bahl, Brandon Camenisch, PluginChief
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
	#LESS COMPILER
	require_once PLUGINCHIEFMSB_PATH . "/lib/lessphp/lessc.inc.php";

/* ---------------------------------------------------------------------------- */
/* Inlcude Built-In Theme Files
/* ---------------------------------------------------------------------------- */

	// This includes all top-level files within the plugin sub-directories.
	// Any deeper files that need to be included, need to be included from those files.
	foreach (glob(PLUGINCHIEFMSB_PATH . "/mobile-themes/*/*.php") as $files){
		require_once $files;
	}