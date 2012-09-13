<?php

/*-------------------------------------------------------------------------

	CREATE NEW SITE PAGES WITH AJAX

-------------------------------------------------------------------------*/

	function plchf_msb_create_new_page_with_ajax() {
		
		// Verify Nonce Before Processing	
		if(isset($_POST['plchf_msb_create_page_field']) && wp_verify_nonce($_POST['plchf_msb_create_page_field'], 'plchf_msb_create_page_field')) {	
			
			// Get the Post Data
			$title 		= $_POST['_new_page_title'];
			$site_id	= $_POST['site_id'];
			
			// Create Page, with Site as Parent
			$my_post = array(
			 'post_title' 	=> $title,
			 'post_status'	=> 'publish',
			 'post_type' 	=> 'pluginchiefmsb-sites',
			 'post_parent' 	=> $site_id,
			 'post_name' 	=> ''.$site_id.'-'.$title.''
			);
			
			// Insert the post into the database
			$postid = wp_insert_post( $my_post );
			
			$posttitle = get_the_title($postid);
		
			$output = '<li id="' . $postid . '" data-id="' . $postid . '" class="list_item menuitem ui-draggable">';
				$output .= $posttitle;
				$output .= '<div class="menuitem-options">';
					$output .='<div class="menuitem-move">Move</div>';
					$output .='<a href="'.$root.'/edit-mobile-page/?mobile_page_id='. $postid .'" class="menuitem-edit">Edit</a>';
					$output .='<div class="menuitem-close">Close</div>';
				$output .= '</div><br/>';
			$output .= '</li>';
			
			echo $output;
			
			die();
			
		}
	}
	
	add_action('wp_ajax_plchf_msb_create_new_page_with_ajax','plchf_msb_create_new_page_with_ajax');

/*-------------------------------------------------------------------------
	
	DELETE PAGES WITH AJAX

-------------------------------------------------------------------------*/

	function plchf_msb_delete_page_with_ajax(){
	
		$postid = $_POST['page_id'];
		
		wp_delete_post( $postid, true );
		
		echo $post_id;
	
	}
	
	add_action('wp_ajax_plchf_msb_delete_page_with_ajax', 'plchf_msb_delete_page_with_ajax');

/*-------------------------------------------------------------------------
	
	SAVE MENU / PAGES ORDER

-------------------------------------------------------------------------*/

	function plchf_msb_save_site_pages_order() {
		
		// Get Post ID to Update
		$post_id = $_POST['post_id'];
		
		$plchf_msb_menu = get_post_meta($post_id, '_plchf_msb_site_menu', true);
		
		$list 		= $plchf_msb_menu;
		$new_order 	= $_POST['list_items'];
		$new_list 	= array();
		
		// update order
		foreach($new_order as $v) {
			if(isset($list[$v])) {
				$new_list[$v] = $list[$v];
			}
		}
		
		update_post_meta($post_id, '_plchf_msb_site_menu', $new_order);
		
		die();
	}
	
	add_action('wp_ajax_plchf_msb_save_site_pages_order', 'plchf_msb_save_site_pages_order');

/*-------------------------------------------------------------------------

	DELETE MOBILE SITE PAGE

-------------------------------------------------------------------------*/

	function plchf_msb_delete_mobile_site_page(){
		
		if (isset($_GET['deletepage'])) {
			
			$id		= $_GET['site_id'];
			$page 	= $_GET['deletepage'];
			$bloginfo = get_bloginfo('url');
			
			wp_delete_post($page, true);
			
			wp_redirect($bloginfo . '/edit-mobile-site/?site_id='.$id.'');
			exit;
			
		}
	
	}
	
	add_action('init','plchf_msb_delete_mobile_site_page');

/*-------------------------------------------------------------------------

	SAVE ORDER OF PAGES ON DRAG & DROP

-------------------------------------------------------------------------*/

	function plchf_msb_pages_sort() {
	
		global $wpdb; // WordPress database class
	 
		$order = explode(',', $_POST['order']);
		$counter = 0;
	 
		foreach ($order as $page_id) {
			
			$wpdb->update($wpdb->posts, array( 'menu_order' => $counter ), array( 'ID' => $page_id) );
			$counter++;
		
		}
		
		die();
	
	}
	
	add_action('wp_ajax_plchf_msb_pages_sort', 'plchf_msb_pages_sort');