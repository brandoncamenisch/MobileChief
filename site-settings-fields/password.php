<?php

/* ---------------------------------------------------------------------------- */
/* Password Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_password($fields, $count) {

	// Get the Element Type
	$element_type 	= $element_type;

	// Get the Field Definitions
	$type 				= $fields['type'];
	$label 				= $fields['name'];
	$tooltip	 		= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id			= $fields['id'];

	// Get the saved Value
	$value			= $values[''.$field_id.''];

	$output .= '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
		</a>
	</label>';

	$output .= '
	<input type="password" name="field['.$element_type.'_'.$count.']['.$field_id.']" placeholder="'.$placeholder.'" value="'.$value.'"/>
	';

	echo apply_filters('plchf_msb_site_settings_field_password_area_filter', $output);
}

add_action('plchf_msb_site_settings_field_password','plchf_msb_site_settings_field_password', 10, 4);