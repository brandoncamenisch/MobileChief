<?php

/* ---------------------------------------------------------------------------- */
/* Loop Through Global Page Elements and Create the Menu That Adds them
/* 
/* usage: pluginchiefmsb_page_elements_menu();
/* 
/* ---------------------------------------------------------------------------- */

function pluginchiefmsb_page_elements_menu() {
	
	global $pluginchiefmsb_page_elements;
	
	// Start the Menu Output
	echo '<ul class="elementmenu sgray" id="page-element-menu">';
		
		$support = plchf_msb_theme_supports_page_elements();
		
		// If Theme Supports Page Elements
		if ($support == 'Yes') {
		
			echo apply_filters('plchf_msb_page_elements_title','<li><p>Page Elements:</p></li>');
			
			// Element Sections Hook
			do_action('plchf_msb_page_element_sections');
		
		} else {
			
			echo '<li><p>Page: '.plchf_msb_get_page_title().'</p></li>';
			
			// No Support For Page Elements in this theme
			do_action('plchf_msb_page_element_menu_no_support');
			
		}
		
			// Add Elements to the Right Side of the Menu
			do_action('plchf_msb_page_element_right_sections');
	
	// End the Menu Output
	echo '</ul>';
	
}

/* ---------------------------------------------------------------------------- */
/* Content Section
/* ---------------------------------------------------------------------------- */

	function plchf_add_element_section_content() {
		
		plchf_msb_add_page_element_section('Content');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_element_section_content');

/* ---------------------------------------------------------------------------- */
/* Media Section
/* ---------------------------------------------------------------------------- */

	function plchf_add_element_section_media() {
		
		plchf_msb_add_page_element_section('Media');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_element_section_media');

/* ---------------------------------------------------------------------------- */
/* Social Section
/* ---------------------------------------------------------------------------- */

	function plchf_add_element_section_social() {
		
		plchf_msb_add_page_element_section('Social');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_element_section_social');
	
/* ---------------------------------------------------------------------------- */
/* Style Section
/* ---------------------------------------------------------------------------- */

	function plchf_add_element_section_style() {
		
		plchf_msb_add_page_element_section('Style');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_element_section_style');