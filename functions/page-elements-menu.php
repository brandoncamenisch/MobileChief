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
		
		// Page Elements Title
		echo '<li><p>Page Elements:</p></li>';
		
		// Element Sections Hook
		do_action('plchf_msb_page_element_sections');
	
	// End the Menu Output
	echo '</ul>';
	
}