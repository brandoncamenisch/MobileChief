<?php

/* ---------------------------------------------------------------------------- */
/* Add Styled Button Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_styled_button_element_styled_button() {
	
		plchf_msb_add_page_element('Styled Button');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_styled_button_element_styled_button');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Styled Button Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_styled_button($count, $values){
		
		// Define Element Type
		$element_type 	= 'Styled Button';
		
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
				'name' 			=> 'Button URL',
				'id' 			=> '_button_url_',
				'tooltip' 		=> 'Enter the Button URL Here',
				'placeholder' 	=> 'http://pluginchief.com',
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
				'type' 			=> 'icon_select',
				'name' 			=> 'Button Icon',
				'id' 			=> '_button_icon_',
				'tooltip' 		=> 'Should the Button have an Icon?',
			),
		
		);

		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_styled_button','plchf_msb_page_element_settings_styled_button', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Styled Button Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_styled_button($values) {
		
		$text		= $values['_button_text_'];
		$url		= $values['_button_url_'];
		$target		= $values['_button_target_'];
		$size 		= ' '.$values['_button_size_'];
		$style 		= ' '.$values['_button_style_'];
		$align		= ' '.$values['_button_align_'];
		$icon		= $values['_button_icon_'];
		$iconcolor	= ' '.$values['_button_icon_color_'][0];
		
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
		
		// Output a Paragraph with the Styled Button
		$output .= '
		<p>
			<a href="'.$url.'" class="btn'.$align.$style.$size.$state.'" target="'.$target.'">'.$icon.$text.'</a>
			<div class="clearfix"></div>
		</p>
		';
		
		echo apply_filters('plchf_msb_page_element_output_styled_button_filter', $output);
		
	}
	
	add_action('plchf_msb_page_element_output_styled_button','plchf_msb_page_element_output_styled_button', 10, 1);