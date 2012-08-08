<?php

/* ---------------------------------------------------------------------------- */
/* Datepicker Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_datepicker($fields, $element_type) {
	
	$element_type 	= $element_type;
	$type 			= $fields['field']['type'];
	$label 			= $fields['field']['name'];
	$tooltip	 	= $fields['field']['tooltip'];
	$placeholder	= $fields['field']['placeholder'];
	$field_id		= $fields['field']['id'];
	
	$output .= '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
		</a>
	</label>';
	
	$output .= '
	<input type="text" name="'.$field_id.'['.$element_type.'][]" class="datepicker" value="" >
	';
	
	echo apply_filters('plchf_msb_page_element_settings_field_text_area_filter', $output);
}

add_action('plchf_msb_page_element_settings_field_datepicker','plchf_msb_page_element_settings_field_datepicker', 10, 2);