<?php

/* ----------------------------------------------------------------------------
	Hide the Move / Remove options in Page Elements if
	Theme Doesn't Support Page Elements
---------------------------------------------------------------------------- */

	function plchf_msb_predefined_page_element_panel_styles() {

		$support = plchf_msb_get_theme_info('Page Elements');

		if ($support != 'Yes') {

			$output = '<style type="text/css">';
				$output .= '.element-move{display:none;}';
				$output .= '.element-remove{display:none;}';
			$output .= '</style>';

		}

		echo (isset($output) ? $output : NULL);

	}

	add_action('pluginchiefmsb_admin_header','plchf_msb_predefined_page_element_panel_styles');

/* ----------------------------------------------------------------------------
	Hide the Move / Remove options in Page Elements if
	Theme Doesn't Support Page Elements
---------------------------------------------------------------------------- */

