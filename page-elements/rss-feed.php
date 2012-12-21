<?php
	/**
	 * plchf_add_rss_feed_element_rss_feed function.
	 *
	 * @access public
	 * @return void
	 		Add Text Element to the Page Elements Menu
	 */
	function plchf_add_rss_feed_element_rss_feed() {
		plchf_msb_add_page_element('RSS Feed');
	} add_action('plchf_msb_content_elements','plchf_add_rss_feed_element_rss_feed', 1);

	/**
	 * plchf_msb_page_element_settings_rss_feed function.
	 *
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 		Create Settings for the RSS Element
	 */
	function plchf_msb_page_element_settings_rss_feed($count, $values){
		#Define Element Type
		$element_type 	= 'RSS Feed';
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 			  => 'text',
																					'name' 		    => 'RSS feed URL',
																					'id' 			    => '_rss_feed_',
																					'tooltip' 		=> 'Enter your RSS feed URL',
																					'placeholder' => 'Enter your RSS feed to to add it to the page'
																					));
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'text',
																					'name' 				=> 'How many results',
																					'id' 					=> '_rss_results_',
																					'tooltip' 		=> 'How many results do you want to display?',
																					'placeholder' => '3'
																					));

		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_rss_feed','plchf_msb_page_element_settings_rss_feed', 10, 2);

	/**
	 * plchf_msb_page_element_output_rss_feed function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
	 		Display Output for the RSS Element
	 */
	function plchf_msb_page_element_output_rss_feed($values) {
		#Get Values
		$feed 			  =& $values['_rss_feed_'];
		$result_count =& $values['_rss_results_'];
		#Set Default Feed Value to make sure it doesn't throw an error
		if ($feed) {
			$feed = $feed;
		} else {
			$feed = 'http://www.nytimes.com/services/xml/rss/nyt/World.xml';
		}
		#Get RSS Feed Contents
	  $rss = file_get_contents($feed);
	  #Create Simple XML Element
    $x = new SimpleXmlElement($rss);
    $i=0;
	  #Make Sure RSS Feed is filled out, otherwise don't display it
	  if ($feed) {
	    #Output RSS Feed Icon & Title
	    $output = "<div><i class='icon-rss'>&nbsp;RSS FEED</i><hr>";
		    #Loop through the RSS Feed
		    foreach($x->channel->item as $entry) {
		        $output .=  "<p><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></p><hr>";
		        $i++;
				    if ( $i == (empty($result_count))){
					    break;
				    }
				    elseif( $i == $result_count) {
		        	break;
		        }
		    }
		    $output .=  "</div>";
		}
		#Output the Content
		echo apply_filters('plchf_msb_page_element_output_rss_feed_filter', $output);
	} add_action('plchf_msb_page_element_output_rss_feed','plchf_msb_page_element_output_rss_feed', 1, 1);