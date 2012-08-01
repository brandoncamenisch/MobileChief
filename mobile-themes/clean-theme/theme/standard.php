<!DOCTYPE html>
<html lang="en">
  <head>
  
  	<?php global $pluginchiefmsbdir; ?>
  	
    <meta charset="utf-8">
    <title>Clean Theme</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="<?php echo $pluginchiefmsbdir; ?>theme-assets/css/bootstrap.css" rel="stylesheet">
    <link href="<?php echo $pluginchiefmsbdir; ?>theme-assets/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?php echo $pluginchiefmsbdir; ?>theme-assets/css/docs.css" rel="stylesheet">
    <link href="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/google-code-prettify/prettify.css" rel="stylesheet">

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
  
  <?php 
  
  global $post;
  $meta 		= get_post_custom();
  $sitetheme 	= $meta['_plchf_msb_site_theme'][0];
  
  ?>

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
      
          <a class="brand" href="./index.html"><?php echo ucwords(str_ireplace('_',' ', $sitetheme)); ?></a>
      
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


     <!-- Footer
      ================================================== -->
      <footer class="footer">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>Designed and built with all the love in the world <a href="http://twitter.com/twitter" target="_blank">@twitter</a> by <a href="http://twitter.com/mdo" target="_blank">@mdo</a> and <a href="http://twitter.com/fat" target="_blank">@fat</a>.</p>
        <p>Code licensed under the <a href="http://www.apache.org/licenses/LICENSE-2.0" target="_blank">Apache License v2.0</a>. Documentation licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
        <p>Icons from <a href="http://glyphicons.com">Glyphicons Free</a>, licensed under <a href="http://creativecommons.org/licenses/by/3.0/">CC BY 3.0</a>.</p>
      </footer>

    </div><!-- /container -->



    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/jquery.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/google-code-prettify/prettify.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-transition.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-alert.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-modal.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-dropdown.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-scrollspy.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-tab.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-tooltip.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-popover.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-button.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-collapse.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-carousel.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/bootstrap-typeahead.js"></script>
    <script src="<?php echo $pluginchiefmsbdir; ?>theme-assets/js/application.js"></script>


  </body>
</html>
