<?php

/* ---------------------------------------------------------------------------- */
/* Radio Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_radio($fields, $element_type, $count, $values) {

	// Get the Element Type
	$element_type 	= $element_type;

	$type 			=& $fields['field']['type'];
	$label 			=& $fields['field']['name'];
	$tooltip	 	=& $fields['field']['tooltip'];
	$placeholder=& $fields['field']['placeholder'];
	$field_id		=& $fields['field']['id'];
	$options		=& $fields['field']['options'];

	// Get the saved Value
	$value			=& $values[''.$field_id.''];

	$output .= '
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

		$output .= '<input type="radio" name="field['.$element_type.'_'.$count.']['.$field_id.']" value="'.$option_key.'"'.$checked.'> '.$option_value.'<br/>';

	}

	echo apply_filters('plchf_msb_page_element_settings_field_radio_filter', $output);

}

add_action('plchf_msb_page_element_settings_field_radio','plchf_msb_page_element_settings_field_radio', 10, 4);