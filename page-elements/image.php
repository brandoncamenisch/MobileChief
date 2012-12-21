<?php
	/**
	 * plchf_add_image_element function.
	 *
	 * @access public
	 * @return void
	 		Add Image Element to the Page Elements Menu
	 */
	function plchf_add_image_element() {
		plchf_msb_add_page_element('Image');
	} add_action('plchf_msb_media_elements','plchf_add_image_element', 1);

	/**
	 * plchf_msb_page_element_settings_image function.
	 *
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 		Create Settings for the Text Element
	 */
	function plchf_msb_page_element_settings_image($count, $values){
		#Define Element Type
		$element_type 	= 'Image';
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'image',
																					'name' 				=> 'Upload an Image',
																					'id' 					=> '_image_',
																					'tooltip' 		=> 'Upload an Image',
																					'placeholder' => 'Image',
																					'multiple' 		=> 'false'
																					));
		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_image','plchf_msb_page_element_settings_image', 10, 2);

	/**
	 * plchf_msb_page_element_output_image function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
	 		Display Output for the Text Element
	 */
	function plchf_msb_page_element_output_image($values) {
		#Get the Values
		$img 	=& $values['_image_'];
		#Output a Paragraph with the Text
		$output = '<p><img src="'.$img.'" alt="Uploaded Image"></p>';
		echo apply_filters('plchf_msb_page_element_output_image_filter',$output);
	} add_action('plchf_msb_page_element_output_image','plchf_msb_page_element_output_image', 1, 1);