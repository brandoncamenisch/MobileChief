<?php

/* ---------------------------------------------------------------------------- */
/* Add the Menu Page
/* ---------------------------------------------------------------------------- */

	function pluginchiefmsb_edit_page_menu_page() {

		add_submenu_page(
			'pluginchiefmsb',
			NULL,
			NULL,
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

		<?php
		$page_id 	=& $_GET['mobilesite_page_id'];

		// Make Sure we're trying to edit an actual site
		if ( ($page_id) && ( get_post_type( $page_id ) == 'pluginchiefmsb-sites') ) {

		?>

		<?php get_pluginchiefmsb_header(); ?>

		<div class="pluginchiefmsb-wrapper" id="pluginchiefmsb-wrapper">

			<div class="pluginchiefmsb-wrap">

				<div class="settings-title">

					<h3 class="section-title floatl">Edit Page</h3>

					<a class="btn btn-primary floatr" href="<?php echo apply_filters('plchf_msb_my_sites_link', get_bloginfo('url') . '/wp-admin/admin.php?page=pluginchiefmsb'); ?>">My Sites</a>

					<!-- Create Site Button -->
					<?php echo apply_filters('plchf_msb_create_new_site_button', '<a class="btn btn-primary floatr" href="'.apply_filters('plchf_msb_new_sites_page', 'admin.php?page=pluginchiefmsb/new-site' ).'">'.apply_filters('plchf_msb_create_new_site_link_text', 'Create New Site').'</a>'); ?>

				</div>

				<div class="clear"></div><!-- Clear -->

				<hr>

				<?php

				pluginchiefmsb_page_elements_menu();

				?>

				<div class="clear"></div><!-- Clear -->

				<!-- Left Column -->
				<div class="two_fifth column">

					<!-- Page Title -->
					<h2><?php echo apply_filters('plchf_msb_page_label', 'Page:'); ?> <?php echo plchf_msb_get_page_title(); ?></h2>

					<hr class="edit-site-page-top">

					<!-- Mobile Page Generator Form -->
					<?php plchf_msb_page_generator(); ?>

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

					<?php plchf_msb_qrcode_preview($page_id); ?>

					<?php plchf_msb_site_shortlink($page_id); ?>

				</div><!-- One Fifth -->

			</div><!-- End PLUGINCHIEFMSB Wrap -->

		</div><!-- End Wrapper -->

		<?php get_pluginchiefmsb_footer(); ?>

		<!-- If the Site ID is invalid -->
		<?php } else { ?>

			<?php

			// Redirect to Mobile Sites Admin Page
			$admin_url = admin_url();
			$url = apply_filters('plchf_msb_mobile_site_page_redirect', $admin_url . 'admin.php?page=pluginchiefmsb');

			wp_redirect( $url );

			?>

		<?php } ?><!-- End Actual Site Check -->

	<?php

	}