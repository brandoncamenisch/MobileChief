<?php
	/**
	 * plchf_msb_site_settings_field_menu_manager function.
	 * Menu Manager Field
	 * @access public
	 * @param mixed $fields
	 * @param mixed $count
	 * @return void
	 */
	function plchf_msb_site_settings_field_menu_manager($fields, $count) {
		#Get the Field Definitions
		$type 			=& $fields['type'];
		$label 			=& $fields['name'];
		$tooltip		=& $fields['tooltip'];
		$placeholder=& $fields['placeholder'];
		$field_id		=& $fields['id'];

		global $post, $wp_query;
		#Site ID
		$site_id 	=& $_GET['mobilesite_site_id'];
		$homepage 	= get_post_meta($site_id, '_homepage_', true);

		#Site Root
		$root = get_bloginfo('url');

		$title = get_the_title($site_id);
		$title = str_replace( " ", "-", $title);
		$title = strtolower($title);

		#Begin Output
		$output = '<div class="menu-items">';
			$output .='<form id="menu-manager" action="" method="POST">';
				$output .= '
				<label>'.$label.'
					<a href="#" class="tipsy-se floatr" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
						<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20" height="20" class="info-tooltip-icon">
					</a>
				</label>';
				$output .='<input type="text" name="_new_page_title" placeholder="Enter Page Title" class="_new_page_title"/>';
				$output .='<input type="hidden" name="site_id" value="'.$site_id.'"/>';
				$output .= wp_nonce_field('plchf_msb_create_page_field', 'plchf_msb_create_page_field');
				$output .='<input type="submit" class="create-new-page btn btn-primary" value="Add New Page">';
			$output .='</form>';
			$output .='<div class="clear"></div><hr>';
			$output .='<strong>Pages</strong><br/>';
			$output .='<div class="menu-builder">';
			$output .='<div class="menu-container" data-postid="'.$site_id.'">';

					$args = array(
						'post_parent'=> $site_id,
						'post_type'  => 'pluginchiefmsb-sites',
						'numberposts'=> 0,
						'orderby' 	 => 'menu_order',
						'order' 		 => 'ASC',
					);

					$posts = get_posts($args);

					if ($posts) {

						foreach ($posts as $post) {

							$output .= '<li id="'. $post->ID .'" data-id="'. $post->ID . '" class="list_item menuitem">';

								$output .= ''. $post->post_title .'';

								$output .= '<div class="menuitem-options">';

										$output .='<div class="menuitem-move" rel="tooltip" data-placement="top" data-original-title="Drag & Drop to Re-Order the Pages">Move</div>';

										$output .='<a href="'.apply_filters( 'plchf_msb_edit_page_page', get_bloginfo('url') . '/wp-admin/admin.php' ).'?page=pluginchiefmsb/edit-page&mobilesite_page_id='.$post->ID.'" class="menuitem-edit" rel="tooltip" data-placement="top" data-original-title="Edit the '.$post->post_title.' Page">Edit</a>';
										#Only Show if NOT the Home Page
										if ($homepage != $post->ID) {

											$output .='<div class="menuitem-close deletepage" rel="tooltip" data-placement="top" data-original-title="Delete the '.$post->post_title.' Page">Close</div>';

										}
									$output .= '</div><br/>';
							$output .= '</li>';

						} #End Foreach

					} #End If

				$output .='</div>';
			$output .='</div>';
		$output .= '</div>';

		echo apply_filters('plchf_msb_site_settings_field_menu_manager_filter',$output);

	}

	add_action('plchf_msb_site_settings_field_menu_manager','plchf_msb_site_settings_field_menu_manager', 10, 4);