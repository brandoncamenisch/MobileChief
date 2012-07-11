<?php

/* ---------------------------------------------------------------------------- */
/* Setup Settings Pages Template Files
/* ---------------------------------------------------------------------------- */
	
	// Get the Header for Admin Pages
	function get_pluginchiefmsb_header(){
		
		global $pluginchiefmsbdir; 
		
		?>
		
		<link rel="stylesheet" href="<?php echo $pluginchiefmsbdir; ?>css/style.css" type="text/css" media="all">
		<script type="text/javascript" src="<?php echo $pluginchiefmsbdir; ?>js/custom.js"></script>

		<?php 
		
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

/* ---------------------------------------------------------------------------- */
/* Check What PLUGINCHIEFMSB Page We're On
/* ---------------------------------------------------------------------------- */

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

/* ---------------------------------------------------------------------------- */
/* Get What PLUGINCHIEFMSB Page We're On, so we can do checks when necessary
/*
/* Usage: if (get_pluginchiefmsb_page()) {
/*
/* ---------------------------------------------------------------------------- */

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
