<?php 

/* ---------------------------------------------------------------------------- */
/* Setup Initial Page Elements
/* ---------------------------------------------------------------------------- */
	
	function pluginchiefmsb_default_page_elements() {
	
	global $pluginchiefmsb_page_elements;
	
	$pluginchiefmsb_page_elements[] = array(
		'elements' => array(
			array (
				'type' => 'Text',
				'title' => 'Text',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Text',
				'title' => 'Text Editor',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Text',
				'title' => 'Text Area',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Buttons',
				'title' => 'Button',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Buttons',
				'title' => 'Address Button',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Style',
				'title' => 'Divider',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Style',
				'title' => 'Callout Box',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Tab Content',
				'title' => 'Callout Box',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Toggle Content',
				'title' => 'Callout Box',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Media',
				'title' => 'Image',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Media',
				'title' => 'YouTube Video',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Media',
				'title' => 'Vimeo Video',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Social',
				'title' => 'Twitter Feed',
				'settings' => '',
				'output' => ''
			),
			array (
				'type' => 'Social',
				'title' => 'Social Icons',
				'settings' => '',
				'output' => ''
			),
		)
	);
	
	}
	
	add_action('admin_init','pluginchiefmsb_default_page_elements');