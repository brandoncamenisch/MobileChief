<?php

/* ----------------------------------------------------------------------------
	Create a Function to Enqueue Styles & Scripts
---------------------------------------------------------------------------- */	

	function plchf_msb_enqueue_plugin_scripts_and_styles() {

    	// Register Styles
    	wp_register_style( 'plchf_msb_admin_styles', PLUGINCHIEFMSB . 'css/style.css');
    	wp_register_style( 'plchf_msb_font_awesome_styles', PLUGINCHIEFMSB . 'css/font-awesome/css/font-awesome.css');
    	
    	// Enqueue Styles
    	wp_enqueue_style('jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/themes/flick/jquery-ui.css');
    	wp_enqueue_style('farbtastic');
    	wp_enqueue_style('plchf_msb_font_awesome_styles');
    	wp_enqueue_style('plchf_msb_admin_styles');


    	// Enqueue JS
    	add_thickbox();
    	wp_enqueue_script('jquery');
    	wp_enqueue_script('jquery-ui-core');
    	wp_enqueue_script('jquery-ui-sortable');
    	wp_enqueue_script('jquery-ui-datepicker');
    	wp_enqueue_script('jquery-ui-slider');
    	wp_enqueue_script('jquery-touch-punch');
    	wp_enqueue_script('plchf_msb_farbtastic', 	PLUGINCHIEFMSB . 'js/vendor-scripts/farbtastic.js');
    	wp_enqueue_script('plchf_msb_tinymce', 		PLUGINCHIEFMSB . 'js/vendor-scripts/tiny_mce/jquery.tinymce.js');
    	wp_enqueue_script('plchf_msb_tooltip_js', 	PLUGINCHIEFMSB . 'js/vendor-scripts/tipsy.js');
    	wp_enqueue_script('plchf_msb_dropdowns_js', PLUGINCHIEFMSB . 'js/vendor-scripts/dropdowns.js');
    	wp_enqueue_script('plchf_msb_waypoints_js', PLUGINCHIEFMSB . 'js/vendor-scripts/jquery.waypoints.js');
    	wp_enqueue_script('plchf_msb_confirm_js', 	PLUGINCHIEFMSB . 'js/vendor-scripts/jquery.confirm.js');
    	wp_enqueue_script('plchf_msb_custom_js', 	PLUGINCHIEFMSB . 'js/scripts/custom.js');
    	
    }

/* ----------------------------------------------------------------------------
	Enqueue Styles & Scripts
---------------------------------------------------------------------------- */	
	
	function plchf_msb_enqueue_styles_and_scripts() {
		
		if (is_admin()) {

			$screen = get_current_screen();
			$screenid = $screen->id;
			
			// If pluginchiefmsb is in the Screen ID 
			// (So ultimately any sub-page of the main Plugin Chief Admin Page)
			if ( strpos($screenid, 'pluginchiefmsb') ) {
	        	
				plchf_msb_enqueue_plugin_scripts_and_styles();
	        
	        }
        
        }
        
    }

    add_action( 'admin_enqueue_scripts', 'plchf_msb_enqueue_styles_and_scripts' );
    
/* ----------------------------------------------------------------------------
	Setup Settings Pages Template Files
---------------------------------------------------------------------------- */
	
	// Get the Header for Admin Pages
	function get_pluginchiefmsb_header(){
		
		global $pluginchiefmsbdir; 
		
		// Pre-Header Hook
		pluginchiefmsb_admin_pre_header();
		
		// Header Hook
		pluginchiefmsb_admin_header();
	
		// Post Header Hook
		pluginchiefmsb_admin_post_header();
		
	}
	
	// Get the Footer for Admin Pages
	function get_pluginchiefmsb_footer(){
		
		// Pre Footer Hook
		pluginchiefmsb_admin_pre_footer();
	
		// Footer Hook
		pluginchiefmsb_admin_footer();
	
		// Post Footer Hook
		pluginchiefmsb_admin_post_footer();
		
	}

/* ----------------------------------------------------------------------------
	Check What PLUGINCHIEFMSB Page We're On
---------------------------------------------------------------------------- */

	function is_pluginchiefmsb_page(){
		
		$pluginchiefmsb_page 			= $_GET['page'];
		$pluginchiefmsb_page_firstfive 	= substr($pluginchiefmsb_page, 0, 5);
		
		// Check to see if we are on a pluginchiefmsb page
		if ($pluginchiefmsb_page_firstfive == 'pluginchiefmsb') {
			return true;
		} else {
			return false;
		}
		
	}

/* ----------------------------------------------------------------------------
	
	Get What PLUGINCHIEFMSB Page We're On, so we can do checks when necessary

	Usage: if (get_pluginchiefmsb_page()) {

---------------------------------------------------------------------------- */

	function get_pluginchiefmsb_page() {
		
		$pluginchiefmsb_page 			= $_GET['page'];
		$pluginchiefmsb_page_firstfive 	= substr($pluginchiefmsb_page, 0, 5);
		$pluginchiefmsb_page_stripped	= substr($pluginchiefmsb_page, 6);
		
		// Check to see if we are on a pluginchiefmsb page
		if ($pluginchiefmsb_page_firstfive == 'pluginchiefmsb') {

			// Return what 
			return $pluginchiefmsb_page_stripped;
			
		} else {
			
		}
		
	}
	
/* ----------------------------------------------------------------------------
	
	Add Page Element Section to the Page Element menu on the "Edit Mobile Page" page
	
	usage: 
	
	function add_new_element_section() {
	
		plchf_msb_add_page_element_section('Content');
		
	}
	
	add_action('plchf_msb_page_element_section','add_new_element_section');
	
---------------------------------------------------------------------------- */

	function plchf_msb_add_page_element_section($title, $align) {
		
		if ($align == 'right') {
			$align = ' class="floatr"';
		} else {
			$align = '';
		}
		
		echo '<li'.$align.'>';
			echo '<a href="#" id="'.strtolower(str_replace(" ", "-", $title)).'-elements">'.$title.'</a>';
			echo '<ul class="form-elements '.strtolower(str_replace(" ", "-", $title)).'-elements">';
				
				// Social Elements Hook
				do_action('plchf_msb_'.strtolower(str_replace(" ", "_", $title)).'_elements');
				
			echo '</ul>';
		echo '</li>';
		
	}

/* ----------------------------------------------------------------------------
	
	Add Page Element to the Page Element menu on the "Edit Mobile Page" page
	
	usage: 
	
	function add_new_element() {
	
		plchf_msb_add_page_element('Text Element');
		
	}
	
	add_action('','add_new_element');
	
---------------------------------------------------------------------------- */

	function plchf_msb_add_page_element($element_type){
		
		echo '<li>';
			echo '<a href="#" data-elementtype="'.strtolower(str_replace(" ", "-", $element_type)).'">';
				echo $element_type;
			echo '</a>';
		echo '<li>';
		
	}

/* ----------------------------------------------------------------------------
	Get the Page Title that we're editing
---------------------------------------------------------------------------- */
	
	function plchf_msb_get_page_title(){
		
		$page_id = $_GET['mobilesite_page_id'];
		
		$output .= get_the_title( $page_id );
		
		return apply_filters('plchf_msb_get_page_title', $output);
		
	}
	
/* ----------------------------------------------------------------------------
	Get the Site Title that we're editing
---------------------------------------------------------------------------- */
	
	function plchf_msb_get_site_title($id) {
		
		// Get the ID Passed to the Function or Get the Site ID if on Site Page
		if ($id) {
			$id = $id;
		} else {
			$id = $_GET['mobilesite_site_id'];
		}
		
		$post = get_post( $id );
		
		// Check to see if post has a parent or not. . .if so, the site is the post's parent, if not, this is the site
		if ( ($post->post_parent == 0) ) {
			$site_id = $post->ID;
		} else {
			$site_id = get_post($post->ID)->post_parent;
		}
		
		$output .= get_the_title( $site_id );
		
		return apply_filters('plchf_msb_get_site_title', $output);
		
	}

/* ----------------------------------------------------------------------------
	Get the Page ID that we're editing
---------------------------------------------------------------------------- */
		
	function plchf_msb_get_page_id(){
		
		$page_id = $_GET['mobilesite_page_id'];
		
		return apply_filters('plchf_msb_get_page_id_filter', $page_id);
		
	}
	
/* ----------------------------------------------------------------------------
	Set the Mobile Phone Preview Image
---------------------------------------------------------------------------- */
	
	function plchf_msb_phone_preview_image(){
		
		global $pluginchiefmsbdir;
		
		return apply_filters('plchf_phone_preview_image',$pluginchiefmsbdir . 'images/iphone.png');	
		
	}
	
/* ----------------------------------------------------------------------------
	Set the Mobile Phone Preview Content
---------------------------------------------------------------------------- */
	
	function plchf_msb_phone_preview_site(){
		
		global $pluginchiefmsbdir;
		
		if (is_admin()) { 
			
			$screen = get_current_screen();
		
			// Get Screen ID on Edit Page, page
			if ($screen->id == 'mobile-site-builder_page_pluginchiefmsb/edit-page') {
			
				// Get the Page We're Editing
				$id = $_GET['mobilesite_page_id'];
		  
			// Get the Site ID on the Edit Site Page 
			} elseif ($screen->id == 'mobile-site-builder_page_pluginchiefmsb/edit-site') {
	    	
				// Get the Home Page
				$id = $_GET['mobilesite_site_id'];
	    	
				// Get Site Home Page
				$posts = get_posts('post_parent='.$id.'&posts_per_page=1');
	    	
				foreach ($posts as $post) {
		    		$id = $post->ID;
		    	}
	    	
		    	$id = $id;
	    	 	
		    }
		 
		// If Not Admin   
		} else {
			
			//Globals
			global $post, $wp_query, $plchf_msb_options;
		
			// Get the Post ID
			$postid = $wp_query->post->ID;
			
			// Get Front End Page IDs
			$edit_page_id 	= $plchf_msb_options['_edit_page_page_'];
			$edit_site_id 	= $plchf_msb_options['_edit_site_page_'];
			$my_sites_id 	= $plchf_msb_options['_my_sites_page_'];
			
			// Check if Page is one of the Pages selected in the Plugin Settings Panel
			if ( ($postid == $edit_page_id) ) {

				// Get the Page We're Editing
				$id = $_GET['mobilesite_page_id'];
							
			} else if ( ($postid == $edit_site_id) || ($postid == $my_sites_id) ) {
				
				$id = $_GET['mobilesite_site_id'];
	    	
				// Get Site Home Page
				$posts = get_posts('post_parent='.$id.'&posts_per_page=1');
	    	
				foreach ($posts as $post) {
		    		$id = $post->ID;
		    	}
	    	
		    	$id = $id;
				
			}
			
			$id = $id;
			
		}
	    
	    $url = get_permalink($id);
		
		// Iframe Preview
		$output .= '<iframe id="preview-frame" src="'.$url.'" data-siteid="'.$id.'" data-id="'.$postid.'" width="230" height="343"></iframe>';
		
		// Loading Gif Div
		$output .= '<div class="mobile-preview-loader"></div>';
		
		return apply_filters('plchf_msb_phone_preview_site_filter',$output);	
		
	}

/* ----------------------------------------------------------------------------
	Mobile Page Generator
---------------------------------------------------------------------------- */
	
	function plchf_msb_page_generator(){
		
		// Run action before Page Generator Form
		do_action('plchf_msb_before_page_generator');
		
		$page_id = plchf_msb_get_page_id();

		// Page Generator Form
		echo '<form id="page-generator" class="page-generator connected-sortable" enctype="multipart/form-data" action="" method="post" data-postid="'.$page_id.'">';
						
			$elements = get_post_meta($page_id, '_plchf_msb_page_elements', true);
			
			if($elements) { 
							
				// Loop Through the Post Meta
				foreach($elements as $element) {
		    		
		    		foreach ($element as $k => $values) {
			    		
			    		// $k is the element type, and element count, we split that into 2 parts
			    		// so part [0] is the Element Type and part [1] is the element count
			    		// We then pass that to the element type action
			    		$element_type_and_count = explode("_", $k);
			    		$element_type = str_ireplace("-", "_", $element_type_and_count[0]);
			    		
			    		// We run the action for each element
			    		do_action('plchf_msb_page_element_settings_'.$element_type.'', $element_type_and_count[1], $values);
			    		
		    		}
		    		
	    		
	    		}
				
			} else {
				
				// Display Message When No Page Elements Exist
				echo '<div class="element-placeholder">';
					
					echo apply_filters('plchf_msb_no_page_elements_message','Choose elements above to add to the page.');
				echo '</div>';
			
			}
			
			echo '<button class="ajaxsave button-primary">Save</button>';
			
			wp_nonce_field('page_elements_nonce', 'page_elements_nonce_field');

		// End Form
		echo '</form>';
		
		// Run Action After Page Generator Form
		do_action('plchf_msb_after_page_generator');
		
	}

/* ----------------------------------------------------------------------------
	Site Settings Panels
---------------------------------------------------------------------------- */	
	
	function plchf_msb_site_settings() {
		
		do_action('plchf_msb_before_site_settings');
		
		// Page Generator Form
		echo '<form id="site-settings" class="site-settings" enctype="multipart/form-data" action="" method="post" data-postid="'.plchf_msb_get_page_id().'">';
		
			$theme_slug = plchf_msb_get_theme_slug();
			
			// Page Generator Content
			do_action('plchf_msb_site_settings_content_'.$theme_slug.'');
			
		// End Form
		echo '</form>';
		
		do_action('plchf_msb_after_site_settings');	
		
	}

/* ----------------------------------------------------------------------------
	Site Settings Title
---------------------------------------------------------------------------- */	

	function plchf_msb_add_title_above_site_settngs_panels(){
		
		$output .= '<h3>Site Settings</h3>';
		
		echo apply_filters('plchf_msb_site_settings_panel_title', $output);
		
	}
	
	add_action('plchf_msb_before_site_settings','plchf_msb_add_title_above_site_settngs_panels');
	
/* ----------------------------------------------------------------------------
	Mobile Page Content
---------------------------------------------------------------------------- */	
     
    function plchf_msb_page_content() {
	  	
	  	global $post, $wp_query;
	  	
	  	// Get Page ID
	  	$page_id = $wp_query->post->ID;
	  	
	  	// Get Page Elements
	  	$elements = get_post_meta($page_id, '_plchf_msb_page_elements', true);
			
		if($elements) { 
						
			// Loop Through the Post Meta
			foreach($elements as $element) {
	    		
	    		foreach ($element as $k => $values) {
		    		
		    		// $k is the element type, and element count, we split that into 2 parts
		    		// so part [0] is the Element Type and part [1] is the element count
		    		// We then pass that to the element type action
		    		$element_type_and_count = explode("_", $k);
		    		$element_type = str_ireplace("-", "_", $element_type_and_count[0]);
		    		
		    		// We run the action for each element
		    		do_action('plchf_msb_page_element_output_'.$element_type.'', $values);
		    		
	    		}
	    		
    		
    		}
			
		} else {
			
			// Display Message When No Page Elements Exist
			echo '<div class="element-placeholder">';
				echo apply_filters('plchf_msb_no_page_elements_message','Choose elements above to add to the page.');
			echo '</div>';
		
		}
	    
    }
    	
//------------------------------------------------------------------------//
// Save Mobile Page Elements
//------------------------------------------------------------------------//

	function plchf_msb_save_the_page_elements_ajax() {
	
		global $post, $wp_query, $vzclientcenter_pluginroot, $page_elements;
			
		$id	= $_POST['post_id'];
		
		if ($id != '') {
			$id = $id;
		} else {
			$id = $post_id;
		}
		
		if (get_post_meta(''.$id.'','_plchf_msb_page_elements', true)) {
			$page_elements = get_post_meta(''.$id.'','_plchf_msb_page_elements', true);
		} else {
			$page_elements = false;	
		}
		
		if(isset($_POST['page_elements_nonce_field']) && wp_verify_nonce($_POST['page_elements_nonce_field'], 'page_elements_nonce')) {
		
			$page_elements = array();
										
				foreach($_POST['element'] as $k => $v) {
                                       
                	$page_elements[] = array(
                		$k => $v,
                	);
                               
                }
			
			$updated_meta = update_post_meta(''.$id.'', '_plchf_msb_page_elements', $page_elements);
			
			// Print the Data on return to AJAX
			// print_r($page_elements);
			
			die();
		
		}
	
	}
	
	add_action('wp_ajax_plchf_msb_save_the_page_elements_ajax','plchf_msb_save_the_page_elements_ajax');

/* ----------------------------------------------------------------------------
	Add Element to Page
---------------------------------------------------------------------------- */	

	function plchf_msb_add_element(){
		
		$pageid			= $_POST['pageid'];
		$element_type 	= $_POST['elementType'];
		$element_type 	= strtolower(str_replace("-", "_", $element_type));
		
		// Get Current Page Element Count
		$meta 	= get_post_custom($pageid);
		$count	= $meta['_plchf_msb_page_element_count'][0]; 
		
		// Increase Page Element Count By 1
		$count 	= ($count+1);
		
		// Update Page Element Count
		update_post_meta($pageid, '_plchf_msb_page_element_count', $count);
		
		do_action('plchf_msb_page_element_settings_'.$element_type.'', $count, $values);
		
		die();
		
	}
	
	add_action( 'wp_ajax_plchf_msb_add_element','plchf_msb_add_element');

/* ----------------------------------------------------------------------------
	Create some JS Variables
---------------------------------------------------------------------------- */	

	function plchf_msb_jquery_theme_directory_variable() {
		
		global $stripe_secret, $stripe_publishable;
		
		$plugin_dir 	= PLUGINCHIEFMSB;
		$permalink		= get_permalink();	
		$siteRoot		= get_bloginfo('url');
		$ajaxurl		= admin_url('admin-ajax.php');
		
		echo '
		<script type="text/javascript" src="https://js.stripe.com/v1/?ver=1.0"></script>
		<script type="text/javascript">
			var pluginDir = "'.$plugin_dir.'";
			var siteRoot = "'.$siteRoot.'";
			var ajaxurl = "'.$ajaxurl.'";
			Stripe.setPublishableKey("'.$stripe_publishable.'");
		</script>
		';
		
	}
	
	add_action('wp_footer','plchf_msb_jquery_theme_directory_variable', 999);
	add_action('admin_head','plchf_msb_jquery_theme_directory_variable');

/* ----------------------------------------------------------------------------
	Create Settings Section for Page Elements
---------------------------------------------------------------------------- */	
	    
    function plchf_msb_page_element_settings_section($element_type, $fields, $count, $values){
	    
	    $element_type_formatted = strtolower(str_replace(" ", "-", $element_type));
	    
	    echo  '<div class="page-section sortable">';
	    	
	    	echo '<h2>'.$element_type.'</h2>';
	    	
	    	echo  '<div class="controls-wrapper">';
	    		echo  '<div class="controls">';
	    			echo  '<div>';
	    				echo  '<div>';
	    					echo  '<div class="element-control element-move"></div>';
	    					echo  '<div class="element-control element-remove"></div>';
	    				echo  '</div>';
	    			echo  '</div>';
	    		echo  '</div>';
	  		echo  '</div>';
	  		
	  		echo '<div class="nested-sortable connected-sortable">';
	  			
	  		echo '</div>';
		    	
		echo  '</div>';
	    
    }
    
/* ----------------------------------------------------------------------------
	Create Settings Panel for Page Element
---------------------------------------------------------------------------- */	
	    
    function plchf_msb_page_element_settings_panel($element_type, $fields, $count, $values){
	    
	    $element_type_formatted = strtolower(str_replace(" ", "-", $element_type));
	    
	    echo  '<div class="page-element '.$element_type_formatted.' sortable">';
	    	
	    	// Settings Bar
	    	echo  '<div class="settings-bar">';
	    		echo  '<div class="inner-settings-bar">';
	    			echo  '<div class="one_third">';
	    				echo  '<div class="element-info">';
	    					echo  $element_type;
	    				echo  '</div>';
	    			echo  '</div>';
	    			echo  '<div class="two_third column-last">';
		    			echo  '<div class="controls">';
		    				echo  '<div class="element-control element-move"></div>';
		    				echo  '<div class="element-control element-open"></div>';
		    				echo  '<div class="element-control element-remove"></div>';
		    			echo  '</div>';
		    		echo  '</div>';
	    		echo  '</div>';
	    	echo  '</div>';
	    	
	    	// Settings Content
		    echo  '<div class="content">';
		    		
		    	echo  '<h2>'.$element_type.'</h2>';
		    	
		    		// Loop through the fields that were passed when setting up the page element
		    		foreach ($fields as $fields) {
		    		
		    			// Get the Field Type
		    			$type = $fields['field']['type'];
			    		
			    		$element_type = $element_type_formatted;
			    		
			    		// Do the Action for the Associated Field Type
			    		do_action('plchf_msb_page_element_settings_field_'.$type.'', $fields, $element_type, $count, $values);
			    		
			    		echo '<br/>';
		    		
		    		}
		    		
		    		echo '<button class="ajaxsave button-primary">Save</button>';
		    		
		    	echo  '</div>';
		    	
		    echo  '</div>';
	    
    }

/* ----------------------------------------------------------------------------
	Create Settings Panel for Site Settings
---------------------------------------------------------------------------- */	
	    
    function plchf_site_settings_settings_panel($panels){
    
    	foreach ($panels as $panel) {
    	
    		$panel_name = $panel['panel_name'];
    		
		    $panel_name_formatted = strtolower(str_replace(" ", "-", $panel_name));
		    
		    echo  '<div class="page-element '.$panel_name_formatted.' draggable">';
		    	
		    	// Settings Bar
		    	echo  '<div class="settings-bar">';
		    		echo  '<div class="inner-settings-bar">';
		    			echo  '<div class="one_third">';
		    				echo  '<div class="element-info">';
		    					echo  $panel_name;
		    				echo  '</div>';
		    			echo  '</div>';
		    			echo  '<div class="two_third column-last">';
			    			echo  '<div class="controls">';
			    				echo  '<div class="element-control element-open"></div>';
			    			echo  '</div>';
			    		echo  '</div>';
		    		echo  '</div>';
		    	echo  '</div>';
		    	
		    	// Settings Content
			    echo  '<div class="content">';
			    		
			    	echo  '<h2>'.$panel_name.'</h2>';
			    		
		    		// Loop through the fields that were passed when setting up the page element
		    		foreach ($panel['fields'] as $fields) {
		    		
		    			// Get the Field Type
		    			$type = $fields['type'];
			    		
			    		// Do the Action for the Associated Field Type
			    		do_action('plchf_msb_site_settings_field_'.$type.'', $fields, $type, $values);
			    		
			    		echo '<br/>';
		    		
		    		}
			    		
			    echo  '</div>';
			   	
			echo  '</div>';
	
	    } // End Panels loop
   
    }

/* ----------------------------------------------------------------------------
	Get Site ID
---------------------------------------------------------------------------- */	
   
    function plchf_msb_get_site_id() {
	    
	    if (is_admin()) {

		    $screen = get_current_screen();
			
			// Get Screen ID on Edit Page, page
			if ($screen->id == 'mobile-site-builder_page_pluginchiefmsb/edit-page') {
				
				// Get the Page We're Editing
			    $page_id = $_GET['mobilesite_page_id'];
			    
			    // Get the Page Parent, which is the Site
			    $site_id = get_post($page_id)->post_parent;
			  
			// Get the Site ID on the Edit Site Page 
		    } elseif ($screen->id == 'mobile-site-builder_page_pluginchiefmsb/edit-site') {
			 
				$site_id = $_GET['mobilesite_site_id'];	 
				    
		    } 
		
		// If Front End
		} else {
			
			//Globals
			global $post, $wp_query, $plchf_msb_options;
		
			// Get the Post ID
			$postid = $wp_query->post->ID;
			
			// Get Front End Page IDs
			$edit_page_id 	= $plchf_msb_options['_edit_page_page_'];
			$edit_site_id 	= $plchf_msb_options['_edit_site_page_'];
			$my_sites_id 	= $plchf_msb_options['_my_sites_page_'];
		
			// Check if Page is one of the Pages selected in the Plugin Settings Panel
			if ( ($postid == $edit_page_id) ) {

				// Get the Page We're Editing
				$page_id = $_GET['mobilesite_page_id'];
		    
				// Get the Page Parent, which is the Site
				$site_id = get_post($page_id)->post_parent;
							
			} else if ( ($postid == $edit_site_id) || ($postid == $my_sites_id) ) {
				
				$site_id = $_GET['mobilesite_site_id'];
				
			}
			
		}
	    
	    return apply_filters('plchf_msb_get_site_id',$site_id);
	    
    }

/* ----------------------------------------------------------------------------
	QR Code Site Preview
---------------------------------------------------------------------------- */	
   
    function plchf_msb_qrcode_preview() {
	    
	    // Get Site ID
	    $site_id = plchf_msb_get_site_id();
	    
	    // Get Permalink for the Site ID
	    $permalink = get_permalink($site_id);
	    
	    $output .= '
	    <div style="display:block; margin:0px auto; width:80%;">
	    	<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$permalink.'&choe=UTF-8&chld=|0" width="100%" height="auto">
	    </div>
	    ';
	    
	    do_action('plchf_msb_above_qrcode_preview');
	    
	    echo apply_filters('plchf_msb_qrcode_preview', $output);
	    
	    do_action('plchf_msb_below_qrcode_preview');
	    
    }
  
/*-----------------------------------------------------------------------------------*/
/* Creates Google Shortlink for Pages and Posts | Usage: wp_get_shortlink();
/*-----------------------------------------------------------------------------------*/

function plchf_msb_googl_shortlink($url) {
	
	$http = new WP_Http();
	
	$headers = array('Content-Type' => 'application/json');
	
	$result = $http->request('https://www.googleapis.com/urlshortener/v1/url', array( 
		'method' => 'POST', 
		'body' => '{
			"longUrl": "' . $url . '"
		}', 
		'headers' => $headers
		)
	);
	
	$result 	= json_decode($result['body']);
	$shortlink 	= $result->id;

	if ($shortlink) {
		return $shortlink;
	} else {
		return $shortlink;
	}

}
  
/* ----------------------------------------------------------------------------
	Mobile Site Shortlink
---------------------------------------------------------------------------- */	
      
    function plchf_msb_site_shortlink() {
	    
	    // Get Site ID
	    $site_id = plchf_msb_get_site_id();
	    
	    // Get Permalink for the Site ID
	    $permalink = get_permalink($site_id);
	    
	    do_action('plchf_msb_above_googl_shortlink');
	    
	    $output .= '<hr>';
	    
	    $output .= '<h2>'.apply_filters('plchf_msb_shortlink_title', 'Site Shortlink:').'</h2>';
	    
	    $output .= '<a href="'.plchf_msb_googl_shortlink($permalink).'">'.plchf_msb_googl_shortlink($permalink).'</a>';
	    
	    echo apply_filters('plchf_msb_googl_site_shortlink', $output);
	    
	    do_action('plchf_msb_below_googl_shortlink');
	    
    }
    
/* ----------------------------------------------------------------------------
	Mobile Site Template Redirect
---------------------------------------------------------------------------- */

	function plchf_msb_template_redirect(){
		
		global $post;
		
		// Site ID
		$parent_id 	= get_post($post->ID)->post_parent;
		
		// Site Settings
		$meta 		= get_post_custom($parent_id);
		
		// Site Theme Setting
		$site_theme = $meta['_plchf_msb_site_theme'][0];
		
		// Formatted Site Theme
		$site_theme = strtolower(str_ireplace('-', '_' ,$site_theme));
		
		// Set Theme, or Set to Default Theme
		if ($site_theme == '') {
			$site_theme = 'default_theme';
		} else {
			$site_theme = $site_theme;
		}
		
		// Only Run id Post Type is Plugin Chief MSB Sites
	    if ($post->post_type == 'pluginchiefmsb-sites') {
	    	
	    	$single_template = apply_filters('plchf_msb_theme_root_'.$site_theme.'', 'goo').apply_filters('plchf_msb_theme_page_'.$site_theme.'','goo');
	    
	    }
	     
	    return $single_template;	
		
	}

	add_filter( "single_template", "plchf_msb_template_redirect", 1);

/* ----------------------------------------------------------------------------
	Correct image path issue in thickbox
---------------------------------------------------------------------------- */
 
	function plchf_msb_load_tb_fix() {
		
		echo "\n" . '<script type="text/javascript">tb_pathToImage = "' . get_option('siteurl') . '/wp-includes/js/thickbox/loadingAnimation.gif";tb_closeImage = "' . get_option('siteurl') . '/wp-includes/js/thickbox/tb-close.png";</script>'. "\n";
		
	}

	add_action('wp_footer', 'plchf_msb_load_tb_fix');

/* ----------------------------------------------------------------------------
	Create Site Function
---------------------------------------------------------------------------- */

	function plchf_msb_create_new_site() {
		
		global $current_user;
		get_currentuserinfo();
		
		// Set Up Variables
		$userid = $current_user->ID;
		
		// Check to see if Create Site Nonce is verified
		if(isset($_POST['plchf_msb_create_new_site_field']) && wp_verify_nonce($_POST['plchf_msb_create_new_site_field'], 'plchf_msb_create_new_site')) {
			
			// Get Post Data
			$name	= $_POST['plchf_msb_create_new_site_site_name'];
			$theme 	= $_POST['plchf_msb_create_new_site_theme'];
			
			// Allows us to hook in and get more post data, if needed
			do_action('plchf_msb_create_new_site_post_data');
			
			// Create the New Site
			$post = array(
				'post_author' 	=> $userid,
				'post_content' 	=> 'This is the default content for the site',
				'post_name' 	=> $name,
				'post_status' 	=> 'publish',
				'post_title' 	=> $name,
				'post_type' 	=> 'pluginchiefmsb-sites',
			); 
			
			// Insert New Site
			$new_site = wp_insert_post($post);
			
			// Set Site Theme
			update_post_meta($new_site, '_plchf_msb_site_theme', $theme);
			
			// After Create Site
			do_action('plchf_msb_after_create_new_site', $new_site);
			
			// Redirect to Edit Site Page
			wp_redirect(apply_filters('plchf_msb_redirect_after_create_site','admin.php?page=pluginchiefmsb/edit-site&site_id='.$new_site.''));
			
		}
		
	}
	
	add_action('init','plchf_msb_create_new_site');

/* ----------------------------------------------------------------------------
	Create Default Home Page Upon Site Creation 
---------------------------------------------------------------------------- */
	
	function plchf_msb_default_theme_default_pages($new_site){
	
		global $current_user;
		get_currentuserinfo();
		
		// Get Current User ID
		$userid = $current_user->ID;
		
		$home = array(
			'comment_status'=> 'closed',      			// 'closed' means no comments.
			'ping_status' 	=> 'closed',      			// 'closed' means pingbacks or trackbacks turned off
			'post_author' 	=> $userid,
			'post_name' 	=> ''.$postid.'-home', 		// The name (slug) for your post
			'post_status' 	=> 'publish',     			// Set the status of the new post. 
			'post_title' 	=> 'Home', 	      			// The title of your post.
			'post_parent'   => $new_site,				// Post Parent
			'post_type' 	=> 'pluginchiefmsb-sites'	// Post Type
		);
		
		// Insert Default Page for new Sites
		apply_filters('plchf_msb_insert_default_home_page', wp_insert_post( $home ));
		
	}
	
	add_action('plchf_msb_after_create_new_site','plchf_msb_default_theme_default_pages');
	
	
	
	function plchf_flush_permalinks(){	
			
		global $wp_rewrite;
		
		$wp_rewrite->flush_rules();
	
	}
	add_action('admin_init','plchf_flush_permalinks');
