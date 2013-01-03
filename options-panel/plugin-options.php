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
/**
 * plchf_msb_setup_framework_options function.
 *
 * @access public
 * @return void
 */
function plchf_msb_setup_framework_options(){
	$args = array();

	#MAKE SURE THIS GETS SET TO SOMETHING UNIQUE
	$args['opt_name'] 					= 'plugin_chief_msb';
	$args['dev_mode'] 					= false;
	$args['show_import_export'] = false;
	$args['menu_title'] 				= __('Settings', 'plchf_msb_opts');
	$args['page_title'] 				= __('PluginChief Mobile Site Builder Options', 'plchf_msb_opts');
	$args['page_slug'] 					= 'pluginchief_mobile_site_builder_options';
	$args['page_type'] 					= 'submenu';
	$args['page_parent'] 				= 'pluginchiefmsb';
	$args['allow_sub_menu'] 		= false;

	$args['help_tabs'][] = array( 'id' 			=> 'plchf_msb_opts-1',
																'title' 	=> __('Theme Information 1', 'plchf_msb_opts'),
																'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'plchf_msb_opts')
															);
	$args['help_tabs'][] = array( 'id' 			=> 'plchf_msb_opts-2',
																'title'   => __('Theme Information 2', 'plchf_msb_opts'),
																'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'plchf_msb_opts')
															);

	$sections = array();

	$sections[] = array( 'icon' 	=> PLCHF_MSB__OPTIONS_URL.'img/glyphicons/glyphicons_086_display.png',
											 'title'  => __('Front End', 'plchf_msb_opts'),
											 'desc' 	=> __('<p class="description">This is the Description. Again HTML is allowed2</p>', 'plchf_msb_opts'),
											 'fields' => array(
											 #text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
											 										#builtin validation includes: email|html|html_custom|no_html|js|numeric|url
											 									)
										 );

		$tabs = array();

	global $PLCHF_MSB__Options;
	$PLCHF_MSB__Options = new PLCHF_MSB__Options($sections, $args, $tabs);

} add_action('init', 'plchf_msb_setup_framework_options', 0);

/**
 * plchf_msb_my_custom_field function.
 * Custom function for the callback referenced above
 * @access public
 * @param mixed $field
 * @param mixed $value
 * @return void
 */
function plchf_msb_my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}

/**
 * plchf_msb_validate_callback_function function.
 * Custom function for the callback validation referenced above
 * @access public
 * @param mixed $field
 * @param mixed $value
 * @param mixed $existing_value
 * @return void
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

}