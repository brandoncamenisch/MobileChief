<?php

/* ---------------------------------------------------------------------------- */
/* Hidden Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_hidden($fields, $element_type, $count, $values) {

	// Get the Element Type
	$element_type 	= $element_type;

	// Get the Field Definitions
	$type 			=& $fields['field']['type'];
	$label 			=& $fields['field']['name'];
	$tooltip =& $fields['tooltip'];
	$placeholder	=& $fields['field']['placeholder'];
	$field_id		=& $fields['field']['id'];

	// Get the saved Value
	$value			=& $values[''.$field_id.''];

	$output = '<p>'.$tooltip.'</p>';

	$output .= '
	<input type="hidden" name="field['.$element_type.'_'.$count.']['.$field_id.']" placeholder="'.$placeholder.'" value="'.$value.'"/>
	';

	echo apply_filters('plchf_msb_page_element_settings_field_hidden_area_filter', $output);
}

add_action('plchf_msb_page_element_settings_field_hidden','plchf_msb_page_element_settings_field_hidden', 10, 4);