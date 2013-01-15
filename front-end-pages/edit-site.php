<?php


/* ---------------------------------------------------------------------------- */
/* Add Content to the page selected to be the "Edit Site" page
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_page_content_for_edit_site($content) {

		global $post, $plchf_msb_options;

		// Get Edit Page Option Value
		$edit_site_id = $plchf_msb_options['_edit_site_page_'];

		// If this page is selected as the Edit Page page, let's filter the content
		if ($edit_site_id == $post->ID) {

			$content = pluginchiefmsb_edit_site_menu_page_content();

		}

		// Return the Content
		return $content;

	}

	// Replace the Page Content
	add_filter( 'page_template', 'plchf_msb_front_end_page_content_for_edit_site', 10000);