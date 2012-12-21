<?php
	/**
	 * plchf_add_text_element_text function.
	 *
	 * @access public
	 * @return void
	 		Add Text Element to the Page Elements Menu
	 */
	function plchf_add_text_element_text() {
		plchf_msb_add_page_element('Text');
	} add_action('plchf_msb_content_elements','plchf_add_text_element_text', 1);

	/**
	 * plchf_msb_page_element_settings_text function.
	 *
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 		Create Settings for the Text Element
	 */
	function plchf_msb_page_element_settings_text($count, $values){
		#Define Element Type
		$element_type 	= 'Text';
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 			  => 'text',
																					'name' 			  => 'Enter some text',
																					'id' 			    => '_text_',
																					'tooltip' 		=> 'Enter your text here. Plain Text, No HTML',
																					'placeholder' => 'Enter your text to add it to the page'
																					));
		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_text','plchf_msb_page_element_settings_text', 10, 2);

	/**
	 * plchf_msb_page_element_output_text function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
	 		Display Output for the Text Element
	 */
	function plchf_msb_page_element_output_text($values) {
		#Get the Values
		$text 	=& $values['_text_'];
		#Output a Paragraph with the Text
		$output = '<p>'.$text.'</p>';
		echo apply_filters('plchf_msb_page_element_output_text_filter',$output);
	} add_action('plchf_msb_page_element_output_text','plchf_msb_page_element_output_text', 1, 1);