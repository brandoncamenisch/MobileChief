<?php

/* ---------------------------------------------------------------------------- */
/* Loop Through Global Page Elements and Create the Menu That Adds them
/* 
/* usage: pluginchiefmsb_page_elements_menu();
/* 
/* ---------------------------------------------------------------------------- */

function pluginchiefmsb_page_elements_menu() {
	
	global $pluginchiefmsb_page_elements;
	
	// Start the Menu Output
	$output .= '<ul class="elementmenu sgray" id="page-element-menu">';
	
		$output .= '<li><p>Page Elements:</p></li>';
	 
		// Loop through all $pluginchiefmsb_page_elements arrays
		foreach ($pluginchiefmsb_page_elements as $elements) {
			
			foreach ($elements['elements'] as $element) {
				
				$type = $element['type'];
				
				$output .= '<a href="#" id="text-elements">Text</a>';
				$output .= '<ul class="form-elements">';
				
					if ($type = 'Text') {
				
						$output .= '<li><a href="#" data-elementtype="'.$title.'">'.$title.'</a></li>';
					
					} 
					
				$output .= '</ul>';
					
					if ($type = 'Buttons') {
					
						$output .= $title.' ';
					
					} 
					
					if ($type = 'Media') {
					
						$output .= $title.' ';
					
					} 
					
					if ($type = 'Social') {
					
						$output .= $title.' ';
					
					}
				
			}
		
		}
	
	// End the Menu Output
	$output .= '</ul>';
	
	echo $output;
	
}