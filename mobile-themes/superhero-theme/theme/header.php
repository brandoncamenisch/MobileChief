<!DOCTYPE html>
<html lang="en">

  <head>

  	<?php
	global $pluginchiefmsb_superherotheme_dir, $post, $wp_query;
  	$post_id 	= $wp_query->post->ID;
  	$site_id 	= get_post($post_id)->post_parent;
  	$meta 		= get_post_custom( $site_id );
  	$sitetheme 	= $meta['_plchf_msb_site_theme'][0];
  	?>

  	<?php
	$site_name = plchf_msb_get_site_option('text','_site_name_');
	if ($site_name != '') {
		$site_name = $site_name;
	} else {
		$site_name = 'Site Title';
	}
	?>

  	<!-- Theme Header Hook -->
  	<?php plchf_msb_theme_header(); ?>
  	<link href="<?php echo $pluginchiefmsb_superherotheme_dir; ?>theme/css/style.css" rel="stylesheet">
  </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="50">

  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-inverse navbar-fixed-top">

      <div class="navbar-inner">

        <div class="container">

          <button type="button"class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="brand" href="<?php echo get_permalink(); ?>"><?php echo $site_name; ?></a>

          <div class="nav-collapse collapse">

            <ul class="nav">

            	<?php

				global $post;

				// Args
				$args = array(
					'post_type' 	=> 'pluginchiefmsb-sites',
					'orderby' 		=> 'menu_order',
					'order' 		=> 'ASC',
					'numberposts'     => 0,
					'post_parent' 	=> $site_id
				);

				$posts = get_posts( $args );

				foreach ($posts as $post) {

            	?>

	            	<li>
	                	<a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title; ?></a>
	                </li>

                <?php

	            }

                ?>

            </ul>

          </div>

        </div>

      </div>

    </div>

    <div class="container">