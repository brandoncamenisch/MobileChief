<?php

/* ---------------------------------------------------------------------------- */
/* Menu Manager Field
/* ---------------------------------------------------------------------------- */

	function plchf_msb_site_settings_field_menu_manager($fields, $count) {

		// Get the Element Type
		$element_type 	= $element_type;
	
		// Get the Field Definitions
		$type 				= $fields['type'];
		$label 				= $fields['name'];
		$tooltip		 	= $fields['tooltip'];
		$placeholder		= $fields['placeholder'];
		$field_id			= $fields['id'];
	
		// Get the saved Value
		$value			= $values[''.$field_id.''];
	
		global $post, $wp_query;
		
		// Site ID
		$site_id = $_GET['mobilesite_site_id'];

		// Site Root
		$root = get_bloginfo('url');
		
		// Query All Posts of this post type
		$siteposts = get_posts('post_type=pluginchiefmsb-sites&posts_per_page=-1&post_parent='.$site_id.'');
		
		$title = get_the_title($site_id);
		$title = str_replace( " ", "-", $title);
		$title = strtolower($title);
		
		$selection = get_post_meta($post->ID, $field['id'], true);
		
		$posts = get_posts('post_type=mobile-sites&posts_per_page=-1&post_parent='.$site_id.'');
		
		// Begin Output
		$output .= '<div class="menu-items">';
		
			$output .='<label for="_new_page_title">Create New Page</label>';
			$output .='<input type="text" name="_new_page_title" class="_new_page_title"/>';
			$output .= wp_nonce_field('omfg_mobile_create_page', 'omfg_mobile_create_page_field');
			$output .='<input type="submit" class="vieworderbtn create-new-page" value="Add New Page">';
			$output .='<div class="clear"></div><hr>';
			
			$output .='<strong>Pages</strong><br/>';
			
			$output .='<div class="menu-builder">';
			
				$output .= '<div class="menu-container" data-postid="'.$site_id.'">';
															
					$site_id = $_GET['site_id'];
					
					$args = array(
						'post_parent' => $site_id,
						'post_type' => 'mobile-sites',
						'orderby' => 'menu_order',
						'order' => 'ASC'
					);
					
					$posts = get_posts($args);
					
					foreach ($posts as $post) {
						
						$output .= '<li id="'. $post->ID .'" data-id="'. $post->ID . '" class="list_item menuitem">';
							$output .= ''. $post->post_title .'';
							$output .= '<div class="menuitem-options">';
									$output .='<div class="menuitem-move">Move</div>';
									$output .='<a href="'.$root.'/edit-mobile-page/?mobile_page_id='. $post->ID .'" class="menuitem-edit">Edit</a>';
									$output .='<div class="menuitem-close">Close</div>';
								$output .= '</div><br/>';
						$output .= '</li>';
						
					}
										
				$output .='</div>';
			
			$output .='</div>';
			
		$output .= '</div>';

		echo apply_filters('plchf_msb_site_settings_field_menu_manager_filter',$output);
		
	}
	
	add_action('plchf_msb_site_settings_field_menu_manager','plchf_msb_site_settings_field_menu_manager', 10, 4);