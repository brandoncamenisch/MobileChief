<?php
	/**
	 * plchf_add_vimeo_video_element_vimeo_video function.
	 *
	 * @access public
	 * @return void
	 		Add Text Element to the Page Elements Menu
	 */
	function plchf_add_vimeo_video_element_vimeo_video() {
		plchf_msb_add_page_element('Vimeo Video');
	} add_action('plchf_msb_media_elements','plchf_add_vimeo_video_element_vimeo_video');

	/**
	 * plchf_msb_page_element_settings_vimeo_video function.
	 *
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 		Create Settings for the Vimeo Video Element
	 */
	function plchf_msb_page_element_settings_vimeo_video($count, $values){
		#Define Element Type
		$element_type 	= 'Vimeo Video';
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 				=> 'text',
																					'name' 				=> 'Video URL',
																					'id' 					=> '_url_',
																					'tooltip' 		=> 'Enter the URL for the Vimeo Video',
																					'placeholder' => 'Vimeo Video URL'
																					));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Title',
																					'id' 			=> '_title_',
																					'tooltip' => 'Show the users byline on the video',
																					'options'	=> array( '1'	=> 'Show',
																															'0'	=> 'Hide'
																															)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Byline',
																					'id' 			=> '_byline_',
																					'tooltip' => 'Start playing on load',
																					'options' => array( '1'	=> 'Show',
																															'0'	=> 'Hide'
																															)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Portrait',
																					'id' 			=> '_portrait_',
																					'tooltip' => 'Show the users portrait on the video',
																					'options'	=> array( '1'	=> 'Show',
																															'0'	=> 'Hide'
																															)));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Auto Play',
																					'id' 			=> '_autoplay_',
																					'tooltip' => 'Play the video automatically on load',
																					'options'	=> array( '0'	=> 'Do Not Auto Play',
																														  '1'	=> 'Auto Play'
																														  )));

		$fields[] = array( 'field' 	=> array( 'type' 		=> 'select',
																					'name' 		=> 'Loop',
																					'id' 			=> '_loop_',
																					'tooltip' => 'Play the video again when it reaches the end',
																					'options' => array( '0'	=> 'Do Not Loop',
																															'1'	=> 'Loop',
																															)));

		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	} add_action('plchf_msb_page_element_settings_vimeo_video','plchf_msb_page_element_settings_vimeo_video', 10, 2);

	/**
	 * plchf_msb_page_element_output_vimeo_video function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
	 		Display Output for the Vimeo Video Element
	 */
	function plchf_msb_page_element_output_vimeo_video($values) {
		#Get the Values
		$url			=& $values['_url_'];
		$title		=& $values['_title_'];
		$byline		=& $values['_byline_'];
		$portrait	=& $values['_portrait_'];

		$autoplay	=& $values['_autoplay_'];
		$loop			=& $values['_loop_'];
		#Set Defaults
		if ($url 		== '') { $url 		= 'http://vimeo.com/32802486';}
		if ($title 		== '') { $videoid 	= '1'; }
		if ($byline 	== '') { $byline 	= '1'; }
		if ($portrait 	== '') { $portrait 	= '1'; }

		if ($autoplay 	== '') { $autoplay 	= '1'; }
		if ($loop 		== '') { $loop 		= '1'; }
		#Get Vimeo ID from Vimeo URL
		$id = preg_replace("/^.*\//","",$url);
		echo '<p>';
		echo '
		<iframe src="http://player.vimeo.com/video/'.$id.'?rel=0&wmode=opaque&title='.$title.'&byline='.$byline.'&portrait='.$portrait.'&color=1" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
		';
		echo '</p>';
	} add_action('plchf_msb_page_element_output_vimeo_video','plchf_msb_page_element_output_vimeo_video', 10, 1);