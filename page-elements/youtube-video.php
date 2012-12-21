<?php
	/**
	 * plchf_add_youtube_video_element_youtube_video function.
	 *
	 * @access public
	 * @return void
	 		Add Text Element to the Page Elements Menu
	 */
	function plchf_add_youtube_video_element_youtube_video() {
		plchf_msb_add_page_element('YouTube Video');
	} add_action('plchf_msb_media_elements','plchf_add_youtube_video_element_youtube_video');

	/**
	 * plchf_msb_page_element_settings_youtube_video function.
	 *
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 		Create Settings for the YouTube Video Element
	 */
	function plchf_msb_page_element_settings_youtube_video($count, $values){
		#Define Element Type
		$element_type 	= 'YouTube Video';
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'text',
																					'name' 				=> 'Video URL',
																					'id' 					=> '_url_',
																					'tooltip' 		=> 'Enter the URL for the YouTube Video',
																					'placeholder' => 'YouTube Video URL'
																					));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Auto Hide',
																					'id' 			=> '_autohide_',
																					'tooltip' => 'Auto Hide the Progress Bar and controls',
																					'options' => array( '2'	=> 'Show Controls, Hide Progress Bar',
																															'1'	=> 'Hide Controls and Progress Bar',
																															'0'	=> 'Show Controls and Progress Bar'
																															)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Auto Play',
																					'id' 			=> '_autoplay_',
																					'tooltip' => 'Start playing on load',
																					'options' => array( '0'	=> 'Do Not Autoplay',
																															'1'	=> 'Autoplay'
																															)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Controls',
																					'id' 			=> '_controls_',
																					'tooltip' => 'Hide controls altogether',
																					'options' => array( '1'	=> 'Show',
																															'0'	=> 'Hide'
																															)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Loop',
																					'id' 			=> '_loop_',
																					'tooltip' => 'Loop the video after it ends',
																					'options' => array( '0'	=> 'Do Not Loop',
																															'1'	=> 'Loop'
																															)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Related Videos',
																					'id' 			=> '_rel_',
																					'tooltip' => 'Show related videos at the end',
																					'options' => array( '0'	=> 'No Related Videos',
																															'1'	=> 'Show Related Videos'
																															)));

		$fields[] = array(	'field' 	=> array( 'type' 		=> 'select',
																						'name' 		=> 'Show Info',
																						'id' 			=> '_showinfo_',
																						'tooltip' => 'Show additional info, such as title',
																						'options' => array( '1'	=> 'Show Additional Info',
																																'0'	=> 'Don\'t Show Additional Info'
																																)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Theme',
																					'id' 			=> '_theme_',
																					'tooltip' => 'Set the Player theme',
																					'options' => array( 'dark'	=> 'Dark Theme',
																															'light'	=> 'Light Theme'
																															)));

		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_youtube_video','plchf_msb_page_element_settings_youtube_video', 10, 2);

	/**
	 * plchf_msb_page_element_output_youtube_video function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
	 		Display Output for the YouTube Video Element
	 */
	function plchf_msb_page_element_output_youtube_video($values) {
		#Get the Values
		$url	  	=& $values['_url_'];
		$autohide	=& $values['_autohide_'];
		$autoplay	=& $values['_autoplay_'];
		$controls	=& $values['_controls_'];
		$loop		  =& $values['_rel_'];
		$showinfo	=& $values['_showinfo_'];
		$theme		=& $values['_theme_'];

		#Convert YouTube URL to Embed Code
		$url		= str_ireplace('&feature=relmfu', '', $url);
		$url1		= explode('v=', $url);
		$url1   = array_key_exists('1', $url1);
		$url2		= explode('&amp;', $url1[1]);

		echo '<p>';
		echo '<iframe src="http://www.youtube.com/embed/'.$url2[0].'?autoplay='.$autoplay.'&controls='.$controls.'&loop='.$loop.'&rel='.$loop.'&showinfo='.$showinfo.'&theme='.$theme.'" frameborder="0" width="560" height="315"></iframe>';
		echo '</p>';
	} add_action('plchf_msb_page_element_output_youtube_video','plchf_msb_page_element_output_youtube_video', 10, 1);