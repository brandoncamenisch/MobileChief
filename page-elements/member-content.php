<?php

/* ---------------------------------------------------------------------------- */
/* Add Member Element to the Page Elements Menu
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
				'name' 			=> 'Enter some text',
				'id' 			=> '_member_content_',
				'tooltip' 		=> 'Enter your RSS feed URL',
				'placeholder' 	=> 'Enter your RSS feed t to add it to the page',
			),
		);
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'How many results',
				'id' 			=> '_rss_results_',
				'tooltip' 		=> 'How many results do you want to display?',
				'placeholder' 	=> 'How many results do you want to display?',
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
		
 $pageURL = 'http';
 if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
 $pageURL .= "://";
 if ($_SERVER["SERVER_PORT"] != "80") {
  $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
 } else {
  $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }

$password = 'abc';
if (isset($_POST['textfield']) && $_POST['textfield'] == 'abc') {
    echo username();
    echo $pageURL;
}

echo '
<form name="form1" method="post" action="">
  <p>
    <label>
      <input type="text" name="textfield" id="textfield">
    </label>
  </p>
  <p>
    <label>
      <input type="submit" name="button" id="button" value="Submit">
    </label>
  </p>
</form>';

		echo apply_filters('plchf_msb_page_element_output_member_content_filter',$output);
		
	}
	
	add_action('plchf_msb_page_element_output_member_content','plchf_msb_page_element_output_member_content', 1, 1);