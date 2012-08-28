<?php

/* ---------------------------------------------------------------------------- */
/* Add the Menu Page
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_documentation_menu_link_menu_item() {
		
		add_submenu_page( 
			'pluginchiefmsb', 
			'Documentation', 
			'Documentation', 
			'add_users', 
			'pluginchiefmsb/documentation', 
			'pluginchiefmsb_documentation_menu_link' 
		);
	
	}
	
	add_action('admin_menu', 'pluginchiefmsb_documentation_menu_link_menu_item');
	
/* ---------------------------------------------------------------------------- */
/* Create the Menu Page Content
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_documentation_menu_link() {
		
		$doclink = 'http://pluginchief.com/docs/documentation';
		$documentation_link = apply_filters('',$doclink);
		wp_redirect( $documentation_link ); 
		exit;
	
	}