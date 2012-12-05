<?php

/* ---------------------------------------------------------------------------- */
/* Select Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_select($fields, $count) {

	$type 			= $fields['type'];
	$label 			= $fields['name'];
	$tooltip		= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];
	$options		= $fields['options'];

	// Get the saved Value
	$value			= plchf_msb_get_site_option($type, $field_id);

	// Field Label
	$output = '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20" height="20" class="info-tooltip-icon">
		</a>
	</label>';

	// Select Field
	$output .= '<select name="field['.$type.$field_id.']['.$field_id.']">';

		// Loop through the Select Field Options
		foreach ($options as $option_key => $option_value) {

			// Set Selected Option
			if ($value == $option_key) {
				$selected = ' selected="selected"';
			} else {
				$selected = '';
			}

			$output .= '<option value="'.$option_key.'"'.$selected.'>'.$option_value.'</option>';

		}

	// End Select Field
	$output .= '</select>';

	echo apply_filters('plchf_msb_site_settings_field_select_filter', $output);

}

add_action('plchf_msb_site_settings_field_select','plchf_msb_site_settings_field_select', 10, 4);