<?php

/* ---------------------------------------------------------------------------- */
/* Add Button Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_media_element_youtube_video() {
		
		plchf_msb_add_page_element('YouTube Video	');
		
	}
	
	add_action('plchf_msb_media_elements','plchf_add_media_element_youtube_video');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Element
/* ---------------------------------------------------------------------------- */

	function plchf_element_youtube_video_settings(){
		
		
		
	}
	
	add_action('','plchf_element_youtube_video_settings');

/* ---------------------------------------------------------------------------- */
/* Display Output for the Element
/* ---------------------------------------------------------------------------- */

	function plchf_element_youtube_video_output(){
		
		
		
	}
	
	add_action('','plchf_element_youtube_video_output');