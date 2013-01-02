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
					$output .='<div class="menuitem-move" rel="tooltip" data-placement="top" data-original-title="Drag & Drop to Re-Order the Pages">Move</div>';
					$output .='<a href="'.apply_filters( 'plchf_msb_edit_page_page', get_bloginfo('url') . '/wp-admin/admin.php' ).'?page=pluginchiefmsb/edit-page&mobilesite_page_id='.$postid.'" class="menuitem-edit" rel="tooltip" data-placement="top" data-original-title="Edit the '.$title.' Page">Edit</a>';
					$output .='<div class="menuitem-close deletepage" rel="tooltip" data-placement="top" data-original-title="Delete the '.$title.' Page">Close</div>';
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

		die();

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

	function plchf_msb_delete_mobile_site_page() {

		$pageid = $_POST['page_id'];

		// Run Action After We Delete the Site
		//do_action('plchf_msb_before_delete_page', $siteid);

		// Delete the Parent Page (Site)
		wp_delete_post($pageid, true);

		// Run Action After We Delete the Site
		// do_action('plchf_msb_after_delete_page', $siteid);

		echo $pageid;

		die();

	}

	add_action('wp_ajax_plchf_msb_delete_mobile_site_page','plchf_msb_delete_mobile_site_page');

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

/*-------------------------------------------------------------------------

	CREATE THE OUTPUT FOR THE PAGE MENUS

-------------------------------------------------------------------------*/

	function plchf_msb_site_menu($navType) {

		global $post;

		// Get the Site ID
		$site_id = plchf_msb_get_site_id();

		// Set Default Nav Type
		if ($navType != '') {
			$navType = ' '.$navType;
		} else {
			$navType = ' nav-tabs nav-stacked';
		}

		// Setup the Query Args
		$args = array(
			'post_parent' 	=> $site_id,
			'post_type' 	=> 'pluginchiefmsb-sites',
			'orderby' 		=> 'menu_order',
			'order' 		=> 'ASC',
			'numberposts'     => 0
		);

		// Get the Posts
		$posts = get_posts($args);

			// Check if there are any posts
			if ($posts) {

				// Generate the Menu
				$output = '<ul class="nav'.$navType.'">';

				// Loop Through the Pages
				foreach ($posts as $post) {

					$output .= '<li>';
						$output .= '<a href="'.get_permalink($post->ID).'">';
							$output .= '<div class="container">'.$post->post_title.'';
								$output .= '<i class="icon-arrow-right pull-right"></i>';
							$output .= '</div>';
						$output .= '</a>';
					$output .= '</li>';

				} // End Foreach

				$output .= '</ul>';

			} // End If

		// Output the Menu through a filter, with $site_id as a variable passed to the filter
		echo apply_filters('plchf_msb_site_menu_filter', $output, $site_id);

	}