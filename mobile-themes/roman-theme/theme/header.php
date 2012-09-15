<!DOCTYPE html>
<html lang="en">
  <head>

  	<?php
  	global $pluginchiefmsbdir, $post, $wp_query;
  	$post_id 	= $wp_query->post->ID;
  	$post_id 	= get_post($post_id)->post_parent;
  	$meta 		= get_post_custom( $post_id );
  	$sitetheme 	= $meta['_plchf_msb_site_theme'][0];
  	?>

    <meta charset="utf-8">
    <title>Clean Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo $pluginchiefmsbdir; ?>css/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="<?php echo $pluginchiefmsbdir; ?>mobile-themes/roman-theme/theme/css/style.css" rel="stylesheet">

    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?php echo $pluginchiefmsbdir; ?>theme-assets/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo $pluginchiefmsbdir; ?>theme-assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $pluginchiefmsbdir; ?>theme-assets/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $pluginchiefmsbdir; ?>theme-assets/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?php echo $pluginchiefmsbdir; ?>theme-assets/ico/apple-touch-icon-57-precomposed.png">

  </head>

  <body data-spy="scroll" data-target=".subnav" data-offset="50">

  <!-- Navbar
    ================================================== -->
    <div class="navbar navbar-fixed-top">

      <div class="navbar-inner">

        <div class="container">

          <button type="button"class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="brand" href="<?php echo get_permalink(); ?>"><?php echo str_ireplace('_',' ', $sitetheme); ?></a>

          <div class="nav-collapse collapse">

            <ul class="nav">

              <li class="active">
                <a href="<?php echo get_permalink(); ?>">Overview</a>
              </li>

              <li class="">
                <a href="<?php echo get_permalink(); ?>">Scaffolding</a>
              </li>

              <li class="">
                <a href="<?php echo get_permalink(); ?>">Base CSS</a>
              </li>

              <li class="">
                <a href="<?php echo get_permalink(); ?>">Components</a>
              </li>

              <li class="">
                <a href="<?php echo get_permalink(); ?>">Javascript plugins</a>
              </li>

              <li class="">
                <a href="<?php echo get_permalink(); ?>">Using LESS</a>
              </li>

              <li class="<?php echo get_permalink(); ?>"></li>

              <li class="">
                <a href="<?php echo get_permalink(); ?>">Customize</a>
              </li>

              <li class="">
                <a href="<?php echo get_permalink(); ?>">Examples</a>
              </li>

            </ul>

          </div>

        </div>

      </div>

    </div>

    <div class="container">