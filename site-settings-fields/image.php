<?php

/* ---------------------------------------------------------------------------- */
/* Image Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_image($fields, $count) {
	
	// Get the Element Type
	$element_type 	= $element_type;
	
	// Get the Field Definitions
	$type 			= $fields['type'];
	$label 			= $fields['name'];
	$tooltip	 	= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];
	$value			= plchf_msb_get_site_option($type, $field_id);
	
	$output .= '<p>'.$tooltip.'</p>';
	
	$output .= '
	<input class="upload_image" type="text" size="36" name="field['.$type.$field_id.']['.$field_id.']" value="'.$value.'" />
	<input class="upload_image_button button-primary" type="button" value="Upload Image" />
	';
	
	if ($value) {
		$output .= '<hr><img src="'.$value.'" alt="Uploaded Image">'; 
	} else { }
	
	$output .='<hr>';
	
	echo apply_filters('plchf_msb_site_settings_field_image_filter', $output);
}

add_action('plchf_msb_site_settings_field_image','plchf_msb_site_settings_field_image', 10, 4);