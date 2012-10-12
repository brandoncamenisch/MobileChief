<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_well_element_tabs() {
	
		plchf_msb_add_page_element('Tabs');
		
	}
	
	add_action('plchf_msb_style_elements','plchf_add_well_element_tabs');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Tabs Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_tabs($count, $values){
		
		// Define Element Type
		$element_type 	= 'Tabs';

		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'hidden',
				'name' 			=> 'Enter some text',
				'id' 			=> '_text_',
				'tooltip' 		=> 'Allows you to put Content in an area that is seperated into two columns',
				'placeholder' 	=> 'Enter your text to add it to the page',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_tabs','plchf_msb_page_element_settings_tabs', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Tabs Div Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_tabs($values) {
		

		echo '<div class="tabbable tabs-left">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
							<li><a href="#tab2" data-toggle="tab">Section 2</a></li>
							</ul>
							<div class="tab-content">
							<div class="tab-pane active" id="tab1">
							<p>m in Section 1.</p>
							</div>
							<div class="tab-pane" id="tab2">
							<p>Howdy, m in Section 2.</p>
							</div>
							</div>
							</div>
							';
					}
	
	add_action('plchf_msb_page_element_output_tabs','plchf_msb_page_element_output_tabs', 10, 1);
	
