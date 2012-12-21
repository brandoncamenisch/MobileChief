<?php
	/**
	 * plchf_add_alert_element_alert function.
	 *
	 * @access public
	 * @return void
	 		Add Alert Element to the Page Elements Menu
	 */
	function plchf_add_alert_element_alert() {
		plchf_msb_add_page_element('Alert');
	} add_action('plchf_msb_content_elements','plchf_add_alert_element_alert', 1);

	/**
	 * plchf_msb_page_element_settings_alert function.
	 *
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 		Create Settings for the Alert Element
	 */
	function plchf_msb_page_element_settings_alert($count, $values){
		#Define Element Type
		$element_type 	= 'Alert';
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'text',
																					'name' 				=> 'Alert Title',
																					'id' 					=> '_alert_title_',
																					'tooltip' 		=> 'Enter a Title for the Alert Box',
																					'placeholder' => 'Alert Title',
																					));

		$fields[] = array( 'field' 	=> array( 'type' 				=> 'wysiwyg',
																					'name' 				=> 'Alert Content',
																					'id' 					=> '_alert_content_',
																					'tooltip' 		=> 'Enter Content for the Alert Box',
																					'placeholder' => 'Alert content goes here',
																					));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Alert Style',
																					'id' 			=> '_alert_style_',
																					'tooltip' => 'Select the Style for the Alert',
																					'options' => array( NULL							=> 'Warning',
																																'alert-error'	  => 'Error',
																																'alert-success'	=> 'Success',
																																'alert-info'		=> 'Info',
																																)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Dismiss Alert',
																					'id' 			=> '_alert_dismiss_',
																					'tooltip' => 'Show a Dismiss Alert Button, Allowing the User to Close the Alert',
																					'options' => array( 'do-not-dismiss' => 'Do Not Show Dismiss Button',
																															'dismiss'			   => 'Show Dismiss Button',
																																)));
		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_alert','plchf_msb_page_element_settings_alert', 10, 2);

	/**
	 * plchf_msb_page_element_output_alert function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
	 		Display Output for the Alert Element
	 */
	function plchf_msb_page_element_output_alert($values) {
		#Get the Values
		$title 		=& $values['_alert_title_'];
		$content 	=& $values['_alert_content_'];
		$style		= ' '.$values['_alert_style_'];
		$dismiss	=& $values['_alert_dismiss_'];
		#Output a Paragraph with the Alert
		$output = '<div class="alert alert-block'.$style.'">';
			#Show Dismiss Button
			if ($dismiss == 'dismiss') {
				$output .= '<a class="close" data-dismiss="alert" href="#">×</a>';
			} else { }
			#Alert Title
			$output .= '<h4 class="alert-heading">'.$title.'</h4>';
			#Alert Content
			$output .= $content;
		$output .= '</div>';
		echo apply_filters('plchf_msb_page_element_output_alert_filter',$output);

	} add_action('plchf_msb_page_element_output_alert','plchf_msb_page_element_output_alert', 1, 1);