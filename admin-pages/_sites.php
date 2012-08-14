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
						'post_type' => 'pluginchiefmsb-sites'
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
							
							<a class="button-primary floatr" href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=pluginchiefmsb/edit-site&site_id=<?php echo $site->ID; ?>">Edit Site Settings</a>
							
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

	<?php 
		
	}