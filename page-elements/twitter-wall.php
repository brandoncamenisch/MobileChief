<?php

/* ---------------------------------------------------------------------------- */
/* Add Twitter Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_twitter_wall_element_twitter_wall() {
	
		plchf_msb_add_page_element('Twitter Wall');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_twitter_wall_element_twitter_wall', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Twitter Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_twitter_wall($count, $values){
		
		// Define Element Type
		$element_type 	= 'Twitter Wall';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter your twitter handle',
				'id' 			=> '_twitter_wall_',
				'tooltip' 		=> 'Enter your twitter handle',
				'placeholder' 	=> 'Enter your text to add it to the page',
			),
		
		);

		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Tweets to display',
				'id' 			=> '_twitter_count_',
				'tooltip' 		=> 'Tweets to display',
				'options' 		=> array(
					'1'		=> 'One',
					'2' 	=> 'Two',
					'3' 	=> 'Three',
					'4' 	=> 'Four',
					'5' 	=> 'Five',
					'6' 	=> 'Six',
					'7' 	=> 'Seven',
					'8' 	=> 'Eight',
					'9' 	=> 'Nine',
					'10' 	=> 'Ten',
					
				)
			),
		
		);


		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_twitter_wall','plchf_msb_page_element_settings_twitter_wall', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Twitter Element
/* ---------------------------------------------------------------------------- */
	function plchf_msb_page_element_output_twitter_wall_script() {

		$url = $values['_twitter_wall_'];
		
	    echo '<script type="text/javascript">
	    		jQuery(function($){
        $(".tweet").tweet({
            username: "visioniz",
            join_text: "auto",
            avatar_size: 32,
            count: 3,
            auto_join_text_default: "we said,", 
            auto_join_text_ed: "we",
            auto_join_text_ing: "we were",
            auto_join_text_reply: "we replied to",
            auto_join_text_url: "we were checking out",
            loading_text: "loading tweets..."
        });
        });
        </script>
        ';

		
	}
	add_action('msb_footer_after','plchf_msb_page_element_output_twitter_wall_script', 10, 1);



	function plchf_msb_page_element_output_twitter_wall($values) {

		// Get the Values

   	$output .= ('<div class="tweet"></div>');

		
		echo apply_filters('plchf_msb_page_element_output_twitter_wall_filter',$output);
		
	}
	
	add_action('plchf_msb_page_element_output_twitter_wall','plchf_msb_page_element_output_twitter_wall', 1, 1);