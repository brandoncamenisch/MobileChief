<?php

/* ---------------------------------------------------------------------------- */
/* Loop Through Global Edit Page Menu Items and Create the Menu That Adds them
/*
/* usage: pluginchiefmsb_page_elements_menu();
/*
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_edit_site_menu() {

		global $pluginchiefmsb_edit_page_menu;

		$site_id = plchf_msb_get_site_id();

		// Start the Menu Output
		echo '<ul class="elementmenu sgray" id="page-element-menu">';

			// Page Elements Title
			echo '<li><p>'.apply_filters('plchf_msb_edit_site_page_title_prefix', get_the_title( $site_id ) ).': '.' '.apply_filters('plchf_msb_edit_site_page_title','<i class="icon-cogs"></i>Site Settings').'</p></li>';


			$support = plchf_msb_get_theme_info('Multiple Pages');

			// If Theme Supports Page Elements
			if ($support == 'Yes') {

				// Element Sections Hook
				do_action('plchf_msb_edit_page_menu_items');

			} else {

				// No Support For Page Elements in this theme
				do_action('plchf_msb_edit_page_menu_items_no_support');

			}

		// End the Menu Output
		echo '</ul>';

	}

/* ---------------------------------------------------------------------------- */
/* Add Delete Site Item to the Menu
/* ---------------------------------------------------------------------------- */

	function plchf_msb_edit_page_menu_delete_site_menu_item() {

		echo '<li class="floatr">';
			echo '<a href="" class="deletepage">';
				echo '<span class="'.apply_filters('plchf_msb_edit_site_page_delete_menu_item_icon','delete_site').'"></span>';
				echo apply_filters('plchf_msb_edit_site_page_delete_menu_item','Delete Site');
			echo '</a>';
		echo '</li>';

	}

	add_action('plchf_msb_edit_page_menu_items','plchf_msb_edit_page_menu_delete_site_menu_item');
	add_action('plchf_msb_edit_page_menu_items_no_support','plchf_msb_edit_page_menu_delete_site_menu_item');

/* ---------------------------------------------------------------------------- */
/* Add Delete Site Item to the Menu
/* ---------------------------------------------------------------------------- */

	function plchf_msb_edit_page_menu_edit_pages_menu_item() {

		$site_id = plchf_msb_get_site_id();

		$output = '<li class="floatr">';

			$output .= '<a href="#">';

				$output .= '<span class="'.apply_filters('plchf_msb_edit_site_page_delete_menu_item_icon','delete_site').'"></span>';

				$output .= apply_filters('plchf_msb_edit_site_page_edit_pages_menu_item','Edit Pages');

			$output .= '</a>';

				$args = array(
					'post_type' 	=> 'pluginchiefmsb-sites',
					'post_parent' 	=> $site_id,
					'posts_per_page'=> '-1',
					'orderby' 		=> 'menu_order',
					'order' 		=> 'ASC'
				);

				$posts = get_posts( $args );

				if ($posts) {

				$output .= '<ul>';

					foreach ($posts as $post) {

						$output .= '<li>';

							$output .= '<a href="'.apply_filters( 'plchf_msb_edit_page_page', get_admin_url().'admin.php' ).'?page=pluginchiefmsb/edit-page&mobilesite_page_id='.$post->ID.'">';

								$output .= $post->post_title;

							$output .= '</a>';

						$output .= '</li>';

					}

				$output .= '</ul>';

				}

		$output .= '</li>';

		echo apply_filters('plcf_msb_edit_pages_menu_item_filter', $output);

	}

	add_action('plchf_msb_edit_page_menu_items','plchf_msb_edit_page_menu_edit_pages_menu_item');