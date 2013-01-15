<?php

/* ---------------------------------------------------------------------------- */
/* Add Content to the page selected to be the "Edit Page" page
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_create_sites_page_content($content) {

		global $post, $plchf_msb_options;

		// Get Edit Page Option Value
		$create_new_sites_id = $plchf_msb_options['_new_sites_page_'];

		// If this page is selected as the Edit Page page, let's filter the content
		if ($create_new_sites_id == $post->ID) {

			$content = pluginchiefmsb_new_site_menu_page_content();

		}

		// Return the Content
		return apply_filters('plchf_msb_front_end_create_sites_page_content',$content);

	}

	// Replace the Page Content
	add_filter( 'page_template', 'plchf_msb_front_end_create_sites_page_content', 10000);