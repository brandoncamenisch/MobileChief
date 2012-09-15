<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_text_element_well_section() {

		plchf_msb_add_page_section('Well Section');

	}

	add_action('plchf_msb_content_elements','plchf_add_text_element_well_section', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Well Section
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_well_section($count, $values){

		// Define Element Type
		$section_type 	= 'Well Section';

		// Define Settings Fields
		$fields[] = array(

			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter some text',
				'id' 			=> '_text_',
				'tooltip' 		=> 'Enter your text here. Plain Text, No HTML',
				'placeholder' 	=> 'Enter your text to add it to the page',
			),

		);

		// Create Element Settings Panel
		plchf_msb_page_section_start($section_type, $fields, $count, $values);
		plchf_msb_page_section_end($section_type, $fields, $count, $values);

	}

	add_action('plchf_msb_page_element_settings_well_section','plchf_msb_page_element_settings_well_section', 10, 2);