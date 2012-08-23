<?php

/* ---------------------------------------------------------------------------- */
/* Add Pdf Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_pdf_element_pdf() {
	
		plchf_msb_add_page_element('Pdf');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_pdf_element_pdf');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Pdf Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_pdf($count, $values){
		
		// Define Element Type
		$element_type 	= 'Pdf';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Pdf Button Text',
				'id' 			=> '_pdf_text_',
				'tooltip' 		=> 'Enter Some Text Here',
				'placeholder' 	=> 'Pdf Text',
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Pdf URL',
				'id' 			=> '_pdf_url_',
				'tooltip' 		=> 'Enter the Pdf URL Here',
				'placeholder' 	=> 'http://pluginchief.com',
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Pdf Button Target',
				'id' 			=> '_pdf_target_',
				'tooltip' 		=> 'Open the link in the same window or a new window?',
				'options' 		=> array(
					'_self'		=> 'Open in Same Window',
					'_blank'	=> 'Open in New Window',
				)
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Button Size',
				'id' 			=> '_pdf_size_',
				'tooltip' 		=> 'Choose the size of the Button',
				'options' 		=> array(
					'btn-mini'	=> 'Mini',
					'btn-small'	=> 'Small',
					'btn-large'	=> 'Large',
				)
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Pdf Button Style',
				'id' 			=> '_pdf_style_',
				'tooltip' 		=> 'Choose the style of the pdf Button',
				'options' 		=> array(
					''				=> 'Default',
					'btn-primary'	=> 'Primary',
					'btn-info'		=> 'Info',
					'btn-success'	=> 'Success',
					'btn-danger'	=> 'Warning',
					'btn-inverse'	=> 'Inverse',
				)
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Pdf Allignment',
				'id' 			=> '_pdf_align_',
				'tooltip' 		=> 'Choose the alignment of the pdf Button',
				'options' 		=> array(
					'floatl'		=> 'Left',
					'floatc'		=> 'Center',
					'floatr'		=> 'Right',
				)
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'colorpicker',
				'name' 			=> 'Pdf Icon Color',
				'id' 			=> '_pdf_icon_color_',
				'tooltip' 		=> 'Choose the color of the pdf icon',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_pdf','plchf_msb_page_element_settings_pdf', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Pdf Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_pdf($values) {
		
		$text		= $values['_pdf_text_'];
		$url		= $values['_pdf_url_'];
		$target		= $values['_pdf_target_'];
		$size 		= ' '.$values['_pdf_size_'];
		$style 		= ' '.$values['_pdf_style_'];
		$align		= ' '.$values['_pdf_align_'];
		$state		= ' '.$values['_pdf_state_'];
		$icon		= $values['_pdf_icon_'];
		$iconcolor	= ' '.$values['_pdf_icon_color_'];
		
		// Check to see if Icon was set
		if ($icon != 'no-icon') {
			
			// Set Icon Color, Default to White
			if ($iconcolor) {
				$iconcolor = $iconcolor;
			} else {
				$iconcolor = '#fff';
			}
						
			$icon = '<i class="'.$icon.'" style="color:'.$iconcolor.'"></i> ';
		
		} else {
			
			// If No Icon is selected, don't output an icon
			$icon = '';
		
		}
		
		// Output a Paragraph with the Pdf
		echo '
		<p>
			<a href="'.$url.'" class="btn'.$align.$style.$size.$state.'" target="'.$target.'"><img src="'.PLUGINCHIEFMSB.'/theme-assets/img/pdf.png" alt="pdf" width="25px" height="auto" />&nbsp;'.$text.'</a>
			<div class="clearfix"></div>
		</p>
		';
		
	}
	
	add_action('plchf_msb_page_element_output_pdf','plchf_msb_page_element_output_pdf', 10, 1);