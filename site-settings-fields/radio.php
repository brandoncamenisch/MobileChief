<?php

/* ---------------------------------------------------------------------------- */
/* Radio Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_radio($fields, $count) {

	$type 			=& $fields['type'];
	$label	 		=& $fields['name'];
	$tooltip		=& $fields['tooltip'];
	$placeholder=& $fields['placeholder'];
	$field_id		=& $fields['id'];
	$options		=& $fields['options'];

	// Get the saved Value
	$value			= plchf_msb_get_site_option($type, $field_id);

	$output = '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20" height="20" class="info-tooltip-icon">
		</a>
	</label>';

	// Loop through the Radio Field Options
	foreach ($options as $option_key => $option_value) {

		// Set Selected Option
		if ($value == $option_key) {
			$checked = ' checked="checked"';
		}
		$element_type =& $element_type;
		$checked =& $checked;

		$output .= '<input type="radio" name="field['.$element_type.'_'.$count.']['.$field_id.']" value="'.$option_key.'"'.$checked.'> '.$option_value.'<br/>';

	}

	echo apply_filters('plchf_msb_site_settings_field_radio_filter', $output);

}

add_action('plchf_msb_site_settings_field_radio','plchf_msb_site_settings_field_radio', 10, 4);