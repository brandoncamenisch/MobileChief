<?php

/* ---------------------------------------------------------------------------- */
/* Add the Menu Page
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_edit_page_menu_page() {
		
		add_submenu_page( 
			'pluginchiefmsb', 
			'Edit Page', 
			'Edit Page', 
			'add_users', 
			'pluginchiefmsb/edit-page', 
			'pluginchiefmsb_edit_page_menu_page_content' 
		);
	
	}
	
	add_action('admin_menu', 'pluginchiefmsb_edit_page_menu_page');
	
/* ---------------------------------------------------------------------------- */
/* Create the Menu Page Content
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_edit_page_menu_page_content() {
	?>
	
		<?php get_pluginchiefmsb_header(); ?>
	
		<?php get_pluginchiefmsb_header(); ?>
	
		<div class="pluginchiefmsb-wrapper" id="pluginchiefmsb-wrapper">
		
			<div class="pluginchiefmsb-wrap">
				
				<div class="settings-title">
					
					<h3 class="section-title floatl">Edit Site</h3>
					
					<a class="button-primary floatr" href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=mobile-sites">Get More Themes</a>
					
				</div>
				
				<div class="clear"></div><!-- Clear -->
				
				<hr>
				
				<?php pluginchiefmsb_page_elements_menu(); ?>
				
				<div class="clear"></div><!-- Clear -->
				
				<!-- Left Column -->
				<div class="two_fifth column">
					
					<!-- Page Title -->
					<h2><?php echo apply_filters('plchf_msb_page_label', 'Page:'); ?> <?php echo plchf_msb_get_page_title(); ?></h2>
					
					<hr>
						
					<!-- Mobile Page Generator Form -->
					<?php plchf_msb_page_generator(); ?>
				
				</div><!-- Two Fifth -->
				
				<!-- Center Column -->
				<div class="two_fifth column">
				
					<div class="iphone-preview">
					
						<img src="<?php echo plchf_msb_phone_preview_image(); ?>" alt="phone preview"/>
						
						<div class="preview-site">
							
							<?php plchf_msb_phone_preview_site(); ?>
							
						</div><!-- Preview -->
						
					</div><!-- End iPhone Preview -->
				
				</div><!-- Two Fifths -->
				
				<!-- Right Column -->
				<div class="one_fifth column-last">
					
					<!-- Right Column Title -->
					<h2><?php echo apply_filters('plchf_msb_site_preview_title', 'Site Preview:'); ?></h2>
					
					<hr>
						
					<?php plchf_msb_qrcode_preview(); ?>
					
					<?php plchf_msb_site_shortlink(); ?>
				
				</div><!-- One Fifth -->
				
			</div><!-- End PLUGINCHIEFMSB Wrap -->
			
		</div><!-- End Wrapper -->
		
		<?php get_pluginchiefmsb_footer(); ?>
		
	<?	
	}