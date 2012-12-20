<?php

/* ---------------------------------------------------------------------------- */
/* Add Click To Call Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_click_to_sms_element_click_to_sms() {
	
		plchf_msb_add_page_element('Click To SMS');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_click_to_sms_element_click_to_sms');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Click To Call Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_click_to_sms($count, $values){
		
		// Define Element Type
		$element_type 	= 'Click To SMS';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'html',
				'content' 		=> '<p>The Click To Call is a styled button that links to a phone #</p>',
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
				'name' 			=> 'Button Phone Number',
				'id' 			=> '_button_number_',
				'tooltip' 		=> 'Enter the Phone #',
				'placeholder' 	=> 'Enter Your Phone # ex. 345-293-2083',
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
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_click_to_sms','plchf_msb_page_element_settings_click_to_sms', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Click To Call Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_click_to_sms($values) {
		
		$text		= $values['_button_text_'];
		$number		= $values['_button_number_'];
		$size 		= ' btn-large';
		$style 		= ' '.$values['_button_style_'];
		$align		= ' '.$values['_button_align_'];
		$icon		= 'icon-comment';
		
		// Check to see if Icon was set
		if ($icon != 'no-icon') {
						
			$icon = '<i class="'.$icon.'"></i> ';
		
		} else {
			
			// If No Icon is selected, don't output an icon
			$icon = '';
		
		}
		
		// Make use of the Mobile Device Detect Script
		$plchf_msb_device_detect = new PlchfMSB_Mobile_Detect;
		
		// If iOS
		if ($plchf_msb_device_detect->isiOS()) {
		// Output a Paragraph with the Click To Call
		
			// Output a Paragraph with the Click To Call
			$output .= '
			<p>
				<a href="sms://'.$number.'" class="btn'.$align.$style.$size.'" target="'.$target.'">'.$icon.$text.'</a>
				<div class="clearfix"></div>
			</p>
			';
		
		// If iOS
		} elseif ($plchf_msb_device_detect->isAndroidOS()) {
			
			// Output a Paragraph with the Click To Call
			$output .= '
			<p>
				<a href="smsto://'.$number.'" class="btn'.$align.$style.$size.$state.'" target="'.$target.'">'.$icon.$text.'</a>
				<div class="clearfix"></div>
			</p>
			';			
			
		} else {

			// Output a Paragraph with the Click To Call
			$output .= '
			<p>
				<a href="sms://'.$number.'" class="btn'.$align.$style.$size.$state.'" target="'.$target.'">'.$icon.$text.'</a>
				<div class="clearfix"></div>
			</p>
			';				
			
		}
		
		// Output the Button with a Filter
		echo apply_filters('plchf_msb_page_element_output_click_to_sms_filter',$output);
		
	}
	
	add_action('plchf_msb_page_element_output_click_to_sms','plchf_msb_page_element_output_click_to_sms', 10, 1);
	