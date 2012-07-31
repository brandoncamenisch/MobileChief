<?php

/* ---------------------------------------------------------------------------- */
/* Add the Menu Page
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_new_site_menu_page() {
		
		add_submenu_page( 
			'pluginchiefmsb', 
			'Create New Site', 
			'Create New Site', 
			'add_users', 
			'pluginchiefmsb/new-site', 
			'pluginchiefmsb_new_site_menu_page_content' 
		);
	
	}
	
	add_action('admin_menu', 'pluginchiefmsb_new_site_menu_page');
	
/* ---------------------------------------------------------------------------- */
/* Create the Menu Page Content
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_new_site_menu_page_content() {
		
		?>
		
		<?php get_pluginchiefmsb_header(); ?>
		
		<div class="pluginchiefmsb-wrapper" id="pluginchiefmsb-wrapper">
		
			<div class="pluginchiefmsb-wrap">
				
				<div class="settings-title">
					
					<h3 class="section-title floatl">Create New Site</h3>
				
					<a class="button-primary floatr" href="<?php bloginfo('url'); ?>/wp-admin/admin.php?page=mobile-sites">Get More Themes</a>
					
				</div>
				
				<div class="clear"></div><!-- Clear -->
				
				<hr>
				
				<div id="sites-list">
				
					<div id="availablethemes">
				
					<?php
					
					global $plchf_msb_themes;
					
					foreach ($plchf_msb_themes as $theme) {
						
						?>
						
						<!-- One Half Div -->
						<div class="available-theme">
							
							<?php 
							
							if ($theme['Screenshot']) {
								$screenshot = $theme['Screenshot'];
							} else {
								$screenshot = 'screenshot.png';
							}
							
							?>
							
							<!-- Theme Screenshot -->
							<img src="<?php echo $theme['Theme Root']; ?><?php echo $screenshot; ?>" alt="<?php echo $theme['Theme Name']; ?>"><br/>
							
							<!-- Theme Name -->
							<h3><?php echo $theme['Theme Name']; ?></h3>
							
							<!-- Theme Author -->
							<div class="theme-author">
								By <a href="<?php echo $theme['Author URL']; ?>" title="Visit Author Home Page"><?php echo $theme['Author Name']; ?></a>
								</div>
								
							<!-- Theme Links -->
							<div class="action-links">
							
								<ul>
								
									<li class="hide-if-no-js"><a href="#TB_inline?height=200&width=400&inlineId=createsitediv_<?php echo $theme['Slug']; ?>" class="thickbox" title="Create Site">Create Site</a></li>
									
									<li class="hide-if-no-js"><a href="#" class="theme-detail" tabindex="4">Details</a></li>	
								
								</ul>
								
								<div class="delete-theme">
								
									<a class="submitdelete deletion" href="#">
											
										Delete Theme
										
									</a>
								
								</div> <!-- End Delete Theme -->
							
							</div> <!-- End Action Links -->
							
							<div class="themedetaildiv hide-if-js">
								
								<!-- Theme Version -->
								<?php 
								
								if ($theme['Version']) {
									$theme_version = $theme['Version'];
								} else {
									$theme_version = 'Unknown';
								}
								
								?>
								
								<p><strong>Version:</strong> <?php echo $theme_version; ?></p>
								
								<hr>

								<!-- Theme Supports -->
								<p><strong>Features:</strong></p>
								
								<ul style="list-style:disc;">
								
									<li style="margin-left:20px;"><strong>Multiple Pages:</strong> <?php echo $theme['Multiple Pages']; ?></li>
									<li style="margin-left:20px;"><strong>Page Elements:</strong> <?php echo $theme['Page Elements']; ?></li>
									<li style="margin-left:20px;"><strong>Settings Panel:</strong> <?php echo $theme['Settings Panel']; ?></li>
								
								</ul>
								
								<hr>
								
								<!-- Theme Description -->
								
								<p><strong>Theme Description:</strong></p>
								
								<p><?php echo $theme['Description']; ?></p>
							
							</div> <!-- End Theme Detail Div -->
							
							<div id="createsitediv_<?php echo $theme['Slug']; ?>" style="display:none;">
								
								<!-- Do Action Before Form -->
								<?php do_action('plchf_msb_before_create_new_site_form'); ?>

								<!-- Create Site Form -->
								<form id="plchf_msb_create_new_site" name="plchf_msb_create_new_site" action="" method="post" style="display:block; margin:0px auto; width:70%;">
								
									<img src="<?php echo $theme['Theme Root']; ?><?php echo $screenshot; ?>" alt="<?php echo $theme['Theme Name']; ?>" style="display:block; margin:0px auto;">
									
									<label><?php echo apply_filters('plchf_msb_new_site_name','Site Name'); ?></label><br/>
									
									<!-- Create New Site Input -->
									<input type="text" value="" name="plchf_msb_create_new_site_site_name">
									
									<!-- Theme Slug -->
									<input type="hidden" value="<?php echo $theme['Theme Slug']; ?>" name="plchf_msb_create_new_site_theme">
									
									<!-- Form Action -->
									<?php do_action('plchf_msb_create_new_site_form_fields'); ?>
									
									<!-- Create Nonce Field -->
									<?php wp_nonce_field('plchf_msb_create_new_site', 'plchf_msb_create_new_site_field'); ?>
									
									<!-- Submit -->
									<button class="button-primary floatl">Create Site</button>
								
								</form> <!-- End Form -->
								
								<!-- After Form Action -->
								<?php do_action('plchf_msb_after_create_new_site_form'); ?>
							
							</div> <!-- End Create Site Div -->
						
						</div> <!-- End Available Theme -->
						
					<?php 
					
					}
					
					?>
				
					</div><!-- /End AvailableThemes -->
				
				</div><!-- End Sites List -->
				
			</div><!-- End Wrap -->
			
		</div><!-- End Wrapper -->
		
		<?php get_pluginchiefmsb_footer(); ?>
		
	<?php
	
	}