<?php

/* ---------------------------------------------------------------------------- */
/* Add Social Sharing Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_social_sharing_element_social_sharing() {
	
		plchf_msb_add_page_element('Social Sharing');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_social_sharing_element_social_sharing', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Social Sharing Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_social_sharing($count, $values){
		
		// Define Element Type
		$element_type 	= 'Social Sharing';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'hidden',
				'name' 			=> 'Adds a sharing widget from addthis',
				'id' 			=> '_social_sharing_',
				'tooltip' 		=> 'Adds a sharing widget from addthis',
				'placeholder' 	=> 'Adds a sharing widget from addthis',

			),
		
		);

		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_social_sharing','plchf_msb_page_element_settings_social_sharing', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Social Sharing Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_social_sharing($values) {

	$output .= '<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
								<a class="addthis_button_preferred_1"></a>
								<a class="addthis_button_preferred_2"></a>
								<a class="addthis_button_preferred_3"></a>
								<a class="addthis_button_preferred_4"></a>
								<a class="addthis_button_compact"></a>
								<a class="addthis_counter addthis_bubble_style"></a>
								</div>
								<script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
								<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4eb9948d17a8ce07"></script>
								';
			
	echo apply_filters('plchf_msb_page_element_output_alert_filter',$output);
	}
	
	add_action('plchf_msb_page_element_output_social_sharing','plchf_msb_page_element_output_social_sharing', 1, 1);

