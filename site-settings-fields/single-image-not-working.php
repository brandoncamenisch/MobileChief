<?php

/* ---------------------------------------------------------------------------- */
/* Text Field
/* ---------------------------------------------------------------------------- */

	function plchf_msb_site_settings_field_single_image($fields, $count) {
	
		// Get the Field Definitions
		$type 			= $fields['type'];
		$label 			= $fields['name'];
		$tooltip	 	= $fields['tooltip'];
		$placeholder	= $fields['placeholder'];
		$field_id		= $fields['id'];
	
		// Get the saved Value
		$value			= plchf_msb_get_site_option($type, $field_id);
	
		$output = '
		<label>'.$label.'
			<a href="#" class="tipsy-se floatr" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
				<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20" height="20" class="info-tooltip-icon">
			</a>
		</label>';
	
		$output .= '
		<input type="file" name="field['.$type.$field_id.']['.$field_id.']" placeholder="Upload Image or Enter Image URL" value="'.$value.'"/>
		';
		
		$output .= '<input class="btn btn-primary" type="submit" value="Upload" />';
	
		echo apply_filters('plchf_msb_site_settings_field_text_filter', $output);
	
		// Send the files to the Insert Attachment function
		if ( $_FILES ) {
			
			$files = $_FILES['field'];
			foreach ($files['name'] as $key => $value) {
				if ($files['name'][$key]) {
					$file = array(
						'name' 		=> $files['name'][$key],
						'type' 		=> $files['type'][$key],
						'tmp_name' 	=> $files['tmp_name'][$key],
						'error' 	=> $files['error'][$key],
						'size' 		=> $files['size'][$key]
					);
			
					$_FILES = array("upload_attachment" => $file);
			
					foreach ($_FILES as $file => $array) {
						$newupload = insert_attachment($file,$post->ID);
					}
				}
			}
		}
	
	}
	
	add_action('plchf_msb_site_settings_field_single_image','plchf_msb_site_settings_field_single_image', 10, 2);