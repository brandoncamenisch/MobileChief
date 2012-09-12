<!DOCTYPE html>
<html lang="en">
  <head>

  	<?php
  	global $pluginchiefmsbdir, $post, $wp_query;

  	$post_id 		= $wp_query->post->ID;
  	$post_id 		= get_post($post_id)->post_parent;
  	$meta 			= get_post_custom( $post_id );
  	$sitetheme 	= $meta['_plchf_msb_site_theme'][0];
  	?>

  	<!-- Theme Header Hook -->
  	<?php plchf_msb_theme_header(); ?>

  	<!-- Include the Theme Stylesheet -->
  	<link href="<?php echo $pluginchiefmsbdir; ?>/mobile-themes/aqropolis-general-theme/theme/theme-style.css" rel="stylesheet">
  	<link href="<?php echo $pluginchiefmsbdir; ?>/mobile-themes/aqropolis-general-theme/theme/theme-responsive.css" rel="stylesheet">

  </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="50">

  	<header>

  		<div class="container">

  			<div class="row-fluid">

	  			<div class="span3">

	  				<img class="logo" src="<?php echo plchf_msb_get_site_option('image','_logo_'); ?>" alt="Logo">

	  			</div>

	  			<div class="span9">

	  				<div class="row-fluid">

	  					<div class="span9">

	  						<h3><?php echo plchf_msb_get_site_option('text','_realtor_name_'); ?></h3>

	  					</div>

	  					<div class="span3">

		  					<img src="<?php echo plchf_msb_get_site_option('image','_realtor_portrait_'); ?>" alt="Headshot">

	  					</div>

	  				</div>

	  			</div>

  			</div>

  		</div>

  	</header>

  	<div class="main-content">

  		<ul class="nav nav-tabs nav-stacked">
			<li class="active"><a href="#"><div class="container">Home<i class="icon-arrow-right pull-right"></i></div></a></li>
			<li><a href="#"><div class="container">Profile<i class="icon-arrow-right pull-right"></i></div></a></li>
			<li><a href="#"><div class="container">Messages<i class="icon-arrow-right pull-right"></i></div></a></li>
        </ul>