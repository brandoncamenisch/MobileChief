<?php
if(!class_exists('PLCHF_MSB__Options')){
	require_once( dirname( __FILE__ ) . '/options/options.php' );
}

/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $args are required, but there there to be over ridden if needed.
 *
 *
 */

function plchf_msb_setup_framework_options(){
	
	$args = array();
	
	// MAKE SURE THIS GETS SET TO SOMETHING UNIQUE
	$args['opt_name'] = 'plugin_chief_msb';
	$args['dev_mode'] = false;
	$args['show_import_export'] = false;
	$args['menu_title'] = __('Settings', 'plchf_msb_opts');
	$args['page_title'] = __('PluginChief Mobile Site Builder Options', 'plchf_msb_opts');
	$args['page_slug'] = 'pluginchief_mobile_site_builder_options';
	$args['page_type'] = 'submenu';
	$args['page_parent'] = 'pluginchiefmsb';
	$args['allow_sub_menu'] = false;
	
	$args['help_tabs'][] = array(
								'id' => 'plchf_msb_opts-1',
								'title' => __('Theme Information 1', 'plchf_msb_opts'),
								'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'plchf_msb_opts')
								);
	$args['help_tabs'][] = array(
								'id' => 'plchf_msb_opts-2',
								'title' => __('Theme Information 2', 'plchf_msb_opts'),
								'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'plchf_msb_opts')
								);
	
	$sections = array();
	
	$sections[] = array(
					'icon' 	=> PLCHF_MSB__OPTIONS_URL.'img/glyphicons/glyphicons_107_text_resize.png',
					'title' => __('General Settings', 'plchf_msb_opts'),
					'desc' 	=> __('<p class="description">This is the Description. Again HTML is allowed2</p>', 'plchf_msb_opts'),
					'fields' => array(
						
						// text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
						
						//builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						
						
						array(
							'id' => '1',
							'type' => 'text',
							'title' => __('MSB Text Option', 'plchf_msb_opts'),
							'sub_desc' => __('This is an explanation.', 'plchf_msb_opts'),
							'desc' => __('', 'plchf_msb_opts'),
							'validate' => 'email',
							'msg' => 'This field Requires a valid Email Address', 
							'std' => '',
							'class' => ''
							),
						array(
							'id' => '2',
							'type' => 'text',
							'title' => __('MSB Text Option - Email Validated', 'plchf_msb_opts'),
							'sub_desc' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'email',
							'msg' => 'custom error message',
							'std' => 'test@test.com'
							),
						array(
							'id' => 'multi_text',
							'type' => 'multi_text',
							'title' => __('MSB Multi Text Option', 'plchf_msb_opts'),
							'sub_desc' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts')
							),
						array(
							'id' => '3',
							'type' => 'text',
							'title' => __('MSB Text Option - URL Validated', 'plchf_msb_opts'),
							'sub_desc' => __('This must be a URL.', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'url',
							'std' => 'http://no-half-pixels.com'
							),
						array(
							'id' => '4',
							'type' => 'text',
							'title' => __('MSB Text Option - Numeric Validated', 'plchf_msb_opts'),
							'sub_desc' => __('This must be numeric.', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'numeric',
							'std' => '0',
							'class' => 'small-text'
							),
						array(
							'id' => 'comma_numeric',
							'type' => 'text',
							'title' => __('MSB Text Option - Comma Numeric Validated', 'plchf_msb_opts'),
							'sub_desc' => __('This must be a comma seperated string of numerical values.', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'comma_numeric',
							'std' => '0',
							'class' => 'small-text'
							),
						array(
							'id' => 'no_special_chars',
							'type' => 'text',
							'title' => __('MSB Text Option - No Special Chars Validated', 'plchf_msb_opts'),
							'sub_desc' => __('This must be a alpha numeric only.', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'no_special_chars',
							'std' => '0'
							),
						array(
							'id' => 'str_replace',
							'type' => 'text',
							'title' => __('MSB Text Option - Str Replace Validated', 'plchf_msb_opts'),
							'sub_desc' => __('You decide.', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'str_replace',
							'str' => array('search' => ' ', 'replacement' => 'thisisaspace'),
							'std' => '0'
							),
						array(
							'id' => 'preg_replace',
							'type' => 'text',
							'title' => __('MSB Text Option - Preg Replace Validated', 'plchf_msb_opts'),
							'sub_desc' => __('You decide.', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'preg_replace',
							'preg' => array('pattern' => '/[^a-zA-Z_ -]/s', 'replacement' => 'no numbers'),
							'std' => '0'
							),
						array(
							'id' => 'custom_validate',
							'type' => 'text',
							'title' => __('MSB Text Option - Custom Callback Validated', 'plchf_msb_opts'),
							'sub_desc' => __('You decide.', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate_callback' => 'validate_callback_function',
							'std' => '0'
							),
						array(
							'id' => '5',
							'type' => 'textarea',
							'title' => __('MSB Textarea Option - No HTML Validated', 'plchf_msb_opts'), 
							'sub_desc' => __('All HTML will be stripped', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'no_html',
							'std' => 'No HTML is allowed in here.'
							),
						array(
							'id' => '6',
							'type' => 'textarea',
							'title' => __('MSB Textarea Option - HTML Validated', 'plchf_msb_opts'), 
							'sub_desc' => __('HTML Allowed (wp_kses)', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
							'std' => 'HTML is allowed in here.'
							),
						array(
							'id' => '7',
							'type' => 'textarea',
							'title' => __('MSB Textarea Option - HTML Validated Custom', 'plchf_msb_opts'), 
							'sub_desc' => __('Custom HTML Allowed (wp_kses)', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'html_custom',
							'std' => 'Some HTML is allowed in here.',
							'allowed_html' => array('') //see http://codex.wordpress.org/Function_Reference/wp_kses
							),
						array(
							'id' => '8',
							'type' => 'textarea',
							'title' => __('MSB Textarea Option - JS Validated', 'plchf_msb_opts'), 
							'sub_desc' => __('JS will be escaped', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'validate' => 'js'
							),
						array(
							'id' => '9',
							'type' => 'editor',
							'title' => __('MSB Editor Option', 'plchf_msb_opts'), 
							'sub_desc' => __('Can also use the validation methods if required', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'std' => 'OOOOOOhhhh, rich editing.'
							)
						,
						array(
							'id' => 'editor2',
							'type' => 'editor',
							'title' => __('MSB Editor Option 2', 'plchf_msb_opts'), 
							'sub_desc' => __('Can also use the validation methods if required', 'plchf_msb_opts'),
							'desc' => __('This is the description field, again good for additional info.', 'plchf_msb_opts'),
							'std' => 'OOOOOOhhhh, rich editing2.'
							)
						)
					);					
					
		$tabs = array();
	
	global $PLCHF_MSB__Options;
	$PLCHF_MSB__Options = new PLCHF_MSB__Options($sections, $args, $tabs);
	
}

add_action('init', 'plchf_msb_setup_framework_options', 0);


/*
 * 
 * Custom function for the callback referenced above
 *
 */
function plchf_msb_my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function


/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function plchf_msb_validate_callback_function($field, $value, $existing_value){
	
	$error = false;
	$value =  'just testing';
	/*
	do your validation
	
	if(something){
		$value = $value;
	}elseif(somthing else){
		$error = true;
		$value = $existing_value;
		$field['msg'] = 'your custom error message';
	}
	*/
	
	$return['value'] = $value;
	if($error == true){
		$return['error'] = $field;
	}
	return $return;
	
}//function