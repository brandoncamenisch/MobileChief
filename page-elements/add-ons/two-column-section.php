<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_well_element_two_column_section() {
	
		plchf_msb_add_page_element('Two Column Section');
		
	}
	
	add_action('plchf_msb_style_elements','plchf_add_well_element_two_column_section');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Well Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_two_column_section($count, $values){
		
		// Define Element Type
		$element_type 	= 'Two Column Section';

		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'hidden',
				'name' 			=> 'Enter some text',
				'id' 			=> '_text_',
				'tooltip' 		=> 'Allows you to put Content in an area that is seperated into two columns',
				'placeholder' 	=> 'Enter your text to add it to the page',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_two_column_section','plchf_msb_page_element_settings_two_column_section', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Well Div Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_two_column_section($values) {
		
		// Output a Paragraph with the Well
		echo '<div class="span6 ns">';
		
	}
	
	add_action('plchf_msb_page_element_output_two_column_section','plchf_msb_page_element_output_two_column_section', 10, 1);
	
