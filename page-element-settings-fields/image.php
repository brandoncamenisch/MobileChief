<?php

/* ---------------------------------------------------------------------------- */
/* image Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_image($fields, $element_type, $count, $values) {

	// Get the Element Type
	$element_type 	= $element_type;

	// Get the Field Definitions
	$type 				= $fields['field']['type'];
	$label 				= $fields['field']['name'];
	$tooltip		 	= $fields['field']['tooltip'];
	$placeholder	= $fields['field']['placeholder'];
	$field_id			= $fields['field']['id'];

	// Get the saved Value
	$value			= $values[''.$field_id.''];

	$output .= '<p>'.$tooltip.'</p>';

	$output .= '
	<input class="upload_image" type="text" size="36" name="field['.$element_type.'_'.$count.']['.$field_id.']" value="'.$value.'" />
	<input class="upload_image_button button-primary button btn btn-primary" type="button" value="Upload Image" />
	';

	if ($value) {
		$output .= '<hr><img src="'.$value.'" alt="Uploaded Image">';
	} else { }

	$output .='<hr>';

	echo apply_filters('plchf_msb_page_element_settings_field_hidden_area_filter', $output);
}

add_action('plchf_msb_page_element_settings_field_image','plchf_msb_page_element_settings_field_image', 10, 4);