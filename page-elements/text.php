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
	$settings		= 'Text';
	
	// Create Element Settings Panel
	plchf_page_element_settings_panel($element_type, $settings);
	
}

add_action('plchf_page_element_settings_text','plchf_page_element_settings_text');

/* ---------------------------------------------------------------------------- */
/* Display Output for the Text Element
/* ---------------------------------------------------------------------------- */

