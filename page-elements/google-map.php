<?php

/* ---------------------------------------------------------------------------- */
/* Add Text Element to the Page Elements Menu
/* ---------------------------------------------------------------------------- */

	function plchf_add_google_map_element_google_map() {

		plchf_msb_add_page_element('Google Map');

	}

	add_action('plchf_msb_content_elements','plchf_add_google_map_element_google_map', 1);

/* ---------------------------------------------------------------------------- */
/* Create Settings for the Text Element
/* ---------------------------------------------------------------------------- */

	function plchf_msb_page_element_settings_google_map($count, $values){

		// Define Element Type
		$element_type 	= 'Google Map';

		// Define Settings Fields
		$fields[] = array(

			'field' 	=> array(
				'type' 			=> 'text',
				'name' 			=> 'Enter the Location Address',
				'id' 			=> '_google_map_',
				'tooltip' 		=> 'Put the full address, including zip code for best accuracy',
				'placeholder' 	=> '123 Industrial Ave, Anycity, ST 55555',
			),
		);

		// Create Element Settings Panel
		plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values);

	}

	add_action('plchf_msb_page_element_settings_google_map','plchf_msb_page_element_settings_google_map', 10, 2);


	function plchf_msb_page_element_output_google_map($values) {

			$url = $values['_google_map_'];

			require_once(PLUGINCHIEFMSB_PATH . "lib/simpleGMapAPI.php");
			require_once(PLUGINCHIEFMSB_PATH . "lib/simpleGMapGeocoder.php");

			$map = new simpleGMapAPI();
			$geo = new simpleGMapGeocoder();

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