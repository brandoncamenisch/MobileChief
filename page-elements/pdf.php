<?php

/* ---------------------------------------------------------------------------- */
/* Add Pdf Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_pdf_element_pdf_link() {
	
		plchf_msb_add_page_element('PDF Link');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_pdf_element_pdf_link');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Pdf Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_pdf_link($count, $values){
		
		// Define Element Type
		$element_type 	= 'PDF Link';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'PDF Button Text',
				'id' 			=> '_pdf_text_',
				'tooltip' 		=> 'Enter Some Text Here',
				'placeholder' 	=> 'PDF Text',
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'PDF URL',
				'id' 			=> '_pdf_url_',
				'tooltip' 		=> 'Enter the PDF URL Here',
				'placeholder' 	=> 'http://pluginchief.com',
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'PDF Button Target',
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
				'name' 			=> 'PDF Button Style',
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
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_pdf_link','plchf_msb_page_element_settings_pdf_link', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Pdf Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_pdf_link($values) {
		
		$text		= $values['_pdf_text_'];
		$url		= $values['_pdf_url_'];
		$target		= $values['_pdf_target_'];
		$style 		= ' '.$values['_pdf_style_'];
		
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
			<a href="'.$url.'" class="btn'.$style.' btn-block btn-large" target="'.$target.'"><img src="'.PLUGINCHIEFMSB.'/theme-assets/img/pdf.png" alt="pdf" width="25px" height="auto" />&nbsp;'.$text.'</a>
			<div class="clearfix"></div>
		</p>
		';
		
	}
	
	add_action('plchf_msb_page_element_output_pdf_link','plchf_msb_page_element_output_pdf_link', 10, 1);