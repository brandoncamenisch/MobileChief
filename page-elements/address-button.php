<?php
	/**
	 * plchf_add_address_button_element_address_button function.
	 * Add Address Button Element to the Page Elements Menu
	 * @access public
	 * @return void
	 */
	function plchf_add_address_button_element_address_button() {
		plchf_msb_add_page_element('Address Button');
	}
	#To add an element to a section, change the action to reference that section
	#ex: plchf_msb_content_elements adds to the content section, and plchf_msb_media_elements adds to the media section
	add_action('plchf_msb_content_elements','plchf_add_address_button_element_address_button');

	/**
	 * plchf_msb_page_element_settings_address_button function.
	 * Create Settings for the Address Button Element
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 */
	function plchf_msb_page_element_settings_address_button($count, $values){
		#Define Element Type
		$element_type 	= 'Address Button';
		#Define Settings Fields
		$fields[] = array( 'field' 	  => array(
												'type' 		=> 'html',
												'content' => '<p>The Address Button is a styled button that links to a Google Map</p>',
												),
								);
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'text',
																					'name' 				=> 'Button Text',
																					'id' 					=> '_button_text_',
																					'tooltip' 		=> 'Enter Button Text Here',
																					'placeholder' => 'Button Text',
																					),
								);
		#Define Settings Fields
		$fields[] = array('field' 	=> array('type' 				=> 'text',
																					'name' 				=> 'Address',
																					'id' 					=> '_button_address_',
																					'tooltip' 		=> 'Enter the Address to open in Google Maps',
																					'placeholder' => '123 Insdustrial Ave, Anycity, ST 55555',
																				),
								);
		#Define Settings Fields
		$fields[] = array('field' 	=> array( 'type' 				=> 'select',
																					'name' 				=> 'Button Target',
																					'id' 					=> '_button_target_',
																					'tooltip' 		=> 'Open the link in the same window or a new window?',
																					'options' 		=> array( '_self'		=> 'Open in Same Window',
																																	'_blank'	=> 'Open in New Window',
																																)
																				),
								     );
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'select',
																					'name' 				=> 'Button Style',
																					'id' 					=> '_button_style_',
																					'tooltip' 		=> 'Choose the style of the button',
																					'options' 		=> array( NULL					=> 'Default',
																																  'btn-primary'	=> 'Primary',
																																  'btn-info'		=> 'Info',
																																  'btn-success'	=> 'Success',
																																  'btn-danger'	=> 'Warning',
																																  'btn-inverse'	=> 'Inverse',
																																 )
																			  ),
											);
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'select',
																					'name' 				=> 'Button Allignment',
																					'id' 					=> '_button_align_',
																					'tooltip' 		=> 'Choose the alignment of the button',
																					'options' 		=> array( 'floatl'		=> 'Left',
																																	'floatc'		=> 'Center',
																																	'floatr'		=> 'Right',
																																)
																				),
											);
		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	}
	add_action('plchf_msb_page_element_settings_address_button','plchf_msb_page_element_settings_address_button', 10, 2);

	/**
	 * plchf_msb_page_element_output_address_button function.
	 * Display Output for the Address Button Element
	 * @access public
	 * @param mixed $values
	 * @return void
	 */
	function plchf_msb_page_element_output_address_button($values) {
		$text		 =& $values['_button_text_'];
		$address =& $values['_button_address_'];
		$target	 =& $values['_button_target_'];
		$size 	 =  ' btn-large';
		$style 	 = ' '.$values['_button_style_'];
		$align	 = ' '.$values['_button_align_'];
		$icon		 = 'icon-home';
		#Check to see if Icon was set
		if ($icon != 'no-icon') {

			$icon = '<i class="'.$icon.'"></i> ';

		} else {

			#If No Icon is selected, don't output an icon
			$icon =& $icon;
		}

		#Output a Paragraph with the Address Button
		echo '<p>
						<a href="https://maps.google.com/?q='.$address.'" class="btn'.$align.$style.$size.'" target="'.$target.'">'.$icon.$text.'</a>
						<div class="clearfix"></div>
					</p>';
	}
	add_action('plchf_msb_page_element_output_address_button','plchf_msb_page_element_output_address_button', 10, 1);