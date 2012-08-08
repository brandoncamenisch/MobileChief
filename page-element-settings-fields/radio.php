<?php 

/* ---------------------------------------------------------------------------- */
/* Radio Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_radio($fields, $element_type) {
	
	$element_type 	= $element_type;
	$type 			= $fields['field']['type'];
	$label 			= $fields['field']['name'];
	$tooltip	 	= $fields['field']['tooltip'];
	$placeholder	= $fields['field']['placeholder'];
	$field_id		= $fields['field']['id'];
	$options		= $fields['field']['options'];
	
	$output .= '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
		</a>
	</label>
	';
	
	// Loop through the Radio Field Options
	foreach ($options as $option_key => $option_value) {
	
		$output .= '<input type="radio" name="'.$field_id.'['.$element_type.'][]" value="'.$option_key.'"> '.$option_value.'<br/>';
		
	}
	
	echo apply_filters('plchf_msb_page_element_settings_field_radio_filter', $output);
	
}

add_action('plchf_msb_page_element_settings_field_radio','plchf_msb_page_element_settings_field_radio', 10, 2);