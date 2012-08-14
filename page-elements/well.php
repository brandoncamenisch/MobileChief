<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_well_element_well_section() {
	
		plchf_msb_add_page_element('Well Section');
		
	}
	
	add_action('plchf_msb_style_elements','plchf_add_well_element_well_section');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Well Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_well_section($count, $values){
		
		// Define Element Type
		$element_type 	= 'Well Section';

		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'hidden',
				'name' 			=> 'Enter some text',
				'id' 			=> '_text_',
				'tooltip' 		=> 'Allows you to put Content in an area that appears indented',
				'placeholder' 	=> 'Enter your text to add it to the page',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_well_section','plchf_msb_page_element_settings_well_section', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Well Div Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_well_section($values) {
		
		// Output a Paragraph with the Well
		echo '<div class="well">';
		
	}
	
	add_action('plchf_msb_page_element_output_well_section','plchf_msb_page_element_output_well_section', 10, 1);
	
/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_well_element_end_well_section() {
	
		plchf_msb_add_page_element('End Well Section');
		
	}
	
	add_action('plchf_msb_style_elements','plchf_add_well_element_end_well_section');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the End Well Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_end_well_section($count, $values){
		
		// Define Element Type
		$element_type 	= 'End Well Section';

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
	
	add_action('plchf_msb_page_element_settings_end_well_section','plchf_msb_page_element_settings_end_well_section', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Well Div Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_end_well_section($values) {
		
		// Output a Paragraph with the Well
		echo '</div>';
		
	}
	
	add_action('plchf_msb_page_element_output_end_well_section','plchf_msb_page_element_output_end_well_section', 10, 1);