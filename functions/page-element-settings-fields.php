<?php

/* ---------------------------------------------------------------------------- */
/* Text Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_text($fields) {

	//return apply_filters('plchf_msb_page_element_settings_field_filter_text', $output);
	
	$output .= '<label>'.$field['Title'].'</label><br/>';
	$output .= '<input type="text" name="'.$field['Title'].'">';
	
	echo $output;
}

add_action('plchf_msb_page_element_settings_field_text','plchf_msb_page_element_settings_field_text');

/* ---------------------------------------------------------------------------- */
/* Text Area Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_text_area($field) {
	
	$output = 'ID: '.$field['type'];
	
	echo $output;

}

add_action('plchf_msb_page_element_settings_field_text_area','plchf_msb_page_element_settings_field_text_area');

/* ---------------------------------------------------------------------------- */
/* Select Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_select() {
	
	$output .= 'This is Text Area';
	
	echo apply_filters('plchf_msb_page_element_settings_field_text_area', $output);
	
	
}

add_action('plchf_msb_page_element_settings_field_select','plchf_msb_page_element_settings_field_select');

/* ---------------------------------------------------------------------------- */
/* Multi Select Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_multi_select() {
	
	$output .= 'This is Text Area';
	
	echo apply_filters('plchf_msb_page_element_settings_field_multi_select', $output);
	
	
}

add_action('plchf_msb_page_element_settings_field_multi_select','plchf_msb_page_element_settings_field_multi_select');


/* ---------------------------------------------------------------------------- */
/* Radio Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_field_radio() {
	
	$output .= 'This is Text Area';
	
	echo apply_filters('plchf_msb_page_element_settings_field_radio', $output);
	
	
}

add_action('plchf_msb_page_element_settings_field_radio','plchf_msb_page_element_settings_field_radio');

/* ---------------------------------------------------------------------------- */
/* Checkbox Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_checkbox() {
	
	$output .= 'This is Text Area';
	
	echo apply_filters('plchf_msb_page_element_settings_checkbox', $output);
	
	
}

add_action('plchf_msb_page_element_settings_checkbox','plchf_msb_page_element_settings_checkbox');

/* ---------------------------------------------------------------------------- */
/* Upload Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_page_element_settings_upload() {
	
	$output .= 'This is Text Area';
	
	echo apply_filters('plchf_msb_page_element_settings_upload', $output);
	
	
}

add_action('plchf_msb_page_element_settings_upload','plchf_msb_page_element_settings_upload');