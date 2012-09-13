<?php

/* ---------------------------------------------------------------------------- */
/* WYSIWYG Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_wysiwyg($fields, $count) {

	$type 			= $fields['type'];
	$label 			= $fields['name'];
	$tooltip	 	= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];

	// Get the saved Value
	$value			= $values[''.$field_id.''];

	$output = '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
		</a>
	</label>
	';

	$output .= '<input type="hidden" name="'.$field_id.'['.$element_type.'][]">';

	$output .= '<textarea name="field['.$element_type.'_'.$count.']['.$field_id.']" placeholder="'.$placeholder.'" class="tinymce" style="width:100%; height: 154px; float:left; margin-bottom:20px;">'.$value.'</textarea>';

	echo apply_filters('plchf_msb_site_settings_field_wysiwyg_filter', $output);

}

add_action('plchf_msb_site_settings_field_wysiwyg','plchf_msb_site_settings_field_wysiwyg', 10, 4);