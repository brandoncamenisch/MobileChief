<?php

/* ---------------------------------------------------------------------------- */
/* Add the Menu Page
/* ---------------------------------------------------------------------------- */

	function pluginchief_mobile_site_builder_menu() {
		
		add_menu_page(
			'Mobile Site Builder', 
			'Mobile Site Builder', 
			'add_users', 
			'pluginchiefmsb', 
			'mobile_site_builder_sites',   
			PLUGINCHIEFMSB . '/images/msb-icon.png', 
			90
		);
	
	}
	
	add_action('admin_menu', 'pluginchief_mobile_site_builder_menu');
	
/* ---------------------------------------------------------------------------- */
/* Create the Menu Page
/* ---------------------------------------------------------------------------- */

function mobile_site_builder_sites() {

?>

		<?php get_pluginchiefmsb_header(); ?>
	
		<div class="pluginchiefmsb-wrapper" id="pluginchiefmsb-wrapper">
		
			<div class="pluginchiefmsb-wrap">
				
				<div class="settings-title">
					
					<h3 class="section-title floatl">Mobile Sites</h3>
				
					<a class="button-primary floatr" href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=mobile-sites">Get More Themes</a>
					
				</div>
				
				<div class="clear"></div><!-- Clear -->
				
				<hr>
				
				<div id="sites-list">
					
					<?php
					
					$pluginchiefmsb_args = array(
						'post_type' 	=> 'pluginchiefmsb-sites',
						'post_parent'	=> 0
					);
					
					$sites = get_posts( $pluginchiefmsb_args );
					
					foreach ( $sites as $site ) {
							
					?>
							
						<div id="site-name" class="widget" data-siteid="<?php echo $site->ID; ?>">
							
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
								
								<a class="button-primary floatr" href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=pluginchiefmsb/edit-site&mobilesite_site_id=<?php echo $site->ID; ?>">Edit Site Settings</a>
								
								<div class="clear"></div>
								
								<hr>
								
								<div class="clear"></div>
								
								<?php do_action('plchf_msb_sites_page_above_site_info'); ?>
								
								<div class="clear"></div>
								
								<div class="one_fourth">
								
									<h4>Site Preview</h4>
									
									<?php plchf_msb_qrcode_preview($site->ID); ?>
					
									<?php plchf_msb_site_shortlink($site->ID); ?>
									
								</div>
								
								<div class="three_fourth column-last">
								
									<div class="one_half">
									
										<h4>Pages</h4>
										
										List pages within this site
									
									</div>
									
									<div class="one_half column-last">
									
										<h4>Site</h4>
										
										List Details for the site
									
									</div>
								
								</div>
								
								<div class="clear"></div>
								
								<?php do_action('plchf_msb_sites_page_below_site_info'); ?>
							
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

	<?php 
		
	}