<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_well_element_collapse() {
	
		plchf_msb_add_page_element('Collapse');
		
	}
	
	add_action('plchf_msb_style_elements','plchf_add_well_element_collapse');

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Collapse Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_collapse($count, $values){
		
		// Define Element Type
		$element_type 	= 'Collapse';

		// Define Settings Fields
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter some text',
				'id' 			=> '_collapse_title_',
				'tooltip' 		=> 'Allows you to put Content in an area that is seperated into two columns',
			),
		
		);
		$fields[] = array(
			
			'field' 	=> array(
				'type' 			=> 'wysiwyg',
				'name'			=> 'TinyMCE',
				'tooltip'		=> 'Enter some text here',
				'placeholder'	=> 'This is some placeholder text for the text area',
				'id' 			=> '_collapse_content_',
			),
		
		);
		
		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
		
	}
	
	add_action('plchf_msb_page_element_settings_collapse','plchf_msb_page_element_settings_collapse', 10, 2);

/* ---------------------------------------------------------------------------- */
/* Display Output for the Collapse Div Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_output_collapse($values) {
		$title 	= $values['_collapse_title_'];
		$content 	= $values['_collapse_content_'];
		$id = uniqid('collapse');
		echo '<div class="row-fluid">
					<h4 data-toggle="collapse" data-target="#'.$id.'">'.$title.'<i class="icon-chevron-down pull-right">&nbsp;</i></h4>
					<div id="'.$id.'" class="collapse clearfix">
					<p>'.$content.'
					</p>
					</div>
					</div>';
					}
	
	add_action('plchf_msb_page_element_output_collapse','plchf_msb_page_element_output_collapse', 10, 1);
