<?php
	/**
	 * plchf_add_button_element_button function.
	 *
	 * @access public
	 * @return void
	 		Add Styled Button Element to the Page Elements Menu
	 */
	function plchf_add_button_element_button() {
		plchf_msb_add_page_element('Button');
	} add_action('plchf_msb_content_elements','plchf_add_button_element_button');

	/**
	 * plchf_msb_page_element_settings_button function.
	 *
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 		Create Settings for the Styled Button Element
	 */
	function plchf_msb_page_element_settings_button($count, $values){
		#Define Element Type
		$element_type 	= 'Button';
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'text',
																					'name' 				=> 'Button Text',
																					'id' 					=> '_button_text_',
																					'tooltip' 		=> 'Enter Button Text Here',
																					'placeholder' => 'Button Text',
																				));

		$fields[] = array( 'field' 	=> array( 'type' 				=> 'text',
																					'name' 				=> 'Button link',
																					'id' 					=> '_button_link_',
																					'tooltip' 		=> 'Enter the Button link Here',
																					'placeholder' => 'URL, Phone, Or Email',
																				));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Button Type',
																					'id' 			=> '_button_href_type_',
																					'tooltip' => 'Specify a URl, Phone#, Email, SMS, Address',
																					'options' => array( NULL  => 'URL',
																															'tel:'   => 'Telephone',
																															'mailto:'=> 'Email',
																															'https://maps.google.com/?q='=> 'Address',
																															'sms://'=> 'SMS',
																														)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Button Target',
																					'id' 			=> '_button_target_',
																					'tooltip' => 'Open the link in the same window or a new window?',
																					'options' => array( '_self' => 'Open in Same Window',
																															'_blank'=> 'Open in New Window',
																														)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Button Size',
																					'id' 			=> '_button_size_',
																					'tooltip' => 'Choose the size of the button',
																					'options' => array( 'btn-mini'	=> 'Mini',
																															'btn-small'	=> 'Small',
																														  'btn-large'	=> 'Large',
																														)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Button Style',
																					'id' 			=> '_button_style_',
																					'tooltip' => 'Choose the style of the button',
																					'options' => array( NULL => 'Default',
																															'btn-primary'	=> 'Primary',
																															'btn-info'		=> 'Info',
																															'btn-success'	=> 'Success',
																															'btn-danger'	=> 'Warning',
																															'btn-inverse'	=> 'Inverse',
																														)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Button Alignment',
																					'id' 			=> '_button_align_',
																					'tooltip' => 'Choose the alignment of the button',
																					'options' => array( 'floatl'		=> 'Left',
																															'floatc'		=> 'Center',
																															'floatr'		=> 'Right',
																														)));

		$fields[] = array( 'field' 	=> array( 'type' 			=> 'icon_select',
																					'name' 			=> 'Button Icon',
																					'id' 			=> '_button_icon_',
																					'tooltip' 		=> 'Should the Button have an Icon?',
																					));

		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_button','plchf_msb_page_element_settings_button', 10, 2);

	/**
	 * plchf_msb_page_element_output_button function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
			 Display Output for the Styled Button Element
	 */
	function plchf_msb_page_element_output_button($values) {
		$text		=& $values['_button_text_'];
		$url		=& $values['_button_link_'];
		$href		=& $values['_button_href_type_'];
		$target	=& $values['_button_target_'];
		$size 	= ' '.$values['_button_size_'];
		$style 	= ' '.$values['_button_style_'];
		$align	= ' '.$values['_button_align_'];
		$icon		=& $values['_button_icon_'];
		$values['_button_icon_color_'][0]	=& $values['_button_icon_color_'][0];
		$iconcolor	= ' '.$values['_button_icon_color_'][0];
		$state	=& $state;
		#Check to see if Icon was set
		if ($icon != 'no-icon') {
			#Set Icon Color, Default to White
			if ($iconcolor) {
				$iconcolor = $iconcolor;
			} else {
				$iconcolor = '#fff';
			}
			$icon = '<i class="'.$icon.'" style="color:'.$iconcolor.'"></i> ';

		} else {
			#If No Icon is selected, don't output an icon
			$icon = NULL;
		}
		#Output a Paragraph with the Styled Button
		$output = '<p>
								<a href="'.$href.$url.'" class="btn'.$align.$style.$size.$state.'" target="'.$target.'">'.$icon.$text.'</a>
								<div class="clearfix"></div>
							</p>';
		echo apply_filters('plchf_msb_page_element_output_button_filter', $output);
	} add_action('plchf_msb_page_element_output_button','plchf_msb_page_element_output_button', 10, 1);