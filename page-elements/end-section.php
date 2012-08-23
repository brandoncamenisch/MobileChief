<?php

	function plchf_add_end_element_end_section() {
	
		plchf_msb_add_page_element('End Section');
		
	}
	
	add_action('plchf_msb_style_elements','plchf_add_end_element_end_section');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the End Well Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_end_section($count, $values){
		
		// Define Element Type
		$element_type 	= 'End Section';

		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'hidden',
				'name' 			=> 'Enter some text',
				'id' 			=> '_text_',
				'tooltip' 		=> 'Ends the Well section',
				'placeholder' 	=> 'Enter your text to add it to the page',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_end_section','plchf_msb_page_element_settings_end_section', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Well Div Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_end_section($values) {
		
		// Output a Paragraph with the Well
		echo '</div>';
		
	}
	
	add_action('plchf_msb_page_element_output_end_section','plchf_msb_page_element_output_end_section', 10, 1);