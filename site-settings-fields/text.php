<?php

/* ---------------------------------------------------------------------------- */
/* Text Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_text($fields, $count) {

	// Get the Field Definitions
	$type 			= $fields['type'];
	$label 			= $fields['name'];
	$tooltip	 	= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];

	// Get the saved Value
	$value			= plchf_msb_get_site_option($type, $field_id);

	$output = '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
		</a>
	</label>';

	$output .= '
	<input type="text" name="field['.$type.$field_id.']['.$field_id.']" placeholder="'.$placeholder.'" value="'.$value.'"/>
	';

	echo apply_filters('plchf_msb_site_settings_field_text_filter', $output);
}

add_action('plchf_msb_site_settings_field_text','plchf_msb_site_settings_field_text', 10, 4);