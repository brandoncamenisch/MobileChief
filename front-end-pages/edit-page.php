<?php
/* ---------------------------------------------------------------------------- */
/* Add Content to the page selected to be the "Edit Page" page
/* ---------------------------------------------------------------------------- */

function plchf_msb_front_end_page_content_for_edit_page($content) {
	global $post, $plchf_msb_options;
	#Get Edit Page Option Value
	$edit_page_id =& $plchf_msb_options['_edit_page_page_'];
	#If this page is selected as the Edit Page page, let's filter the content
	if ($edit_page_id == $post->ID) {
		$content =& pluginchiefmsb_edit_page_menu_page_content();
	}
	return $content;
} add_filter( 'page_template', 'plchf_msb_front_end_page_content_for_edit_page', 1);