<?php

/* ---------------------------------------------------------------------------- */
/* Add Address Button Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_address_button_element_address_button() {
	
		plchf_msb_add_page_element('Address Button');
		
	}
	
	// To add an element to a section, change the action to reference that section
	//
	// ex: plchf_msb_content_elements adds to the content section, and plchf_msb_media_elements adds to the media section
	//
	add_action('plchf_msb_content_elements','plchf_add_address_button_element_address_button');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Address Button Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_address_button($count, $values){
		
		// Define Element Type
		$element_type 	= 'Address Button';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'html',
				'content' 		=> '<p>The Address Button is a styled button that links to a Google Map</p>',
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Button Text',
				'id' 			=> '_button_text_',
				'tooltip' 		=> 'Enter Button Text Here',
				'placeholder' 	=> 'Button Text',
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Button Address',
				'id' 			=> '_button_address_',
				'tooltip' 		=> 'Enter the Address to open in Google Maps',
				'placeholder' 	=> '123 PluginChief Road, Denver, CO 80213',
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Button Target',
				'id' 			=> '_button_target_',
				'tooltip' 		=> 'Open the link in the same window or a new window?',
				'options' 		=> array(
					'_self'		=> 'Open in Same Window',
					'_blank'	=> 'Open in New Window',
				)
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Button Size',
				'id' 			=> '_button_size_',
				'tooltip' 		=> 'Choose the size of the button',
				'options' 		=> array(
					'btn-mini'	=> 'Mini',
					'btn-small'	=> 'Small',
					'btn-large'	=> 'Large',
				)
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Button Style',
				'id' 			=> '_button_style_',
				'tooltip' 		=> 'Choose the style of the button',
				'options' 		=> array(
					''				=> 'Default',
					'btn-primary'	=> 'Primary',
					'btn-info'		=> 'Info',
					'btn-success'	=> 'Success',
					'btn-danger'	=> 'Warning',
					'btn-inverse'	=> 'Inverse',
				)
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Button Allignment',
				'id' 			=> '_button_align_',
				'tooltip' 		=> 'Choose the alignment of the button',
				'options' 		=> array(
					'floatl'		=> 'Left',
					'floatc'		=> 'Center',
					'floatr'		=> 'Right',
				)
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Button State',
				'id' 			=> '_button_state_',
				'tooltip' 		=> 'Choose the state of the button',
				'options' 		=> array(
					'enabled'		=> 'Enabled',
					'disabled'		=> 'Disabled',
				)
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'icon_select',
				'name' 			=> 'Button Icon',
				'id' 			=> '_button_icon_',
				'tooltip' 		=> 'Should the Button have an Icon?',
			),
		
		);

		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'colorpicker',
				'name' 			=> 'Button Icon Color',
				'id' 			=> '_button_icon_color_',
				'tooltip' 		=> 'Choose the color of the button icon',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_address_button','plchf_msb_page_element_settings_address_button', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Address Button Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_address_button($values) {
		
		$text		= $values['_button_text_'];
		$url		= $values['_button_url_'];
		$target		= $values['_button_target_'];
		$size 		= ' '.$values['_button_size_'];
		$style 		= ' '.$values['_button_style_'];
		$align		= ' '.$values['_button_align_'];
		$state		= ' '.$values['_button_state_'];
		$icon		= $values['_button_icon_'];
		$iconcolor	= ' '.$values['_button_icon_color_'];
		
		// Check to see if Icon was set
		if ($icon != 'no-icon') {
			
			// Set Icon Color, Default to White
			if ($iconcolor) {
				$iconcolor = $iconcolor;
			} else {
				$iconcolor = '#fff';
			}
						
			$icon = '<i class="'.$icon.'" style="color:'.$iconcolor.'"></i> ';
		
		} else {
			
			// If No Icon is selected, don't output an icon
			$icon = '';
		
		}
		
		// Output a Paragraph with the Address Button
		echo '
		<p>
			<a href="'.$url.'" class="btn'.$align.$style.$size.$state.'" target="'.$target.'">'.$icon.$text.'</a>
			<div class="clearfix"></div>
		</p>
		';
		
	}
	
	add_action('plchf_msb_page_element_output_address_button','plchf_msb_page_element_output_address_button', 10, 1);