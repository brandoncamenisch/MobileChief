<?php
/* ----------------------------------------------------------------------------
	Get Theme Info

	THIS IS A FUNCTION THAT ALLOWS US TO GET EVERY BIT OF INFO FROM THE
	REGISTERED THEMES ARRAYS.

	USAGE:

	plchf_msb_get_theme_info('Theme Name'); 	- Returns the Theme Name
	plchf_msb_get_theme_info('Slug'); 			- Returns the Theme Slug
	plchf_msb_get_theme_info('Version');	 	- Returns the Theme Version
	plchf_msb_get_theme_info('Author Name'); 	- Returns the Theme Author's Name
	plchf_msb_get_theme_info('Author URL'); 	- Returns the Theme Author's URL
	plchf_msb_get_theme_info('Theme Path'); 	- Returns the Theme Path
	plchf_msb_get_theme_info('Theme Root'); 	- Returns the Theme Root
	plchf_msb_get_theme_info('Multiple Pages'); - Returns Yes / No
	plchf_msb_get_theme_info('Screenshot'); 	- Returns Screenshot File Name, Not full path to file
	plchf_msb_get_theme_info('Page Elements'); 	- Returns Yes / No
	plchf_msb_get_theme_info('Settings Panel'); - Returns Yes / No
	plchf_msb_get_theme_info('Page Templates'); - Returns Array of Page Templates
	plchf_msb_get_theme_info('Description'); 	- Returns Theme Description

---------------------------------------------------------------------------- */

	function plchf_msb_get_theme_info($info) {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {

			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {

				return $themes['Theme'][''.$info.''];

			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Name
---------------------------------------------------------------------------- */

	function plchf_msb_get_theme() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {



			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Theme Name'];
			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Slug
---------------------------------------------------------------------------- */

	function plchf_msb_get_theme_slug() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {



			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $currentthemeslug;

			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Version
---------------------------------------------------------------------------- */

	function plchf_msb_get_theme_version() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {



			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Version'];
			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Author Name
---------------------------------------------------------------------------- */

	function plchf_msb_get_theme_author_name() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {



			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Author Name'];
			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Author URL
---------------------------------------------------------------------------- */

	function plchf_msb_get_theme_author_url() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {



			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Author URL'];
			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Path
---------------------------------------------------------------------------- */

	function plchf_msb_get_theme_path() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {



			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Theme Path'];
			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Root
---------------------------------------------------------------------------- */

	function plchf_msb_get_theme_root() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {



			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Theme Root'];

			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Supports Multiple Pages
---------------------------------------------------------------------------- */

	function plchf_msb_theme_supports_multiple_pages() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {



			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Multiple Pages'];

			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Supports Multiple Pages
---------------------------------------------------------------------------- */

	function plchf_msb_theme_supports_page_elements() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {

			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {

				return $themes['Theme']['Page Elements'];

			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Supports Settings Panel
---------------------------------------------------------------------------- */

	function plchf_msb_theme_supports_settings_panel() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {



			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Settings Panel'];

			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Screenshot
---------------------------------------------------------------------------- */

	function plchf_msb_get_theme_screenshot() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {

			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Screenshot'];

			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Description
---------------------------------------------------------------------------- */

	function plchf_msb_get_theme_description() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {

			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Description'];

			}

		}

	}

/* ----------------------------------------------------------------------------
	Get Theme Description
---------------------------------------------------------------------------- */

	function plchf_msb_get_theme_page_templates() {

		// Get Site ID
		$site_id = plchf_msb_get_site_id();

		// Get Post Meta
		$meta = get_post_custom( $site_id );

		// Get Site Theme
		$thememeta = $meta['_plchf_msb_site_theme'][0];

		global $plchf_msb_themes;

		// Loop Through Themes
		foreach ($plchf_msb_themes as $themes) {



			$currentthemeslug = $themes['Theme']['Slug'];

			if ($thememeta == $currentthemeslug) {


				return $themes['Theme']['Page Templates'];

			}

		}

	}