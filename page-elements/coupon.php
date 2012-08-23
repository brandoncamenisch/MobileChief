<?php

/* ---------------------------------------------------------------------------- */
/* Add Coupon Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_coupon_element_coupon() {
	
		plchf_msb_add_page_element('Coupon');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_coupon_element_coupon', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Coupon Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_coupon($count, $values){
		
		// Define Element Type
		$element_type 	= 'Coupon';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Coupon Title',
				'id' 			=> '_coupon_title_',
				'tooltip' 		=> 'Enter a Title for the Coupon Box',
				'placeholder' 	=> 'Coupon Title',
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'wysiwyg',
				'name' 			=> 'Coupon Content',
				'id' 			=> '_coupon_content_',
				'tooltip' 		=> 'Enter Content for the Coupon Box',
				'placeholder' 	=> 'Coupon content goes here',
			),
		
		);
		
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_coupon','plchf_msb_page_element_settings_coupon', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Coupon Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_coupon($values) {
		
		// Get the Values
		$title 		= $values['_coupon_title_'];
		$content 	= $values['_coupon_content_'];
		$style		= ' '.$values['_coupon_style_'];
		$dismiss	= $values['_coupon_dismiss_'];
		
		// Output a Paragraph with the Coupon
		$output .= '<div class="coupon">';
			
			$output .= '<h4>'.$title.'</h4>';
		
			// Coupon Content
			$output .= $content;
		
		$output .= '</div>';
		
		echo apply_filters('plchf_msb_page_element_output_coupon_filter',$output);
		
	}
	
	add_action('plchf_msb_page_element_output_coupon','plchf_msb_page_element_output_coupon', 1, 1);