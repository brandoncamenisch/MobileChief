<?php

/* ---------------------------------------------------------------------------- */
/* Add Social Icons Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_social_icons_element_social_icons() {
	
		plchf_msb_add_page_element('Social Icons');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_social_icons_element_social_icons', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Social Icons Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_social_icons($count, $values){
		
		// Define Element Type
		$element_type 	= 'Social Icons';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter your Facebook URL',
				'id' 			=> '_social_icons_facebook_',
				'tooltip' 		=> 'Enter your facebook url',
				'placeholder' 	=> 'Facebook URL',
			),
		
		);
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter your Twitter URL',
				'id' 			=> '_social_icons_twitter_',
				'tooltip' 		=> 'Enter your twitter url',
				'placeholder' 	=> 'Twitter URL',
			),
		
		);
	$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter your Linkedin URL',
				'id' 			=> '_social_icons_linkedin_',
				'tooltip' 		=> 'Enter your linkedin url',
				'placeholder' 	=> 'Linkedin URL',
			),
		
		);
		
	$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter your Pinterest URL',
				'id' 			=> '_social_icons_pinterest_',
				'tooltip' 		=> 'Enter your pinterest url',
				'placeholder' 	=> 'Pinterest URL',
			),
		
		);
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter your Github URL',
				'id' 			=> '_social_icons_github_',
				'tooltip' 		=> 'Enter your github url',
				'placeholder' 	=> 'Github URL',
			),
		
		);
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter your Google Plus URL',
				'id' 			=> '_social_icons_googleplus_',
				'tooltip' 		=> 'Enter your google plus url',
				'placeholder' 	=> 'Google Plus URL',
			),
		
		);

		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_social_icons','plchf_msb_page_element_settings_social_icons', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Social Icons Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_social_icons($values) {
	$facebook		= $values['_social_icons_facebook_'];	
	$twitter		= $values['_social_icons_twitter_'];
	$linkedin		= $values['_social_icons_linkedin_'];
	$pinterest	= $values['_social_icons_pinterest_'];
	$github			= $values['_social_icons_github_'];
	$googleplus	= $values['_social_icons_googleplus_'];	
	
	if (!empty($facebook)) {
    $facebook = '<a href="'.$facebook.'" target="_blank"><i class="icon-facebook">&nbsp;</i></a>';
    }


	if (!empty($twitter)) {
    $twitter = '<a href="'.$twitter.'" target="_blank"><i class="icon-twitter">&nbsp;</i></a>';
    }

	if (!empty($linkedin)) {
    $linkedin = '<a href="'.$linkedin.'" target="_blank"><i class="icon-linkedin">&nbsp;</i></a>';
    }

	if (!empty($pinterest)) {
    $pinterest = '<a href="'.$pinterest.'" target="_blank"><i class="icon-pinterest">&nbsp;</i></a>';
    }

	if (!empty($github)) {
    $github = '<a href="'.$github.'" target="_blank"><i class="icon-github">&nbsp;</i></a>';
    }

	if (!empty($googleplus)) {
    $googleplus = '<a href="'.$googleplus.'" target="_blank"><i class="icon-google-plus">&nbsp;</i></a>';
    }

	$output .=   $facebook
						 . $twitter
						 . $linkedin
						 . $pinterest
						 . $github
						 . $googleplus;

		echo apply_filters('plchf_msb_page_element_output_alert_filter',$output);
	}
	
	add_action('plchf_msb_page_element_output_social_icons','plchf_msb_page_element_output_social_icons', 1, 1);

