<?php

/* ---------------------------------------------------------------------------- */
/* Add Contact Form Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_contact_form_element_contact_form() {
	
		plchf_msb_add_page_element('Contact Form');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_contact_form_element_contact_form', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Contact Form Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_contact_form($count, $values){
		
		// Define Element Type
		$element_type 	= 'Contact Form';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter the email address you would like this contact form to go to',
				'id' 			=> '_contact_form_',
				'tooltip' 		=> 'email address',
				'placeholder' 	=> 'Enter the email address you would like this contact form to go to',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_contact_form','plchf_msb_page_element_settings_contact_form', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Contact Form Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_contact_form($values) {
		
		// Get the Values
		$email 	= $values['_contact_form_'];
		
		if (isset($_REQUEST['email']))
		
		  {
		  //send email
		  $email = $_REQUEST['email'] ;
		  $subject = $_REQUEST['subject'] ;
		  $message = $_REQUEST['message'] ;
		  mail($email, $subject,
		  $message, "From:" . $email);
		  echo "<p>Thanks we will be in touch.</p>";
		  }
		else
		  {
		  echo "<form method='post' action=''>
						 <label>Email:</label>
						 <input name='email' type='email' /><br />
						 <label>Subject</label> 
						 <input name='subject' type='text' /><br />
						 <label>Message</label>
						 <textarea name='message' style='resize:none;'rows='5' cols='40'></textarea><br />
						 <input type='submit' class='btn' />
						 </form>";
		  }

		echo apply_filters('plchf_msb_page_element_output_contact_form_filter',$output);
		
	}
	
	add_action('plchf_msb_page_element_output_contact_form','plchf_msb_page_element_output_contact_form', 1, 1);