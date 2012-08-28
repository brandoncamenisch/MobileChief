<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_facebook_like_element_facebook_like() {
	
		plchf_msb_add_page_element('Facebook Like');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_facebook_like_element_facebook_like', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Text Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_facebook_like($count, $values){
		
		// Define Element Type
		$element_type 	= 'Facebook Like';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter our facebook Handle',
				'id' 			=> '_facebook_like_',
				'tooltip' 		=> 'Enter your text here. Plain Text, No HTML',
				'placeholder' 	=> 'Enter your text to add it to the page',
			),
		);
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Stream',
				'id' 			=> '_facebook_stream_',
				'tooltip' 		=> 'Do you want to display a stream',
				'options' 		=> array(
					'true'			=> 'True',
					'false'	=> 'False',

				)
			),
			
			);

		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Faces',
				'id' 			=> '_facebook_faces_',
				'tooltip' 		=> 'Do you want to display faces',
				'options' 		=> array(
					'true'			=> 'True',
					'false'	=> 'False',

				)
			),
			
			);
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Header',
				'id' 			=> '_facebook_header_',
				'tooltip' 		=> 'Do you want to display a header',
				'options' 		=> array(
					'true'			=> 'True',
					'false'	=> 'False',

				)
			),
			
			);


		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_facebook_like','plchf_msb_page_element_settings_facebook_like', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Text Element
/* ---------------------------------------------------------------------------- */
	function plchf_msb_page_element_output_facebook_like($values) {
		$url		 = $values['_facebook_like_'];
		$faces	 = $values['_facebook_faces_'];
		$stream	 = $values['_facebook_stream_'];
		$header	 = $values['_facebook_header_'];

		$script	 = "<div id=\"fb-root\"></div>
									<script>(function(d, s, id) {
									  var js, fjs = d.getElementsByTagName(s)[0];
									  if (d.getElementById(id)) return;
									  js = d.createElement(s); js.id = id;
									  js.src = \"//connect.facebook.net/en_US/all.js#xfbml=1&appId=350020295079226\";
									  fjs.parentNode.insertBefore(js, fjs);
									  }(document, 'script', 'facebook-jssdk'));
									</script>";
   	$output .= $script . '<p><div id="fb-like-box" class="fb-like-box" data-href="http://www.facebook.com/'.$url.'" data-mobile="false" data-show-faces="'.$faces.'" data-stream="'.$stream.'" data-header="'.$header.'"></div></p>
   	';
		
		echo apply_filters('plchf_msb_page_element_output_facebook_like_filter',$output);
		
	}
	
	add_action('plchf_msb_page_element_output_facebook_like','plchf_msb_page_element_output_facebook_like', 10, 1);