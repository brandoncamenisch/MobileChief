<?php

/* ---------------------------------------------------------------------------- */
/* Add Click To Call Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_paypal_donate_button_element_paypal_donate_button() {
	
		plchf_msb_add_page_element('Paypal Donate Button');
		
	}
	
	add_action('plchf_msb_content_elements','plchf_add_paypal_donate_button_element_paypal_donate_button');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the PayPal Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_paypal_donate_button($count, $values){
		
		// Define Element PayPal
		$element_type 	= 'Paypal Donate Button';
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'html',
				'content' 		=> '<p>The PayPal Button allows users to easily submit donations from your Mobile Site.</p>',
			),
		
		);

		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'PayPal Button Text',
				'id' 			=> '_button_text_',
				'tooltip' 		=> 'Enter PayPal Button Text Here',
				'placeholder' 	=> 'PayPal Button Text',
			),
		
		);

		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Your Name or Organization',
				'id' 			=> '_button_name_',
				'tooltip' 		=> 'Enter your name',
				'placeholder' 	=> 'Enter your name or organization',
			),
		
		);

		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'PayPal Email Address',
				'id' 			=> '_button_donate_',
				'tooltip' 		=> 'Enter the PayPal account email address',
				'placeholder' 	=> 'email@site.com',
			),
		
		);
		
		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'select',
				'name' 			=> 'Button Style',
				'id' 			=> '_button_style_',
				'tooltip' 		=> 'Choose the style of the button',
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
	
	add_action('plchf_msb_page_element_settings_paypal_donate_button','plchf_msb_page_element_settings_paypal_donate_button', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Click To Call Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_paypal_donate_button($values) {
		
		$text		= $values['_button_text_'];
		$email		= $values['_button_donate_'];
		$name		= $values['_button_name_'];
		$size 		= ' btn-large';
		$style 		= ' '.$values['_button_style_'];
		$align		= ' btn-block';
		$icon		= 'icon-gift';
		$iconcolor	= ' '.$values['_button_icon_color_'];
		
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
		
		echo '
			<p>
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
			<input type="hidden" name="cmd" value="_donations">
			<input type="hidden" name="business" value="'.$email.'">
			<input type="hidden" name="lc" value="US">
			<input type="hidden" name="item_name" value="'.$name.'">
			<input type="hidden" name="no_note" value="0">
			<input type="hidden" name="currency_code" value="USD">
			<input type="hidden" name="bn" value="PP-DonationsBF:btn_donate_LG.gif:NonHostedGuest">
			<button class="btn'.$align.$style.$size.'" name="submit" alt="PayPal - The safer, easier way to pay online!">'.$icon.$text.'</button>
			</form>
			<div class="clearfix"></div>
			</p>
			';
		
	}
	
	add_action('plchf_msb_page_element_output_paypal_donate_button','plchf_msb_page_element_output_paypal_donate_button', 10, 1);