<?php

/* ---------------------------------------------------------------------------- */
/* Loop Through Global Page Elements and Create the Menu That Adds them
/* 
/* usage: pluginchiefmsb_page_elements_menu();
/* 
/* ---------------------------------------------------------------------------- */

function pluginchiefmsb_page_elements_menu() {
	
	global $pluginchiefmsb_page_elements;
	
	$pageid = plchf_msb_get_page_id();
	
	// Start the Menu Output
	echo '<ul class="elementmenu sgray" id="page-element-menu" data-id="'.$pageid.'">';
		
		$support = plchf_msb_get_theme_info('Page Elements');
		
		// If Theme Supports Page Elements
		if ($support == 'Yes') {
		
			echo apply_filters('plchf_msb_page_elements_title','<li><p>Page Elements:</p></li>');
			
			// Element Sections Hook
			do_action('plchf_msb_page_element_sections');
		
		} else {
			
			echo '<li><p>Page: '.plchf_msb_get_page_title().'</p></li>';
			
			// No Support For Page Elements in this theme
			do_action('plchf_msb_page_element_menu_no_support');
			
		}
		
			// Add Elements to the Right Side of the Menu
			do_action('plchf_msb_page_element_right_sections');
	
	// End the Menu Output
	echo '</ul>';
	
}

/* ---------------------------------------------------------------------------- */
/* Content Section
/* ---------------------------------------------------------------------------- */

	function plchf_add_element_section_content() {
		
		plchf_msb_add_page_element_section('Content', 'left');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_element_section_content');

/* ---------------------------------------------------------------------------- */
/* Media Section
/* ---------------------------------------------------------------------------- */
	
	function plchf_add_element_section_media() {
		
		plchf_msb_add_page_element_section('Media', 'left');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_element_section_media');

/* ---------------------------------------------------------------------------- */
/* Social Section
/* ---------------------------------------------------------------------------- */
	
	/*
	
	Removed in Version 1.1.01
	Should be added when elements require this section, 
	not by default as there are no elements in the section by default
	
	function plchf_add_element_section_social() {
		
		plchf_msb_add_page_element_section('Social', 'left');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_element_section_social');
	*/
	
/* ---------------------------------------------------------------------------- */
/* Style Section
/* ---------------------------------------------------------------------------- */
	
	/*
	function plchf_add_element_section_style() {
		
		plchf_msb_add_page_element_section('Style', 'left');
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_element_section_style');
	*/
	
/* ---------------------------------------------------------------------------- */
/* Add Edit Page Items to the Menu
/* ---------------------------------------------------------------------------- */
	
	function plchf_msb_edit_page_menu_edit_pages_menu_items() {
		
		// Site ID
		$site_id = plchf_msb_get_site_id();									
									
		echo '<li class="floatr">';
			
			echo '<a href="#" class="">';	
			
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
						
							echo '<a href="'.apply_filters('plchf_msb_edit_page_page', get_admin_url().'admin.php' ).'?page=pluginchiefmsb/edit-page&mobilesite_page_id='.$post->ID.'">';
								
								echo $post->post_title; 
								
							echo'</a>';
							
						echo '</li>';
						
					}
					
				echo '</ul>';
				
				}
			
		echo '</li>';
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_msb_edit_page_menu_edit_pages_menu_items');
	add_action('plchf_msb_page_element_menu_no_support','plchf_msb_edit_page_menu_edit_pages_menu_items');
	
/* ---------------------------------------------------------------------------- */
/* Delete Page Link
/* ---------------------------------------------------------------------------- */

	function plchf_add_element_section_delete_page() {

		$pageid 	= plchf_msb_get_page_id();
		$site_id 	= plchf_msb_get_site_id();
		$homepage 	= get_post_meta($site_id, '_homepage_', true); 
		
		if ($homepage != $pageid) {
		
			plchf_msb_add_page_element_link('Delete Page', 'right', 'deletepageself', '#');
		
		}
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_element_section_delete_page');
	add_action('plchf_msb_page_element_menu_no_support','plchf_add_element_section_delete_page');
	
/* ---------------------------------------------------------------------------- */
/* Site Settings Link
/* ---------------------------------------------------------------------------- */

	function plchf_add_element_section_site_settings() {
		
		// Get the Site ID
		$siteid = plchf_msb_get_site_id();
		
		// Add Link to the Edit Site Page
		$link = apply_filters( 'plchf_msb_edit_sites_page', get_admin_url().'admin.php' ).'?page=pluginchiefmsb/edit-site&mobilesite_site_id='.$siteid.'';
		
		plchf_msb_add_page_element_link('Site Settings', 'right', 'editpage', $link);
		
	}
	
	add_action('plchf_msb_page_element_sections','plchf_add_element_section_site_settings');
	add_action('plchf_msb_page_element_menu_no_support','plchf_add_element_section_site_settings');