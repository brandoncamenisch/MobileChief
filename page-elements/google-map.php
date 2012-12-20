<?php

	/**
	 * plchf_add_google_map_element_google_map function.
	 * Add Text Element to the Page Elements Menu
	 * @access public
	 * @return void
	 */
	function plchf_add_google_map_element_google_map() {
		plchf_msb_add_page_element('Google Map');
	}
	add_action('plchf_msb_content_elements','plchf_add_google_map_element_google_map', 1);

	/**
	 * plchf_msb_page_element_settings_google_map function.
	 * Create Settings for the Text Element
	 * @access public
	 * @param mixed $count
	 * @param mixed $values
	 * @return void
	 */
	function plchf_msb_page_element_settings_google_map($count, $values){

		#Define Element Type
		$element_type 	= 'Google Map';
		#Define Settings Fields
		$fields[] = array( 'field' 	=> array( 'type' 			=> 'text',
																					'name' 			=> 'Enter the Location Address',
																					'id' 			=> '_google_map_',
																					'tooltip' 		=> 'Put the full address, including zip code for best accuracy',
																					'placeholder' 	=> '123 Industrial Ave, Anycity, ST 55555',
																				),
										);
		#Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);
	}
	add_action('plchf_msb_page_element_settings_google_map','plchf_msb_page_element_settings_google_map', 10, 2);


	/**
	 * plchf_msb_page_element_output_google_map function.
	 *
	 * @access public
	 * @param mixed $values
	 * @return void
	 */
	function plchf_msb_page_element_output_google_map($values) {
			$url 		=& $values['_google_map_'];
			$map 		= new simpleGMapAPI();
			$geo		= new simpleGMapGeocoder();
			$output =& $output;

			$map->setWidth('100%');
			$map->setHeight(200);
			$map->setBackgroundColor('#d0d0d0');
			$map->setMapDraggable(true);
			$map->setZoomLevel(10);
			$map->setDoubleclickZoom(true);
			$map->setScrollwheelZoom(true);
			$map->showDefaultUI(false);
			$map->showMapTypeControl(false, 'DROPDOWN_MENU');
			$map->showNavigationControl(false, 'DEFAULT');
			$map->showScaleControl(false);
			$map->showStreetViewControl(false);
			$map->addMarkerByAddress($url);
			$map->printGMapsJS();
			$map->showMap(false);

			echo apply_filters('plchf_msb_page_element_output_google_map_filter',$output);
	}
	add_action('plchf_msb_page_element_output_google_map','plchf_msb_page_element_output_google_map', 10, 1);