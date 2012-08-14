<?php

/* ---------------------------------------------------------------------------- */
/* Add Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_interactive_element_address_button() {
		
		plchf_msb_add_page_element('Address Button');
		
	}
	
	add_action('plchf_msb_interactive_elements','plchf_add_interactive_element_address_button');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Element
/* ---------------------------------------------------------------------------- */

	function plchf_element_address_button_settings(){
		
		echo 'Address Button Settings';
		
	}
	
	// add_action('','plchf_element_address_button_settings');

/* ---------------------------------------------------------------------------- */
/* Display Output for the Element
/* ---------------------------------------------------------------------------- */

	function plchf_element_address_button_output(){
		
		echo 'Address Button Settings';
		
	}
	
	add_action('','plchf_elements_address_button_output');