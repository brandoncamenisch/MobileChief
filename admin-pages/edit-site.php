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
		
		<?php 
		
		$site_id = plchf_msb_get_site_id();
		
		// Make Sure we're trying to edit an actual site
		
		
		if ( ($site_id) && ( get_post_type( $site_id ) == 'pluginchiefmsb-sites') ) {
			
		?>
		
		<?php get_pluginchiefmsb_header(); ?>
	
		<div class="pluginchiefmsb-wrapper" id="pluginchiefmsb-wrapper">
		
			<div class="pluginchiefmsb-wrap">
				
				<div class="settings-title">
					
					<h3 class="section-title floatl"><?php echo apply_filters('plchf_msb_edit_site_page_title','Edit Site'); ?></h3>
				
					<a class="button-primary floatr" href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=pluginchiefmsb">My Sites</a>
					
				</div>
				
				<div class="clear"></div><!-- Clear -->
				
				<hr>
				
				<?php pluginchiefmsb_edit_site_menu(); ?>
				
				<div class="clear"></div><!-- Clear -->
				
				<!-- Left Column -->
				<div class="two_fifth column">
					
					<!-- Page Title -->
					<h2><?php echo apply_filters('plchf_msb_site_label', 'Site:'); ?> <?php echo plchf_msb_get_site_title($id); ?></h2>
					
					<hr>
						
					<!-- Mobile Site Settings -->
					<?php plchf_msb_site_settings(); ?>
				
				</div><!-- Two Fifth -->
				
				<!-- Center Column -->
				<div class="two_fifth column">
				
					<div class="iphone-preview">
					
						<img src="<?php echo plchf_msb_phone_preview_image(); ?>" alt="phone preview"/>
						
						<div class="preview-site">
							
							<?php echo plchf_msb_phone_preview_site(); ?>
							
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
		
		<!-- If the Site ID is invalid -->
		<?php } else { ?>
			
			<?php 
			
			$output .= '<h2>Uh Oh. The Site You Are Trying to Edit Doesn\'t Exist!</h2>';
			$output .= '<a href="#" class="button-primary">Create New Site</a> <a href="#" class="button-primary">My Sites</a>';
			
			// Display a Warning, that the Site Doesn't Exist
			echo apply_filters('plchf_msb_site_doesnt_exist_error', $output);
			
			?>
		
		<?php } ?><!-- End Actual Site Check -->
		
	<?php
	
	}