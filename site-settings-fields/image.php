<?php

/* ---------------------------------------------------------------------------- */
/* Image Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_image($fields, $count) {

	// Get the Field Definitions
	$type 			= $fields['type'];
	$label 			= $fields['name'];
	$tooltip		= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];
	
	$value			= plchf_msb_get_site_option($type, $field_id);

	$output .= '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20" height="20" class="info-tooltip-icon">
		</a>
	</label>';

	$output .= '
	<input class="upload_image" type="text" size="36" name="field['.$type.$field_id.']['.$field_id.']" value="'.$value.'" />
	<input class="upload_image_button btn btn-primary" type="button" value="Upload Image" />
	';

	if ($value) {
		$output .= '<hr><img src="'.$value.'" alt="Uploaded Image">';
	} else { }

	$output .='<hr>';

	echo apply_filters('plchf_msb_site_settings_field_image_filter', $output);
}

add_action('plchf_msb_site_settings_field_image','plchf_msb_site_settings_field_image', 10, 4);