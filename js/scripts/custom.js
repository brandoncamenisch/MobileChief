jQuery(document).ready(function($){
	
	
/* ----------------------------------------------------------------------------
	Mobile Page Generator
---------------------------------------------------------------------------- */
	
	function plchf_msb_add_page_elements() {
		
		var elementBtn 	= $('.form-elements li a');
		var pageForm	= $('#page-generator');
		
		pageForm.sortable({
	  		items: '.page-element',
	  		opacity: 0.6,
			cursor: 'move',
			axis: 'y',
			placeholder: 'element-placeholder',
			handle: '.element-move',
			receive: function(response){
				// // alert(response);
			},
			start: function(e, ui) {
				$(this).find('.tinymce').each(function(){
			        tinyMCE.execCommand( 'mceRemoveControl', false, $(this).attr('id') );
			    });
			},
			stop: function(e, ui, response){
				// // alert(response);
				vzcc_save_mobile_page_content();
				$(this).find('.tinymce').each(function(){
			        tinyMCE.execCommand( 'mceAddControl', true, $(this).attr('id') );
			        $(this).sortable("refresh");
			    });
			}
	  	});
			  	
		elementBtn.click(function(){
			
			var elementType = $(this).attr('data-elementtype');
			var data 		= "elementType=" + elementType + "&action=plchf_msb_add_element";
			var placeHolder = $('#page-generator .element-placeholder');
			
			placeHolder.fadeOut();
			
			$.ajax({
				type: 'POST',
			  	url: ajaxurl,
			  	data: data,
			  	handle: '.element-move',
			  	success: function(response){
			  		$('body').find('.tinymce').each(function(){
			        	tinyMCE.execCommand( 'mceRemoveControl', false, $(this).attr('id') );
			    	});
			  		pageForm.prepend(response);
			  		//tinymce();
			  		//vzcc_save_mobile_page_content();
			  		//vzcc_click_to_save_mobile_page();
			  		//gallery_image_checkboxes();
			  		// nicEdit();
			  		// alert(data);
			  		pageForm.sortable({
			  			items: '.page-element',
			  			opacity: 0.6,
						cursor: 'move',
						axis: 'y',
						placeholder: 'element-placeholder',
						handle: '.element-move',
						receive: function(response){
							 // alert(data);
						},
						start: function(e, ui) {
							$(this).find('.tinymce').each(function(){
						        tinyMCE.execCommand( 'mceRemoveControl', false, $(this).attr('id') );
						    });
						},
						stop: function(response){
							// alert(response);
							//vzcc_save_mobile_page_content();
							$(this).find('.tinymce').each(function(){
						        tinyMCE.execCommand( 'mceAddControl', true, $(this).attr('id') );
						        $(this).sortable("refresh");
						    });
						}
			  		});
			  	}
			});
			
			return false;
		
		});
	
	}
	
	plchf_msb_add_page_elements();
	
/* ----------------------------------------------------------------------------
	Toggle Mobile Site Builder Settings Panels
---------------------------------------------------------------------------- */
	 
	function plchf_msb_page_element_toggles() {
	
		var elementHandle = $('.element-open');
		
		elementHandle.live("click", function(event){
		
			event.preventDefault();
			
			$(this).parent().parent().parent().parent().next('.content').slideToggle();			
		
		});
	
	}
	
	plchf_msb_page_element_toggles();

/* ----------------------------------------------------------------------------
	Toggle Create New Site Form
---------------------------------------------------------------------------- */
	
	function plchf_msb_create_site_toggle() {
		
		var createSite = $('.createsitebtn');
		
		createSite.live('click', function(event){
			
			event.preventDefault();
			
			$(this).parent().parent().parent().next('.createsitediv').slideToggle();
			
		});
		
	}
	
	plchf_msb_create_site_toggle();
	
/* ----------------------------------------------------------------------------
	Toggle Theme Details
---------------------------------------------------------------------------- */
	
	function plchf_msb_theme_detail_toggle() {
		
		var themeDetail = $('.theme-detail');
		
		themeDetail.live('click', function(event){
			
			event.preventDefault();
			
			$(this).parent().parent().parent().next('.themedetaildiv').slideToggle();
			
		});
		
	}
	
	plchf_msb_theme_detail_toggle();
 
 });