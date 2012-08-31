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
			'pluginchiefmsb_msb_my_sites_page_content',   
			PLUGINCHIEFMSB . '/images/msb-icon.png', 
			90
		);
	
	}
	
	add_action('admin_menu', 'pluginchief_mobile_site_builder_menu');
	
/* ---------------------------------------------------------------------------- */
/* Create the Menu Page
/* ---------------------------------------------------------------------------- */

function pluginchiefmsb_msb_my_sites_page_content() {

?>

		<?php 
		
		get_pluginchiefmsb_header(); 
			
		?>
	
		<div class="pluginchiefmsb-wrapper" id="pluginchiefmsb-wrapper">
		
			<div class="pluginchiefmsb-wrap">
				
				<?php do_action('plchf_msb_my_sites_above_page_title'); ?>
					
				<div class="clear"></div><!-- Clear -->
					
				<div class="settings-title">
					
					<h3 class="section-title floatl">Mobile Sites</h3>
				
					<a class="button-primary floatr" href="<?php echo apply_filters('plchf_msb_new_sites_page', 'admin.php?page=pluginchiefmsb/new-site' ); ?>"><?php echo apply_filters('plchf_msb_create_new_site_link_text', 'Create New Site'); ?></a>
					
				</div>
				
				<div class="clear"></div><!-- Clear -->
				
				<?php do_action('plchf_msb_my_sites_below_page_title'); ?>
				
				<hr>
				
				<div id="sites-list">
					
					<?php
					
					$pluginchiefmsb_args = array(
						'post_type' 	=> 'pluginchiefmsb-sites',
						'post_parent'	=> 0
					);
					
					$sites = get_posts( $pluginchiefmsb_args );
					
					foreach ( $sites as $site ) {
						
					$home_id = get_post_meta($site->ID, '_homepage_', true);
					
					$siteid = $site->ID;
							
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
				
								<?php do_action('plchf_msb_my_sites_above_site_title'); ?>
								
								<div class="clear"></div><!-- Clear -->
							
								<h3 class="section-title floatl">
									
									<?php echo $site->post_title; ?>
								
								</h3><!-- End Title -->
								
								<a class="button-primary floatr" href="<?php echo apply_filters( 'plchf_msb_edit_sites_page', get_bloginfo('url') . '/wp-admin/admin.php' ); ?>?page=pluginchiefmsb/edit-site&mobilesite_site_id=<?php echo $site->ID; ?>">Edit Site Settings</a>
								
								<div class="clear"></div>
								
								<?php do_action('plchf_msb_my_sites_below_site_title'); ?>
								
								<div class="clear"></div><!-- Clear -->
								
								<hr>
								
								<div class="clear"></div>
								
								<?php do_action('plchf_msb_sites_page_above_site_info'); ?>
								
								<div class="clear"></div>
								
								<div class="one_fourth">
								
									<h4>Site Preview</h4>
									
									<hr>
									
									<?php plchf_msb_qrcode_preview($home_id); ?>
					
									<?php plchf_msb_site_shortlink($home_id); ?>
									
								</div>
								
								<div class="three_fourth column-last">
								
									<div class="one_half">
									
										<h4>Pages</h4>
										
										<hr>
										
										<?php do_action('plchf_msb_sites_center_column', $siteid); ?>
									
									</div>
									
									<div class="one_half column-last">
									
										<h4>Site</h4>
										
										<hr>
										
										<?php do_action('plchf_msb_sites_right_column', $siteid); ?>
										
									
									</div>
								
								</div>
								
								<div class="clear"></div>
								
								<hr>
								
								<?php do_action('plchf_msb_sites_page_below_site_info', $siteid); ?>
							
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