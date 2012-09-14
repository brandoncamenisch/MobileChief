<?php

/* ---------------------------------------------------------------------------- */
/* Select Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_select($fields, $element_type, $count, $values) {

	$type 			= $fields['type'];
	$label 			= $fields['name'];
	$tooltip		= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];
	$options		= $fields['options'];

	// Get the saved Value
	$value			= $values[''.$field_id.''];

	// Field Label
	$output .= '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
		</a>
	</label>';

	// Select Field
	$output .= '<select name="field['.$element_type.'_'.$count.']['.$field_id.']">';

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