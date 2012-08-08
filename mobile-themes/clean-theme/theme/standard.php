<!DOCTYPE html>
<html lang="en">
  <head>
  
  	<?php 
  	global $pluginchiefmsbdir, $post, $wp_query;
  	$post_id 	= $wp_query->post->ID;
  	$meta 		= get_post_custom( $post_id );
  	$sitetheme 	= $meta['_plchf_msb_site_theme'][0];
  	?>
  	
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

<?php
/*====================================================================
Base Variables
====================================================================*/
	//=====================================================
	// Setup Array for variable variables
	//=====================================================
		$btnClass = 'btnClasses';
		$btnClassesArray = array($btn, $btnLarge);
		$btnClasses = implode(" ",$btnClassesArray);
	//=====================================================
	// Setup Array for variable variables
	//=====================================================

		// Misc. Classes
		//=====================================================
			$well = 'well';
			$close = 'close';
			$bar = 'bar';
			$pageHeader = 'page-header';
			$hero = 'hero-unit';
			$active = 'active';
			$disabled = 'disabled';
			$pager = 'pager';
			$next = 'next';
			$previous = 'previous';
			$pagination = 'pagination';
			$paginationCentered = 'pagination-centered';
			$paginationRight = 'pagination-right';
			$breadcrumb = 'breadcrumb';
			$divider = 'divider';
			$collapse = 'collapse';

		// Badges
		//=====================================================
			$badge = 'badge';
			$badgeSuccess = 'badge-success';
			$badgeWarning = 'badge-warning';
			$badgeImportant = 'badge-important';
			$badgeInfo = 'badge-info';
			$badgeInverse = 'badge-inverse';
	
		// Badges output
		//=====================================================
				$badgeOut = '<span class="'.$class.'">'.$$content.'</span>';
				
		// Progress Bars
		//=====================================================
				$progress = 'progress';
				$progressStriped = 'progress-striped';
				$progressActive = 'active';

		// Progress output
		//=====================================================
				$progressOut = '<div class="'.$$class.'">
													<div class="'.$$class.'">'.$$content.'</div>
												</div>';

		// Labels
		//=====================================================
				$label = 'label';
				$labelSuccess = 'label-success';
				$labelWarning = 'label-warning';
				$labelImportant = 'label-important';
				$labelInfo = 'label-info';
				$labelInverse = 'label-inverse';
	
		// Labels output
		//=====================================================
				$labelOut = '<span class="'.$$class.'">'.$$content.'</span>';
	
		// Alerts
		//=====================================================
				$alert = 'alert';
				$alertError = 'alert-error';
				$alertInfo = 'alert-info';
				$alertSuccess = 'alert-success';
				$alertHeading = 'alert-heading';
				$alertBlock = 'alert-block';
				$alertClose = 'close';
	
		// Alert outputs
		//=====================================================
			$alertCloseOut = '<button type="button" class="'.$alertClose.'" data-dismiss="'.$alert.'" href="#">X</button>';
	
			$alertOut = '<div class="'.$$alertClass.'">
										'.$alertCloseOut.'
										 <h4 class="'.$alertHeading.'">Warning!</h4>
										'.$$alertContent.'
										</div>';
	
		// Buttons
		//=====================================================
				$btn = 'btn';
				$btnPrimary = 'btn-primary';
				$btnInfo = 'btn-info';
				$btnSuccess = 'btn-success';
				$btnWarning = 'btn-warning';
				$btnDanger = 'btn-danger';
				$btnInverse = 'btn-inverse';
			
			//Btn Sizes
			//----------------------------------
				$btnLarge = 'btn-large';
				$btnSmall = 'btn-small';
				$btnMini = 'brn-mini';
			
			//Btn status
			//----------------------------------
				$btnDisabled = 'disabled';
				$btnActive = 'active';
			
			//Btn Group
			//----------------------------------
				$btnGroup = 'btn-group';
			
			//Btn Toolbar
			//----------------------------------
				$btnToolbar = 'btn-toolbar';
			
			//Btn Dropdown
			//----------------------------------
				$btnDropdown = 'dropdown-toggle';
			
			//Btn Dropdown Split
			//----------------------------------
			
			//Btn DropDown/Up
			//----------------------------------
				$btnDropUp = 'dropup';
			
		// Button outputs
		//=====================================================
			$btnAOut = '<a class="'.$$btnClass.'" href="">Link</a>';
			
			$btnButtonOut = '<button class="'.$$btnClass.'" href="">Link</button>';
	
			$btnInputOut = '<input class="'.$$btnClass.'" type="button" value="Input">';
	
			$btnGroupOut = '<div class="'.$btnGroup.'">
									   '.$btnAOut.'
									   '.$btnAOut.'
									   '.$btnAOut.'
										</div>';		
			
			$btnToolbarOut = '<div class="'.$btnToolbar.'">
											'.$btnGroupOut.'
										</div>';
	
			$btnDropdownOut = '<div class="'.$btnGroup.'">
												<a class="'.$$btnClass.' dropdown-toggle" data-toggle="dropdown" href="#">
													Action
													<span class="caret"></span>
												</a>
												<ul class="dropdown-menu">
							            <li><a href="#">Action</a></li>
							            <li><a href="#">Another action</a></li>
							            <li><a href="#">Something else here</a></li>
							            <li class="divider"></li>
							            <li><a href="#">Separated link</a></li>
	        							</ul>
										</div>';
	
			$btnDropdownSplitOut = '<div class="'.$btnGroup.'">
													 	<button class="'.$$btnClass.'">Action</button>
													 	<button class="'.$$btnClass.' dropdown-toggle" data-toggle="dropdown">
													 		<span class="caret"></span>
													 	</button>
													 	<ul class="dropdown-menu">
														  <li>'.$btnAOut.'</li>
									            <li><'.$btnAOut.'</li>
									            <li>'.$btnAOut.'</li>
									            <li class="divider"></li>
									            <li>'.$btnAOut.'</li>
	        								 	</ul>
													 </div>';
	
			$btnDropdownSplitUpOut = '<div class="'.$btnGroup.'">
														 	<button class="'.$$btnClass.'">Action</button>
														 	<button class="'.$$btnClass.' dropdown-toggle" data-toggle="dropdown">
													 		<span class="caret"></span>
													 	</button>
													 	<ul class="dropdown-menu">
														  <li>'.$btnAOut.'</li>
									            <li>'.$btnAOut.'</li>
									            <li>'.$btnAOut.'</li>
									            <li class="divider"></li>
									            <li>'.$btnAOut.'</li>
	        								 	</ul>
													 </div>';
		
		// Navigation 
		//=====================================================
				$nav = 'nav';
				$navTabs = 'nav nav-tabs';			
				$navPills = 'nav nav-pills';
				$navStacked = 'nav nav-tabs nav-stacked';
	 			$navStackedPills = 'nav nav-pills nav-stacked';
	 			$navDropDown = 'dropdown';
				$navDropDownToggle = 'dropdown-toggle';
				$navList = 'nav nav-list';
				$navHeader = 'nav-header';
				$tabbable = 'tabbable';
				$navTabFade = 'fade';
				$navBrand = 'brand';				
	
		// Navigation outputs
		//=====================================================
			$navClass = 'navClasses';
	
			$navIconOut = '<i class="icon-book"></i>';
	
			$navDividerOut = '<li class="divider"></li>';
			
			$navDropdownOut = '<li class="dropdown">
															<a class="dropdown-toggle" data-toggle="dropdown" href="#">
															Dropdown <b class="caret"></b>
															</a>
															<ul class="dropdown-menu">
																Content
															</ul>
														 </li>';
	
			$navHeaderOut = '<li class="nav-header">
												List header
											</li>';
	
			$navTabsOut = '<ul class="nav nav-tabs">
											<li class="active">
												<a href="#">Home</a>
											</li>
											<li><a href="#">...</a></li>
											<li><a href="#">...</a></li>
										 </ul>';
	
			$navPillsOut = '<ul class="nav nav-pills">
												<li class="active">
													<a href="#">Home</a>
												</li>
												<li><a href="#">...</a></li>
												<li><a href="#">...</a></li>
											</ul>';
			
			$navTabsStackedOut = '<ul class="nav nav-tabs nav-stacked">
												<li class="active">
													<a href="#">Home</a>
												</li>
												<li><a href="#">About</a></li>
												<li><a href="#">Contact</a></li>
											</ul>';
	
			
			$navPillsStackedOut = '<ul class="nav nav-pills nav-stacked">
															'.$navHeaderOut.'
															<li class="active">
																<a href="#">Home</a>
															</li>
															'.$navHeaderOut.'
															<li><a href="#">About</a></li>
															<li><a href="#">Contact</a></li>
															'.$navDropdownOut.'
														</ul>';
			
			//tabs-left & tabs-right & tabs-below
			$navTabbableOut = '<div class="tabbable">
												 	<ul class="nav nav-tabs">
											    	<li class="active"><a href="#tab1" data-toggle="tab">Section 1</a></li>
											    	<li><a href="#tab2" data-toggle="tab">Section 2</a></li>
											    </ul>
													<div class="tab-content">
												    <div class="tab-pane active" id="tab1">
												      <p>I am in Section 1.</p>
												    </div>
												    <div class="tab-pane fade" id="tab2">
												      <p>Howdy, I am in Section 2.</p>
												    </div>
												  </div>
												</div>';
	
			//navbar & navbar-fixed-top & navbar-fixed-bottom
			$navBarOut = '<div class="navbar">
											<div class="navbar-inner">
												<div class="container">
													Home
												</div>
											</div>
										</div>';
										
			$navBarResponsiveOut = '<div class="navbar">
																<div class="navbar-inner">
																	<div class="container">
																		<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
																			<span class="icon-bar"></span>
																			<span class="icon-bar"></span>
																			<span class="icon-bar"></span>
																		</a>
																		<a class="brand" href="#">Project name</a>
																	<div class="nav-collapse">
																	<!-- .nav, .navbar-search, .navbar-form, etc -->
																	</div>
																</div>
															 </div>
															</div>';									
	
			$navBarFormOut = '<form class="navbar-form pull-left">
													<input type="text" class="span2">
												</form>';
	
			$navBarFormSearchOut = '<form class="navbar-search pull-left">
																<input type="text" class="search-query" placeholder="Search">
															</form>';
															
															
			// echo $navBarOut;
			// echo $navBarResponsiveOut;
			// echo $navBarFormOut;
			// echo $navTabbableOut;
			// echo $navPillsStackedOut;
			echo $navTabsStackedOut;

?>


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
