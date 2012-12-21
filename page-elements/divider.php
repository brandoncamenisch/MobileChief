<?php
	/**
	 * plchf_add_divider_element_divider function.
	 *
	 * @access public
	 * @return void
	 		Add Text Element to the Page Elements Menu
	 */
	function plchf_add_divider_element_divider() {
		plchf_msb_add_page_element('Divider');
	} add_action('plchf_msb_content_elements','plchf_add_divider_element_divider', 1);

	/**
	 * plchf_msb_page_element_settings_divider function.
	 *
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 		Create Settings for the Text Element
	 */
	function plchf_msb_page_element_settings_divider($count, $values){
		#Define Element Type
		$element_type 	= 'Divider';

		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 			=> 'hidden',
																					'name' 			=> 'Divider Field Type',
																					'id' 			=> '_divider_'
																					));
		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_divider','plchf_msb_page_element_settings_divider', 10, 2);

	/**
	 * plchf_msb_page_element_output_divider function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
	 	Display Output for the Text Element
	 */
	function plchf_msb_page_element_output_divider($values) {
		#Get the Values
		$divider 	=& $values['_divider_'];
		#Output a Paragraph with the Text
		$output = '<hr/>';
		echo apply_filters('plchf_msb_page_element_output_divider_filter',$output);
	} add_action('plchf_msb_page_element_output_divider','plchf_msb_page_element_output_divider', 1, 1);