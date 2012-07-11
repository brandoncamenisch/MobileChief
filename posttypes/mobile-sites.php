<?php

/* ---------------------------------------------------------------------------- */
/* Set Up Mobile Sites Post Type
/* ---------------------------------------------------------------------------- */

	$labels = array(
	    'name' => _x('Mobile Sites', 'mobile-sites'),
	    'menu_name' => _x('Mobile Sites', 'mobile-sites'),
	    'all_items' => _x('Mobile Sites', 'mobile-sites'),
	    'singular_name' => _x('Mobile Site', 'mobile-sites'),
	    'add_new' => _x('Add New Mobile Site', 'mobile-sites'),
	    'add_new_item' => __('Add Mobile Site', 'mobile-sites'),
	    'edit_item' => __('Edit Mobile Site', 'mobile-sites'),
	    'new_item' => __('New Mobile Site', 'mobile-sites'),
	    'view_item' => __('View Mobile Site', 'mobile-sites'),
	    'search_items' => __('Search Mobile Sites', 'mobile-sites'),
	    'not_found' =>  __('No Mobile Sites found', 'mobile-sites'),
	    'not_found_in_trash' => __('No Mobile Site found in Trash', 'mobile-sites'), 
	    'parent_item_colon' => ''
	  );
	
	$pluginchiefmsb_args = array(
		'labels' => $labels,
		'public' => false,
		'publicly_queryable' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'rewrite' => false,
		'show_in_nav_menus' => false,
		'supports' => array(
	  			'title',
			),
		'menu_position' => 35,
		'menu_icon' => PLUGINCHIEFMSB . '/images/pluginchiefmsb-icon.png',
	);
	
	register_post_type( 'pluginchiefmsb-sites', $pluginchiefmsb_args );