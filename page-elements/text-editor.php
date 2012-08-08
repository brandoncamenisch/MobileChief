<?php
	
/* ---------------------------------------------------------------------------- */
/* Add Text Editor Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_text_element_text_editor() {
		
		// Add Page Element to the Menu
		plchf_msb_add_page_element('Text Editor');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_text_element_text_editor');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Text Editor Element
/* ---------------------------------------------------------------------------- */

function plchf_page_element_settings_text_editor(){
	
	// Define Element Type
	$element_type 	= 'Text Editor';
	
	$fields[] = array(
		
		'field' 	=> array(
			'type' 			=> 'wysiwyg',
			'name'			=> 'TinyMCE',
			'tooltip'		=> 'Enter some text here',
			'placeholder'	=> 'This is some placeholder text for the text area',
			'id' 			=> '_tinymce_',
		),
	
	);
	
	// Create Element Settings Panel
	plchf_page_element_settings_panel($element_type, $fields);
	
}

add_action('plchf_page_element_settings_text_editor','plchf_page_element_settings_text_editor');

/* ---------------------------------------------------------------------------- */
/* Display Output for the Text Editor Element
/* ---------------------------------------------------------------------------- */