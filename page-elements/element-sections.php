<?php

/* ---------------------------------------------------------------------------- */
/* Content Section
/* ---------------------------------------------------------------------------- */

	function plchf_add_text_element_section_text() {
		
		plchf_msb_add_page_element_section('Content');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_text_element_section_text');

/* ---------------------------------------------------------------------------- */
/* Media Section
/* ---------------------------------------------------------------------------- */

	function plchf_add_text_element_section_media() {
		
		plchf_msb_add_page_element_section('Media');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_text_element_section_media');

/* ---------------------------------------------------------------------------- */
/* Social Section
/* ---------------------------------------------------------------------------- */

	function plchf_add_text_element_section_social() {
		
		plchf_msb_add_page_element_section('Social');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_text_element_section_social');