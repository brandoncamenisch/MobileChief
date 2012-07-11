<?php

/* ---------------------------------------------------------------------------- */
/* Add the Menu Page
/* ---------------------------------------------------------------------------- */

	function pluginchief_mobile_site_builder_menu() {
		
		add_menu_page(
			'Mobile Site Builder', 
			'Mobile Site Builder', 
			'add_users', 
			'pluginchiefmsb.php', 
			'mobile_site_builder_settings',   
			PLUGINCHIEFMSB . '/images/msb-icon.png', 
			80
		);
	
	}
	
	add_action('admin_menu', 'pluginchief_mobile_site_builder_menu');
	
/* ---------------------------------------------------------------------------- */
/* Create the Menu Page
/* ---------------------------------------------------------------------------- */

function mobile_site_builder_settings() {
?>

	<?php get_pluginchiefmsb_header(); ?>
	
	<script type="text/javascript">
		
		jQuery(document).ready(function($){
			
			function pluginchiefmsb_settings_page_panels(){
				
				$('.pluginchiefmsb-options-content-inside').hide();
				$('.pluginchief_mobile_site_builder').show();
				
				$('.pluginchiefmsb-settings-page-anchor').click(function(){
					
					var anchorPage = $(this).attr('data-page');
					
					$('.pluginchiefmsb-options-content-inside').fadeOut(300);
					$('.' + anchorPage + '').delay(300).fadeIn();
					
				});
				
			}
			
			pluginchiefmsb_settings_page_panels();
			
		});
		 
	
	</script>

	<div class="pluginchiefmsb-wrapper" id="pluginchiefmsb-wrapper">
	
		<div class="pluginchiefmsb-wrap">
	
			<form method="post" enctype="multipart/form-data" action="" id="pluginchiefmsb-options" name="pluginchiefmsb-options">
			
				<div class="pluginchiefmsb-options-header">
				
					<div class="pluginchiefmsb-options-header-inside">
					
						<div class="one_half">
					
							<h2>Settings</h2>
						
						</div>
						
						<div class="one_half column-last">
							
							<a class="button-primary floatr" href="#" class="pluginchiefmsb-save-options">Save Changes</a>
							
						</div>
						
						<div class="clear"></div>
					
					</div><!-- End Theme Options Header Inside -->
				
				</div><!-- End Theme Options Header -->
				
				<div class="pluginchiefmsb-options-body">
					
					<div class="pluginchiefmsb-options-menu">
						
						<ul>
							<?php 
								
							global $pluginchiefmsb_admin_pages, $pluginchiefmsbdir;
								
							?>
							
							<?php foreach ($pluginchiefmsb_admin_pages as $pluginchiefmsb_admin_page) { ?>
							
							<?php
								
								// Set Default Icon for Menu Items
								if ($pluginchiefmsb_admin_page['menu_icon']) {
									$icon = $pluginchiefmsb_admin_page['menu_icon'];	
								} else {
									$icon = ''.$pluginchiefmsbdir.'/images/pluginchiefmsb-icon.png';
								}
							
							?>
						
								<li class="pluginchiefmsb-settings-page-anchor" data-page="<?php echo strtolower(str_replace(' ', '_', $pluginchiefmsb_admin_page['page'])); ?>">
									<span><img src="<?php echo $icon; ?>" alt="Menu Icon"></span>
									<a href="#"><?php echo $pluginchiefmsb_admin_page['page']; ?></a>
								</li>
						
							<?php } ?><!-- End Foreach -->
						
						</ul>
						
					</div><!-- End Options Menu -->
					
					<div class="pluginchiefmsb-options-content">
					
						<?php 
							
						global $pluginchiefmsb_admin_pages;
							
						?>
						
						<?php foreach ($pluginchiefmsb_admin_pages as $pluginchiefmsb_admin_page) { ?>
					
							<div class="pluginchiefmsb-options-content-inside <?php echo strtolower(str_replace(' ', '_', $pluginchiefmsb_admin_page['page'])); ?>">
							
								<h2><?php echo $pluginchiefmsb_admin_page['page']; ?></h2>
								
								<hr>
								
								<!-- Setup the Form Fields for the Options Pages -->
								
								<?php
								
								foreach ($pluginchiefmsb_admin_page['fields'] as $pluginchiefmsb_admin_page_field) {
									
									require_once(PLUGINCHIEFMSB_PATH . '/settings-page-elements/elements/'.$pluginchiefmsb_admin_page_field['type'].'.php');
									
								}
								
								?>
								
								<!-- End Setup the Form Fields for the Options Pages -->
							
							</div>
							
							<div class="clear"></div>
					
						<?php } ?><!-- End Foreach -->
					
					</div><!-- End Options Content -->
				
				</div><!-- End Options Body -->
				
				<div class="pluginchiefmsb-options-footer">
				
					<div class="pluginchiefmsb-options-footer-inside">
					
						<div class="one_half">
					
							<h2>Settings</h2>
						
						</div>
						
						<div class="one_half column-last">
							
							<a class="button-primary floatr" href="#" class="pluginchiefmsb-save-options">Save Changes</a>
							
						</div>
						
						<div class="clear"></div>
					
					</div><!-- End Theme Options Footer Inside -->
				
				</div><!-- End Theme Options Footer -->
			
			</form><!-- End VZMSB Options Form -->

		</div>
		
	</div>
	
	<?php get_pluginchiefmsb_footer(); ?>
	
<?	
}