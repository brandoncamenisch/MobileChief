<?php

/* ---------------------------------------------------------------------------- */
/* Add the Menu Page
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_edit_page_menu_page() {
		
		add_submenu_page( 
			'pluginchiefmsb.php', 
			'Edit Page', 
			'Edit Page', 
			'add_users', 
			'pluginchiefmsb/edit-page.php', 
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
	
		<div class="pluginchiefmsb-wrapper" id="pluginchiefmsb-wrapper">
		
			<div class="pluginchiefmsb-wrap">
				
				<div class="settings-title">
					
					<h3 class="section-title floatl">Edit Page</h3>
				
					<a class="button-primary floatr" href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=mobile-sites">Get More Themes</a>
					
				</div>
				
				<div class="clear"></div><!-- Clear -->
				
				<hr>
				
				<div id="sites-list">
					
					<?php
					
					$pluginchiefmsb_args = array(
						'post_type' => 'mobile-sites'
					);
					
					$sites = get_posts( $pluginchiefmsb_args );
					
					foreach ( $sites as $site ) {
							
					?>
							
					<div id="site-name" class="widget">
						
						<div class="widget-top">
						
							<div class="widget-title-action">
							
								<a class="widget-action hide-if-no-js" href="#"></a>
							
							</div><!-- / Widget Title Action -->
							
							<div class="widget-title">
							
								<h4><?php echo $site->post_title; ?></h4>
							
							</div><!-- / Widget Title -->
						
						</div><!-- / Widget Top -->
						
						<div class="module-inside">
						
							<h3 class="section-title floatl">
								
								<?php echo $site->post_title; ?>
							
							</h3><!-- End Title -->
							
							<a class="button-primary floatr" href="#">Edit Site Settings</a>
							
							<div class="clear"></div>
							
							<hr>
							
							<div class="clear"></div>
							
							<div class="one_third">
							
								<h4>Site Preview</h4>
								
								QR Code goes here.
								
								Google Shortlink Goes Here
								
							</div>
							
							<div class="one_third">
							
								<h4>Pages</h4>
								
								List pages within this site
								
							
							</div>
							
							<div class="one_third column-last">
							
								<h4>Site</h4>
								
								List Details for the site
							
							</div>
							
							<div class="clear"></div>
						
						</div><!-- / Module Inside -->
					
					</div><!-- /Widget -->
					
					<?php
					
					}
					
					?>
					
					<div class="clear"></div><!-- Clear -->
					
				</div>
				
			</div>
			
		</div>
		
		<?php get_pluginchiefmsb_footer(); ?>
		
	<?	
	}