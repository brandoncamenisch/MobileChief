<?php

/* ----------------------------------------------------------------------------
	Setup Settings Pages Template Files
---------------------------------------------------------------------------- */
	
	// Get the Header for Admin Pages
	function get_pluginchiefmsb_header(){
		
		global $pluginchiefmsbdir; 
		
		?>
		
		<link rel="stylesheet" href="<?php echo $pluginchiefmsbdir; ?>css/style.css" type="text/css" media="all">
		
		<?php 
		
		// Pre-Header Hook
		pluginchiefmsb_admin_pre_header();
		
		// Header Hook
		pluginchiefmsb_admin_header();
	
		// Post Header Hook
		pluginchiefmsb_admin_post_header();
		
	}
	
	// Get the Footer for Admin Pages
	function get_pluginchiefmsb_footer(){
		
		// Pre Footer Hook
		pluginchiefmsb_admin_pre_footer();
	
		// Footer Hook
		pluginchiefmsb_admin_footer();
	
		// Post Footer Hook
		pluginchiefmsb_admin_post_footer();
		
	}

/* ----------------------------------------------------------------------------
	Check What PLUGINCHIEFMSB Page We're On
---------------------------------------------------------------------------- */

	function is_pluginchiefmsb_page(){
		
		$pluginchiefmsb_page 			= $_GET['page'];
		$pluginchiefmsb_page_firstfive 	= substr($pluginchiefmsb_page, 0, 5);
		
		// Check to see if we are on a pluginchiefmsb page
		if ($pluginchiefmsb_page_firstfive == 'pluginchiefmsb') {
			return true;
		} else {
			return false;
		}
		
	}

/* ----------------------------------------------------------------------------
	
	Get What PLUGINCHIEFMSB Page We're On, so we can do checks when necessary

	Usage: if (get_pluginchiefmsb_page()) {

---------------------------------------------------------------------------- */

	function get_pluginchiefmsb_page() {
		
		$pluginchiefmsb_page 			= $_GET['page'];
		$pluginchiefmsb_page_firstfive 	= substr($pluginchiefmsb_page, 0, 5);
		$pluginchiefmsb_page_stripped	= substr($pluginchiefmsb_page, 6);
		
		// Check to see if we are on a pluginchiefmsb page
		if ($pluginchiefmsb_page_firstfive == 'pluginchiefmsb') {

			// Return what 
			return $pluginchiefmsb_page_stripped;
			
		} else {
			
		}
		
	}
	
/* ----------------------------------------------------------------------------
	
	Add Page Element Section to the Page Element menu on the "Edit Mobile Page" page
	
	usage: 
	
	function add_new_element_section() {
	
		plchf_msb_add_page_element_section('Content');
		
	}
	
	add_action('plchf_msb_page_element_section','add_new_element_section');
	
---------------------------------------------------------------------------- */

	function plchf_msb_add_page_element_section($title) {
		
		echo '<li>';
			echo '<a href="#" id="'.strtolower(str_replace(" ", "-", $title)).'-elements">'.$title.'</a>';
			echo '<ul class="form-elements '.strtolower(str_replace(" ", "-", $title)).'-elements">';
				
				// Social Elements Hook
				do_action('plchf_msb_'.strtolower(str_replace(" ", "_", $title)).'_elements');
				
			echo '</ul>';
		echo '</li>';
		
	}

/* ----------------------------------------------------------------------------
	
	Add Page Element to the Page Element menu on the "Edit Mobile Page" page
	
	usage: 
	
	function add_new_element() {
	
		plchf_msb_add_page_element('Text Element');
		
	}
	
	add_action('','add_new_element');
	
---------------------------------------------------------------------------- */

	function plchf_msb_add_page_element($element_type){
		
		echo '<li>';
			echo '<a href="#" data-elementtype="'.strtolower(str_replace(" ", "-", $element_type)).'">';
				echo $element_type;
			echo '</a>';
		echo '<li>';
		
	}

/* ----------------------------------------------------------------------------
	Get the Page Title that we're editing
---------------------------------------------------------------------------- */
	
	function plchf_msb_get_page_title(){
		
		$page_id = $_GET['page_id'];
		
		$output .= get_the_title( $page_id );
		
		return apply_filters('plchf_msb_get_page_title', $output);
		
	}
	
/* ----------------------------------------------------------------------------
	Get the Site Title that we're editing
---------------------------------------------------------------------------- */
	
	function plchf_msb_get_site_title(){
		
		$site_id = $_GET['site_id'];
		
		$output = get_the_title( $site_id );
		
		return apply_filters('plchf_msb_get_site_title', $output);
		
	}

/* ----------------------------------------------------------------------------
	Get the Page ID that we're editing
---------------------------------------------------------------------------- */
		
	function plchf_msb_get_page_id(){
		
		return apply_filters('plchf_msb_get_page_id','Page ID');
		
	}
	
/* ----------------------------------------------------------------------------
	Set the Mobile Phone Preview Image
---------------------------------------------------------------------------- */
	
	function plchf_msb_phone_preview_image(){
		
		global $pluginchiefmsbdir;
		
		return apply_filters('plchf_phone_preview_image',$pluginchiefmsbdir . 'images/iphone.png');	
		
	}
	
/* ----------------------------------------------------------------------------
	Set the Mobile Phone Preview Content
---------------------------------------------------------------------------- */
	
	function plchf_msb_phone_preview_site(){
		
		global $pluginchiefmsbdir;
		
		$screen = get_current_screen();
		
		// Get Screen ID on Edit Page, page
		if ($screen->id == 'mobile-site-builder_page_pluginchiefmsb/edit-page') {
			
			// Get the Page We're Editing
		    $id = $_GET['page_id'];
		  
		// Get the Site ID on the Edit Site Page 
	    } elseif ($screen->id == 'mobile-site-builder_page_pluginchiefmsb/edit-site') {
	    	
	    	// Get the Home Page
	    	$id = $_GET['site_id'];
	    	
	    	// Get Site Home Page
	    	$posts = get_posts('post_parent='.$id.'&posts_per_page=1');
	    	
	    	foreach ($posts as $post) {
		    	$id = $post->ID;
	    	}
	    	
	    	$id = $id;
	    	 	
	    }
	    
	    $url = get_permalink($id);
		
		return '<iframe src="'.$url.'" width="230" height="343"></iframe>';	
		
	}

/* ----------------------------------------------------------------------------
	Mobile Page Generator
---------------------------------------------------------------------------- */
	
	function plchf_msb_page_generator(){
		
		do_action('plchf_msb_before_page_generator');
		
		// Page Generator Form
		echo '<form id="page-generator" class="page-generator" enctype="multipart/form-data" action="" method="post" data-postid="'.plchf_msb_get_page_id().'">';
		
			// Page Generator Content
			do_action('plchf_msb_page_generator_content');

		// End Form
		echo '</form>';
		
		do_action('plchf_msb_after_page_generator');
		
	}
	
/* ----------------------------------------------------------------------------
	Add Element to Page
---------------------------------------------------------------------------- */	

	function plchf_msb_add_element(){
		
		$element_type = $_POST['elementType'];
		$element_type = strtolower(str_replace("-", "_", $element_type));
		
		do_action('plchf_page_element_settings_'.$element_type.'');
		
		die();
		
	}
	
	add_action( 'wp_ajax_plchf_msb_add_element','plchf_msb_add_element');

/* ----------------------------------------------------------------------------
	Add Element to Page
---------------------------------------------------------------------------- */	
	
	function my_enqueue() {
		
		$screen = get_current_screen();
		
		if ( ($screen->id == 'mobile-site-builder_page_pluginchiefmsb/edit-page') || ($screen->id == 'mobile-site-builder_page_pluginchiefmsb/new-site') ) {
        	
        	wp_enqueue_script('jquery-ui-core');
        	wp_enqueue_script('jquery-ui-sortable');
        	wp_enqueue_script( 'plchf_msb_custom_js', PLUGINCHIEFMSB . 'js/scripts/custom.js');
        	add_thickbox();
        
        }
    }

    add_action( 'admin_enqueue_scripts', 'my_enqueue' );

/* ----------------------------------------------------------------------------
	Create Settings Panel for Page Element
---------------------------------------------------------------------------- */	
	    
    function plchf_page_element_settings_panel($element_type, $fields){
	    
	    $element_type_formatted = strtolower(str_replace(" ", "-", $element_type));
	    
	    echo  '<div class="page-element '.$element_type_formatted.' draggable">';
	    	
	    	// Settings Bar
	    	echo  '<div class="settings-bar">';
	    		echo  '<div class="inner-settings-bar">';
	    			echo  '<div class="one_third">';
	    				echo  '<div class="element-info">';
	    					echo  $element_type;
	    				echo  '</div>';
	    			echo  '</div>';
	    			echo  '<div class="two_third column-last">';
		    			echo  '<div class="controls">';
		    				echo  '<div class="element-control element-move"></div>';
		    				echo  '<div class="element-control element-open"></div>';
		    				echo  '<div class="element-control element-remove"></div>';
		    			echo  '</div>';
		    		echo  '</div>';
	    		echo  '</div>';
	    	echo  '</div>';
	    	
	    	// Settings Content
		    echo  '<div class="content">';
		    		
		    	echo  '<h2>'.$element_type.'</h2>';
		    		
		    		foreach ($fields as $field) {
		    		
		    			do_action('plchf_msb_page_element_settings_field_text_area', $field);
		    		
		    		}
		    		
		    	echo  '</div>';
		    	
		    echo  '</div>';
	    
    }
    
    function goooo() {
	    
	    echo 'goooo';
	    
    }
    
    add_action('goooo','goooo');

/* ----------------------------------------------------------------------------
	Get Site ID
---------------------------------------------------------------------------- */	
   
    function plchf_msb_get_site_id() {
	    
	    $screen = get_current_screen();
		
		// Get Screen ID on Edit Page, page
		if ($screen->id == 'mobile-site-builder_page_pluginchiefmsb/edit-page') {
			
			// Get the Page We're Editing
		    $page_id = $_GET['page_id'];
		    
		    // Get the Page Parent, which is the Site
		    $site_id = get_post($page_id)->post_parent;
		  
		// Get the Site ID on the Edit Site Page 
	    } elseif ($screen->id == 'mobile-site-builder_page_pluginchiefmsb/edit-site') {
		 
			$site_id = $_GET['site_id'];	 
			    
	    }
	    
	    return $site_id;
	    
    }

/* ----------------------------------------------------------------------------
	QR Code Site Preview
---------------------------------------------------------------------------- */	
   
    function plchf_msb_qrcode_preview() {
	    
	    // Get Site ID
	    $site_id = plchf_msb_get_site_id();
	    
	    // Get Permalink for the Site ID
	    $permalink = get_permalink($site_id);
	    
	    $output .= '
	    <div style="display:block; margin:0px auto; width:80%;">
	    	<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='.$permalink.'&choe=UTF-8&chld=|0" width="100%" height="auto">
	    </div>
	    ';
	    
	    do_action('plchf_msb_above_qrcode_preview');
	    
	    echo apply_filters('plchf_msb_qrcode_preview', $output);
	    
	    do_action('plchf_msb_below_qrcode_preview');
	    
    }
  
/*-----------------------------------------------------------------------------------*/
/* Creates Google Shortlink for Pages and Posts | Usage: wp_get_shortlink();
/*-----------------------------------------------------------------------------------*/

function plchf_msb_googl_shortlink($url) {
	
	$http = new WP_Http();
	
	$headers = array('Content-Type' => 'application/json');
	
	$result = $http->request('https://www.googleapis.com/urlshortener/v1/url', array( 
		'method' => 'POST', 
		'body' => '{
			"longUrl": "' . $url . '"
		}', 
		'headers' => $headers
		)
	);
	
	$result 	= json_decode($result['body']);
	$shortlink 	= $result->id;

	if ($shortlink) {
		return $shortlink;
	} else {
		return $shortlink;
	}

}
  
/* ----------------------------------------------------------------------------
	Mobile Site Shortlink
---------------------------------------------------------------------------- */	
      
    function plchf_msb_site_shortlink() {
	    
	    // Get Site ID
	    $site_id = plchf_msb_get_site_id();
	    
	    // Get Permalink for the Site ID
	    $permalink = get_permalink($site_id);
	    
	    do_action('plchf_msb_above_googl_shortlink');
	    
	    $output .= '<hr>';
	    
	    $output .= '<h2>'.apply_filters('plchf_msb_shortlink_title', 'Site Shortlink:').'</h2>';
	    
	    $output .= '<a href="'.plchf_msb_googl_shortlink($permalink).'">'.plchf_msb_googl_shortlink($permalink).'</a>';
	    
	    echo apply_filters('plchf_msb_googl_site_shortlink', $output);
	    
	    do_action('plchf_msb_below_googl_shortlink');
	    
    }
    
/* ----------------------------------------------------------------------------
	Mobile Site Template Redirect
---------------------------------------------------------------------------- */

	function plchf_msb_template_redirect(){
		
		global $post;
		
		// Site ID
		$parent_id 	= get_post($post->ID)->post_parent;
		
		// Site Settings
		$meta 		= get_post_custom($parent_id);
		
		// Site Theme Setting
		$site_theme = $meta['_plchf_msb_site_theme'][0];
		
		// Formatted Site Theme
		$site_theme = strtolower(str_ireplace('-', '_' ,$site_theme));
		
		// Set Theme, or Set to Default Theme
		if ($site_theme == '') {
			$site_theme = 'clean_theme';
		} else {
			$site_theme = 'clean_theme';
		}
		
		// Only Run id Post Type is Plugin Chief MSB Sites
	    if ($post->post_type == 'pluginchiefmsb-sites') {
	    	
	    	$single_template = apply_filters('plchf_msb_theme_root_'.$site_theme.'', 'goo').apply_filters('plchf_msb_theme_page_'.$site_theme.'','goo');
	    
	    }
	     
	    return $single_template;	
		
	}

	add_filter( "single_template", "plchf_msb_template_redirect", 1);

/* ----------------------------------------------------------------------------
	Correct image path issue in thickbox
---------------------------------------------------------------------------- */
 
	function plchf_msb_load_tb_fix() {
		
		echo "\n" . '<script type="text/javascript">tb_pathToImage = "' . get_option('siteurl') . '/wp-includes/js/thickbox/loadingAnimation.gif";tb_closeImage = "' . get_option('siteurl') . '/wp-includes/js/thickbox/tb-close.png";</script>'. "\n";
		
	}

	add_action('wp_footer', 'plchf_msb_load_tb_fix');

/* ----------------------------------------------------------------------------
	Create Site Function
---------------------------------------------------------------------------- */

	function plchf_msb_create_new_site() {
		
		global $current_user;
		get_currentuserinfo();
		
		// Set Up Variables
		$userid = $current_user->ID;
		
		// Check to see if Create Site Nonce is verified
		if(isset($_POST['plchf_msb_create_new_site_field']) && wp_verify_nonce($_POST['plchf_msb_create_new_site_field'], 'plchf_msb_create_new_site')) {
			
			// Get Post Data
			$name	= $_POST['plchf_msb_create_new_site_site_name'];
			$theme 	= $_POST['plchf_msb_create_new_site_theme'];
			
			// Allows us to hook in and get more post data, if needed
			do_action('plchf_msb_create_new_site_post_data');
			
			// Create the New Site
			$post = array(
				'post_author' 	=> apply_filters('',$userid),
				'post_content' 	=> 'This is the default content for the site',
				'post_name' 	=> $name,
				'post_status' 	=> 'publish',
				'post_title' 	=> $name,
				'post_type' 	=> 'pluginchiefmsb-sites',
			); 
			
			// Insert New Site
			$new_site = wp_insert_post($post);
			
			// After Create Site
			do_action('plchf_msb_after_create_new_site', $new_site);
			
			// Redirect to Edit Site Page
			wp_redirect(apply_filters('plchf_msb_redirect_after_create_site','admin.php?page=pluginchiefmsb/edit-site&site_id='.$new_site.''));
			
		}
		
	}
	
	add_action('init','plchf_msb_create_new_site');

/* ----------------------------------------------------------------------------
	Create Default Home Page Upon Site Creation 
---------------------------------------------------------------------------- */
	
	function plchf_msb_default_theme_default_pages($new_site){
	
		$home = array(
			'comment_status'=> 'closed',      			// 'closed' means no comments.
			'ping_status' 	=> 'closed',      			// 'closed' means pingbacks or trackbacks turned off
			'post_author' 	=> $user_ID,      			// The user ID number of the author.
			'post_name' 	=> ''.$postid.'-home', 		// The name (slug) for your post
			'post_status' 	=> 'publish',     			// Set the status of the new post. 
			'post_title' 	=> 'Home', 	      			// The title of your post.
			'post_parent'   => $new_site,				// Post Parent
			'post_type' 	=> 'pluginchiefmsb-sites'	// Post Type
		);
		
		// Insert Default Page for new Sites
		apply_filters('plchf_msb_insert_default_home_page', wp_insert_post( $home ));
		
	}
	
	add_action('plchf_msb_after_create_new_site','plchf_msb_default_theme_default_pages');

/* ----------------------------------------------------------------------------
	Register Default Theme(s)
---------------------------------------------------------------------------- */
	
	function plchf_msb_register_default_theme() {
		
		global $plchf_msb_themes;
		
		$plchf_msb_themes[] = array(
			'Theme Name' 	=> 'Clean Theme',
			'Slug'			=> 'clean_theme',
			'Version'		=> '1.0',
			'Author Name'	=> 'Jason Bahl',
			'Author URL'	=> 'http://visioniz.com',
			'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/clean-theme/',
			'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/clean-theme/',
			'Multiple Pages'=> 'Yes',
			'Screenshot'	=> 'clean_screenshot.png',
			'Page Elements'	=> 'Yes',
			'Settings Panel'=> 'Yes',
			'Description'	=> 'The clean theme'
		);
		
		$plchf_msb_themes[] = array(
			'Theme Name' 	=> 'Diamond Theme',
			'Slug'			=> 'diamond_theme',
			'Version'		=> '1.0',
			'Author Name'	=> 'Jason Bahl',
			'Author URL'	=> 'http://visioniz.com',
			'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/diamond-theme/',
			'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/diamond-theme/',
			'Screenshot'	=> 'diamond_screenshot.png',
			'Multiple Pages'=> 'Yes',
			'Page Elements'	=> 'Yes',
			'Description'	=> 'This is a really cool theme that is amazing and spectacular. It\'s sure to blow your socks right off!'
		);
		
		$plchf_msb_themes[] = array(
			'Theme Name' 	=> 'Groove Theme',
			'Slug'			=> 'groove_theme',
			'Version'		=> '1.0',
			'Author Name'	=> 'Jason Bahl',
			'Author URL'	=> 'http://visioniz.com',
			'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/groove-theme/',
			'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/groove-theme/',
			'Screenshot'	=> 'groove_screenshot.png',
			'Multiple Pages'=> 'Yes',
			'Page Elements'	=> 'Yes',
			'Description'	=> 'This is a really cool theme that is amazing and spectacular. It\'s sure to blow your socks right off!'
		);
		
		$plchf_msb_themes[] = array(
			'Theme Name' 	=> 'Linen Theme',
			'Slug'			=> 'linen_theme',
			'Version'		=> '1.0',
			'Author Name'	=> 'Jason Bahl',
			'Author URL'	=> 'http://visioniz.com',
			'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/linen-theme/',
			'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/linen-theme/',
			'Screenshot'	=> 'linen_screenshot.png',
			'Multiple Pages'=> 'Yes',
			'Page Elements'	=> 'Yes',
			'Description'	=> 'This is a really cool theme that is amazing and spectacular. It\'s sure to blow your socks right off!'
		);
		
		$plchf_msb_themes[] = array(
			'Theme Name' 	=> 'Restaurant Theme',
			'Slug'			=> 'restaurant_theme',
			'Version'		=> '1.0',
			'Author Name'	=> 'Jason Bahl',
			'Author URL'	=> 'http://visioniz.com',
			'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/restaurant-theme/',
			'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/restaurant-theme/',
			'Screenshot'	=> 'restaurant_screenshot.png',
			'Multiple Pages'=> 'Yes',
			'Page Elements'	=> 'Yes',
			'Description'	=> 'This is a really cool theme that is amazing and spectacular. It\'s sure to blow your socks right off!'
		);
		
		$plchf_msb_themes[] = array(
			'Theme Name' 	=> 'Polaroid Theme',
			'Slug' 			=> 'polaroid_theme',
			'Version'		=> '1.0',
			'Author Name'	=> 'Jason Bahl',
			'Author URL'	=> 'http://visioniz.com',
			'Theme Path'	=> PLUGINCHIEFMSB_PATH . '/mobile-themes/polaroid-theme/',
			'Theme Root'	=> PLUGINCHIEFMSB . 'mobile-themes/polaroid-theme/',
			'Screenshot'	=> 'polaroid_screenshot.png',
			'Multiple Pages'=> 'Yes',
			'Page Elements'	=> 'Yes',
			'Description'	=> 'This is a really cool theme that is amazing and spectacular. It\'s sure to blow your socks right off!'
		);
		
	}
	
	add_action('init', 'plchf_msb_register_default_theme',1);