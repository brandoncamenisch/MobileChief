<?php

/* ---------------------------------------------------------------------------- */
/* Text Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_slider($fields, $count) {

	// Get the Field Definitions
	$type 			= $fields['type'];
	$label 			= $fields['name'];
	$tooltip	 	= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];

	// Get the saved Value
	$value			= $values[''.$field_id.''];

	$output = '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
		</a>
	</label>
	';

	$output .= '<div class="plchf_msb_slider_field"></div>';
	$output .= '<input type="hidden" class="plchf_msb_slider_amount" name="field['.$element_type.'_'.$count.']['.$field_id.']" value="'.$value.'">';

	echo apply_filters('plchf_msb_site_settings_field_slider_area_filter', $output);
}

add_action('plchf_msb_site_settings_field_slider','plchf_msb_site_settings_field_slider', 10, 4);