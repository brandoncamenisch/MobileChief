<?php
	function plchf_add_code_element_code() {
		plchf_msb_add_page_element('Code');
	} add_action('plchf_msb_content_elements','plchf_add_code_element_code', 1);

	function plchf_msb_page_element_settings_code($count, $values){
		#Define Element Type
		$element_type 	= 'Code';
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 			  => 'text',
																					'name' 			  => 'Enter some code',
																					'id' 			    => '_code_',
																					'tooltip' 		=> 'Enter your code',
																					'placeholder' => 'Enter your code to add it to the page'
																					));
		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_code','plchf_msb_page_element_settings_code', 10, 2);

	function plchf_msb_page_element_output_code($values) {
		#Get the Values
		$code 	=& $values['_code_'];
		#Output a Paragraph with the Code
		$output = '<pre>'.htmlspecialchars($code).'</pre>';
		echo apply_filters('plchf_msb_page_element_output_code_filter',$output);
	} add_action('plchf_msb_page_element_output_code','plchf_msb_page_element_output_code', 1, 1);