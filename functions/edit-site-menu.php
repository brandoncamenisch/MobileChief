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
			echo '<li><p>'.apply_filters('plchf_msb_edit_site_page_title_prefix', get_the_title( $site_id ) ).': '.' '.apply_filters('plchf_msb_edit_site_page_title','Site Settings').'</p></li>';
			
			// Element Sections Hook
			do_action('plchf_msb_edit_page_menu_items');
		
		// End the Menu Output
		echo '</ul>';
		
	}

/* ---------------------------------------------------------------------------- */
/* Add Delete Site Item to the Menu
/* ---------------------------------------------------------------------------- */

	function plchf_msb_edit_page_menu_delete_site_menu_item() {
		
		echo '<li class="floatr">';
			echo '<a href="" class="deletesite">';	
				echo '<span class="'.apply_filters('plchf_msb_edit_site_page_delete_menu_item_icon','delete_site').'"></span>';
				echo apply_filters('plchf_msb_edit_site_page_delete_menu_item','Delete Site');
			echo '</a>';
		echo '</li>';
		
	}
	
	add_action('plchf_msb_edit_page_menu_items','plchf_msb_edit_page_menu_delete_site_menu_item');

/* ---------------------------------------------------------------------------- */
/* Add Delete Site Item to the Menu
/* ---------------------------------------------------------------------------- */
	
	function plchf_msb_edit_page_menu_edit_pages_menu_item() {
		
		$site_id = plchf_msb_get_site_id();									
									
		echo '<li class="floatr">';
			
			echo '<a href="#" class="deletesite">';	
			
				echo '<span class="'.apply_filters('plchf_msb_edit_site_page_delete_menu_item_icon','delete_site').'"></span>';
				
				echo apply_filters('plchf_msb_edit_site_page_edit_pages_menu_item','Edit Pages');
				
			echo '</a>';
				
				$args = array(
					'post_type' 	=> 'pluginchiefmsb-sites',
					'post_parent' 	=> $site_id,
					'posts_per_page'=> '-1',
					'orderby' 		=> 'menu_order',
					'order' 		=> 'ASC'
				);
					
				$posts = get_posts( $args );
					
				if ($posts) {
				
				echo '<ul>';
					
					foreach ($posts as $post) {
				
						echo '<li>';
						
							echo '<a href="'.apply_filters( 'plchf_msb_edit_page_page', get_bloginfo('url') . '/wp-admin/admin.php' ).'?page=pluginchiefmsb/edit-page&mobilesite_page_id='.$post->ID.'">';
								
								echo $post->post_title; 
								
							echo'</a>';
							
						echo '</li>';
						
					}
					
				echo '</ul>';
				
				}
			
		echo '</li>';
		
	}
	
	add_action('plchf_msb_edit_page_menu_items','plchf_msb_edit_page_menu_edit_pages_menu_item');