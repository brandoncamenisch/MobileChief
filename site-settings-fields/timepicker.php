<?php

/* ---------------------------------------------------------------------------- */
/* Timepicker Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_timepicker($fields, $count) {

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

	$output .= '
	<input type="text" name="field['.$element_type.'_'.$count.']['.$field_id.']" class="timepicker" value="'.$value.'" >
	';

	echo apply_filters('plchf_msb_page_element_settings_field_text_area_filter', $output);
}

add_action('plchf_msb_site_settings_field_timepicker','plchf_msb_site_settings_field_timepicker', 10, 4);