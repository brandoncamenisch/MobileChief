<?php
	
/* ---------------------------------------------------------------------------- */
/* Plugin Structure Explanation
/* ---------------------------------------------------------------------------- */
	
	function pluginchiefmsb_default_settings () {
	
		global $pluginchiefmsb_admin_pages;
		
		$pluginchiefmsb_admin_pages[] = array(
			'page' => 'Plugin Chief Mobile Site Builder',
			'menu_icon' => 'http://builder.com/wp-admin/images/generic.png',
			'fields' => array(
				array (
					'id' => 'Text',
					'type' => 'text',
					'image' => 'http://pluginchief.com/files/2012/05/lets-do-this.png',
					'settings' => array(
						'Goo' => 'Joo',
						'Gaa' => 'Jaa',
					)
				),
			)
	
		);
	
	}
	
	add_action('admin_init','pluginchiefmsb_default_settings', 1);