<?php

/* ---------------------------------------------------------------------------- */
/* Colorpicker Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_colorpicker($fields, $count, $values) {
	
	$type 			= $fields['type'];
	$label 			= $fields['name'];
	$tooltip	 	= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];
	$default		= $fields['default'];
	
	// Get the saved Value
	$value			= $values[''.$field_id.''];
		
	if ($value) {
		$value = $value;
	} else {
		$value = '#cc3333';
	}
	
	$output .= '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
		</a>
	</label>';
	
	$output .= '
	<input type="text" class="colorpicker" data-colorpicker="colorpicker_'.$count.'" name="element['.$element_type.'_'.$count.']['.$field_id.']" value="'.$value.'" />';
	
	$output .= '
	<div id="colorpicker_'.$count.'"></div>
	';
	
	echo apply_filters('plchf_msb_page_element_settings_field_text_area_filter', $output);
}

add_action('plchf_msb_site_settings_field_colorpicker','plchf_msb_site_settings_field_colorpicker', 10, 4);