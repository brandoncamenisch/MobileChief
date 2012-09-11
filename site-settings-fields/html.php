<?php

/* ---------------------------------------------------------------------------- */
/* HTML Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_html($fields, $element_type, $count, $values) {

	// Get the Element Type
	$element_type 	= $element_type;

	// Get the Field Definitions
	$type 			= $fields['type'];
	$content 		= $fields['content'];

	$output .= $content;

	echo apply_filters('plchf_msb_site_settings_field_html_filter', $output);
}

add_action('plchf_msb_site_settings_field_html','plchf_msb_site_settings_field_html', 10, 4);