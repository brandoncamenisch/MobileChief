<?php

/* ---------------------------------------------------------------------------- */
/* Plupload Field
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_field_plupload($fields, $element_type, $count, $values) {
	
		// Get the Element Type
		$element_type 	= $element_type;
		
		// Get the Field Definitions
		$type 			= $fields['field']['type'];
		$label 			= $fields['field']['name'];
		$tooltip	 	= $fields['field']['tooltip'];
		$placeholder	= $fields['field']['placeholder'];
		$field_id		= $fields['field']['id'];
		
		// Get the saved Value
		$value			= $values[''.$field_id.''];
	
		// adjust values here
		$id 		= $count;
		$multiple 	= true; 	// allow multiple files upload
		$width 		= null; 	// If you want to automatically resize all uploaded images then provide width here (in pixels)
		$height 	= null; 	// If you want to automatically resize all uploaded images then provide height here (in pixels)
		 
		$output .= '
		<label>'.$label.'
			<a href="#" class="tipsy-se floatr" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
				<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20px">
			</a>
		</label>';
		$output .= '<input type="hidden" name="field['.$element_type.'_'.$count.']['.$field_id.']" id="'.$id.'" value="'.$value.'" />';
		$output .= '<div class="plupload-upload-uic hide-if-no-js '; 
			
			if ($multiple) { 
				$output .= 'plupload-upload-uic-multiple'; 
			}
		
		$output .= '" id="'.$id.'plupload-upload-ui">';
		
		    $output .= '<span class="ajaxnonceplu" id="ajaxnonceplu'. wp_create_nonce($id . "pluploadan") .'"></span>';
		    
		    if ($width && $height) {
		    	$output .= '<span class="plupload-resize"></span><span class="plupload-width" id="plupload-width'.$width.'"></span>';
		        $output .= '<span class="plupload-height" id="plupload-height'.$height.'"></span>';
		    }
		    
		    $output .= '<div class="filelist"></div>';
		
		$output .= '</div>';
		
		$output .= '<div class="plupload-thumbs ';
		
			if ($multiple) { 
				$output .= 'plupload-thumbs-multiple';
			} 
		
			$output .= '" id="'. $id .'plupload-thumbs">';
		
		$output .= '</div>';
		
			// Show Thumbs Here if there are any already
			
			
		
		$output .= '<div class="clear"></div>';
		
		$output .= '<br/>';
		
		$output .= '<input id="'.$id.'plupload-browse-button" type="button" class="button-primary button btn btn-primary" value="Select Files" class="button" />';
		
		$output .= '<div class="clear"></div>';
		
		$output .= '<br/>';
		
		echo apply_filters('plchf_msb_page_element_settings_field_plupload_filters',$output);
		
	}
	
	add_action('plchf_msb_page_element_settings_field_plupload','plchf_msb_page_element_settings_field_plupload', 10, 4);