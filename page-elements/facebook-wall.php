<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_facebook_wall_element_facebook_wall() {
	
		plchf_msb_add_page_element('Facebook Wall');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_facebook_wall_element_facebook_wall', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Text Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_facebook_wall($count, $values){
		
		// Define Element Type
		$element_type 	= 'Facebook Wall';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter some text',
				'id' 			=> '_facebook_wall_',
				'tooltip' 		=> 'Enter your text here. Plain Text, No HTML',
				'placeholder' 	=> 'Enter your text to add it to the page',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_facebook_wall','plchf_msb_page_element_settings_facebook_wall', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Text Element
/* ---------------------------------------------------------------------------- */
	function plchf_msb_page_element_output_facebook_wall_script() {

		$url = $values['_facebook_wall_'];
		
	    echo "<script>
    		$(function(){
	    		$('#fbwall').fbWall({ id:'visioniz',accessToken:'350020295079226|dbDly3sP75_C74zEUAbwQLIlOl4'});
	    		});
	    </script>";

		
	}
	
	add_action('msb_footer_after','plchf_msb_page_element_output_facebook_wall_script', 10, 1);



	function plchf_msb_page_element_output_facebook_wall($values) {

		// Get the Values

   	$output .= ('<div id="fbwall"></div>');
		
		echo apply_filters('plchf_msb_page_element_output_facebook_wall_filter',$output);
		
	}
	
	add_action('plchf_msb_page_element_output_facebook_wall','plchf_msb_page_element_output_facebook_wall', 1, 1);