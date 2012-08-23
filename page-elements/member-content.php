<?php

/* ---------------------------------------------------------------------------- */
/* Add STARTING Member Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */
	function plchf_add_member_content_element_member_content() {
	
		plchf_msb_add_page_element('Member Content');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_member_content_element_member_content', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Member Content
/* ---------------------------------------------------------------------------- */
	function plchf_msb_page_element_settings_member_content($count, $values){
		
		// Define Element Type
		$element_type 	= 'Member Content';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter a password for this content',
				'id' 			=> '_member_password_',
				'tooltip' 		=> 'Enter your password',
				'placeholder' 	=> 'Enter your password',
			),
		);
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Content',
				'id' 			=> '_member_content_',
				'tooltip' 		=> 'What content would you like to display',
				'placeholder' 	=> 'Which content do you want to display?',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_member_content','plchf_msb_page_element_settings_member_content', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Member Element
/* ---------------------------------------------------------------------------- */
	function plchf_msb_page_element_output_member_content($values) {
		//Refer back to this URL upon form submission
		 $pageURL = 'http';
		 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
		 $pageURL .= "://";
		 if ($_SERVER["SERVER_PORT"] != "80") {
		  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		 } else {
		  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		 }
		//Get the user defined static password
		$password = $values['_member_password_'];
		if (isset($_POST['textfield']) && $_POST['textfield'] == $values['_member_password_']) {
		
		echo  $values['_member_content_'];
		} else {
		
		echo '
		<form name="form1" method="post" action="">
		  <p>
		    <label>
		      <input type="text" name="textfield" id="textfield">
		    </label>
		  </p>
		  <p>
		    <label>
		      <input type="submit" name="button" id="button" value="Submit" class="btn">
		    </label>
		  </p>
		</form>
		<div style="display:none;>';
		}
		echo apply_filters('plchf_msb_page_element_output_member_content_filter',$output);
		
	}
	
	add_action('plchf_msb_page_element_output_member_content','plchf_msb_page_element_output_member_content', 1, 1);