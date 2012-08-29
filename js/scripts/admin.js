jQuery(document).ready(function($){
	
/* ----------------------------------------------------------------------------
	Hide SubMenu Links for Edit Site & Edit Page
---------------------------------------------------------------------------- */

	function plchf_msb_hide_admin_submenu_links() {
		
		var editSiteLink = $('[href$="admin.php?page=pluginchiefmsb/edit-site"]');
		var editPageLink = $('[href$="admin.php?page=pluginchiefmsb/edit-page"]');
		
		
		editSiteLink.hide();
		editPageLink.hide();
		
	}
	
	plchf_msb_hide_admin_submenu_links();
	
});