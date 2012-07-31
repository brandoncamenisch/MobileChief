<?php

/* ---------------------------------------------------------------------------- */
/* Add the Menu Page
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_edit_site_menu_page() {
		
		add_submenu_page( 
			'pluginchiefmsb', 
			'Edit Site', 
			'Edit Site', 
			'add_users', 
			'pluginchiefmsb/edit-site', 
			'pluginchiefmsb_edit_site_menu_page_content' 
		);
	
	}
	
	add_action('admin_menu', 'pluginchiefmsb_edit_site_menu_page');
	
/* ---------------------------------------------------------------------------- */
/* Create the Menu Page Content
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_edit_site_menu_page_content() {
	?>
	
		<?php get_pluginchiefmsb_header(); ?>
	
		<div class="pluginchiefmsb-wrapper" id="pluginchiefmsb-wrapper">
		
			<div class="pluginchiefmsb-wrap">
				
				<div class="settings-title">
					
					<h3 class="section-title floatl"><?php echo apply_filters('plchf_msb_edit_site_page_title','Edit Site'); ?></h3>
				
					<a class="button-primary floatr" href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=mobile-sites">Get More Themes</a>
					
				</div>
				
				<div class="clear"></div><!-- Clear -->
				
				<hr>
				
				<?php pluginchiefmsb_edit_site_menu(); ?>
				
				<div class="clear"></div><!-- Clear -->
				
			</div><!-- End PLUGINCHIEFMSB Wrap -->
			
		</div><!-- End Wrapper -->
		
		<?php get_pluginchiefmsb_footer(); ?>
		
	<?	
	}