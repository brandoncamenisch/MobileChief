jQuery(document).ready(function($){
	
	// Toggles the module boxes in the 
	// My Sites page
	function omfg2_toggle_sites_module() {

			var toggleBtn = $('.widget-title-action a');
			
			toggleBtn.live('click', function(){
				
				$(this).toggleClass('Goo!');
 			$(this).parent().parent().next('.module-inside').slideToggle();
 			
			});
			
 	
 	}
 	
 	omfg2_toggle_sites_module();
	
 	// Opens the Create a new site dialogue 
 	// when clicking "Create New Site"
 	function omfg2_create_new_site(){
	 	
	 	var createSiteBtn	= $('.createsitebtn');
	 	
	 	createSiteBtn.live('click', function(){
		 	
		 	$(this).parent().append('Clicked!');
		 	
		 	$.confirm({
				'title'		: 'Mobile Site Agreement',
				'message'	: '',
				'buttons'	: {
					'Yes'	: {
						'class'	: 'blue',
						'action': function(){
							form.submit();
						}
					},
					'No'	: {
						'class'	: 'gray',
						'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});
		 	
	 	});
	 		
 	}
 	
 	omfg2_create_new_site();
 	
 
 });