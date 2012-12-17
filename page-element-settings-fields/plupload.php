<?php

/* ---------------------------------------------------------------------------- */
/* Plupload Field
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_field_plupload($fields, $element_type, $count, $values) {

		// Get the Element Type
		$element_type 	= $element_type;

		// Get the Field Definitions
		$type 			=& $fields['field']['type'];
		$label 			=& $fields['field']['name'];
		$tooltip	 	=& $fields['field']['tooltip'];
		$placeholder=& $fields['field']['placeholder'];
		$field_id		=& $fields['field']['id'];

		// Get Saved Values
		$value			=& $values[''.$field_id.''];

		if ($multiple == 'true') {
			$multiple = true;
			$upload_text = 'Upload Images';
		} else {
			$multiple = false;
			$upload_text = 'Upload Image';
		}

		$id 		= $field_id.$count;
		$svalue 	= $value;
		$multiple 	= $multiple;
		$width 		= null;
		$height 	= null;

		// Label & Tooltip
		$output = '
		<label>'.$label.'
			<a href="#" class="tipsy-se floatr" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
				<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20" height="20" class="info-tooltip-icon">
			</a>
		</label>';

		$output .= '<input type="hidden" name="field['.$element_type.'_'.$count.']['.$field_id.']" id="'.$id.'" value="'.$svalue.'" />';
			$output .= '<div class="plupload-upload-uic hide-if-no-js ';

				if ($multiple) { $output .='plupload-upload-uic-multiple'; } $output .='" id="'.$id.'plupload-upload-ui">';

		    	$output .= '<span class="ajaxnonceplu" id="ajaxnonceplu'.wp_create_nonce($id . 'pluploadan').'">';
		    	$output .= '</span>';
			    if ($width && $height):
			    	$output .= '<span class="plupload-resize"></span>';
			    	$output .= '<span class="plupload-width" id="plupload-width'.$width.'"></span>';
			    	$output .= '<span class="plupload-height" id="plupload-height'.$height.'"></span>';
			    endif;
		    	$output .= '<div class="filelist"></div>';
		    $output .= '</div>';
		    $output .= '<div class="plupload-thumbs ';
		    	if ($multiple) { $output .='plupload-thumbs-multiple'; }
		    $output .='" id="'.$id.'plupload-thumbs">';
		    $output .= '</div>';
		$output .= '<div class="clear"></div>';
		$output .= '<input id="'.$id.'plupload-browse-button" type="button" value="'.$upload_text.'" class="btn btn-primary" />';
		$output .= '<div class="clear"></div>';
		$output .= '<br/>';

		echo apply_filters('plchf_msb_page_element_settings_field_plupload_filters',$output);

	}

	add_action('plchf_msb_page_element_settings_field_plupload','plchf_msb_page_element_settings_field_plupload', 10, 4);