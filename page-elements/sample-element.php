<?php

/*
// ---------------------------------------------------------------------------- //
// Add Element to the Page Elements Menu
// ---------------------------------------------------------------------------- //


	function plchf_msb_add_text_element_sample_element() {

		// Add Page Element to the Menu
		plchf_msb_add_page_element('Sample Element');

	}

	add_action('plchf_msb_content_elements','plchf_msb_add_text_element_sample_element');


// ---------------------------------------------------------------------------- //
// Create Settings for the Element
// ---------------------------------------------------------------------------- //

function plchf_msb_page_element_settings_sample_element($count, $values){

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
			'type' 			=> 'password',
			'name'			=> 'Password',
			'tooltip'		=> 'Enter some text here',
			'placeholder'	=> 'This is some placeholder text for the text area',
			'id' 			=> '_password_',
		),

	);

	$fields[] = array(

		'field' 	=> array(
			'type' 			=> 'slider',
			'name'			=> 'Slider',
			'tooltip'		=> 'Enter some text here',
			'placeholder'	=> 'This is some placeholder text for the text area',
			'id' 			=> '_slider_',
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
	plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);

}

add_action('plchf_msb_page_element_settings_sample_element','plchf_msb_page_element_settings_sample_element', 10, 2);

// ---------------------------------------------------------------------------- //
// Display Output for the Sample Element
// ---------------------------------------------------------------------------- //

	function plchf_msb_page_element_output_sample_element($values) {

		echo $values['_sample_text_'].'<br/>';
		echo $values['_password_'].'<br/>';
		echo $values['_slider_'].'<br/>';
		echo $values['_sample_textarea_'].'<br/>';
		echo $values['_sample_colorpicker_'].'<br/>';
		echo $values['_sample_datepicker_'].'<br/>';
		echo $values['_sample_radio_'].'<br/>';
		echo $values['_sample_select_'].'<br/>';
		echo $values['_sample_wysiwyg_'].'<br/>';

	}

	add_action('plchf_msb_page_element_output_sample_element','plchf_msb_page_element_output_sample_element', 10, 1);
*/