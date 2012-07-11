<?php
if ( ! class_exists('PLUGINCHIEFMSB_Options') ){
	
	// windows-proof constants: replace backward by forward slashes - thanks to: https://github.com/peterbouwmeester
	$fslashed_dir = trailingslashit(str_replace('\\','/',dirname(__FILE__)));
	$fslashed_abs = trailingslashit(str_replace('\\','/',ABSPATH));
	
	if(!defined('PLUGINCHIEFMSB_OPTIONS_DIR')){
		define('PLUGINCHIEFMSB_OPTIONS_DIR', $fslashed_dir);
	}
	
	if(!defined('PLUGINCHIEFMSB_OPTIONS_URL')){
		define('PLUGINCHIEFMSB_OPTIONS_URL', site_url(str_replace( $fslashed_abs, '', $fslashed_dir )));
	}
	
class PLUGINCHIEFMSB_Options{
	
	protected $framework_url = 'http://leemason.github.com/PLUGINCHIEFMSB-Theme-Options-Framework/';
	protected $framework_version = '1.0.6';
		
	public $dir = PLUGINCHIEFMSB_OPTIONS_DIR;
	public $url = PLUGINCHIEFMSB_OPTIONS_URL;
	public $page = '';
	public $pluginchiefmsb_args = array();
	public $pluginchiefmsb_sections = array();
	public $pluginchiefmsb_extra_tabs = array();
	public $errors = array();
	public $warnings = array();
	public $options = array();

	/**
	 * Class Constructor. Defines the args for the theme options class
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	 *
	 * @param $array $pluginchiefmsb_args Arguments. Class constructor arguments.
	*/
	function __construct($pluginchiefmsb_sections = array(), $pluginchiefmsb_args = array(), $pluginchiefmsb_extra_tabs = array()){
		
		$defaults = array();
		
		$defaults['opt_name'] = 'pluginchiefmsb';//must be defined by theme/plugin
		
		$defaults['google_api_key'] = '';//must be defined for use with google webfonts field type
		
		$defaults['menu_icon'] = PLUGINCHIEFMSB_OPTIONS_URL.'/img/menu_icon.png';
		$defaults['menu_title'] = __('Options', 'pluginchiefmsb-opts');
		$defaults['page_icon'] = 'icon-themes';
		$defaults['page_title'] = __('Options', 'pluginchiefmsb-opts');
		$defaults['page_slug'] = '_pluginchiefmsb_options';
		$defaults['page_cap'] = 'manage_options';
		$defaults['page_type'] = 'submenu';
		$defaults['page_parent'] = 'pluginchiefmsb.php';
		$defaults['page_position'] = 100;
		$defaults['allow_sub_menu'] = false;
		
		$defaults['show_import_export'] = true;
		$defaults['dev_mode'] = true;
		$defaults['stylesheet_override'] = false;
		
		$defaults['footer_credit'] = __('<span id="footer-thankyou">Options Panel created using the <a href="'.$this->framework_url.'" target="_blank">PLUGINCHIEFMSB Theme Options Framework</a> Version '.$this->framework_version.'</span>', 'pluginchiefmsb-opts');
		
		$defaults['help_tabs'] = array();
		$defaults['help_sidebar'] = __('', 'pluginchiefmsb-opts');
		
		//get args
		$this->args = wp_parse_args($pluginchiefmsb_args, $defaults);
		$this->args = apply_filters('pluginchiefmsb-opts-args-'.$this->args['opt_name'], $this->args);
		
		//get sections
		$this->sections = apply_filters('pluginchiefmsb-opts-sections-'.$this->args['opt_name'], $pluginchiefmsb_sections);
		
		//get extra tabs
		$this->extra_tabs = apply_filters('pluginchiefmsb-opts-extra-tabs-'.$this->args['opt_name'], $pluginchiefmsb_extra_tabs);
		
		//set option with defaults
		add_action('init', array(&$this, '_set_default_options'));
		
		//options page
		add_action('admin_menu', array(&$this, '_options_page'));
		
		//register setting
		add_action('admin_init', array(&$this, '_register_setting'));
		
		//add the js for the error handling before the form
		add_action('pluginchiefmsb-opts-page-before-form-'.$this->args['opt_name'], array(&$this, '_errors_js'), 1);
		
		//add the js for the warning handling before the form
		add_action('pluginchiefmsb-opts-page-before-form-'.$this->args['opt_name'], array(&$this, '_warnings_js'), 2);
		
		//hook into the wp feeds for downloading the exported settings
		add_action('do_feed_pluginchiefmsbopts-'.$this->args['opt_name'], array(&$this, '_download_options'), 1, 1);
		
		//get the options for use later on
		$this->options = get_option($this->args['opt_name']);
		
	}//function
	
	
	/**
	 * ->get(); This is used to return and option value from the options array
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0.1
	 *
	 * @param $array $pluginchiefmsb_args Arguments. Class constructor arguments.
	*/
	function get($opt_name, $default = null){
		return (!empty($this->options[$opt_name])) ? $this->options[$opt_name] : $default;
	}//function
	
	/**
	 * ->set(); This is used to set an arbitrary option in the options array
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0.1
	 * 
	 * @param string $opt_name the name of the option being added
	 * @param mixed $value the value of the option being added
	 */
	function set($opt_name = '', $value = '') {
		if($opt_name != ''){
			$this->options[$opt_name] = $value;
			update_option($this->args['opt_name'], $this->options);
		}//if
	}
	
	/**
	 * ->show(); This is used to echo and option value from the options array
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0.1
	 *
	 * @param $array $pluginchiefmsb_args Arguments. Class constructor arguments.
	*/
	function show($opt_name, $default = ''){
		$option = $this->get($opt_name);
		if(!is_array($option) && $option != ''){
			echo $option;
		}elseif($default != ''){
			echo $default;
		}
	}//function
	
	
	
	/**
	 * Get default options into an array suitable for the settings API
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	 *
	*/
	function _default_values(){
		
		$defaults = array();
		
		foreach($this->sections as $k => $pluginchiefmsb_section){
			
			if(isset($pluginchiefmsb_section['fields'])){
		
				foreach($pluginchiefmsb_section['fields'] as $fieldk => $field){
					
					if(!isset($field['std'])){$field['std'] = '';}
						
						$defaults[$field['id']] = $field['std'];
					
				}//foreach
			
			}//if
			
		}//foreach
		
		//fix for notice on first page load
		$defaults['last_tab'] = 0;

		return $defaults;
		
	}
	
	
	
	/**
	 * Set default options on admin_init if option doesnt exist (theme activation hook caused problems, so admin_init it is)
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	 *
	*/
	function _set_default_options(){
		if(!get_option($this->args['opt_name'])){
			add_option($this->args['opt_name'], $this->_default_values());
		}
		$this->options = get_option($this->args['opt_name']);
	}//function
	
	
	/**
	 * Class Theme Options Page Function, creates main options page.
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function _options_page(){
		if($this->args['page_type'] == 'submenu'){
			if(!isset($this->args['page_parent']) || empty($this->args['page_parent'])){
				$this->args['page_parent'] = 'themes.php';
			}
			$this->page = add_submenu_page(
							$this->args['page_parent'],
							$this->args['page_title'], 
							$this->args['menu_title'], 
							$this->args['page_cap'], 
							$this->args['page_slug'], 
							array(&$this, '_options_page_html')
						);
		}else{
			$this->page = add_menu_page(
							$this->args['page_title'], 
							$this->args['menu_title'], 
							$this->args['page_cap'], 
							$this->args['page_slug'], 
							array(&$this, '_options_page_html'),
							$this->args['menu_icon'],
							$this->args['page_position']
						);
						
		if(true === $this->args['allow_sub_menu']){
						
			//this is needed to remove the top level menu item from showing in the submenu
			add_submenu_page($this->args['page_slug'],$this->args['page_title'],'',$this->args['page_cap'],$this->args['page_slug'],create_function( '$a', "return null;" ));
						
						
			foreach($this->sections as $k => $pluginchiefmsb_section){
							
				add_submenu_page(
						$this->args['page_slug'],
						$pluginchiefmsb_section['title'], 
						$pluginchiefmsb_section['title'], 
						$this->args['page_cap'], 
						$this->args['page_slug'].'&tab='.$k, 
						create_function( '$a', "return null;" )
				);
					
			}
			
			if(true === $this->args['show_import_export']){
				
				add_submenu_page(
						$this->args['page_slug'],
						__('Import / Export', 'pluginchiefmsb-opts'), 
						__('Import / Export', 'pluginchiefmsb-opts'), 
						$this->args['page_cap'], 
						$this->args['page_slug'].'&tab=import_export_default', 
						create_function( '$a', "return null;" )
				);
					
			}//if
						

			foreach($this->extra_tabs as $k => $tab){
				
				add_submenu_page(
						$this->args['page_slug'],
						$tab['title'], 
						$tab['title'], 
						$this->args['page_cap'], 
						$this->args['page_slug'].'&tab='.$k, 
						create_function( '$a', "return null;" )
				);
				
			}

			if(true === $this->args['dev_mode']){
						
				add_submenu_page(
						$this->args['page_slug'],
						__('Dev Mode Info', 'pluginchiefmsb-opts'), 
						__('Dev Mode Info', 'pluginchiefmsb-opts'), 
						$this->args['page_cap'], 
						$this->args['page_slug'].'&tab=dev_mode_default', 
						create_function( '$a', "return null;" )
				);
				
			}//if

		}//if			
						
			
		}//else

		add_action('admin_print_styles-'.$this->page, array(&$this, '_enqueue'));
		add_action('load-'.$this->page, array(&$this, '_load_page'));
	}//function	
	
	

	/**
	 * enqueue styles/js for theme page
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function _enqueue(){
		
		wp_register_style(
				'pluginchiefmsb-opts-css', 
				$this->url.'css/options.css',
				array('farbtastic'),
				time(),
				'all'
			);
			
		wp_register_style(
			'pluginchiefmsb-opts-jquery-ui-css',
			apply_filters('pluginchiefmsb-opts-ui-theme', $this->url.'css/jquery-ui-aristo/aristo.css'),
			'',
			time(),
			'all'
		);
			
			
		if(false === $this->args['stylesheet_override']){
			wp_enqueue_style('pluginchiefmsb-opts-css');
		}
		
		
		wp_enqueue_script(
			'pluginchiefmsb-opts-js', 
			$this->url.'js/options.js', 
			array('jquery'),
			time(),
			true
		);
		wp_localize_script('pluginchiefmsb-opts-js', 'pluginchiefmsb_opts', array('reset_confirm' => __('Are you sure? Resetting will loose all custom values.', 'pluginchiefmsb-opts'), 'opt_name' => $this->args['opt_name']));
		
		do_action('pluginchiefmsb-opts-enqueue-'.$this->args['opt_name']);
		
		
		foreach($this->sections as $k => $pluginchiefmsb_section){
			
			if(isset($pluginchiefmsb_section['fields'])){
				
				foreach($pluginchiefmsb_section['fields'] as $fieldk => $field){
					
					if(isset($field['type'])){
					
						$pluginchiefmsb_field_class = 'PLUGINCHIEFMSB_Options_'.$field['type'];
						
						if(!class_exists($pluginchiefmsb_field_class)){
							require_once($this->dir.'fields/'.$field['type'].'/field_'.$field['type'].'.php');
						}//if
				
						if(class_exists($pluginchiefmsb_field_class) && method_exists($pluginchiefmsb_field_class, 'enqueue')){
							$enqueue = new $pluginchiefmsb_field_class('','',$this);
							$enqueue->enqueue();
						}//if
						
					}//if type
					
				}//foreach
			
			}//if fields
			
		}//foreach
			
		
	}//function
	
	/**
	 * Download the options file, or display it
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0.1
	*/
	function _download_options(){
		//-'.$this->args['opt_name']
		if(!isset($_GET['secret']) || $_GET['secret'] != md5(AUTH_KEY.SECURE_AUTH_KEY)){wp_die('Invalid Secret for options use');exit;}
		if(!isset($_GET['feed'])){wp_die('No Feed Defined');exit;}
		$backup_options = get_option(str_replace('pluginchiefmsbopts-','',$_GET['feed']));
		$backup_options['pluginchiefmsb-opts-backup'] = '1';
		$content = '###'.serialize($backup_options).'###';
		
		
		if(isset($_GET['action']) && $_GET['action'] == 'download_options'){
			header('Content-Description: File Transfer');
			header('Content-type: application/txt');
			header('Content-Disposition: attachment; filename="'.str_replace('pluginchiefmsbopts-','',$_GET['feed']).'_options_'.date('d-m-Y').'.txt"');
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate');
			header('Pragma: public');
			echo $content;
			exit;
		}else{
			echo $content;
			exit;
		}
	}
	
	
	
	
	/**
	 * show page help
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function _load_page(){
		
		//do admin head action for this page
		add_action('admin_head', array(&$this, 'admin_head'));
		
		//do admin footer text hook
		add_filter('admin_footer_text', array(&$this, 'admin_footer_text'));
		
		$screen = get_current_screen();
		
		if(is_array($this->args['help_tabs'])){
			foreach($this->args['help_tabs'] as $tab){
				$screen->add_help_tab($tab);
			}//foreach
		}//if
		
		if($this->args['help_sidebar'] != ''){
			$screen->set_help_sidebar($this->args['help_sidebar']);
		}//if
		
		do_action('pluginchiefmsb-opts-load-page-'.$this->args['opt_name'], $screen);
		
	}//function
	
	
	/**
	 * do action pluginchiefmsb-opts-admin-head for theme options page
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function admin_head(){
		
		do_action('pluginchiefmsb-opts-admin-head-'.$this->args['opt_name'], $this);
		
	}//function
	
	
	function admin_footer_text($footer_text){
		return $this->args['footer_credit'];
	}//function
	
	
	
	
	/**
	 * Register Option for use
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function _register_setting(){
		
		register_setting($this->args['opt_name'].'_group', $this->args['opt_name'], array(&$this,'_validate_options'));
		
		foreach($this->sections as $k => $pluginchiefmsb_section){
			
			add_settings_section($k.'_section', $pluginchiefmsb_section['title'], array(&$this, '_section_desc'), $k.'_section_group');
			
			if(isset($pluginchiefmsb_section['fields'])){
			
				foreach($pluginchiefmsb_section['fields'] as $fieldk => $field){
					
					if(isset($field['title'])){
					
						$th = (isset($field['sub_desc']))?$field['title'].'<span class="description">'.$field['sub_desc'].'</span>':$field['title'];
					}else{
						$th = '';
					}
					
					add_settings_field($fieldk.'_field', $th, array(&$this,'_field_input'), $k.'_section_group', $k.'_section', $field); // checkbox
					
				}//foreach
			
			}//if(isset($pluginchiefmsb_section['fields'])){
			
		}//foreach
		
		do_action('pluginchiefmsb-opts-register-settings-'.$this->args['opt_name']);
		
	}//function
	
	
	
	/**
	 * Validate the Options options before insertion
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function _validate_options($plugin_options){
		
		set_transient('pluginchiefmsb-opts-saved', '1', 1000 );
		
		if(!empty($plugin_options['import'])){
			
			if($plugin_options['import_code'] != ''){
				$import = $plugin_options['import_code'];
			}elseif($plugin_options['import_link'] != ''){
				$import = wp_remote_retrieve_body( wp_remote_get($plugin_options['import_link']) );
			}
			
			$imported_options = unserialize(trim($import,'###'));
			if(is_array($imported_options) && isset($imported_options['pluginchiefmsb-opts-backup']) && $imported_options['pluginchiefmsb-opts-backup'] == '1'){
				$imported_options['imported'] = 1;
				return $imported_options;
			}
			
			
		}
		
		
		if(!empty($plugin_options['defaults'])){
			$plugin_options = $this->_default_values();
			return $plugin_options;
		}//if set defaults

		
		//validate fields (if needed)
		$plugin_options = $this->_validate_values($plugin_options, $this->options);
		
		if($this->errors){
			set_transient('pluginchiefmsb-opts-errors-'.$this->args['opt_name'], $this->errors, 1000 );		
		}//if errors
		
		if($this->warnings){
			set_transient('pluginchiefmsb-opts-warnings-'.$this->args['opt_name'], $this->warnings, 1000 );		
		}//if errors
		
		do_action('pluginchiefmsb-opts-options-validate-'.$this->args['opt_name'], $plugin_options, $this->options);
		
		
		unset($plugin_options['defaults']);
		unset($plugin_options['import']);
		unset($plugin_options['import_code']);
		unset($plugin_options['import_link']);
		
		return $plugin_options;	
	
	}//function
	
	
	
	
	/**
	 * Validate values from options form (used in settings api validate function)
	 * calls the custom validation class for the field so authors can override with custom classes
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function _validate_values($plugin_options, $options){
		foreach($this->sections as $k => $pluginchiefmsb_section){
			
			if(isset($pluginchiefmsb_section['fields'])){
			
				foreach($pluginchiefmsb_section['fields'] as $fieldk => $field){
					$field['section_id'] = $k;
					
					if(isset($field['type']) && $field['type'] == 'multi_text'){continue;}//we cant validate this yet
					
					if(!isset($plugin_options[$field['id']]) || $plugin_options[$field['id']] == ''){
						continue;
					}
					
					//force validate of custom filed types
					
					if(isset($field['type']) && !isset($field['validate'])){
						if($field['type'] == 'color' || $field['type'] == 'color_gradient'){
							$field['validate'] = 'color';
						}elseif($field['type'] == 'date'){
							$field['validate'] = 'date';
						}
					}//if
	
					if(isset($field['validate'])){
						$validate = 'PLUGINCHIEFMSB_Validation_'.$field['validate'];
						
						if(!class_exists($validate)){
							require_once($this->dir.'validation/'.$field['validate'].'/validation_'.$field['validate'].'.php');
						}//if
						
						if(class_exists($validate)){
							$validation = new $validate($field, $plugin_options[$field['id']], $options[$field['id']]);
							$plugin_options[$field['id']] = $validation->value;
							if(isset($validation->error)){
								$this->errors[] = $validation->error;
							}
							if(isset($validation->warning)){
								$this->warnings[] = $validation->warning;
							}
							continue;
						}//if
					}//if
					
					
					if(isset($field['validate_callback']) && function_exists($field['validate_callback'])){
						
						$callbackvalues = call_user_func($field['validate_callback'], $field, $plugin_options[$field['id']], $options[$field['id']]);
						$plugin_options[$field['id']] = $callbackvalues['value'];
						if(isset($callbackvalues['error'])){
							$this->errors[] = $callbackvalues['error'];
						}//if
						if(isset($callbackvalues['warning'])){
							$this->warnings[] = $callbackvalues['warning'];
						}//if
						
					}//if
					
					
				}//foreach
			
			}//if(isset($pluginchiefmsb_section['fields'])){
			
		}//foreach
		return $plugin_options;
	}//function
	
	
	
	
	
	
	
	
	/**
	 * HTML OUTPUT.
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function _options_page_html(){
		
		echo '<div class="wrap">';
			echo '<div id="'.$this->args['page_icon'].'" class="icon32"><br/></div>';
			echo '<h2 id="pluginchiefmsb-opts-heading">'.get_admin_page_title().'</h2>';
			echo (isset($this->args['intro_text']))?$this->args['intro_text']:'';
			
			do_action('pluginchiefmsb-opts-page-before-form-'.$this->args['opt_name']);

			echo '<form method="post" action="options.php" enctype="multipart/form-data" id="pluginchiefmsb-opts-form-wrapper">';
				settings_fields($this->args['opt_name'].'_group');
				
				$this->options['last_tab'] = (isset($_GET['tab']) && !get_transient('pluginchiefmsb-opts-saved'))?$_GET['tab']:$this->options['last_tab'];
				
				echo '<input type="hidden" id="last_tab" name="'.$this->args['opt_name'].'[last_tab]" value="'.$this->options['last_tab'].'" />';
				
				echo '<div id="pluginchiefmsb-opts-header">';
					submit_button('', 'primary', '', false);
					submit_button(__('Reset to Defaults', 'pluginchiefmsb-opts'), 'secondary', $this->args['opt_name'].'[defaults]', false);
					echo '<div class="clear"></div><!--clearfix-->';
				echo '</div>';
				
					if(isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' && get_transient('pluginchiefmsb-opts-saved') == '1'){
						if(isset($this->options['imported']) && $this->options['imported'] == 1){
							echo '<div id="pluginchiefmsb-opts-imported">'.apply_filters('pluginchiefmsb-opts-imported-text-'.$this->args['opt_name'], __('<strong>Settings Imported!</strong>', 'pluginchiefmsb-opts')).'</div>';
						}else{
							echo '<div id="pluginchiefmsb-opts-save">'.apply_filters('pluginchiefmsb-opts-saved-text-'.$this->args['opt_name'], __('<strong>Settings Saved!</strong>', 'pluginchiefmsb-opts')).'</div>';
						}
						delete_transient('pluginchiefmsb-opts-saved');
					}
					echo '<div id="pluginchiefmsb-opts-save-warn">'.apply_filters('pluginchiefmsb-opts-changed-text-'.$this->args['opt_name'], __('<strong>Settings have changed!, you should save them!</strong>', 'pluginchiefmsb-opts')).'</div>';
					echo '<div id="pluginchiefmsb-opts-field-errors">'.__('<strong><span></span> error(s) were found!</strong>', 'pluginchiefmsb-opts').'</div>';
					
					echo '<div id="pluginchiefmsb-opts-field-warnings">'.__('<strong><span></span> warning(s) were found!</strong>', 'pluginchiefmsb-opts').'</div>';
				
				echo '<div class="clear"></div><!--clearfix-->';
				
				echo '<div id="pluginchiefmsb-opts-sidebar">';
					echo '<ul id="pluginchiefmsb-opts-group-menu">';
						foreach($this->sections as $k => $pluginchiefmsb_section){
							$icon = (!isset($pluginchiefmsb_section['icon']))?'<img src="'.$this->url.'img/glyphicons/glyphicons_019_cogwheel.png" /> ':'<img src="'.$pluginchiefmsb_section['icon'].'" /> ';
							echo '<li id="'.$k.'_section_group_li" class="pluginchiefmsb-opts-group-tab-link-li">';
								echo '<a href="javascript:void(0);" id="'.$k.'_section_group_li_a" class="pluginchiefmsb-opts-group-tab-link-a" data-rel="'.$k.'">'.$icon.'<span>'.$pluginchiefmsb_section['title'].'</span></a>';
							echo '</li>';
						}
						
						echo '<li class="divide">&nbsp;</li>';
						
						do_action('pluginchiefmsb-opts-after-section-menu-items-'.$this->args['opt_name'], $this);
						
						if(true === $this->args['show_import_export']){
							echo '<li id="import_export_default_section_group_li" class="pluginchiefmsb-opts-group-tab-link-li">';
									echo '<a href="javascript:void(0);" id="import_export_default_section_group_li_a" class="pluginchiefmsb-opts-group-tab-link-a" data-rel="import_export_default"><img src="'.$this->url.'img/glyphicons/glyphicons_082_roundabout.png" /> <span>'.__('Import / Export', 'pluginchiefmsb-opts').'</span></a>';
							echo '</li>';
							echo '<li class="divide">&nbsp;</li>';
						}//if
						
						
						
						
						
						foreach($this->extra_tabs as $k => $tab){
							$icon = (!isset($tab['icon']))?'<img src="'.$this->url.'img/glyphicons/glyphicons_019_cogwheel.png" /> ':'<img src="'.$tab['icon'].'" /> ';
							echo '<li id="'.$k.'_section_group_li" class="pluginchiefmsb-opts-group-tab-link-li">';
								echo '<a href="javascript:void(0);" id="'.$k.'_section_group_li_a" class="pluginchiefmsb-opts-group-tab-link-a custom-tab" data-rel="'.$k.'">'.$icon.'<span>'.$tab['title'].'</span></a>';
							echo '</li>';
						}

						
						if(true === $this->args['dev_mode']){
							echo '<li id="dev_mode_default_section_group_li" class="pluginchiefmsb-opts-group-tab-link-li">';
									echo '<a href="javascript:void(0);" id="dev_mode_default_section_group_li_a" class="pluginchiefmsb-opts-group-tab-link-a custom-tab" data-rel="dev_mode_default"><img src="'.$this->url.'img/glyphicons/glyphicons_195_circle_info.png" /> <span>'.__('Dev Mode Info', 'pluginchiefmsb-opts').'</span></a>';
							echo '</li>';
						}//if
						
					echo '</ul>';
				echo '</div>';
				
				echo '<div id="pluginchiefmsb-opts-main">';
				
					foreach($this->sections as $k => $pluginchiefmsb_section){
						echo '<div id="'.$k.'_section_group'.'" class="pluginchiefmsb-opts-group-tab">';
							do_settings_sections($k.'_section_group');
						echo '</div>';
					}					
					
					
					if(true === $this->args['show_import_export']){
						echo '<div id="import_export_default_section_group'.'" class="pluginchiefmsb-opts-group-tab">';
							echo '<h3>'.__('Import / Export Options', 'pluginchiefmsb-opts').'</h3>';
							
							echo '<h4>'.__('Import Options', 'pluginchiefmsb-opts').'</h4>';
							
							echo '<p><a href="javascript:void(0);" id="pluginchiefmsb-opts-import-code-button" class="button-secondary">Import from file</a> <a href="javascript:void(0);" id="pluginchiefmsb-opts-import-link-button" class="button-secondary">Import from URL</a></p>';
							
							echo '<div id="pluginchiefmsb-opts-import-code-wrapper">';
							
								echo '<div class="pluginchiefmsb-opts-section-desc">';
				
									echo '<p class="description" id="import-code-description">'.apply_filters('pluginchiefmsb-opts-import-file-description',__('Input your backup file below and hit Import to restore your sites options from a backup.', 'pluginchiefmsb-opts')).'</p>';
								
								echo '</div>';
								
								echo '<textarea id="import-code-value" name="'.$this->args['opt_name'].'[import_code]" class="large-text" rows="8"></textarea>';
							
							echo '</div>';
							
							
							echo '<div id="pluginchiefmsb-opts-import-link-wrapper">';
							
								echo '<div class="pluginchiefmsb-opts-section-desc">';
									
									echo '<p class="description" id="import-link-description">'.apply_filters('pluginchiefmsb-opts-import-link-description',__('Input the URL to another sites options set and hit Import to load the options from that site.', 'pluginchiefmsb-opts')).'</p>';
								
								echo '</div>';

								echo '<input type="text" id="import-link-value" name="'.$this->args['opt_name'].'[import_link]" class="large-text" value="" />';
							
							echo '</div>';
							
							
							
							echo '<p id="pluginchiefmsb-opts-import-action"><input type="submit" id="pluginchiefmsb-opts-import" name="'.$this->args['opt_name'].'[import]" class="button-primary" value="'.__('Import', 'pluginchiefmsb-opts').'"> <span>'.apply_filters('pluginchiefmsb-opts-import-warning', __('WARNING! This will overwrite any existing options, please proceed with caution!', 'pluginchiefmsb-opts')).'</span></p>';
							echo '<div id="import_divide"></div>';
							
							echo '<h4>'.__('Export Options', 'pluginchiefmsb-opts').'</h4>';
							echo '<div class="pluginchiefmsb-opts-section-desc">';
								echo '<p class="description">'.apply_filters('pluginchiefmsb-opts-backup-description', __('Here you can copy/download your themes current option settings. Keep this safe as you can use it as a backup should anything go wrong. Or you can use it to restore your settings on this site (or any other site). You also have the handy option to copy the link to yours sites settings. Which you can then use to duplicate on another site', 'pluginchiefmsb-opts')).'</p>';
							echo '</div>';
							
								echo '<p><a href="javascript:void(0);" id="pluginchiefmsb-opts-export-code-copy" class="button-secondary">Copy</a> <a href="'.add_query_arg(array('feed' => 'pluginchiefmsbopts-'.$this->args['opt_name'], 'action' => 'download_options', 'secret' => md5(AUTH_KEY.SECURE_AUTH_KEY)), site_url()).'" id="pluginchiefmsb-opts-export-code-dl" class="button-primary">Download</a> <a href="javascript:void(0);" id="pluginchiefmsb-opts-export-link" class="button-secondary">Copy Link</a></p>';
								$backup_options = $this->options;
								$backup_options['pluginchiefmsb-opts-backup'] = '1';
								$encoded_options = '###'.serialize($backup_options).'###';
								echo '<textarea class="large-text" id="pluginchiefmsb-opts-export-code" rows="8">';print_r($encoded_options);echo '</textarea>';
								echo '<input type="text" class="large-text" id="pluginchiefmsb-opts-export-link-value" value="'.add_query_arg(array('feed' => 'pluginchiefmsbopts-'.$this->args['opt_name'], 'secret' => md5(AUTH_KEY.SECURE_AUTH_KEY)), site_url()).'" />';
							
						echo '</div>';
					}
					
					
					
					foreach($this->extra_tabs as $k => $tab){
						echo '<div id="'.$k.'_section_group'.'" class="pluginchiefmsb-opts-group-tab">';
						echo '<h3>'.$tab['title'].'</h3>';
						echo $tab['content'];
						echo '</div>';
					}

					
					
					if(true === $this->args['dev_mode']){
						echo '<div id="dev_mode_default_section_group'.'" class="pluginchiefmsb-opts-group-tab">';
							echo '<h3>'.__('Dev Mode Info', 'pluginchiefmsb-opts').'</h3>';
							echo '<div class="pluginchiefmsb-opts-section-desc">';
							echo '<textarea class="large-text" rows="24">'.print_r($this, true).'</textarea>';
							echo '</div>';
						echo '</div>';
					}
					
					
					do_action('pluginchiefmsb-opts-after-section-items-'.$this->args['opt_name'], $this);
				
					echo '<div class="clear"></div><!--clearfix-->';
				echo '</div>';
				echo '<div class="clear"></div><!--clearfix-->';
				
				echo '<div id="pluginchiefmsb-opts-footer">';
				
					if(isset($this->args['share_icons'])){
						echo '<div id="pluginchiefmsb-opts-share">';
						foreach($this->args['share_icons'] as $link){
							echo '<a href="'.$link['link'].'" title="'.$link['title'].'" target="_blank"><img src="'.$link['img'].'"/></a>';
						}
						echo '</div>';
					}
					
					submit_button('', 'primary', '', false);
					submit_button(__('Reset to Defaults', 'pluginchiefmsb-opts'), 'secondary', $this->args['opt_name'].'[defaults]', false);
					echo '<div class="clear"></div><!--clearfix-->';
				echo '</div>';
			
			echo '</form>';
			
			do_action('pluginchiefmsb-opts-page-after-form-'.$this->args['opt_name']);
			
			echo '<div class="clear"></div><!--clearfix-->';	
		echo '</div><!--wrap-->';

	}//function
	
	
	
	/**
	 * JS to display the errors on the page
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/	
	function _errors_js(){
		
		if(isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' && get_transient('pluginchiefmsb-opts-errors-'.$this->args['opt_name'])){
				$errors = get_transient('pluginchiefmsb-opts-errors-'.$this->args['opt_name']);
				$pluginchiefmsb_section_errors = array();
				foreach($errors as $error){
					$pluginchiefmsb_section_errors[$error['section_id']] = (isset($pluginchiefmsb_section_errors[$error['section_id']]))?$pluginchiefmsb_section_errors[$error['section_id']]:0;
					$pluginchiefmsb_section_errors[$error['section_id']]++;
				}
				
				
				echo '<script type="text/javascript">';
					echo 'jQuery(document).ready(function(){';
						echo 'jQuery("#pluginchiefmsb-opts-field-errors span").html("'.count($errors).'");';
						echo 'jQuery("#pluginchiefmsb-opts-field-errors").show();';
						
						foreach($pluginchiefmsb_section_errors as $pluginchiefmsb_sectionkey => $pluginchiefmsb_section_error){
							echo 'jQuery("#'.$pluginchiefmsb_sectionkey.'_section_group_li_a").append("<span class=\"pluginchiefmsb-opts-menu-error\">'.$pluginchiefmsb_section_error.'</span>");';
						}
						
						foreach($errors as $error){
							echo 'jQuery("#'.$error['id'].'").addClass("pluginchiefmsb-opts-field-error");';
							echo 'jQuery("#'.$error['id'].'").closest("td").append("<span class=\"pluginchiefmsb-opts-th-error\">'.$error['msg'].'</span>");';
						}
					echo '});';
				echo '</script>';
				delete_transient('pluginchiefmsb-opts-errors-'.$this->args['opt_name']);
			}
		
	}//function
	
	
	
	/**
	 * JS to display the warnings on the page
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0.3
	*/	
	function _warnings_js(){
		
		if(isset($_GET['settings-updated']) && $_GET['settings-updated'] == 'true' && get_transient('pluginchiefmsb-opts-warnings-'.$this->args['opt_name'])){
				$warnings = get_transient('pluginchiefmsb-opts-warnings-'.$this->args['opt_name']);
				$pluginchiefmsb_section_warnings = array();
				foreach($warnings as $warning){
					$pluginchiefmsb_section_warnings[$warning['section_id']] = (isset($pluginchiefmsb_section_warnings[$warning['section_id']]))?$pluginchiefmsb_section_warnings[$warning['section_id']]:0;
					$pluginchiefmsb_section_warnings[$warning['section_id']]++;
				}
				
				
				echo '<script type="text/javascript">';
					echo 'jQuery(document).ready(function(){';
						echo 'jQuery("#pluginchiefmsb-opts-field-warnings span").html("'.count($warnings).'");';
						echo 'jQuery("#pluginchiefmsb-opts-field-warnings").show();';
						
						foreach($pluginchiefmsb_section_warnings as $pluginchiefmsb_sectionkey => $pluginchiefmsb_section_warning){
							echo 'jQuery("#'.$pluginchiefmsb_sectionkey.'_section_group_li_a").append("<span class=\"pluginchiefmsb-opts-menu-warning\">'.$pluginchiefmsb_section_warning.'</span>");';
						}
						
						foreach($warnings as $warning){
							echo 'jQuery("#'.$warning['id'].'").addClass("pluginchiefmsb-opts-field-warning");';
							echo 'jQuery("#'.$warning['id'].'").closest("td").append("<span class=\"pluginchiefmsb-opts-th-warning\">'.$warning['msg'].'</span>");';
						}
					echo '});';
				echo '</script>';
				delete_transient('pluginchiefmsb-opts-warnings-'.$this->args['opt_name']);
			}
		
	}//function
	
	

	
	
	/**
	 * Section HTML OUTPUT.
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/	
	function _section_desc($pluginchiefmsb_section){
		
		$id = rtrim($pluginchiefmsb_section['id'], '_section');
		
		if(isset($this->sections[$id]['desc']) && !empty($this->sections[$id]['desc'])) {
			echo '<div class="pluginchiefmsb-opts-section-desc">'.$this->sections[$id]['desc'].'</div>';
		}
		
	}//function
	
	
	
	
	/**
	 * Field HTML OUTPUT.
	 *
	 * Gets option from options array, then calls the speicfic field type class - allows extending by other devs
	 *
	 * @since PLUGINCHIEFMSB_Options 1.0
	*/
	function _field_input($field){
		
		
		if(isset($field['callback']) && function_exists($field['callback'])){
			$value = (isset($this->options[$field['id']]))?$this->options[$field['id']]:'';
			do_action('pluginchiefmsb-opts-before-field-'.$this->args['opt_name'], $field, $value);
			call_user_func($field['callback'], $field, $value);
			do_action('pluginchiefmsb-opts-after-field-'.$this->args['opt_name'], $field, $value);
			return;
		}
		
		if(isset($field['type'])){
			
			$pluginchiefmsb_field_class = 'PLUGINCHIEFMSB_Options_'.$field['type'];
			
			if(class_exists($pluginchiefmsb_field_class)){
				require_once($this->dir.'fields/'.$field['type'].'/field_'.$field['type'].'.php');
			}//if
			
			if(class_exists($pluginchiefmsb_field_class)){
				$value = (isset($this->options[$field['id']]))?$this->options[$field['id']]:'';
				do_action('pluginchiefmsb-opts-before-field-'.$this->args['opt_name'], $field, $value);
				$render = '';
				$render = new $pluginchiefmsb_field_class($field, $value, $this);
				$render->render();
				do_action('pluginchiefmsb-opts-after-field-'.$this->args['opt_name'], $field, $value);
			}//if
			
		}//if $field['type']
		
	}//function

	
}//class
}//if
?>