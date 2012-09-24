<!DOCTYPE html>
<html lang="en">
  
  <head>
  
  	<?php 
	global $pluginchiefmsbdir, $post, $wp_query;
  	$post_id 	= $wp_query->post->ID;
  	$site_id 	= get_post($post_id)->post_parent;
  	$meta 		= get_post_custom( $site_id );
  	$sitetheme 	= $meta['_plchf_msb_site_theme'][0];
  	?>
  	
  	<!-- Theme Header Hook -->
  	<?php plchf_msb_theme_header(); ?>
  	
  	<!-- Include the Theme Stylesheet -->
  	<link href="<?php echo $pluginchiefmsbdir; ?>mobile-themes/default-dark-theme/theme/css/style.min.css" rel="stylesheet">
  	<link href="<?php echo $pluginchiefmsbdir; ?>mobile-themes/default-dark-theme/theme/css/style-responsive.min.css" rel="stylesheet">

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
      
          <a class="brand" href="<?php echo get_permalink(); ?>">Site Title</a>
      
          <div class="nav-collapse collapse">
      
            <ul class="nav">
            
            	<?php 
	            	            
				global $post;
				
				// Args
				$args = array(
					'post_type' 	=> 'pluginchiefmsb-sites',
					'orderby' 		=> 'menu_order',
					'order' 		=> 'ASC',
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