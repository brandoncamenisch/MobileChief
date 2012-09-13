<?php
	
	// Set Up the Pre-Defined Fields for the 
	function plchf_msb_predefined_page_elements_aqropolis_general_theme() {
		
		// If Theme & If Page Template
		// Only apply these page elements to the specific theme and page template we're trying to add it to
		// if () {
		
			// Create the Elements We Want to Send to the Page
			$elements = array(
				array(
					'alert' => array(),
					'coupon' => array(),
					'divider' => array(),
				),
			);
			
			return $elements;
			
		// } // End Theme & Page Template Check
		
	}
	
	add_action('plchf_msb_page_generator_elements','plchf_msb_predefined_page_elements_aqropolis_general_theme');