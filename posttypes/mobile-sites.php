<?php

/* ---------------------------------------------------------------------------- */
/* Set Up Mobile Sites Post Type
/* ---------------------------------------------------------------------------- */

add_action( 'init', 'register_cpt_pluginchiefmsb_sites' );

function register_cpt_pluginchiefmsb_sites() {

    $labels = array( 
        'name' => _x( 'Mobile Sites', 'pluginchiefmsb-sites' ),
        'singular_name' => _x( 'Mobile Site', 'pluginchiefmsb-sites' ),
        'add_new' => _x( 'Add New', 'pluginchiefmsb-sites' ),
        'add_new_item' => _x( 'Add New Mobile Site', 'pluginchiefmsb-sites' ),
        'edit_item' => _x( 'Edit Mobile Site', 'pluginchiefmsb-sites' ),
        'new_item' => _x( 'New Mobile Site', 'pluginchiefmsb-sites' ),
        'view_item' => _x( 'View Mobile Site', 'pluginchiefmsb-sites' ),
        'search_items' => _x( 'Search Mobile Sites', 'pluginchiefmsb-sites' ),
        'not_found' => _x( 'No mobile sites found', 'pluginchiefmsb-sites' ),
        'not_found_in_trash' => _x( 'No mobile sites found in Trash', 'pluginchiefmsb-sites' ),
        'parent_item_colon' => _x( 'Parent Mobile Site:', 'pluginchiefmsb-sites' ),
        'menu_name' => _x( 'Mobile Sites', 'pluginchiefmsb-sites' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        'description' => 'Plugin Chief Mobile Sites',
        'supports' => array( 
        	'title', 
        	'editor', 
        	// 'excerpt', 
        	// 'author', 
        	// 'thumbnail', 
        	// 'trackbacks', 
        	// 'custom-fields', 
        	// 'comments', 
        	// 'revisions', 
        	'page-attributes' 
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => false,
        'show_in_nav_menus' => false,
        'publicly_queryable' => true,
        'menu_position' => 80,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => array( 
            'slug' => 'mobile-sites', 
            'with_front' => true,
            'feeds' => true,
            'pages' => true
        ),
        'capability_type' => 'post'
    );

    register_post_type( 'pluginchiefmsb-sites', $args );

}