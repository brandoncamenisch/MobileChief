<?php
	/**
	 * plchf_msb_front_end_enqueue_styles_and_scripts function.
	 * Enqueue Styles & Scripts to Front End Pages
	 * @access public
	 * @return void
	 */
  function plchf_msb_front_end_enqueue_styles_and_scripts() {
		global $post, $wp_query, $plchf_msb_options;

		if ($post) {
			#Get the Post ID
			$postid =& $wp_query->post->ID;
		}
		#Get Front End Page IDs
		$edit_page_id =& $plchf_msb_options['_edit_page_page_'];
		$edit_site_id =& $plchf_msb_options['_edit_site_page_'];
		$my_sites_id 	=& $plchf_msb_options['_my_sites_page_'];
		$new_site_id 	=& $plchf_msb_options['_new_sites_page_'];

		#Don't Run on Admin Pages
		if (!is_admin()) {
			#Check if Page is one of the Pages selected in the Plugin Settings Panel
			if ( is_page($edit_page_id) || is_page($edit_site_id) || is_page($my_sites_id) || is_page($new_site_id) ) {
	  		#Calls the function that enqueues the default style and scripts
	  		plchf_msb_enqueue_plugin_scripts_and_styles();
	  		#Enqueue Additional Scripts
	  		wp_enqueue_script('plchf_msb_front_end_js', PLUGINCHIEFMSB . 'js/scripts/front-end.js');
      }
    }
  } add_action( 'wp_enqueue_scripts', 'plchf_msb_front_end_enqueue_styles_and_scripts' );
    add_action( 'admin_enqueue_scripts', 'plchf_msb_front_end_enqueue_styles_and_scripts' );

	/**
	 * plchf_msb_front_end_record_user_last_login function.
	 * Record Users Login time
	 * @access public
	 * @param mixed $login
	 * @return void
	 */
	function plchf_msb_front_end_record_user_last_login($login) {
		global $user_ID;
		$user =& get_userdatabylogin($login);
		update_usermeta( $user->ID, '_plchf_msb_last_login_', current_time('timestamp') );
	} add_action('wp_login','plchf_msb_front_end_record_user_last_login');

	/**
	 * plchf_msb_front_end_switch_create_new_site_link function.
	 * Filters the Link for the Create New Site Page
	 * @access public
	 * @param mixed $link
	 * @return void
	 */
	function plchf_msb_front_end_switch_create_new_site_link($link) {
		global $post, $plchf_msb_options;
		#Get Edit Page Option Value
		$new_site_id =& $plchf_msb_options['_new_sites_page_'];
		if (!is_admin()) {
			$link =& get_permalink($new_site_id);
		}
		return $link;
	} add_filter('plchf_msb_new_sites_page', 'plchf_msb_front_end_switch_create_new_site_link');

	/**
	 * plchf_msb_front_end_switch_edit_site_link function.
	 * Filters the Link for the Edit Site Page
	 * @access public
	 * @return void
	 */
	function plchf_msb_front_end_switch_edit_site_link() {
		global $post, $plchf_msb_options;
		$link =& $link;
		#Get Edit Page Option Value
		$edit_site_id =& $plchf_msb_options['_edit_site_page_'];
		if (!is_admin()) {
			$link =& get_permalink($edit_site_id);
		}
		return $link;
	} add_filter('plchf_msb_edit_sites_page', 'plchf_msb_front_end_switch_edit_site_link', 1);

	/**
	 * plchf_msb_front_end_switch_edit_page_link function.
	 * Filters the Link for the Edit Page Link
	 * @access public
	 * @param mixed $link
	 * @return void
	 */
	function plchf_msb_front_end_switch_edit_page_link($link) {
		global $post, $plchf_msb_options;

		#Get Edit Page Option Value
		$edit_page_id =& $plchf_msb_options['_edit_page_page_'];
		$output =& $output;
		if (!is_admin()) {
			$output = get_permalink($edit_page_id);
		} else {
			$output .= $link;
		}
		return $output;
	} add_filter('plchf_msb_edit_page_page', 'plchf_msb_front_end_switch_edit_page_link');

	/**
	 * plchf_msb_front_end_switch_my_site_redirect_url function.
	 * Filters the Redirect URL for the Edit Page & Edit Sites Pages
	 * @access public
	 * @return void
	 */
	function plchf_msb_front_end_switch_my_site_redirect_url() {
		global $post, $plchf_msb_options;

		#Get Edit Page Option Value
		$my_sites_id =& $plchf_msb_options['_my_sites_page_'];
		if (!is_admin()) {
			return get_permalink($my_sites_id);
		}
	} add_filter('plchf_msb_mobile_site_page_redirect','plchf_msb_front_end_switch_my_site_redirect_url');

	/**
	 * my_files_only function.
	 * Restrict Media Library to just the files uploaded by that user
	 * @access public
	 * @param mixed $wp_query
	 * @return void
	 */
	function my_files_only( $wp_query ) {
	    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/media-upload.php' ) !== false ) {
		    #For All Users Below Level 10 (Admin)
		    if ( !current_user_can( 'level_10' ) ) {
			    global $current_user;
			    $wp_query->set( 'author', $current_user->id );
			  }
	    }
	} add_filter('parse_query', 'my_files_only' );
	/**
	 * plchf_msb_front_end_remove_mime_type_links function.
	 * Filter out the Images link in the uploader that shows total library quantity
	 * @access public
	 * @return void
	 */
	function plchf_msb_front_end_remove_mime_type_links() {
		#Don't Run on Admin Pages
		if (!is_admin()) {
			return array('','');
		}
	} add_filter('media_upload_mime_type_links','plchf_msb_front_end_remove_mime_type_links');

	/**
	 * plchf_msb_front_end_redirect_after_create_site function.
	 * Redirect after Create Site Filter
	 * @access public
	 * @param mixed $new_site
	 * @return void
	 */
	function plchf_msb_front_end_redirect_after_create_site($new_site) {
		global $post, $wp_query, $plchf_msb_options;

		$edit_site_id =& $plchf_msb_options['_edit_site_page_'];
		$new_site =& $new_site;
		if (!is_admin()) {
			return get_permalink($edit_site_id) . '?mobilesite_site_id='.$new_site;
		} else {
			return $new_site;
		}

	}	add_filter('plchf_msb_redirect_after_create_site','plchf_msb_front_end_redirect_after_create_site', 1000, 1);

	/**
	 * plchf_msb_front_end_get_page_id function.
	 * Get Page ID on the Front End
	 * @access public
	 * @param mixed $page
	 * @return void
	 */
	function plchf_msb_front_end_get_page_id($page) {
		global $post, $wp_query, $plchf_msb_options;
		if ($post) {
			#Get the Post ID
			$postid =& $wp_query->post->ID;
		}
		#Get Front End Page IDs
		$edit_page_id =& $plchf_msb_options['_edit_page_page_'];
		$edit_site_id =& $plchf_msb_options['_edit_site_page_'];
		$my_sites_id 	=& $plchf_msb_options['_my_sites_page_'];
		$new_site_id 	=& $plchf_msb_options['_new_sites_page_'];

		if (!is_admin()) {
			if ( ($edit_page_id == $postid) || ($edit_site_id == $postid) || ($my_sites_id == $postid) || ($new_site_id == $postid) ) {
				$output =& $_GET['mobilesite_page_id'];
			} else {
				$output =& $page;
			}
		} else {
			$output =& $page;
		}
		$output =& $output;
		return $output;

	} add_filter('plchf_msb_get_page_id_filter','plchf_msb_front_end_get_page_id', 10);

	/**
	 * plchf_msb_front_end_my_sites_link function.
	 * My Sites Link Filter
	 * @access public
	 * @param mixed $link
	 * @return void
	 */
	function plchf_msb_front_end_my_sites_link($link){
		global $post, $wp_query, $plchf_msb_options;
		$my_sites_id =& $plchf_msb_options['_my_sites_page_'];
		if (!is_admin()) {
			$output =& get_permalink($my_sites_id);
		} else {
			$output =& $link;
		}
		return apply_filters('plchf_msb_front_end_my_sites_link_filter', $output);
	}	add_filter('plchf_msb_my_sites_link','plchf_msb_front_end_my_sites_link', 10, 1);

	/**
	 * plchf_msb_front_end_custom_css function.
	 * Output Custom Styles in the Header
	 * @access public
	 * @return void
	 */
	function plchf_msb_front_end_custom_css(){
		global $post, $wp_query, $plchf_msb_options;
		if ($post) {
			#Get the Post ID
			$postid =& $wp_query->post->ID;
		}
		#Get Front End Page IDs
		$edit_page_id =& $plchf_msb_options['_edit_page_page_'];
		$edit_site_id =& $plchf_msb_options['_edit_site_page_'];
		$my_sites_id 	=& $plchf_msb_options['_my_sites_page_'];
		$new_site_id 	=& $plchf_msb_options['_new_sites_page_'];
		$custom_css		=& $plchf_msb_options['_custom_css_'];

		#Don't Run On Admin
		if (!is_admin()) {
			#Run on just the three Mobile Site Builder Pages
			if ( ($edit_page_id == $postid) || ($edit_site_id == $postid) || ($my_sites_id == $postid) || ($new_site_id == $postid) ) {

				#Run if CSS exists
				if ($custom_css) {
					$output = '<style type="text/css">';
						$output .= $custom_css;
					$output .= '</style>';
					echo apply_filters('plchf_msb_front_end_custom_css_filter', $output);
				}
			}
		}
	} add_action('wp_head','plchf_msb_front_end_custom_css');
		add_action('wp_head', 'plchf_msb_plupload_admin_head'); #Adds Plupload scripts too front end

	 /**
	 * plchf_msb_front_end_add_on_filter_sites_page_args function.
	 * Only show sites that belong to the logged in user
	 * @access public
	 * @param mixed $pluginchiefmsb_args
	 * @return void
	 */
	function plchf_msb_front_end_add_on_filter_sites_page_args($pluginchiefmsb_args){
		#Get Current User ID
		$userid =& get_current_user_id();
		#If Front End
		if (!is_admin()) {
			$pluginchiefmsb_args = array(
				'post_type' 	=> 'pluginchiefmsb-sites',
				'post_parent'	=> 0,
				'posts_per_page'=> -1,
				'author'		=> $userid
			);
		}
		return $pluginchiefmsb_args;
	}	add_action('plchf_msb_sites_page_args', 'plchf_msb_front_end_add_on_filter_sites_page_args');