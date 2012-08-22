<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_rss_feed_element_rss_feed() {
	
		plchf_msb_add_page_element('RSS Feed');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_rss_feed_element_rss_feed', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the RSS Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_rss_feed($count, $values){
		
		// Define Element Type
		$element_type 	= 'RSS Feed';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter some text',
				'id' 			=> '_rss_feed_',
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
	
	add_action('plchf_msb_page_element_settings_rss_feed','plchf_msb_page_element_settings_rss_feed', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the RSS Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_rss_feed($values) {
		
    $rss = file_get_contents($values['_rss_feed_']);  
    
    $x = new SimpleXmlElement($rss);  
    $i=0;

    echo "<div><i class='icon-rss'>&nbsp;RSS FEED</i><hr>";  
      
    foreach($x->channel->item as $entry) {  
        echo "<p><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></p><hr>";  
        $i++;
	    
		    if ( $i == (empty($values['_rss_results_']))){
			    break;
		    }
	    
		    elseif( $i == $values['_rss_results_']) { 

        	break;
        }
    }  
    echo "</div>";  

		echo apply_filters('plchf_msb_page_element_output_rss_feed_filter',$output);
		
	}
	
	add_action('plchf_msb_page_element_output_rss_feed','plchf_msb_page_element_output_rss_feed', 1, 1);