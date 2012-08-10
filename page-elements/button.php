<?php

/* ---------------------------------------------------------------------------- */
/* Add Button Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_button_element_button() {
	
		plchf_msb_add_page_element('Button ');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_button_element_button');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Button Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_button($count, $values){
		
		// Define Element Type
		$element_type 	= 'Button';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter some text',
				'id' 			=> '_text_',
				'tooltip' 		=> 'Enter your text here. Plain Button, No HTML',
				'placeholder' 	=> 'Enter your text to add it to the page',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_button','plchf_msb_page_element_settings_button', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Button Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_button($values) {
		
		// Get the Values
		$text 	= $values['_text_'];
		
		// Output a Paragraph with the Button
		echo '<p>'.$text.'</p>';
		
	}
	
	add_action('plchf_msb_page_element_output_button','plchf_msb_page_element_output_button', 10, 1);