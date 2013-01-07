<?php

/* ---------------------------------------------------------------------------- */
/* Setup Hooks
/* ---------------------------------------------------------------------------- */
	#Admin Page Pre-Header
	function pluginchiefmsb_admin_pre_header() {
		do_action('pluginchiefmsb_admin_pre_header');
  }
	#Admin Page Header
	function pluginchiefmsb_admin_header() {
		do_action('pluginchiefmsb_admin_header');
	}
	#Admin Page Post-Header
	function pluginchiefmsb_admin_post_header() {
		do_action('pluginchiefmsb_admin_post_header');
  }
  #Admin Page Pre-Footer
	function pluginchiefmsb_admin_pre_footer() {
		do_action('pluginchiefmsb_admin_pre_footer');
  }
  #Admin Page Footer
	function pluginchiefmsb_admin_footer() {
		do_action('pluginchiefmsb_admin_footer');
  }
  #Admin Page Post-Footer
	function pluginchiefmsb_admin_post_footer() {
		do_action('pluginchiefmsb_admin_post_footer');
  }
  #Admin Page Settings
	function pluginchiefmsb_admin_settings() {
		do_action('pluginchiefmsb_admin_settings');
  }
  #Theme Header
  function plchf_msb_theme_header() {
	  do_action('plchf_msb_theme_header');
  }
  #Theme Footer
  function plchf_msb_theme_footer() {
	  do_action('plchf_msb_theme_footer');
  }