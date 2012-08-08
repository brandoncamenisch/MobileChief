<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_text_element_text() {
	
		plchf_msb_add_page_element('Text');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_text_element_text');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Text Element
/* ---------------------------------------------------------------------------- */

function plchf_page_element_settings_text(){
	
	// Define Element Type
	$element_type 	= 'Text';
	
	// Define Settings Fields
	$fields[] = array(
		
		'field' 	=> array(
			'type' 			=> 'text',
			'name' 			=> 'This is the Name',
			'id' 			=> '_text_',
			'tooltip' 		=> 'Enter your text to add it to the page',
			'placeholder' 	=> 'Enter your text to add it to the page',
		),
	
	);
	
	// Define Settings Fields
	$fields[] = array(
		
		'field' 	=> array(
			'type' 			=> 'text',
			'name' 			=> 'This is the Name',
			'id' 			=> '_text_2_',
			'tooltip' 		=> 'Enter your text to add it to the page',
			'placeholder' 	=> 'Enter your text to add it to the page',
		),
	
	);
	
	// Create Element Settings Panel
	plchf_page_element_settings_panel($element_type, $fields);
	
}

add_action('plchf_page_element_settings_text','plchf_page_element_settings_text');

/* ---------------------------------------------------------------------------- */
/* Display Output for the Text Element
/* ---------------------------------------------------------------------------- */

