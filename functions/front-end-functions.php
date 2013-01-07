<?php

/* ----------------------------------------------------------------------------
	Enqueue Styles & Scripts to Front End Pages
---------------------------------------------------------------------------- */

	function plchf_msb_front_end_enqueue_styles_and_scripts() {

		global $post, $wp_query, $plchf_msb_options;

		if ($post) {

			// Get the Post ID
			$postid = $wp_query->post->ID;

		}

		// Get Front End Page IDs
		$edit_page_id 	= $plchf_msb_options['_edit_page_page_'];
		$edit_site_id 	= $plchf_msb_options['_edit_site_page_'];
		$my_sites_id 	= $plchf_msb_options['_my_sites_page_'];
		$new_site_id 	= $plchf_msb_options['_new_sites_page_'];

		// Don't Run on Admin Pages
		if (!is_admin()) {

			// Check if Page is one of the Pages selected in the Plugin Settings Panel
			if ( is_page($edit_page_id) || is_page($edit_site_id) || is_page($my_sites_id) || is_page($new_site_id) ) {

        		// Calls the function that enqueues the default style and scripts
        		plchf_msb_enqueue_plugin_scripts_and_styles();

        		// Enqueue Additional Scripts
        		wp_enqueue_script('plchf_msb_front_end_js', PLUGINCHIEFMSB . 'js/scripts/front-end.js');

        	} else {

        	}

        }

    }

    add_action( 'wp_enqueue_scripts', 'plchf_msb_front_end_enqueue_styles_and_scripts' );
    add_action( 'admin_enqueue_scripts', 'plchf_msb_front_end_enqueue_styles_and_scripts' );

/* ----------------------------------------------------------------------------
	Record Users Login time
---------------------------------------------------------------------------- */

	function plchf_msb_front_end_record_user_last_login($login) {

		global $user_ID;
		$user = get_userdatabylogin($login);
		update_usermeta( $user->ID, '_plchf_msb_last_login_', current_time('timestamp') );

	}

	add_action('wp_login','plchf_msb_front_end_record_user_last_login');

/* ---------------------------------------------------------------------------- */
/* Filters the Link for the Create New Site Page
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_switch_create_new_site_link($link) {

		global $post, $plchf_msb_options;

		// Get Edit Page Option Value
		$new_site_id = $plchf_msb_options['_new_sites_page_'];

		if (!is_admin()) {

			$link = get_permalink($new_site_id);

		}

		return $link;

	}

	add_filter('plchf_msb_new_sites_page', 'plchf_msb_front_end_switch_create_new_site_link');

/* ---------------------------------------------------------------------------- */
/* Filters the Link for the Edit Site Page
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_switch_edit_site_link() {

		global $post, $plchf_msb_options;

		// Get Edit Page Option Value
		$edit_site_id = $plchf_msb_options['_edit_site_page_'];


		if (!is_admin()) {

			$link = get_permalink($edit_site_id);

		}

		return $link;

	}

	add_filter('plchf_msb_edit_sites_page', 'plchf_msb_front_end_switch_edit_site_link', 1);

/* ---------------------------------------------------------------------------- */
/* Filters the Link for the Edit Page Link
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_switch_edit_page_link($link) {

		global $post, $plchf_msb_options;

		// Get Edit Page Option Value
		$edit_page_id = $plchf_msb_options['_edit_page_page_'];

		if (!is_admin()) {

			$output .= get_permalink($edit_page_id);

		} else {

			$output .= $link;

		}

		return $output;

	}

	add_filter('plchf_msb_edit_page_page', 'plchf_msb_front_end_switch_edit_page_link');

/* ---------------------------------------------------------------------------- */
/* Filters the Redirect URL for the Edit Page & Edit Sites Pages
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_switch_my_site_redirect_url() {

		global $post, $plchf_msb_options;

		// Get Edit Page Option Value
		$my_sites_id = $plchf_msb_options['_my_sites_page_'];

		if (!is_admin()) {

			return get_permalink($my_sites_id);

		}

	}

	add_filter('plchf_msb_mobile_site_page_redirect','plchf_msb_front_end_switch_my_site_redirect_url');

/*-----------------------------------------------------------------------------------*/
/* Restrict Media Library to just the files uploaded by that user
/*-----------------------------------------------------------------------------------*/

	function my_files_only( $wp_query ) {

	    if ( strpos( $_SERVER[ 'REQUEST_URI' ], '/wp-admin/media-upload.php' ) !== false ) {

		    // For All Users Below Level 10 (Admin)
		    if ( !current_user_can( 'level_10' ) ) {

			    global $current_user;
			    $wp_query->set( 'author', $current_user->id );

			}

	    }

	}

	add_filter('parse_query', 'my_files_only' );

/*-----------------------------------------------------------------------------------*/
/* Filter out the Images link in the uploader that shows total library quantity
/*-----------------------------------------------------------------------------------*/

	function plchf_msb_front_end_remove_mime_type_links() {

		// Don't Run on Admin Pages
		if (!is_admin()) {

			return array('','');

		}

	}

	add_filter('media_upload_mime_type_links','plchf_msb_front_end_remove_mime_type_links');

/*-----------------------------------------------------------------------------------*/
/* Redirect after Create Site Filter
/*-----------------------------------------------------------------------------------*/

	function plchf_msb_front_end_redirect_after_create_site($new_site) {

		global $post, $wp_query, $plchf_msb_options;

		$edit_site_id = $plchf_msb_options['_edit_site_page_'];

		if (!is_admin()) {
			return get_permalink($edit_site_id) . '?mobilesite_site_id='.$new_site;
		} else {
			return $new_site;
		}

	}

	add_filter('plchf_msb_redirect_after_create_site','plchf_msb_front_end_redirect_after_create_site', 1000, 1);

/*-----------------------------------------------------------------------------------*/
/* Get Page ID on the Front End
/*-----------------------------------------------------------------------------------*/

	function plchf_msb_front_end_get_page_id($page) {

		global $post, $wp_query, $plchf_msb_options;

		if ($post) {

			// Get the Post ID
			$postid = $wp_query->post->ID;

		}

		// Get Front End Page IDs
		$edit_page_id 	= $plchf_msb_options['_edit_page_page_'];
		$edit_site_id 	= $plchf_msb_options['_edit_site_page_'];
		$my_sites_id 	= $plchf_msb_options['_my_sites_page_'];
		$new_site_id 	= $plchf_msb_options['_new_sites_page_'];

		if (!is_admin()) {

			if ( ($edit_page_id == $postid) || ($edit_site_id == $postid) || ($my_sites_id == $postid) || ($new_site_id == $postid) ) {

				$output .= $_GET['mobilesite_page_id'];

			} else {

				$output = $page;

			}

		} else {

			$output = $page;

		}

		return $output;

	}

	add_filter('plchf_msb_get_page_id_filter','plchf_msb_front_end_get_page_id', 10);


/*-----------------------------------------------------------------------------------*/
/* My Sites Link Filter
/*-----------------------------------------------------------------------------------*/

	function plchf_msb_front_end_my_sites_link($link){

		global $post, $wp_query, $plchf_msb_options;

		$my_sites_id = $plchf_msb_options['_my_sites_page_'];

		if (!is_admin()) {

			$output = get_permalink($my_sites_id);

		} else {

			$output = $link;

		}

		return apply_filters('plchf_msb_front_end_my_sites_link_filter', $output);

	}

	add_filter('plchf_msb_my_sites_link','plchf_msb_front_end_my_sites_link', 10, 1);

/*-----------------------------------------------------------------------------------*/
/* Output Custom Styles in the Header
/*-----------------------------------------------------------------------------------*/

	function plchf_msb_front_end_custom_css(){

		global $post, $wp_query, $plchf_msb_options;

		if ($post) {

			// Get the Post ID
			$postid = $wp_query->post->ID;

		}

		// Get Front End Page IDs
		$edit_page_id 	= $plchf_msb_options['_edit_page_page_'];
		$edit_site_id 	= $plchf_msb_options['_edit_site_page_'];
		$my_sites_id 	= $plchf_msb_options['_my_sites_page_'];
		$new_site_id 	= $plchf_msb_options['_new_sites_page_'];
		$custom_css		= $plchf_msb_options['_custom_css_'];

		// Don't Run On Admin
		if (!is_admin()) {

			// Run on just the three Mobile Site Builder Pages
			if ( ($edit_page_id == $postid) || ($edit_site_id == $postid) || ($my_sites_id == $postid) || ($new_site_id == $postid) ) {

				// Run if CSS exists
				if ($custom_css) {

					$output .= '<style type="text/css">';
						$output .= $custom_css;
					$output .= '</style>';

					echo apply_filters('plchf_msb_front_end_custom_css_filter', $output);

				}

			}

		}

	}

	add_action('wp_head','plchf_msb_front_end_custom_css');

/* ----------------------------------------------------------------------------
	Hooks into the Site Creation to add some
	additional Meta Fields for Front End uses
---------------------------------------------------------------------------- */

	function plchf_msb_front_end_add_additional_meta_on_site_creation($new_site) {

		// Get Specific Stripe Settings
		$stripe_testmode			= $stripe_options['testmode'];
		$stripe_secret 				= $stripe_options['secret_key'];
		$stripe_publishable 		= $stripe_options['publishable_key'];
		$stripe_test_secret 		= $stripe_options['test_secret_key'];
		$stripe_test_publishable 	= $stripe_options['test_publishable_key'];

		// Set Test or Live Stripe Keys depending on Test or Live
		if ($stripe_testmode != 'yes') {
			$stripe_publishable = $stripe_publishable;
			$stripe_secret		= $stripe_secret;
		} else {
			$stripe_publishable = $stripe_test_publishable;
			$stripe_secret		= $stripe_test_secret;
		}

		// Get Site Theme
		$sitetheme = get_post_meta($new_site, '_plchf_msb_site_theme', true);

		// Get Time Period Purchased on Product Purchase
		$attached_qr = get_post_meta($new_site, '_attached_qrcode_', true);

		// Order that generated the QR Code
		$orderid = get_post($attached_qr)->post_parent;

		// Check to see if Additional Time was purchased with the site
		$order_items = (array) maybe_unserialize( get_post_meta($orderid, '_order_items', true) );

		// Loop Through the Order items
		foreach ($order_items as $item) {

			// Get the Item Meta
			$item_meta	= $item['item_meta'];

			// Loop through the Item Meta
			foreach ($item_meta as $imeta) {

				// Check Site Hosting Plan
				// 1 Month
				if ($imeta['meta_value'] == 'Add 1 Additional Month') {

					// Set added Time to 30 Days
					$added_time = 30;

				// 6 Months
				} else if ($imeta['meta_value'] == 'Add 6 Additional Months') {

					// Set added Time to 180 Days
					$added_time = 180;

				// 1 Year
				} else if ($imeta['meta_value'] == 'Add 12 Additional Months') {

					// Set added Time to 365 Days
					$added_time = 365;

				} else if ($imeta['meta_value'] == 'Add 12 Additional Months') {

					$userid = get_current_user_id();

					// Update Site Meta to show it's a Subscription Site
					update_post_meta($new_site, '_subscription_site', 'yes');

					// Get Saved Stripe ID
					$stripe_id = get_user_meta($userid, '_stripe_customer_id', true);

					// Count Sites that are Subscriptions
					$sitecount = count(get_posts('post_type=pluginchiefmsb-sites&meta_key=_subscription_site&meta_value=yes&post_parent=0&author='.$userid.'&posts_per_page=-1&numberposts=-1'));

					Stripe::setApiKey($stripe_secret);
					// Update User To Appropriate Subsicription Level
					// ============================================= -->
					$customer = Stripe_Customer::retrieve($stripe_id);
					$customer->updateSubscription(array(
						"plan" => "Mobile Sites - ".$sitecount."")
					);

				} else {

					$added_time = 0;

				}

			}

		}

		// We Only Need to Do this if the Site is NOT a Pet, Realtor or Memorial Theme
		if ( ($sitetheme != 'aqropolis_pet_theme') && ($sitetheme != 'aqropolis_memorial_theme') && ($sitetheme != 'aqropolis_memorial_theme') ) {

			global $post, $wp_query, $plchf_msb_options;

			// Get Timestamp for Start Date
			$start_date = strtotime("now");

			// Get Options Panel Data to see if there's a trial period, and if so,
			// create the end-date based on the trial period, otherwise the standard is 14 Days
			$trial_period_days = $plchf_msb_options['_trial_period_days_'];

			if ($trial_period_days) {
				$trial_period_days = $trial_period_days+$added_time;
			} else {
				$trial_period_days = 14+$added_time;
			}

			// Calculate Trial Period Days, and add them to the start date, to create the expiration date

				// 24x60x60 = a day in seconds
				$day_in_seconds = (24*60*60);

				// End Date is equal to start date, plus trial period days times a day in seconds
				$end_date = ($start_date + ($day_in_seconds*$trial_period_days));

			// Update Subscription Start Date
			update_post_meta($new_site, '_subscription_start_date_', $start_date);

			// Update Subscription End Date
			update_post_meta($new_site, '_subscription_end_date_', $end_date);

		}

	}

	add_action('plchf_msb_after_create_new_site', 'plchf_msb_front_end_add_additional_meta_on_site_creation', 10, 1);

/* ----------------------------------------------------------------------------
	 Adds Plupload scripts too front end
---------------------------------------------------------------------------- */

	add_action('wp_head', 'plchf_msb_plupload_admin_head');

/* ---------------------------------------------------------------------------- */
/* Show Status Bar In Various Places Indicating Site Expiration
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_time_left_in_account_status($siteid) {

		// Get Site Theme
		$sitetheme = get_post_meta($siteid, '_plchf_msb_site_theme', true);

		global $post;

		// Get Stripe Settings
		$stripe_options		= get_option('woocommerce_stripe_settings');

		$meta 				= get_post_custom($siteid);
		$activation_date 	= $meta['_subscription_start_date_'][0];
		$expiration_date 	= $meta['_subscription_end_date_'][0];

		// Check to see if Activation & Expiration dates are set for the site
		if ( ($activation_date != '') && ($expiration_date != '') ) {

			$output .= '<div class="well">';

			$output .= $stripe_test_secret;

			// Calculate total time period of the site
			$total_time_seconds 	= ($expiration_date - $activation_date);
			$total_time_days 		= ($total_time_seconds/60/60/24);
			$total_time_formatted 	= round($total_time_days, 0, PHP_ROUND_HALF_UP);

			// Calculate Days Left
			$now_seconds		= strtotime("now");
			$days_left_seconds 	= ($expiration_date - $now_seconds);
			$days_left_days		= ($days_left_seconds/60/60/24);
			$days_left_formatted= round($days_left_days, 0, PHP_ROUND_HALF_UP);

			// Calculate Percentage of time left
			$percentage_left = ($days_left_formatted/$total_time_formatted);
			$percentage_left = ($percentage_left*100);

			// Set the Progress Bar Class based on Percentage of Time Left on the Site
			if ($percentage_left > 75) {
				$progress_class = ' bar-success';
			} else if ($percentage_left > 25 && $percentage_left < 75) {
				$progress_class = ' bar-warning';
			} else if ($percentage_left < 25 ) {
				$progress_class = ' bar-danger';
			}

			// Get the Activation Date / Subscription Start Date
			$activation_date_formatted = date('m/d/Y', $activation_date);
			$expiration_date_formatted = date('m/d/Y', $expiration_date);

			$output .= '<div class="row-fluid">';
				$output .= '<div class="span8">';
					$output .= '<p>';

					$output .= '<strong>Site Hosting Period:</strong> '.$total_time_formatted.' Days <br/>';
					$output .= '<strong>Site Activated:</strong> '.$activation_date_formatted.' <br/> ';
					$output .= '<strong>Expires:</strong> '.$expiration_date_formatted.' <br/> ';
					$output .= '<strong>Time Left:</strong> '.$days_left_formatted.' Days';

					$output .= '<p>';
				$output .= '</div>';

				$output .= '<div class="span4">';
						$output .= apply_filters('plchf_msb_front_end_site_payment_button', $siteid);
				$output .= '</div>';

			$output .= '</div>';
			$output .= '<div class="clear"></div>';
			$output .= apply_filters('plchf_msb_front_end_purchase_more_time_gateway', $siteid);
			$output .= '<div class="clear"></div>';
				if ($percentage_left != 0) {
					$output .= '<div class="progress progress-striped active">';
					$output .= '<div class="bar'.$progress_class.'" style="width: '.$percentage_left.'%;"></div>';
					$output .= '</div>';
				} else {
					$output .= '<h4>Uh Oh. Your site has expired!</h4>';
				}
			$output .= '</div>';

			// Don't Run On Admin
			if (!is_admin()) {

				// We Only Need to Do this if the Site is NOT a Realtor, Pet or Memorial Theme
				if ( ($sitetheme != 'aqropolis_pet_theme') && ($sitetheme != 'aqropolis_memorial_theme') && ($sitetheme != 'aqropolis_memorial_theme') ) {

					echo apply_filters('plchf_msb_front_end_time_left_in_account_status_filter', $output, $siteid);

				}

			}

		}

	}

	// Add the data to the Sites box on the My Sites Page
	add_action('plchf_msb_sites_page_below_site_info', 'plchf_msb_front_end_time_left_in_account_status', 15, 1);

/* ---------------------------------------------------------------------------- */
/* Add description of the Product to the Right Column of the Sites Page
/* ---------------------------------------------------------------------------- */

	function plchf_msb_ad_product_description_below_qrcode_site($siteid) {

		// Get the Connected QR Code ID
		$qrcode = get_post_meta($siteid, '_attached_qrcode_', true);

		// Get the Product that Generated the QR Code
		$product = get_post_meta($qrcode, '_attached_product_', true);

		// Get Post Time
		$date_time = get_post_time( 'l, F j, Y', false, get_post($qrcode)->post_parent );

		if ($product) {

			// Get the Description of the Product
			$output = '<div class="well">';
				$output .= '<h3>This QR Code is connected to: '.get_post($product)->post_title.' purchased '.$date_time.'</h3>';
			$output .= '</div>';

		}

		echo apply_filters('plchf_msb_product_description_on_sites_page', $output);

	}

	add_action('plchf_msb_sites_page_above_site_info', 'plchf_msb_ad_product_description_below_qrcode_site', 15, 1);


/* ---------------------------------------------------------------------------- */
/* Adds Stripe Payment link to the
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_purchase_more_time_buttons($siteid) {

		global $post, $plchf_msb_options;

		// Get Stripe Settings
		$stripe_options				= get_option('woocommerce_stripe_settings');

		// Get Specific Stripe Settings
		$stripe_testmode			= $stripe_options['testmode'];
		$stripe_secret 				= $stripe_options['secret_key'];
		$stripe_publishable 		= $stripe_options['publishable_key'];
		$stripe_test_secret 		= $stripe_options['test_secret_key'];
		$stripe_test_publishable 	= $stripe_options['test_publishable_key'];

		// Set Test or Live Stripe Keys depending on Test or Live
		if ($stripe_testmode != 'yes') {
			$stripe_publishable = $stripe_publishable;
			$stripe_secret		= $stripe_secret;
		} else {
			$stripe_publishable = $stripe_test_publishable;
			$stripe_secret		= $stripe_test_secret;
		}

		// Get Tier Thresholds (Amount of Views for Each Threshold)
		// Tier 1 is between 0 and the Tier 2 threshold,
		// Tier 2 is between Tier 2 & 3 thresholds,
		// Tier 3 is above Tier 3 threshold
		$tier2_threshold 	= $plchf_msb_options['_tier2_threshold'];
		$tier3_threshold 	= $plchf_msb_options['_tier3_threshold'];

		// Get Tiered Options for Pricing (3 Plans, 3 Tiers = 9 Price options)
		$tier1_30days 	= $plchf_msb_options['_tier1_30days'];
		$tier1_180days 	= $plchf_msb_options['_tier1_180days'];
		$tier1_365days 	= $plchf_msb_options['_tier1_365days'];

		$tier2_30days 	= $plchf_msb_options['_tier2_30days'];
		$tier2_180days 	= $plchf_msb_options['_tier2_180days'];
		$tier2_365days 	= $plchf_msb_options['_tier2_365days'];

		$tier3_30days 	= $plchf_msb_options['_tier3_30days'];
		$tier3_180days 	= $plchf_msb_options['_tier3_180days'];
		$tier3_365days 	= $plchf_msb_options['_tier3_365days'];

		// Get the SiteViews
		// -------------------------------------------------------------- //
		// Need a Function to get the last 30 Days site views (from Stats Add-On)
		// -------------------------------------------------------------- //

		$siteviews = 999;

		// If SiteViews are below the Tier 2 Threshold
		if ($siteviews < $tier2_threshold) {

			$plan_30_days 	= $tier1_30days;
			$plan_180_days 	= $tier1_180days;
			$plan_365_days 	= $tier1_365days;

		// If SiteViews are between the Tier 2 & Tier 3 Threshold
		} else if ($siteviews >= $tier2_threshold && $siteviews <= $tier3_threshold) {

			$plan_30_days 	= $tier2_30days;
			$plan_180_days 	= $tier2_180days;
			$plan_365_days 	= $tier2_365days;

		// If SiteViews are above the Tier 3 Threshold
		} else if ($siteviews > $tier3_threshold) {

			$plan_30_days 	= $tier3_30days;
			$plan_180_days 	= $tier3_180days;
			$plan_365_days 	= $tier3_365days;

		}

		// Output the Buttons for the Plans
		$output .= '<div class="floatr">';
			$output .= '<div class="btn-group floatr">';
				$output .= '<a class="btn btn-primary" href="#">';
			    	$output .= 'Buy More Time';
			    $output .= '</a>';
			    $output .= '<a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">';
			    	$output .= '<i class="icon-arrow-down"></i>';
			    $output .= '</a>';
			    $output .= '<ul class="dropdown-menu">';

			    	$output .= '<li>';
			    		$output .= '<a href="#" class="plchf_buymoretime" data-days="30" data-site_id="'.$siteid.'" data-price="'.$plan_30_days.'">30 Days - '.$plan_30_days.'</a>';
			    	$output .= '</li>';
			    	$output .= '<li>';
			    		$output .= '<a href="#" class="plchf_buymoretime" data-days="180" data-site_id="'.$siteid.'" data-price="'.$plan_180_days.'">180 Days - '.$plan_180_days.' (One Month FREE)</a>';
			    	$output .= '</li>';
			    	$output .= '<li>';
			    		$output .= '<a href="#" class="plchf_buymoretime" data-days="365" data-site_id="'.$siteid.'" data-price="'.$plan_365_days.'">365 Days - '.$plan_365_days.' (2 Months FREE)</a>';
			    	$output .= '</li>';

			    $output .= '</ul>';
			$output .= '</div>';
		$output .= '</div>';

		$output .= '<div class="clear"></div>';

		return $output;

	}

	add_filter('plchf_msb_front_end_site_payment_button','plchf_msb_front_end_purchase_more_time_buttons', 10, 1);

/* ---------------------------------------------------------------------------- */
/* Show Payment Form for Buying More Time for Sites
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_purchase_more_time_gateway($siteid) {

		$credit_cards = get_user_meta( get_current_user_id(), '_stripe_customer_id', false );

		$output .= '<div class="well plchf_buymoreform">';
			$output .= '<form name="plchf_msb_front_end_buy_more_time" class="credit_card" action="" method="post">';
				$output .= '<h3>Additional <span class="additional_time_'.$siteid.'"></span> Days: <span class="additional_time_price_'.$siteid.'"></span></h3>';
				$output .= '<input type="hidden" class="tier_'.$siteid.'" name="plan_tier" value="">';
				$output .= '<input type="hidden" class="days_'.$siteid.'" name="plan_days" value="">';
				$output .= '<input type="hidden" class="siteid_'.$siteid.'" name="siteid" value="'.$siteid.'">';
				$output .= '<input type="hidden" class="price_'.$siteid.'" name="price" value="">';
				$output .= '<input type="submit" class="btn btn-primary" value="Buy Now">';
				$output .= wp_nonce_field('plchf_msb_front_end_purchase_more_time', 'plchf_msb_front_end_purchase_more_time');
			$output .= '</form>';
		$output .= '</div>';

		// Don't Run On Admin
		if (!is_admin()) {

			return $output;

		}

	}

	add_filter('plchf_msb_front_end_purchase_more_time_gateway', 'plchf_msb_front_end_purchase_more_time_gateway', 10, 1);

/* ---------------------------------------------------------------------------- */
/* Process Transaction with Stripe and add more time to the Site Subscription
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_stripe_process_additional_site_hosting() {

		// Make Sure Form was Actually submitted by user, on WordPress
		if(isset($_POST['plchf_msb_front_end_purchase_more_time']) && wp_verify_nonce($_POST['plchf_msb_front_end_purchase_more_time'], 'plchf_msb_front_end_purchase_more_time')) {

			global $post, $plchf_msb_options;

			// Get Post Data from the form
			$site_id 	= $_POST['siteid'];
			$price 		= $_POST['price'];
			$tier 		= $_POST['plan_tier'];
			$days 		= $_POST['plan_days'];

			// Get Stripe Settings
			$stripe_options				= get_option('woocommerce_stripe_settings');

			// Get Specific Stripe Settings
			$stripe_testmode			= $stripe_options['testmode'];
			$stripe_secret 				= $stripe_options['secret_key'];
			$stripe_publishable 		= $stripe_options['publishable_key'];
			$stripe_test_secret 		= $stripe_options['test_secret_key'];
			$stripe_test_publishable 	= $stripe_options['test_publishable_key'];

			// Set Test or Live Stripe Keys depending on Test or Live
			if ($stripe_testmode != 'yes') {
				$stripe_publishable = $stripe_publishable;
				$stripe_secret		= $stripe_secret;
			} else {
				$stripe_publishable = $stripe_test_publishable;
				$stripe_secret		= $stripe_test_secret;
			}

			// Save Plan to User's Stripe Subscription Meta
			$userid = get_current_user_id();

			// Get User's Existing Stripe Payment Plans
			$plans = get_user_meta($userid, '_stripe_payment_plans_');

			// Setup Array to Save Data
			// Create an Array to Save the Data to
			$stripe_user_subscriptions[] = array(
				$date => array(
					'site_id' 		=> $site_id,
					'price' 		=> $price,
					'tier' 			=> $tier,
					'days' 			=> $days,
				)
			);

			// Apply filter to Stripe User Subscriptions so we can alter through a filter later, if needed
			$stripe_user_subscriptions = apply_filters('plchf_msb_stripe_user_subscriptions', $stripe_user_subscriptions);

			// If Plans have already been added to the user account, merge with the new Plans, otherwise record fresh Plans
			if ($plans) {
				$updated_plans = array_merge($stripe_user_subscriptions, $plans);
			} else {
				$updated_plans = $stripe_user_subscriptions;
			}

			// Update User Meta with Updated Stripe Payment Plans
			update_user_meta( $userid, '_stripe_payment_plans_', $updated_plans );

			// Get Current Expiration Date
			$expiration_date = get_post_meta($site_id, '_subscription_end_date_', true);

			// Get Plan Days and Convert to seconds
			$plan_day_seconds 	= ($days*60*60*24);

			// Add New Plan Days to Old Expiration Date
			$new_expiration_date = ($plan_day_seconds + $expiration_date);

			// Update Site's Expiration Date with New Calculated Expiration Date
			update_post_meta($site_id, '_subscription_end_date_', $new_expiration_date);

			// Get Saved Stripe ID
			$stripe_id = get_user_meta($userid, '_stripe_customer_id', true);

			Stripe::setApiKey($stripe_secret);
			Stripe_Charge::create(array(
			  "amount" => preg_replace('[\D]', '', $price),
			  "currency" => "usd",
			  "customer" => $stripe_id['customer_id'],
			  "description" => "Purchase Additional Time for Mobile Site")
			);

		} else {

		}

	}

	add_action('init', 'plchf_msb_front_end_stripe_process_additional_site_hosting');

/* ---------------------------------------------------------------------------- */
/* Only show sites that belong to the logged in user
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_add_on_filter_sites_page_args($pluginchiefmsb_args){

		// Get Current User ID
		$userid = get_current_user_id();

		// If Front End
		if (!is_admin()) {

			$pluginchiefmsb_args = array(
				'post_type' 	=> 'pluginchiefmsb-sites',
				'post_parent'	=> 0,
				'posts_per_page'=> -1,
				'author'		=> $userid
			);

		}

		return $pluginchiefmsb_args;

	}

	add_action('plchf_msb_sites_page_args', 'plchf_msb_front_end_add_on_filter_sites_page_args');

/* ---------------------------------------------------------------------------- */
/* Once a Day, Loop Through the Mobile Sites and Run some Daily Functions
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_add_expiration_email_hooks() {

		$args = array(
			'post_type' 	=> 'pluginchiefmsb-sites',
			'post_parent'	=> 0
		);

		$sites = get_posts($args);

		if ($sites) {

			foreach ($sites as $site) {

				$site_id = $site->ID;

				// Add Action to Hook Into that passes the Site ID, so we can hook into the daily-run action
				do_action('plchf_msb_front_end_daily_action', $site_id);

			}

		}

	}

	add_action('plchf_msb_front_end_daily_wp_cron','plchf_msb_front_end_add_expiration_email_hooks');

/* ---------------------------------------------------------------------------- */
/* Send Email to Site Owners reminding them that their site is expiring in 2 Days
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_2_day_expiring_site_owner_email($site_id){

		// Site ID
		$site_id = $site_id;

		$meta 				= get_post_custom($site_id);
		$expiration 		= $meta['_subscription_end_date_'][0];
		$author_email 		= $meta['_author_email_'][0];
		$site_admin_email	= get_option('admin_email');
		$site_title			= get_option('blogname');

		// Get User Info
		$user = get_user_by('email', $author_email);

		// If the site has an expiration date set, let's do the following
		if ($expiration) {

			$one_day 	= (24*60*60);
			$three_days = (3*$one_day);

			// If expiration date is in 2 days (more than 1 day, less than 3 days)
			if ($expiration > $one_day && $expiration < $three_days) {

				// To send HTML mail, the Content-type header must be set
				$headers .= 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
				$headers .= 'To: '.$author_email.' <'.$author_email.'>' . "\r\n";
				$headers .= 'From: '.$site_admin_email.' <'.$site_title.'>' . "\r\n";

				// Set the content to send in the email
				$email_content .= 'Hello '.$site_owner.',<br/>';

				$email_content .= 'We are contacting you to let you know that you have a Mobile Site expiring soon!<br/>';
				$email_content .= 'Below are the site details:<br/><br/>';

				$email_content .= 'Site Name: '.the_title($site_id).'<br/>';
				$email_content .= 'Site ID: '.$site_id.'<br/>';
				$email_content .= 'Expiration Date: '.$expiration.'<br/><br/>';

				$email_content .= 'Thanks,<br/>';
				$email_content .= 'Team aQRopolis';

				// Use the Email Template
				$message = plchf_msb_front_end_email_template($email_content);

				// Mail it
				mail($author_email, 'Your Mobile Site is Expiring', $message, $headers);

			} // End 2 Day Check

		} // End Expiration Check

	}

	add_action('init', 'plchf_msb_front_end_2_day_expiring_site_owner_email', 10, 1);

/* ---------------------------------------------------------------------------- */
/* Send Email to Site Owners reminding them that their site is expiring in 14 Days
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_14_day_expiring_site_owner_email($site_id){

		// Site ID
		$site_id = $site_id;

		$meta 				= get_post_custom($site_id);
		$expiration 		= $meta['_subscription_end_date_'][0];
		$author_email 		= $meta['_author_email_'][0];

		if ($expiration) {

			$message .= 'ID: '.$site_id.'<br/>';
			$message .= 'Title: '.get_the_title($site_id).'<br/>';
			$message .= 'Expiration: '.$expiration.'<br/>';

			mail($author_email, 'Cron Test: Site - '.$site_id.'', $message);

		} // End Expiration Check

	}

	add_action('plchf_msb_front_end_daily_action', 'plchf_msb_front_end_14_day_expiring_site_owner_email', 10, 1);

/* ---------------------------------------------------------------------------- */
/* Email Author 1 Week Before Deleting Expired Site
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_email_owner_before_deleting_expired_site($site_id){

		// Site ID
		$site_id = $site_id;

			$meta 				= get_post_custom($site_id);
			$expiration 		= $meta['_subscription_end_date_'][0];
			$author_email 		= $meta['_author_email_'][0];

			if ($expiration) {

				$message .= 'ID: '.$site_id.'<br/>';
				$message .= 'Title: '.get_the_title($site_id).'<br/>';
				$message .= 'Expiration: '.$expiration.'<br/>';

				mail($author_email, 'Cron Test: Site - '.$site_id.'', $message);

			} // End Expiration Check

	}

	add_action('plchf_msb_front_end_daily_action', 'plchf_msb_front_end_email_owner_before_deleting_expired_site', 10, 1);

/* ---------------------------------------------------------------------------- */
/* Delete Site (And All Site Content) After it's 30 Days Past Expired
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_delete_expired_site($site_id){

		// Site ID
		$site_id = $site_id;

			$meta 				= get_post_custom($site_id);
			$expiration 		= $meta['_subscription_end_date_'][0];
			$author_email 		= $meta['_author_email_'][0];

			if ($expiration) {

				$message .= 'ID: '.$site_id.'<br/>';
				$message .= 'Title: '.get_the_title($site_id).'<br/>';
				$message .= 'Expiration: '.$expiration.'<br/>';

				mail($author_email, 'Cron Test: Site - '.$site_id.'', $message);

			} // End Expiration Check

	}

	add_action('plchf_msb_front_end_daily_action', 'plchf_msb_front_end_delete_expired_site', 10, 1);

/* ---------------------------------------------------------------------------- */
/* Email Template
/* ---------------------------------------------------------------------------- */

	function plchf_msb_front_end_email_template($message) {

		// Set Variable to Use
		$imgroot = PLUGINCHIEFMSB_FRONTEND . '/images/';

		$output .= '

		<!doctype html>
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Visioniz</title>

		<!-- Hotmail ignores some valid styling, so we have to add this -->
		<style type="text/css">
		.ReadMsgBody{width: 100%; background: #f5f5f5 url("'.$imgroot.'bg.jpg") top left repeat;}
		.ExternalClass{width: 100%; background: #f5f5f5 url("'.$imgroot.'bg.jpg") top left repeat;}
		body{width: 100%; background: #f5f5f5 url("'.$imgroot.'bg.jpg") top left repeat;}

		/* Animating the Template */
		#animate {
		-webkit-animation-name: animate;
			-webkit-animation-duration: 2s;
			-webkit-animation-iteration-count: 1;
			-webkit-animation-timing-function: linear;
				overflow: hidden; margin: auto;
			}

		@-webkit-keyframes animate {
		   1% {
				height: 1px; -webkit-transform: rotate(180);-webkit-transform: perspective(500px) rotateX(50deg); margin-top: -1px; -webkit-transform-origin: bottom; font-size: 16px; vertical-align: middle;
			}
			80% {
				height: 1px; -webkit-transform: rotate(180);-webkit-transform: perspective(500px) rotateX(50deg); margin-top: -1px; -webkit-transform-origin: bottom; font-size: 16px; vertical-align: middle;
			}
			100% {
				 height: 32px; -webkit-transform: rotate(180); opacity: 1;
			}
		}

		</style>

		</head>

		<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">

		<!-- Main wrapper -->
		<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td>

					<!-- Cant view this email? -->
					<table width="650" border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td height="48" style="text-align: center; font-style: italic; font-size: 11px; color: #AAAAAA; font-weight: normal; text-align: center; font-family: Georgia, serif; text-shadow: 1px 1px 1px #FFFFFF;">

							</td>
						</tr>
					</table>

					<!-- Empty Table -->
					<table width="650" border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td height="30" style="line-height: 1px;">
								<img src="'.$imgroot.'blank.gif" alt="" border="0" style="display: block;">
							</td>
						</tr>
					</table>

					<!-- Navigation -->
					<table width="652" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center" style="font-size: 12px; color: #6689ad; text-align: left; font-family: Helvetica, Arial, sans-serif; line-height: 16px; border-top: 1px solid #e4e4e4; text-transform: uppercase; font-weight: bold;">
						<tr>
							<td width="1" height="94" style="border-left: 1px solid #e4e4e4;"></td>
							<td width="35" height="94"></td>
							<td width="100%" height="94" style="line-height: 1px;" align="center">

								<!-- Logo Image -->
								<a href="#"><img src="http://aqropolis.com/themes/aqropolis/img/logo.png" alt="" border="0" style="display: block;" width="200" height="54"></a>

							</td>
							<td width="35" height="94"></td>
							<td width="1" height="94" style="border-right: 1px solid #e4e4e4;"></td>
						</tr>
					</table><!-- End Navigation -->

					<div id="animate">

					<!-- Design-Border Image -->
					<table width="650" border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td width="650" style="line-height: 1px;">
								<img src="'.$imgroot.'design_border.jpg" alt="" border="0" style="display: block;">
							</td>
						</tr>
					</table>

					</div>


					<!-- Wrapper -->
					<table width="650" border="0" cellpadding="0" bgcolor="#FFFFFF" cellspacing="0" align="center" style="border-left: 1px solid #e4e4e4; border-right: 1px solid #e4e4e4;">
						<tr>
							<td valign="top" width="650">

							<!-- Shadow-Top -->
							<table width="650" border="0" cellpadding="0" cellspacing="0" align="center">
								<tr>
									<td valign="top" height="31" style="line-height: 1px;">
										<img width="650" src="'.$imgroot.'shadow_top.jpg" alt="" border="0" style="display: block;">
									</td>
								</tr>
							</table>

							<!-- Table -->
							<table width="650" border="0" cellpadding="0" cellspacing="0" align="center">
								<tr>
									<!-- Wrapper Left -->
									<td valign="top" width="35"></td>

									<!-- Middle -->
									<td valign="top" width="580">

										<!-- Text -->
										<table width="580" border="0" cellpadding="0" cellspacing="0" align="center" style="font-size: 12px; color: #393939; text-align: left; font-family: Helvetica, Arial, sans-serif; line-height: 22px;">
											<tr>
												<td width="580">

												'.$message.'

												</td>
											</tr>
										</table><!-- End Text -->

										<!-- Empty Table -->
										<table width="580" border="0" cellpadding="0" cellspacing="0" align="center">
											<tr>
												<td height="26" style="line-height: 1px;">
													<img src="'.$imgroot.'blank.gif" alt="" border="0" style="display: block;">
												</td>
											</tr>
										</table>

										</td>
									<!-- Wrapper Right -->
									<td width="34"></td>
								</tr>
							</table>

							<!-- Shadow-Middle -->
							<table width="650" border="0" cellpadding="0" cellspacing="0" align="center" style="border-top: 1px solid #e4e4e4;">
								<tr>
									<td height="26" style="line-height: 1px;">
										<img width="650" src="'.$imgroot.'shadow_top.jpg" alt="" border="0" style="display: block;">
									</tr>
							</table>

							<!-- Empty Table -->
							<table width="650" border="0" cellpadding="0" cellspacing="0" align="center">
								<tr>
									<td height="34" style="line-height: 1px;">
										<img src="'.$imgroot.'blank.gif" alt="" border="0" style="display: block;">
									</td>
								</tr>
							</table>

							<!-- Empty Table -->
							<table width="650" border="0" cellpadding="0" cellspacing="0" align="center" style="border-top: 1px solid #e4e4e4;">
								<tr>
									<td height="10" style="line-height: 1px;">
										<img src="'.$imgroot.'blank.gif" alt="" border="0" style="display: block;">
									</td>
								</tr>
							</table>


					<!-- Copyright -->
					<table width="650" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" align="center" style="font-size: 11px; color: #393939; text-align: left; font-family: Helvetica, Arial, sans-serif; line-height: 14px;">
						<tr>

							<td width="27" height="60"></td>

							<td width="324" height="60">Copyright 2012 aQRopolis</td>

							<td width="20" height="60"></td>

							<td width="84" height="60" style="text-align: center; line-height: 1px;">

								<!-- Tweet -->
								<a href="http://twitter.com/intent/tweet?source=sharethiscom&text=I just ordered a custom QR Code product from aQRopilis.com!"><img src="'.$imgroot.'tweet.jpg" alt="" border="0"></a>

							</td>

							<td width="84" height="60" style="text-align: center; line-height: 1px;">

								<!-- Google+ -->
								<a href="https://plusone.google.com/_/+1/confirm?hl=en&url=https://aqropolis.com/"><img src="'.$imgroot.'googleplus.jpg" alt="" border="0"></a>

							</td>

							<td width="84" height="60" style="text-align: center; line-height: 1px;">

								<!-- Like -->
								<a href="https://www.facebook.com/sharer.php?u=http://aqropolis.com&t=I Just Ordered a Custom QR Code Product at aQRopolis.com!"><img src="'.$imgroot.'like.jpg" alt="" border="0"></a>

							</td>

							<td width="27" height="60"></td>

						</tr>

					</table><!-- End Copyright -->

					<!-- Small Shadow -->
					<table width="650" border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td>
								<img src="'.$imgroot.'shadow_small.jpg" alt="" style="display: block;" border="0">
							</td>
						</tr>
					</table>


									</td>
								</tr>
							</table>
						</tr>
					</table><!-- End Wrapper -->


					<!-- Empty Table -->
					<table width="650" border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td height="25" style="line-height: 1px;">
								<img src="'.$imgroot.'footer.jpg" alt="" border="0" style="display: block;">
							</td>
						</tr>
					</table>


					<!-- Unsubscribe -->
					<table width="650" border="0" cellpadding="0" cellspacing="0" align="center" style="font-size: 11px; color: #696969; text-align: center; font-family: Helvetica, Arial, sans-serif; line-height: 18px;">
						<tr>
							<td width="650">This is an automated message. Replying to this email will not work. To manage your QR Code order or Mobile Sites, login to the <a href="https://aqropolis.com" target="_blank">aQRopolis Client Center</a>. For other support requests, contact us at <a href="mailto:info@aqropolis.com" target="_blank">info@aqropolis.com<br/><br/>

							</td>
						</tr>
					</table><!-- End Unsubscribe -->

					<!-- Empty Table -->
					<table width="650" border="0" cellpadding="0" cellspacing="0" align="center">
						<tr>
							<td height="80" style="line-height: 1px;">
								<img src="'.$imgroot.'blank.gif" alt="" border="0" style="display: block;">
							</td>
						</tr>
					</table>

				</td>
			</tr>
		</table><!-- End Main Wrapper -->

		<!-- Done -->

		</body>

		</html>

		';

		return $output;

	}