<?php

/* ---------------------------------------------------------------------------- */
/* Add Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_text_element_sample_element() {
		
		// Add Page Element to the Menu
		plchf_msb_add_page_element('Sample Element');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_text_element_sample_element');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Element
/* ---------------------------------------------------------------------------- */

function plchf_page_element_settings_sample_element(){
	
	// Define Element Type
	$element_type 	= 'Sample Element';
	
	$fields[] = array(
		
		'field' 	=> array(
			'type' 			=> 'text',
			'name'			=> 'Text',
			'tooltip'		=> 'Enter some text here',
			'placeholder'	=> 'This is some placeholder text for the text area',
			'id' 			=> '_sample_text_',
		),
	
	);
	
	$fields[] = array(
		
		'field' 	=> array(
			'type' 			=> 'textarea',
			'name'			=> 'Text Area',
			'tooltip'		=> 'Enter some text here',
			'placeholder'	=> 'This is some placeholder text for the text area',
			'id' 			=> '_sample_textarea_',
		),
	
	);
	
	$fields[] = array(
		
		'field' 	=> array(
			'type' 			=> 'colorpicker',
			'name'			=> 'ColorPicker',
			'tooltip'		=> 'Enter some text here',
			'placeholder'	=> 'This is some placeholder text for the text area',
			'id' 			=> '_sample_colorpicker_',
		),
	
	);
	
	$fields[] = array(
		
		'field' 	=> array(
			'type' 			=> 'datepicker',
			'name'			=> 'DatePicker',
			'tooltip'		=> 'Enter some text here',
			'placeholder'	=> 'This is some placeholder text for the text area',
			'id' 			=> '_sample_datepicker_',
		),
	
	);
	
	$fields[] = array(
		
		'field' 	=> array(
			'type' 			=> 'radio',
			'name'			=> 'Radio',
			'tooltip'		=> 'Enter some text here',
			'placeholder'	=> 'This is some placeholder text for the text area',
			'id' 			=> '_sample_radio_',
			'options'		=> array(
				'Option 1'	=> 'Option 1',
				'Option 2'	=> 'Option 2'
			)
		),
	
	);
	
	$fields[] = array(
		
		'field' 	=> array(
			'type' 			=> 'select',
			'name'			=> 'Select',
			'tooltip'		=> 'Enter some text here',
			'placeholder'	=> 'This is some placeholder text for the text area',
			'id' 			=> '_sample_select_',
			'options'		=> array(
				'Option 1'	=> 'Option 1',
				'Option 2'	=> 'Option 2'
			)
		),
	
	);
	
	$fields[] = array(
		
		'field' 	=> array(
			'type' 			=> 'wysiwyg',
			'name'			=> 'WYSIWYG',
			'tooltip'		=> 'Enter some text here',
			'placeholder'	=> 'This is some placeholder text for the text area',
			'id' 			=> '_sample_wysiwyg_',
		),
	
	);
	
	// Create Element Settings Panel
	plchf_page_element_settings_panel($element_type, $fields);
	
}

add_action('plchf_page_element_settings_sample_element','plchf_page_element_settings_sample_element');

/* ---------------------------------------------------------------------------- */
/* Display Output for the Sample Element Element
/* ---------------------------------------------------------------------------- */