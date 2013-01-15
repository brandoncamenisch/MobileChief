<?php

/* ---------------------------------------------------------------------------- */
/* Filter the My Sites Link
/* ---------------------------------------------------------------------------- */

/* ---------------------------------------------------------------------------- */
/* Add Content to the page selected to be the "My Sites" page
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_page_content_for_my_sites($content) {

		global $post, $plchf_msb_options;

		// Get Edit Page Option Value
		$my_sites_id = $plchf_msb_options['_my_sites_page_'];

		// If this page is selected as the Edit Page page, let's filter the content
		if ($my_sites_id == $post->ID) {

			$content = pluginchiefmsb_msb_my_sites_page_content();

		}

		// Return the Content
		return $content;

	}

	// Replace the Page Content
	add_filter( 'page_template', 'plchf_msb_front_end_page_content_for_my_sites', 10000);