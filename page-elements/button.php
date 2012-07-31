<?php

/* ---------------------------------------------------------------------------- */
/* Add Address Button Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_interactive_element_button() {
		
		plchf_msb_add_page_element('Button');
		
	}
	
	add_action('plchf_msb_interactive_elements','plchf_add_interactive_element_button');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Address Button Element
/* ---------------------------------------------------------------------------- */

	function plchf_element_button_settings(){
		
		
		
	}
	
	add_action('','plchf_element_button_settings');

/* ---------------------------------------------------------------------------- */
/* Display Output for the Address Button Element
/* ---------------------------------------------------------------------------- */

	function plchf_element_button_output(){
		
		
		
	}
	
	add_action('','plchf_elements_button_output');