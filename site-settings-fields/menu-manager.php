<?php

/* ---------------------------------------------------------------------------- */
/* Menu Manager Field
/* ---------------------------------------------------------------------------- */

	function plchf_msb_site_settings_field_menu_manager($fields, $count) {

		// Get the Field Definitions
		$type 			= $fields['type'];
		$label 			= $fields['name'];
		$tooltip		= $fields['tooltip'];
		$placeholder	= $fields['placeholder'];
		$field_id		= $fields['id'];
	
		// Get the saved Value
		$value			= $values[''.$field_id.''];
	
		global $post, $wp_query;
		
		// Site ID
		$site_id = $_GET['mobilesite_site_id'];

		// Site Root
		$root = get_bloginfo('url');
		
		$title = get_the_title($site_id);
		$title = str_replace( " ", "-", $title);
		$title = strtolower($title);
		
		$selection = get_post_meta($post->ID, $field['id'], true);
		
		// Begin Output
		$output = '<div class="menu-items">';
						
			$output .='<form id="menu-manager" action="" method="POST">';

				$output .='<label for="_new_page_title">Create New Page</label>';
				$output .='<input type="text" name="_new_page_title" class="_new_page_title"/>';
				$output .='<input type="hidden" name="site_id" value="'.$site_id.'"/>';
				$output .= wp_nonce_field('plchf_msb_create_page_field', 'plchf_msb_create_page_field');
				$output .='<input type="submit" class="create-new-page btn btn-standard button button-standard" value="Add New Page">';

			$output .='</form>';
			
			$output .='<div class="clear"></div><hr>';
			
			$output .='<strong>Pages</strong><br/>';
			
			$output .='<div class="menu-builder">';
			
				$output .= '<div class="menu-container" data-postid="'.$site_id.'">';
					
					$args = array(
						'post_parent' 	=> $site_id,
						'post_type' 	=> 'pluginchiefmsb-sites',
						'orderby' 		=> 'menu_order',
						'order' 		=> 'ASC'
					);
					
					$posts = get_posts($args);
					
					if ($posts) {
					
						foreach ($posts as $post) {
							
							$output .= '<li id="'. $post->ID .'" data-id="'. $post->ID . '" class="list_item menuitem">';
								$output .= ''. $post->post_title .'';
								$output .= '<div class="menuitem-options">';
										$output .='<div class="menuitem-move">Move</div>';
										$output .='<a href="'.$root.'/edit-mobile-page/?mobile_page_id='. $post->ID .'" class="menuitem-edit">Edit</a>';
										$output .='<div class="menuitem-close">Close</div>';
									$output .= '</div><br/>';
							$output .= '</li>';
							
						} // End Foreach
					
					} // End If
										
				$output .='</div>';
			
			$output .='</div>';
						
		$output .= '</div>';

		echo apply_filters('plchf_msb_site_settings_field_menu_manager_filter',$output);
		
	}
	
	add_action('plchf_msb_site_settings_field_menu_manager','plchf_msb_site_settings_field_menu_manager', 10, 4);