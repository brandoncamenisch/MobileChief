<?php

/* ---------------------------------------------------------------------------- */
/* Text Area Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_text_area($fields, $element_type) {
	
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
	</label>
	';
	
	$output .= '<textarea name="'.$field_id.'['.$element_type.'][]" placeholder="'.$placeholder.'" ></textarea>';
	
	echo apply_filters('plchf_msb_page_element_settings_field_text_area_filter', $output);
	
}

add_action('plchf_msb_page_element_settings_field_text_area','plchf_msb_page_element_settings_field_text_area', 10, 2);