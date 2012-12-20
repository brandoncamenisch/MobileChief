<?php

/* ---------------------------------------------------------------------------- */
/* 
/* ---------------------------------------------------------------------------- */

function plchf_add_text_element_status_editor()
{

	// Add Page Element to the Menu
	plchf_msb_add_page_element('Status Editor');

}


add_action('plchf_msb_content_elements', 'plchf_add_text_element_status_editor', 2);

/* ---------------------------------------------------------------------------- */
/* 
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_status_editor($count, $values)
{

	// Define Element Type
	$element_type  = 'Status Editor';

	$fields[] = array(

		'field'  => array(
			'type'    => 'select',
			'name'    => 'Button State',
			'id'    => '_status_state_',
			'tooltip'   => 'Choose the status of this item',
			'options'   => array(
				'lost'  => 'Lost',
				'found'  => 'Found',
			)
		),

	);


	$fields[] = array(

		'field'  => array(
			'type'    => 'wysiwyg',
			'name'   => 'Lost Information',
			'tooltip'  => 'Enter some text here',
			'placeholder' => 'This is some placeholder text for the text area',
			'id'    => '_lost_tinymce_',
		),

	);
	$fields[] = array(

		'field'  => array(
			'type'    => 'wysiwyg',
			'name'   => 'Found Information',
			'tooltip'  => 'Enter some text here',
			'placeholder' => 'This is some placeholder text for the text area',
			'id'    => '_found_tinymce_',
		),

	);

	// Create Element Settings Panel
	plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);

}


add_action('plchf_msb_page_element_settings_status_editor', 'plchf_msb_page_element_settings_status_editor', 10, 4);

/* ---------------------------------------------------------------------------- */
/* 
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_output_status_editor($values)
{

	// Get the Values
	$lost  = $values['_lost_tinymce_'];
	$found  = $values['_found_tinymce_'];
	$status  = $values['_status_state_'];
	// Output TinyMCE Content
	if (trim($status) == 'lost')
	{
		echo $lost;
	} elseif (trim($status) == 'found')
	{
		echo $found;
	};



}


add_action('plchf_msb_page_element_output_status_editor', 'plchf_msb_page_element_output_status_editor', 1, 1);
