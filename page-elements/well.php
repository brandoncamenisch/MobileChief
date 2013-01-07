<?php
	/**
	 * plchf_add_well_element_well function.
	 *
	 * @access public
	 * @return void
	 		Add Well Element to the Page Elements Menu
	 */
	function plchf_add_well_element_well() {
		plchf_msb_add_page_element('Well');
	} add_action('plchf_msb_content_elements','plchf_add_well_element_well', 1);

	/**
	 * plchf_msb_page_element_settings_well function.
	 *
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 		Create Settings for the Well Element
	 */
	function plchf_msb_page_element_settings_well($count, $values){
		#Define Element Type
		$element_type 	= 'Well';
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'text',
																					'name' 				=> 'Well Title',
																					'id' 					=> '_well_title_',
																					'tooltip' 		=> 'Enter a Title for the Well Box',
																					'placeholder' => 'Well Title',
																					));

		$fields[] = array( 'field' 	=> array( 'type' 				=> 'wysiwyg',
																					'name' 				=> 'Well Content',
																					'id' 					=> '_well_content_',
																					'tooltip' 		=> 'Enter Content for the Well Box',
																					'placeholder' => 'Well content goes here',
																					));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Well Size',
																					'id' 			=> '_well_size_',
																					'tooltip' => 'Select the Size for the Well',
																					'options' => array( NULL							=> 'Normal',
																																'well-large'	  => 'Large',
																																'well-small'	=> 'Small'
																																)));

		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_well','plchf_msb_page_element_settings_well', 10, 2);

	/**
	 * plchf_msb_page_element_output_well function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
	 		Display Output for the Well Element
	 */
	function plchf_msb_page_element_output_well($values) {
		#Get the Values
		$title 		=& $values['_well_title_'];
		$content 	=& $values['_well_content_'];
		$size		  =& $values['_well_size_'];
		$dismiss	=& $values['_well_dismiss_'];
		#Output a Paragraph with the Well
		$output = '<div class="well '.$size.'">';
			#Well Title
			$output .= '<h4 class="well-heading">'.$title.'</h4>';
			#Well Content
			$output .= $content;
		$output .= '</div>';
		echo apply_filters('plchf_msb_page_element_output_well_filter',$output);

	} add_action('plchf_msb_page_element_output_well','plchf_msb_page_element_output_well', 1, 1);