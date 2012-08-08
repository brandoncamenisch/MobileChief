<?php

/* ---------------------------------------------------------------------------- */
/* Select Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_select($fields, $element_type) {
	
	$element_type 	= $element_type;
	$type 			= $fields['field']['type'];
	$label 			= $fields['field']['name'];
	$tooltip	 	= $fields['field']['tooltip'];
	$placeholder	= $fields['field']['placeholder'];
	$field_id		= $fields['field']['id'];
	$options		= $fields['field']['options'];
	
	// Field Label
	$output .= '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
		</a>
	</label>
	';
	
	// Select Field
	$output .= '<select name="'.$field_id.'['.$element_type.'][]">';
		
		// Loop through the Select Field Options
		foreach ($options as $option_key => $option_value) {
			
			$output .= '<option value="'.$option_key.'">'.$option_value.'</option>';
			
		}
	
	// End Select Field
	$output .= '</select>';
	
	echo apply_filters('plchf_msb_page_element_settings_field_select_filter', $output);
	
}

add_action('plchf_msb_page_element_settings_field_select','plchf_msb_page_element_settings_field_select', 10, 2);