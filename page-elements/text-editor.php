<?php
	/**
	 * plchf_add_text_element_text_editor function.
	 *
	 * @access public
	 * @return void
	 		Add Text Editor Element to the Page Elements Menu
	 */
	function plchf_add_text_element_text_editor() {
		#Add Page Element to the Menu
		plchf_msb_add_page_element('Text Editor');
	} add_action('plchf_msb_content_elements','plchf_add_text_element_text_editor', 2);

	/**
	 * plchf_msb_page_element_settings_text_editor function.
	 *
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 		Create Settings for the Text Editor Element
	 */
	function plchf_msb_page_element_settings_text_editor($count, $values){
		#Define Element Type
		$element_type 	= 'Text Editor';
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'wysiwyg',
																					'name'				=> 'TinyMCE',
																					'tooltip'			=> 'Enter some text here',
																					'placeholder'	=> 'This is some placeholder text for the text area',
																					'id' 					=> '_tinymce_'
																					));

		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_text_editor','plchf_msb_page_element_settings_text_editor', 10, 4);

	/**
	 * plchf_msb_page_element_output_text_editor function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
	 		Display Output for the Text Editor Element
	 */
	function plchf_msb_page_element_output_text_editor($values) {
		#Get the Values
		$text 	=& $values['_tinymce_'];
		#Output TinyMCE Content
		echo $text;
	} add_action('plchf_msb_page_element_output_text_editor','plchf_msb_page_element_output_text_editor', 1, 1);