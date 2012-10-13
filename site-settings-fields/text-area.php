<?php

/* ---------------------------------------------------------------------------- */
/* Text Area Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_text_area($fields, $count) {

	// Get the Element Type
	$element_type 	= $element_type;

	// Get the Field Definitions
	$type 			= $fields['type'];
	$label 			= $fields['name'];
	$tooltip		= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];

	// Get the saved Value
	$value			= plchf_msb_get_site_option($type, $field_id);

	$output .= '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr info-tooltip-icon" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20" height="20">
		</a>
	</label>';

	$output .= '<textarea name="field['.$element_type.'_'.$count.']['.$field_id.']" placeholder="'.$placeholder.'" >'.$value.'</textarea>';

	echo apply_filters('plchf_msb_site_settings_field_text_area_filter', $output);

}

add_action('plchf_msb_site_settings_field_text_area','plchf_msb_site_settings_field_text_area', 10, 4);