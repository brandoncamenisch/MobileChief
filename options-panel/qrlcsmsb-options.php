<?php
/*
 * 
 * Require the framework class before doing anything else, so we can use the defined urls and dirs
 * Also if running on windows you may have url problems, which can be fixed by defining the framework url first
 *
 */

define('PLUGINCHIEFMSB_OPTIONS_URL', PLUGINCHIEFMSB . '/options-panel/options/' );

if(!class_exists('PLUGINCHIEFMSB_Options')){
	require_once( 'options/options.php' );
}


/*
 * This is the meat of creating the optons page
 *
 * Override some of the default values, uncomment the args and change the values
 * - no $pluginchiefmsb_args are required, but there there to be over ridden if needed.
 *
 *
 */

function pluginchiefmsb_setup_framework_options(){
$pluginchiefmsb_args = array();

//Set it to dev mode to view the class settings/info in the form - default is false
$pluginchiefmsb_args['dev_mode'] = false;

//google api key MUST BE DEFINED IF YOU WANT TO USE GOOGLE WEBFONTS
//$pluginchiefmsb_args['google_api_key'] = '***';

//Remove the default stylesheet? make sure you enqueue another one all the page will look whack!
//$pluginchiefmsb_args['stylesheet_override'] = true;

//Add HTML before the form
$pluginchiefmsb_args['intro_text'] = __('<p>The Plugin Chief Mobile Site Builder is a one of a king plugin.</p>', 'pluginchiefmsb-opts');

//Setup custom links in the footer for share icons
$pluginchiefmsb_args['share_icons']['twitter'] = array(
										'link' => 'http://twitter.com/lee__mason',
										'title' => 'Folow me on Twitter', 
										'img' => PLUGINCHIEFMSB_OPTIONS_URL.'img/glyphicons/glyphicons_322_twitter.png'
										);
$pluginchiefmsb_args['share_icons']['linked_in'] = array(
										'link' => 'http://uk.linkedin.com/pub/lee-mason/38/618/bab',
										'title' => 'Find me on LinkedIn', 
										'img' => PLUGINCHIEFMSB_OPTIONS_URL.'img/glyphicons/glyphicons_337_linked_in.png'
										);

//Choose to disable the import/export feature
//$pluginchiefmsb_args['show_import_export'] = false;

//Choose a custom option name for your theme options, the default is the theme name in lowercase with spaces replaced by underscores
$pluginchiefmsb_args['opt_name'] = 'pluginchiefmsb';

//Custom menu icon
//$pluginchiefmsb_args['menu_icon'] = '';

//Custom menu title for options page - default is "Options"
$pluginchiefmsb_args['menu_title'] = __('Settings', 'pluginchiefmsb-opts');

//Custom Page Title for options page - default is "Options"
$pluginchiefmsb_args['page_title'] = __('Plugin Chief Mobile Site Builder Options', 'pluginchiefmsb-opts');

//Custom page slug for options page (wp-admin/themes.php?page=***) - default is "pluginchiefmsb_theme_options"
$pluginchiefmsb_args['page_slug'] = 'pluginchiefmsb_theme_options';

//Custom page capability - default is set to "manage_options"
//$pluginchiefmsb_args['page_cap'] = 'manage_options';

//page type - "menu" (adds a top menu section) or "submenu" (adds a submenu) - default is set to "menu"
//$pluginchiefmsb_args['page_type'] = 'submenu';

//parent menu - default is set to "themes.php" (Appearance)
//the list of available parent menus is available here: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
//$pluginchiefmsb_args['page_parent'] = 'themes.php';

//custom page location - default 100 - must be unique or will override other items
$pluginchiefmsb_args['page_position'] = 27;

//Custom page icon class (used to override the page icon next to heading)
//$pluginchiefmsb_args['page_icon'] = 'icon-themes';

//Want to disable the sections showing as a submenu in the admin? uncomment this line
//$pluginchiefmsb_args['allow_sub_menu'] = false;
		
//Set ANY custom page help tabs - displayed using the new help tab API, show in order of definition		
$pluginchiefmsb_args['help_tabs'][] = array(
							'id' => 'pluginchiefmsb-opts-1',
							'title' => __('Theme Information 1', 'pluginchiefmsb-opts'),
							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'pluginchiefmsb-opts')
							);
$pluginchiefmsb_args['help_tabs'][] = array(
							'id' => 'pluginchiefmsb-opts-2',
							'title' => __('Theme Information 2', 'pluginchiefmsb-opts'),
							'content' => __('<p>This is the tab content, HTML is allowed.</p>', 'pluginchiefmsb-opts')
							);

//Set the Help Sidebar for the options page - no sidebar by default										
$pluginchiefmsb_args['help_sidebar'] = __('<p>This is the sidebar content, HTML is allowed.</p>', 'pluginchiefmsb-opts');



$pluginchiefmsb_sections = array();

$pluginchiefmsb_sections[] = array(
				'title' => __('Getting Started', 'pluginchiefmsb-opts'),
				'desc' => __('<p class="description">This is the description field for the Section. HTML is allowed</p>', 'pluginchiefmsb-opts'),
				//all the glyphicons are included in the options folder, so you can hook into them, or link to your own custom ones.
				//You dont have to though, leave it blank for default.
				'icon' => PLUGINCHIEFMSB_OPTIONS_URL.'img/glyphicons/glyphicons_062_attach.png'
				//Lets leave this as a blank section, no options just some intro text set above.
				//'fields' => array()
				);

$prefix = 'pluginchiefmsb';
		
$pluginchiefmsb_sections[] = array(
				'icon' => PLUGINCHIEFMSB_OPTIONS_URL.'img/glyphicons/glyphicons_107_text_resize.png',
				'title' => __('Text Fields', 'pluginchiefmsb-opts'),
				'desc' => __('<p class="description">This is the Description. Again HTML is allowed2</p>', 'pluginchiefmsb-opts'),
				'fields' => array(
					array(
						'id' => $prefix . '1', //must be unique
						'type' => 'text', //builtin fields include:
										  //text|textarea|editor|checkbox|multi_checkbox|radio|radio_img|button_set|select|multi_select|color|date|divide|info|upload
						'title' => __('Text Option', 'pluginchiefmsb-opts'),
						'sub_desc' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						//'validate' => '', //builtin validation includes: email|html|html_custom|no_html|js|numeric|url
						//'msg' => 'custom error message', //override the default validation error message for specific fields
						//'std' => '', //This is a default value, used to set the options on theme activation, and if the user hits the Reset to defaults Button
						//'class' => '' //Set custom classes for elements if you want to do something a little different - default is "regular-text"
						),
					array(
						'id' => $prefix . '2',
						'type' => 'text',
						'title' => __('Text Option - Email Validated', 'pluginchiefmsb-opts'),
						'sub_desc' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'email',
						'msg' => 'custom error message',
						'std' => 'test@test.com'
						),
					array(
						'id' => $prefix . 'multi_text',
						'type' => 'multi_text',
						'title' => __('Multi Text Option', 'pluginchiefmsb-opts'),
						'sub_desc' => __('This is a little space under the Field Title in the Options table, additonal info is good in here.', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts')
						),
					array(
						'id' => $prefix . '3',
						'type' => 'text',
						'title' => __('Text Option - URL Validated', 'pluginchiefmsb-opts'),
						'sub_desc' => __('This must be a URL.', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'url',
						'std' => 'http://no-half-pixels.com'
						),
					array(
						'id' => $prefix . '4',
						'type' => 'text',
						'title' => __('Text Option - Numeric Validated', 'pluginchiefmsb-opts'),
						'sub_desc' => __('This must be numeric.', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'numeric',
						'std' => '0',
						'class' => 'small-text'
						),
					array(
						'id' => $prefix . 'comma_numeric',
						'type' => 'text',
						'title' => __('Text Option - Comma Numeric Validated', 'pluginchiefmsb-opts'),
						'sub_desc' => __('This must be a comma seperated string of numerical values.', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'comma_numeric',
						'std' => '0',
						'class' => 'small-text'
						),
					array(
						'id' => $prefix . 'no_special_chars',
						'type' => 'text',
						'title' => __('Text Option - No Special Chars Validated', 'pluginchiefmsb-opts'),
						'sub_desc' => __('This must be a alpha numeric only.', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'no_special_chars',
						'std' => '0'
						),
					array(
						'id' => $prefix . 'str_replace',
						'type' => 'text',
						'title' => __('Text Option - Str Replace Validated', 'pluginchiefmsb-opts'),
						'sub_desc' => __('You decide.', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'str_replace',
						'str' => array('search' => ' ', 'replacement' => 'thisisaspace'),
						'std' => '0'
						),
					array(
						'id' => $prefix . 'preg_replace',
						'type' => 'text',
						'title' => __('Text Option - Preg Replace Validated', 'pluginchiefmsb-opts'),
						'sub_desc' => __('You decide.', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'preg_replace',
						'preg' => array('pattern' => '/[^a-zA-Z_ -]/s', 'replacement' => 'no numbers'),
						'std' => '0'
						),
					array(
						'id' => $prefix . 'custom_validate',
						'type' => 'text',
						'title' => __('Text Option - Custom Callback Validated', 'pluginchiefmsb-opts'),
						'sub_desc' => __('You decide.', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate_callback' => 'validate_callback_function',
						'std' => '0'
						),
					array(
						'id' => $prefix . '5',
						'type' => 'textarea',
						'title' => __('Textarea Option - No HTML Validated', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('All HTML will be stripped', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'no_html',
						'std' => 'No HTML is allowed in here.'
						),
					array(
						'id' => $prefix . '6',
						'type' => 'textarea',
						'title' => __('Textarea Option - HTML Validated', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('HTML Allowed (wp_kses)', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'html', //see http://codex.wordpress.org/Function_Reference/wp_kses_post
						'std' => 'HTML is allowed in here.'
						),
					array(
						'id' => $prefix . '7',
						'type' => 'textarea',
						'title' => __('Textarea Option - HTML Validated Custom', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('Custom HTML Allowed (wp_kses)', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'html_custom',
						'std' => 'Some HTML is allowed in here.',
						'allowed_html' => array('') //see http://codex.wordpress.org/Function_Reference/wp_kses
						),
					array(
						'id' => $prefix . '8',
						'type' => 'textarea',
						'title' => __('Textarea Option - JS Validated', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('JS will be escaped', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'validate' => 'js'
						),
					array(
						'id' => $prefix . '9',
						'type' => 'editor',
						'title' => __('Editor Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('Can also use the validation methods if required', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'std' => 'OOOOOOhhhh, rich editing.'
						)
					,
					array(
						'id' => $prefix . 'editor',
						'type' => 'editor',
						'title' => __('Editor Option 2', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('Can also use the validation methods if required', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'std' => 'OOOOOOhhhh, rich editing2.'
						)
					)
				);
$pluginchiefmsb_sections[] = array(
				'icon' => PLUGINCHIEFMSB_OPTIONS_URL.'img/glyphicons/glyphicons_150_check.png',
				'title' => __('Radio/Checkbox Fields', 'pluginchiefmsb-opts'),
				'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'pluginchiefmsb-opts'),
				'fields' => array(
					array(
						'id' => $prefix . '10',
						'type' => 'checkbox',
						'title' => __('Checkbox Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'std' => '1'// 1 = on | 0 = off
						),
					array(
						'id' => $prefix . '11',
						'type' => 'multi_checkbox',
						'title' => __('Multi Checkbox Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for multi checkbox options
						'std' => array('1' => '1', '2' => '0', '3' => '0')//See how std has changed? you also dont need to specify opts that are 0.
						),
					array(
						'id' => $prefix . '12',
						'type' => 'radio',
						'title' => __('Radio Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
						'std' => '2'
						),
					array(
						'id' => $prefix . '13',
						'type' => 'radio_img',
						'title' => __('Radio Image Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'options' => array(
										'1' => array('title' => 'Opt 1', 'img' => 'images/align-none.png'),
										'2' => array('title' => 'Opt 2', 'img' => 'images/align-left.png'),
										'3' => array('title' => 'Opt 3', 'img' => 'images/align-center.png'),
										'4' => array('title' => 'Opt 4', 'img' => 'images/align-right.png')
											),//Must provide key => value(array:title|img) pairs for radio options
						'std' => '2'
						),
					array(
						'id' => $prefix . 'radio_img',
						'type' => 'radio_img',
						'title' => __('Radio Image Option For Layout', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This uses some of the built in images, you can use them for layout options.', 'pluginchiefmsb-opts'),
						'options' => array(
										'1' => array('title' => '1 Column', 'img' => PLUGINCHIEFMSB_OPTIONS_URL.'img/1col.png'),
										'2' => array('title' => '2 Column Left', 'img' => PLUGINCHIEFMSB_OPTIONS_URL.'img/2cl.png'),
										'3' => array('title' => '2 Column Right', 'img' => PLUGINCHIEFMSB_OPTIONS_URL.'img/2cr.png')
											),//Must provide key => value(array:title|img) pairs for radio options
						'std' => '2'
						)																		
					)
				);
$pluginchiefmsb_sections[] = array(
				'icon' => PLUGINCHIEFMSB_OPTIONS_URL.'img/glyphicons/glyphicons_157_show_lines.png',
				'title' => __('Select Fields', 'pluginchiefmsb-opts'),
				'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'pluginchiefmsb-opts'),
				'fields' => array(
					array(
						'id' => $prefix . '14',
						'type' => 'select',
						'title' => __('Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for select options
						'std' => '2'
						),
					array(
						'id' => $prefix . '15',
						'type' => 'multi_select',
						'title' => __('Multi Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
						'std' => array('2','3')
						)									
					)
				);
$pluginchiefmsb_sections[] = array(
				'icon' => PLUGINCHIEFMSB_OPTIONS_URL.'img/glyphicons/glyphicons_023_cogwheels.png',
				'title' => __('Custom Fields', 'pluginchiefmsb-opts'),
				'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'pluginchiefmsb-opts'),
				'fields' => array(
					array(
						'id' => $prefix . '16',
						'type' => 'color',
						'title' => __('Color Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('Only color validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'std' => '#FFFFFF'
						),
					array(
						'id' => $prefix . 'color_gradient',
						'type' => 'color_gradient',
						'title' => __('Color Gradient Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('Only color validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'std' => array('from' => '#000000', 'to' => '#FFFFFF')
						),
					array(
						'id' => $prefix . '17',
						'type' => 'date',
						'title' => __('Date Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts')
						),
					array(
						'id' => $prefix . '18',
						'type' => 'button_set',
						'title' => __('Button Set Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts'),
						'options' => array('1' => 'Opt 1','2' => 'Opt 2','3' => 'Opt 3'),//Must provide key => value pairs for radio options
						'std' => '2'
						),
					array(
						'id' => $prefix . '19',
						'type' => 'upload',
						'title' => __('Upload Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts')
						),
					array(
						'id' => $prefix . 'pages_select',
						'type' => 'pages_select',
						'title' => __('Pages Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a drop down menu of all the sites pages.', 'pluginchiefmsb-opts'),
						'args' => array()//uses get_pages
						),
					array(
						'id' => $prefix . 'pages_multi_select',
						'type' => 'pages_multi_select',
						'title' => __('Pages Multiple Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a Multi Select menu of all the sites pages.', 'pluginchiefmsb-opts'),
						'args' => array('number' => '5')//uses get_pages
						),
					array(
						'id' => $prefix . 'posts_select',
						'type' => 'posts_select',
						'title' => __('Posts Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a drop down menu of all the sites posts.', 'pluginchiefmsb-opts'),
						'args' => array('numberposts' => '10')//uses get_posts
						),
					array(
						'id' => $prefix . 'posts_multi_select',
						'type' => 'posts_multi_select',
						'title' => __('Posts Multiple Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a Multi Select menu of all the sites posts.', 'pluginchiefmsb-opts'),
						'args' => array('numberposts' => '10')//uses get_posts
						),
					array(
						'id' => $prefix . 'tags_select',
						'type' => 'tags_select',
						'title' => __('Tags Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a drop down menu of all the sites tags.', 'pluginchiefmsb-opts'),
						'args' => array('number' => '10')//uses get_tags
						),
					array(
						'id' => $prefix . 'tags_multi_select',
						'type' => 'tags_multi_select',
						'title' => __('Tags Multiple Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a Multi Select menu of all the sites tags.', 'pluginchiefmsb-opts'),
						'args' => array('number' => '10')//uses get_tags
						),
					array(
						'id' => $prefix . 'cats_select',
						'type' => 'cats_select',
						'title' => __('Cats Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a drop down menu of all the sites cats.', 'pluginchiefmsb-opts'),
						'args' => array('number' => '10')//uses get_categories
						),
					array(
						'id' => $prefix . 'cats_multi_select',
						'type' => 'cats_multi_select',
						'title' => __('Cats Multiple Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a Multi Select menu of all the sites cats.', 'pluginchiefmsb-opts'),
						'args' => array('number' => '10')//uses get_categories
						),
					array(
						'id' => $prefix . 'menu_select',
						'type' => 'menu_select',
						'title' => __('Menu Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a drop down menu of all the sites menus.', 'pluginchiefmsb-opts'),
						//'args' => array()//uses wp_get_nav_menus
						),
					array(
						'id' => $prefix . 'select_hide_below',
						'type' => 'select_hide_below',
						'title' => __('Select Hide Below Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field requires certain options to be checked before the below field will be shown.', 'pluginchiefmsb-opts'),
						'options' => array(
									'1' => array('name' => 'Opt 1 field below allowed', 'allow' => 'true'),
									'2' => array('name' => 'Opt 2 field below hidden', 'allow' => 'false'),
									'3' => array('name' => 'Opt 3 field below allowed', 'allow' => 'true')
									),//Must provide key => value(array) pairs for select options
						'std' => '2'
						),
					array(
						'id' => $prefix . 'menu_location_select',
						'type' => 'menu_location_select',
						'title' => __('Menu Location Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a drop down menu of all the themes menu locations.', 'pluginchiefmsb-opts')
						),
					array(
						'id' => $prefix . 'checkbox_hide_below',
						'type' => 'checkbox_hide_below',
						'title' => __('Checkbox to hide below', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a checkbox which will allow the user to use the next setting.', 'pluginchiefmsb-opts'),
						),
						array(
						'id' => $prefix . 'post_type_select',
						'type' => 'post_type_select',
						'title' => __('Post Type Select Option', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('No validation can be done on this field type', 'pluginchiefmsb-opts'),
						'desc' => __('This field creates a drop down menu of all registered post types.', 'pluginchiefmsb-opts'),
						//'args' => array()//uses get_post_types
						),
					array(
						'id' => $prefix . 'custom_callback',
						//'type' => 'nothing',//doesnt need to be called for callback fields
						'title' => __('Custom Field Callback', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('This is a completely unique field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is created with a callback function, so anything goes in this field. Make sure to define the function though.', 'pluginchiefmsb-opts'),
						'callback' => 'my_custom_field'
						),
					array(
						'id' => $prefix . 'google_webfonts',
						'type' => 'google_webfonts',//doesnt need to be called for callback fields
						'title' => __('Google Webfonts', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('This is a completely unique field type', 'pluginchiefmsb-opts'),
						'desc' => __('This is a simple implementation of the developer API for Google webfonts. Preview selection will be coming in future releases.', 'pluginchiefmsb-opts')
						)							
					)
				);

$pluginchiefmsb_sections[] = array(
				'icon' => PLUGINCHIEFMSB_OPTIONS_URL.'img/glyphicons/glyphicons_093_crop.png',
				'title' => __('Non Value Fields', 'pluginchiefmsb-opts'),
				'desc' => __('<p class="description">This is the Description. Again HTML is allowed</p>', 'pluginchiefmsb-opts'),
				'fields' => array(
					array(
						'id' => $prefix . '20',
						'type' => 'text',
						'title' => __('Text Field', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('Additional Info', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts')
						),
					array(
						'id' => $prefix . '21',
						'type' => 'divide'
						),
					array(
						'id' => $prefix . '22',
						'type' => 'text',
						'title' => __('Text Field', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('Additional Info', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts')
						),
					array(
						'id' => $prefix . '23',
						'type' => 'info',
						'desc' => __('<p class="description">This is the info field, if you want to break sections up.</p>', 'pluginchiefmsb-opts')
						),
					array(
						'id' => $prefix . '24',
						'type' => 'text',
						'title' => __('Text Field', 'pluginchiefmsb-opts'), 
						'sub_desc' => __('Additional Info', 'pluginchiefmsb-opts'),
						'desc' => __('This is the description field, again good for additional info.', 'pluginchiefmsb-opts')
						)				
					)
				);
				
				
	$pluginchiefmsb_tabs = array();
			
	if (function_exists('wp_get_theme')){
		$theme_data = wp_get_theme();
		$theme_uri = $theme_data->get('ThemeURI');
		$description = $theme_data->get('Description');
		$author = $theme_data->get('Author');
		$version = $theme_data->get('Version');
		$tags = $theme_data->get('Tags');
	}else{
		$theme_data = get_theme_data(trailingslashit(get_stylesheet_directory()).'style.css');
		$theme_uri = $theme_data['URI'];
		$description = $theme_data['Description'];
		$author = $theme_data['Author'];
		$version = $theme_data['Version'];
		$tags = $theme_data['Tags'];
	}	

	$theme_info = '<div class="pluginchiefmsb-opts-section-desc">';
	$theme_info .= '<p class="pluginchiefmsb-opts-theme-data description theme-uri">'.__('<strong>Theme URL:</strong> ', 'pluginchiefmsb-opts').'<a href="'.$theme_uri.'" target="_blank">'.$theme_uri.'</a></p>';
	$theme_info .= '<p class="pluginchiefmsb-opts-theme-data description theme-author">'.__('<strong>Author:</strong> ', 'pluginchiefmsb-opts').$author.'</p>';
	$theme_info .= '<p class="pluginchiefmsb-opts-theme-data description theme-version">'.__('<strong>Version:</strong> ', 'pluginchiefmsb-opts').$version.'</p>';
	$theme_info .= '<p class="pluginchiefmsb-opts-theme-data description theme-description">'.$description.'</p>';
	$theme_info .= '<p class="pluginchiefmsb-opts-theme-data description theme-tags">'.__('<strong>Tags:</strong> ', 'pluginchiefmsb-opts').implode(', ', $tags).'</p>';
	$theme_info .= '</div>';



	$pluginchiefmsb_tabs['theme_info'] = array(
					'icon' => PLUGINCHIEFMSB_OPTIONS_URL.'img/glyphicons/glyphicons_195_circle_info.png',
					'title' => __('Theme Information', 'pluginchiefmsb-opts'),
					'content' => $theme_info
					);
	
	if(file_exists(trailingslashit(get_stylesheet_directory()).'README.html')){
		$pluginchiefmsb_tabs['theme_docs'] = array(
						'icon' => PLUGINCHIEFMSB_OPTIONS_URL.'img/glyphicons/glyphicons_071_book.png',
						'title' => __('Documentation', 'pluginchiefmsb-opts'),
						'content' => nl2br(file_get_contents(trailingslashit(get_stylesheet_directory()).'README.html'))
						);
	}//if

	global $PLUGINCHIEFMSB_Options;
	$PLUGINCHIEFMSB_Options = new PLUGINCHIEFMSB_Options($pluginchiefmsb_sections, $pluginchiefmsb_args, $pluginchiefmsb_tabs);

}//function
add_action('init', 'pluginchiefmsb_setup_framework_options', 0);

/*
 * 
 * Custom function for the callback referenced above
 *
 */
function pluginchiefmsb_my_custom_field($field, $value){
	print_r($field);
	print_r($value);

}//function

/*
 * 
 * Custom function for the callback validation referenced above
 *
 */
function pluginchiefmsb_validate_callback_function($field, $value, $existing_value){
	
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
?>