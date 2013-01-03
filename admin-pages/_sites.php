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

					<!-- Create Site Button -->
					<?php echo apply_filters('plchf_msb_create_new_site_button', '<a class="btn btn-primary floatr" href="'.apply_filters('plchf_msb_new_sites_page', 'admin.php?page=pluginchiefmsb/new-site' ).'">'.apply_filters('plchf_msb_create_new_site_link_text', 'Create New Site').'</a>'); ?>

				</div>

				<div class="clear"></div><!-- Clear -->

				<?php do_action('plchf_msb_my_sites_below_page_title'); ?>

				<div id="sites-list">
					<?php
					$pluginchiefmsb_args = array(
						'post_type' 		=> 'pluginchiefmsb-sites',
						'post_parent'		=> 0,
						'posts_per_page'=> -1,
					);

					// Run Args through a filter
					$pluginchiefmsb_args = apply_filters('plchf_msb_sites_page_args', $pluginchiefmsb_args);

					$sites = get_posts( $pluginchiefmsb_args );

					if ($sites) {

						foreach ( $sites as $site ) {

						$home_id 	= get_post_meta($site->ID, '_homepage_', true);
						$site_theme = get_post_meta($site->ID, '_plchf_msb_site_theme', true);
						$site_theme = ucwords(str_ireplace('_',' ', $site_theme));

						$siteid = $site->ID;

						?>

							<div id="site-name" class="widget" data-redirectafterdelete="<?php echo apply_filters('plchf_msb_my_sites_link', get_bloginfo('url') . '/wp-admin/admin.php?page=pluginchiefmsb'); ?>" data-widgetid="<?php echo $site->ID; ?>" data-siteid="<?php echo $site->ID; ?>">

								<div class="widget-top">

									<div class="widget-title-action">

										<a class="widget-action hide-if-no-js" href="#"></a>

									</div><!-- / Widget Title Action -->

									<div class="widget-title">

										<h4><i class="icon-globe">&nbsp;</i><?php echo $site->post_title; ?></h4>

									</div><!-- / Widget Title -->

								</div><!-- / Widget Top -->

								<div class="module-inside" style="display:none;">

									<?php do_action('plchf_msb_my_sites_above_site_title'); ?>

									<div class="clear"></div><!-- Clear -->

									<?php do_action('plchf_msb_my_sites_below_site_title', $siteid); ?>


									<div class="clear"></div>

									<?php do_action('plchf_msb_sites_page_above_site_info', $siteid); ?>

									<div class="clear"></div>

									<div class="one_fourth">

										<?php plchf_msb_qrcode_preview($home_id); ?>

										<?php plchf_msb_site_shortlink($home_id); ?>

									</div>

									<div class="three_fourth column-last">

										<div class="one_half">

											<?php do_action('plchf_msb_sites_center_column', $siteid); ?>

										</div>

										<div class="one_half column-last">

											<?php do_action('plchf_msb_sites_right_column', $siteid); ?>

										</div>

									</div>

									<div class="clear"></div>

									<?php do_action('plchf_msb_sites_page_below_site_info', $siteid); ?>

								</div><!-- / Module Inside -->

							</div><!-- /Widget -->

						<?php

						}

					} else {

					?>

					<!-- If No Sites Exist -->

						<div class="no-sites">

							<?php

								$no_site_message  = '<h1>Oh No! You Don\'t Have any Mobile Sites!';
								$no_site_message .= '<h3>Go Ahead and Create One. It\'s Easy!</h3>';

								$output  = apply_filters('plchf_no_site_message', $no_site_message);

								$output .= apply_filters('plchf_msb_create_new_site_button', '<a class="btn btn-primary floatr" href="'.apply_filters('plchf_msb_new_sites_page', 'admin.php?page=pluginchiefmsb/new-site' ).'">'.apply_filters('plchf_msb_create_new_site_link_text', 'Create New Site').'</a>');

								echo apply_filters('plchf_msb_no_sites_message', $output);

							?>

						</div>

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