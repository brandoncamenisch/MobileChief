<?php

/* ---------------------------------------------------------------------------- */
/* Hidden Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_hidden($fields, $count) {

	// Get the Field Definitions
	$type 			= $fields['type'];
	$label 			= $fields['name'];
  if(isset($fields['tooltip']) ? $tooltip = $fields['tooltip'] : $tooltip = NULL);
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];

	// Get the saved Value
	$value			= plchf_msb_get_site_option($type, $field_id);
	$output = '<p>'.$tooltip.'</p>';

	$output .= '
	<input type="hidden" name="field['.$element_type.'_'.$count.']['.$field_id.']" placeholder="'.$placeholder.'" value="'.$value.'"/>
	';

	echo apply_filters('plchf_msb_site_settings_field_hidden_area_filter', $output);
}

add_action('plchf_msb_site_settings_field_hidden','plchf_msb_site_settings_field_hidden', 10, 4);