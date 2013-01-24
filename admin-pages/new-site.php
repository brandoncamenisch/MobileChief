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

					<a class="btn btn-primary floatr" href="<?php echo apply_filters('plchf_msb_my_sites_link', get_bloginfo('url') . '/wp-admin/admin.php?page=pluginchiefmsb'); ?>">My Sites</a>

				</div>

				<div class="clear"></div><!-- Clear -->

				<hr>

				<div id="sites-list">

					<div id="availablethemes">

					<?php

					global $plchf_msb_themes;

					foreach ($plchf_msb_themes as $themes) {

						foreach ($themes['Theme'] as $theme) { }

						?>

						<!-- One Half Div -->
						<div class="available-theme">

							<?php

							if ($themes['Theme']['Screenshot']) {
								$screenshot = $themes['Theme']['Screenshot'];
							} else {
								$screenshot = 'screenshot.png';
							}

							?>

							<!-- Theme Screenshot -->
							<img src="<?php echo $themes['Theme']['Theme Root']; ?><?php echo $screenshot; ?>" alt="<?php echo $theme_name; ?>"><br/>

							<!-- Theme Name -->
							<h3><?php echo $themes['Theme']['Theme Name'];; ?></h3>

							<!-- Theme Author -->
							<div class="theme-author">
								By <a href="<?php echo $themes['Theme']['Author URL']; ?>" title="Visit Author Home Page"><?php echo $themes['Theme']['Author Name']; ?></a>
								</div>

							<!-- Theme Links -->
							<div class="action-links">

								<ul>

									<li class="hide-if-no-js"><a href="#TB_inline?height=400&width=400&inlineId=createsitediv_<?php echo $themes['Theme']['Slug']; ?>" class="thickbox button" title="Create Site">Create Site</a></li>

									<li class="hide-if-no-js"><a href="#" class="theme-detail button" tabindex="4">Details</a></li>

								</ul>

							</div> <!-- End Action Links -->

							<div class="themedetaildiv hide-if-js">

								<!-- Theme Version -->
								<?php

								if ($themes['Theme']['Version']) {
									$theme_version = $themes['Theme']['Version'];
								} else {
									$theme_version = 'Unknown';
								}

								?>

								<p><strong>Version:</strong> <?php echo $theme_version; ?></p>

								<hr>

								<!-- Theme Description -->

								<p><strong>Theme Description:</strong></p>

								<p><?php echo $themes['Theme']['Description']; ?></p>

							</div> <!-- End Theme Detail Div -->

							<div id="createsitediv_<?php echo $themes['Theme']['Slug']; ?>" style="display:none;">

								<!-- Do Action Before Form -->
								<?php do_action('plchf_msb_before_create_new_site_form'); ?>

								<!-- Create Site Form -->
								<form id="plchf_msb_create_new_site" name="plchf_msb_create_new_site" action="" method="post" style="display:block; margin:0px auto; width:70%;">

									<img src="<?php echo $themes['Theme']['Theme Root']; ?><?php echo $screenshot; ?>" alt="<?php echo $themes['Theme']['Theme Name']; ?>" style="display:block; margin:0px auto;">

									<label><?php echo apply_filters('plchf_msb_new_site_name','Site Name'); ?></label><br/>

									<!-- Create New Site Input -->
									<input type="text" value="" name="plchf_msb_create_new_site_site_name">

									<!-- Slug -->
									<input type="hidden" value="<?php echo $themes['Theme']['Slug']; ?>" name="plchf_msb_create_new_site_theme">

									<!-- Form Action -->
									<?php do_action('plchf_msb_create_new_site_form_fields'); ?>

									<!-- Create Nonce Field -->
									<?php wp_nonce_field('plchf_msb_create_new_site', 'plchf_msb_create_new_site_field'); ?>

									<!-- Submit -->
									<button class="btn btn-primary floatl">Create Site</button>

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