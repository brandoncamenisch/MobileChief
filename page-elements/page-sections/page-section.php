<?php

/* ---------------------------------------------------------------------------- */
/* Add Page Section Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_page_section_element_page_section() {
	
		plchf_msb_add_page_element('Page Section');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_page_section_element_page_section');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Page Section Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_page_section($count, $values){
		
		// Define Element Type
		$element_type 	= 'Page Section';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter some page_section',
				'id' 			=> '_page_section_',
				'tooltip' 		=> 'Enter your page_section here. Plain Page Section, No HTML',
				'placeholder' 	=> 'Enter your page_section to add it to the page',
			),
		
		);
		
		// Create Element Settings Panel
		// plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
		plchf_msb_page_element_settings_section($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_page_section','plchf_msb_page_element_settings_page_section', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Page Section Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_page_section($values) {
		
		// Get the Values
		$page_section 	= $values['_page_section_'];
		
		// Output a Paragraph with the Page Section
		echo '<p>'.$page_section.'</p>';
		
	}
	
	add_action('plchf_msb_page_element_output_page_section','plchf_msb_page_element_output_page_section', 10, 1);