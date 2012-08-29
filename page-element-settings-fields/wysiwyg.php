<?php

/* ---------------------------------------------------------------------------- */
/* WYSIWYG Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_wysiwyg($fields, $element_type, $count, $values) {
	
	// Get the Element Type
	$element_type 	= $element_type;
	
	$type 			= $fields['field']['type'];
	$label 			= $fields['field']['name'];
	$tooltip	 	= $fields['field']['tooltip'];
	$placeholder	= $fields['field']['placeholder'];
	$field_id		= $fields['field']['id'];
	
	// Get the saved Value
	$value			= $values[''.$field_id.''];
	
	$output .= '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
		</a>
	</label>
	';
	
	$output .= '<input type="hidden" name="'.$field_id.'['.$element_type.'][]">';
	
	$output .= '<textarea name="field['.$element_type.'_'.$count.']['.$field_id.']" placeholder="'.$placeholder.'" class="tinymce" style="width:100%; height: 154px; float:left; margin-bottom:20px;">'.$value.'</textarea>';
	
	echo apply_filters('plchf_msb_page_element_settings_field_wysiwyg_filter', $output);
	
}

add_action('plchf_msb_page_element_settings_field_wysiwyg','plchf_msb_page_element_settings_field_wysiwyg', 10, 4);