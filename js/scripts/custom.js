jQuery(document).ready(function($){

/* ----------------------------------------------------------------------------
	Tooltips
---------------------------------------------------------------------------- */	
	
	function plchf_msb_tooltips() {
	
		if ($("[rel=tooltip]").length) {
			$("[rel=tooltip]").tooltip();
		}
	
	}
	
	plchf_msb_tooltips();

/* ----------------------------------------------------------------------------
	Dropdowns
---------------------------------------------------------------------------- */

	function plchf_msb_dropdowns() {
		
		$('.dropdown-toggle').dropdown();
		
	}
	
	plchf_msb_dropdowns();
	
/* ----------------------------------------------------------------------------
	jQuery Slider Form Input
---------------------------------------------------------------------------- */
	
	function plchf_msb_settings_field_slider() {
	
		if ($('.plchf_msb_slider_field').length) {

			$( ".plchf_msb_slider_field" ).slider({
				range: "max",
				min: 1,
				max: 10,
				value: 2,
				slide: function( event, ui ) {
					$(".plchf_msb_slider_amount").val( ui.value );
				}
			});
			
			$( ".plchf_msb_slider_amount" ).val( $( ".plchf_msb_slider_field" ).slider( "value" ) );
			
		}
		
	}
	
	plchf_msb_settings_field_slider();

/* ----------------------------------------------------------------------------
	Toggle Site Info Panels
---------------------------------------------------------------------------- */

	function plchf_msb_toggle_site_panels() {
		
		var widgetAction = $('.widget-action');
		
		widgetAction.live('click', function(event){
			
			// Prevent Default
			event.preventDefault();
			
			// Toggle the content
			$(this).parent().parent().next('.module-inside').slideToggle();
			
		});
		
	}	
	
	plchf_msb_toggle_site_panels();

/* ----------------------------------------------------------------------------
	TinyMCE Tooltips
---------------------------------------------------------------------------- */
	
	function plchf_msb_tinymce() {
	
		$('textarea.tinymce').tinymce({
	        script_url : pluginDir + 'js/vendor-scripts/tiny_mce/tiny_mce.js',
	        theme : "advanced",
			theme_advanced_buttons1 : "formatselect,bold,italic,underline,strikethrough,justifyleft,justifycenter,justifyright,justifyfull",
			theme_advanced_buttons2 : "styleselect,fontselect,fontsizeselect",
			theme_advanced_buttons3 : "bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,forecolor,backcolor",
			theme_advanced_buttons4 : "hr,removeformat,|,charmap,|,code",
			theme_advanced_toolbar_location : "top",
			theme_advanced_toolbar_align : "left",
			theme_advanced_statusbar_location : "bottom",
			theme_advanced_resizing : true,
	        content_css : pluginDir + "css/style.css"
	    });

	}
	
	plchf_msb_tinymce();
	
/* ----------------------------------------------------------------------------
	Date Picker
---------------------------------------------------------------------------- */	
	
	function plchf_msb_datepicker() {
		
		if ($('.datepicker').length) {
		
			$('.datepicker').datepicker();
			
		}
	
	}
	
	plchf_msb_datepicker();
	
/* ----------------------------------------------------------------------------
	Color Picker
---------------------------------------------------------------------------- */	

	function plchf_msb_colorpicker() {
		
		if ($('.colorpicker').length) {

			$('.colorpicker').miniColors();
			
	    }
	    
	}
	
	plchf_msb_colorpicker();
	
/* ----------------------------------------------------------------------------
	Make Page Elements Sortable, and Nestable in Page Sections
---------------------------------------------------------------------------- */
	
	function plchf_msb_sortable_page_sections(){
		
		if ( $('#page-generator, .section-sortable').length ) {
		
			$( "#page-generator, .section-sortable" ).sortable({
				connectWith: ".connected-sortable",
				placeholder: "element-placeholder", 
				items: ".page-element, .page-section",
				handle: ".element-move"
			});
		
		}
		
	}
	
	plchf_msb_sortable_page_sections();

/* ----------------------------------------------------------------------------
	Add Page Sections
---------------------------------------------------------------------------- */
	
	function plchf_msb_add_page_sections() {
		
		var elementBtn 	= $('.form-elements li a');
		var pageForm	= $('#page-generator');
			  	
		elementBtn.click(function(){
			
			var pageID 		= $('#page-generator').attr('data-postid');
			var sectionType = $(this).attr('data-sectiontype');
			var data 		= "pageid=" + pageID + "&sectionType=" + sectionType + "&action=plchf_msb_add_section";
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
			  		plchf_msb_save_mobile_page_content();
			  		plchf_msb_colorpicker();
			  		plchf_msb_datepicker();
			  		plchf_msb_tinymce();
			  		plchf_msb_sortable_page_sections();
			  		plchf_msb_dropdowns();
			  	}
			});
			
			return false;
		
		});
		
	}	
	
	plchf_msb_add_page_sections();

/* ----------------------------------------------------------------------------
	Add Page Elements
---------------------------------------------------------------------------- */	

	function plchf_msb_add_page_elements() {
		
		var elementBtn 	= $('.form-elements li a');
		var pageForm	= $('#page-generator');
			  	
		elementBtn.click(function(){
			
			var pageID 		= $('#page-generator').attr('data-postid');
			var elementType = $(this).attr('data-elementtype');
			var data 		= "pageid=" + pageID + "&elementType=" + elementType + "&action=plchf_msb_add_element";
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
			  		// plchf_msb_save_mobile_page_content();
			  		plchf_msb_colorpicker();
			  		plchf_msb_datepicker();
			  		plchf_msb_tinymce();
			  		plchf_msb_sortable_page_sections();
			  		plchf_msb_dropdowns();
			  	}
			});
			
			return false;
		
		});
	
	}
	
	plchf_msb_add_page_elements();

/* ----------------------------------------------------------------------------
	Refresh iPhone Preview
---------------------------------------------------------------------------- */

	function plchf_msb_refresh_iphone_preview() {
	
		var mainContent 		= $('#pluginchiefmsb-wrapper').html();
		var pageElementContent 	= $(this).html();
	
		$('.mobile-preview-loader').fadeIn();
		$('#preview-frame').attr('src', $('#preview-frame').attr('src'));
		$('.mobile-preview-loader').delay(300).fadeOut();
		
	}

/* ----------------------------------------------------------------------------
	Sticky Elements (iPhone Preview and Site Details)
---------------------------------------------------------------------------- */
	
	function plchf_msb_iphone_preview_sticky() {
	
		// Fixes the Navigation to the top
	    // ============================================= -->
	    $('.iphone-preview').waypoint(function(event, direction) {
			$('.iphone-preview').toggleClass('fixed', direction === "down");
			event.stopPropagation();
		});
		
		$('.site-details').waypoint(function(event, direction) {
			$('.site-details').toggleClass('fixed', direction === "down");
			event.stopPropagation();
		});
	
	}
	
	plchf_msb_iphone_preview_sticky();

/* ----------------------------------------------------------------------------
	Upload Media with Thickbox Image Uploader
---------------------------------------------------------------------------- */
	
	function plchf_msb_upload_media_from_page_element_field(){
		
		$('.upload_image_button').live("click", function(event){
			formfield = $(this).prev('.upload_image');
			tb_show('', '' + adminRoot + 'media-upload.php?type=image&amp;TB_iframe=true');
			return false;
		});
		 
		window.send_to_editor = function(html) {
			
			imgurl = $('img',html).attr('src');
			formfield.val(imgurl);
			tb_remove();
		
		}	
		
	}
	
	plchf_msb_upload_media_from_page_element_field();
		
/* ----------------------------------------------------------------------------
	Toggle Mobile Site Builder Settings Panels
---------------------------------------------------------------------------- */
	 
	function plchf_msb_page_element_toggles() {
	
		var elementHandle = $('.element-open');
		
		elementHandle.live("click", function(event){
		
			// Prevent Default Button Action
			event.preventDefault();
			
			// Toggle the Page Element Content
			$(this).parent().parent().parent().parent().next('.content').slideToggle();			
		
		});
	
	}
	
	plchf_msb_page_element_toggles();
	
/* ----------------------------------------------------------------------------
	Toggle Theme Details
---------------------------------------------------------------------------- */
	
	function plchf_msb_theme_detail_toggle() {
		
		var themeDetail = $('.theme-detail');
		
		themeDetail.live('click', function(event){
			
			// Prevent Default Button Action
			event.preventDefault();
			
			// Toggle the Theme Details Panel
			$(this).parent().parent().parent().next('.themedetaildiv').slideToggle();
			
		});
		
	}
	
	plchf_msb_theme_detail_toggle();
	
/* ----------------------------------------------------------------------------
	AJAX - Save Page Elements On Click
---------------------------------------------------------------------------- */
	
	function plchf_msb_ajax_save_page_elements_on_click() {
		
		var ajaxsave = $('.ajaxsave');
		
		ajaxsave.live('click', function(event){
			
			// Prevent Default Button Action
			event.preventDefault();
			
			// Submit Form to be Saved
			plchf_msb_save_mobile_page_content();
			
			
		});
		
	}
	
	plchf_msb_ajax_save_page_elements_on_click();
	
	
/* ----------------------------------------------------------------------------
	Save Mobile Page Content
---------------------------------------------------------------------------- */
			
	function plchf_msb_save_mobile_page_content() {

		var elementForm = $('#page-generator').serialize();
		var postID 		= $('.page-generator').attr('data-postid');
		
		var data = '' + elementForm + '&post_id=' + postID + '&action=plchf_msb_save_the_page_elements_ajax';

		// Scroll document up to PluginChief Wrapper
		$('html, body').animate({
			scrollTop: $("#pluginchiefmsb-wrapper").offset().top
		}, 500);
		
		// Slide Up all Panels
		$('.page-element .content').slideUp(500);
				
		$.ajax({
			type: 'POST',
		  	url: ajaxurl,
		  	data: data,
		  	success: function(response){
		  		
		  		// Display AJAX Response
		  		// alert(response);
		  		
		  		var success_message = $('<div class="alert alert-success hide">Your Settings Have Been Saved</div>').prependTo('.page-generator');
		  		
		  		success_message.slideDown(300, function(){
				  	setTimeout(function () {
					    success_message.slideUp();
					}, 2300);	
		  		});
		  		
		  		// Refresh the iPhone Preview
		  		plchf_msb_refresh_iphone_preview();
		  		
				return false;
				die();
		  		
		  		}
			  		
			});
	
	}
	
/* ----------------------------------------------------------------------------
	AJAX - Save Site Options On Click
---------------------------------------------------------------------------- */
	
	function plchf_msb_ajax_save_site_options_on_click() {
		
		var ajaxsave = $('.site-options-ajaxsave');
		
		ajaxsave.live('click', function(event){
			
			// Prevent Default Button Action
			event.preventDefault();
			
			// Submit Form to be Saved
			plchf_msb_save_mobile_site_options();
			
			
		});
		
	}
	
	plchf_msb_ajax_save_site_options_on_click();
	
	
/* ----------------------------------------------------------------------------
	Save Mobile Site Options
---------------------------------------------------------------------------- */
			
	function plchf_msb_save_mobile_site_options() {
		
		// Serialize the Form
		var optionsForm = $('#site-settings').serialize();
		
		// Get the Site ID
		var siteID 		= $('.site-settings').attr('data-postid');
		
		// Get the Data in a String
		var data = '' + optionsForm + '&site_id=' + siteID + '&action=plchf_msb_save_site_options_ajax';
		
		// Scroll document up to PluginChief Wrapper
		$('html, body').animate({
			scrollTop: $("#pluginchiefmsb-wrapper").offset().top
		}, 500);
		
		// Slide Up all Panels
		$('.page-element .content').slideUp(500);
			
		// Submit the data with AJAX
		$.ajax({
			type: 'POST',
		  	url: ajaxurl,
		  	data: data,
		  	success: function(response){
		  		
		  		// Display AJAX Response
		  		// alert(response);
		  		
		  		var success_message = $('<div class="alert alert-success hide">Your Settings Have Been Saved</div>').prependTo('.site-settings');
		  		
		  		success_message.slideDown(300, function(){
				  	setTimeout(function () {
					    success_message.slideUp();
					}, 2300);	
		  		});

		  		// Refresh the iPhone Preview
		  		plchf_msb_refresh_iphone_preview();
		  		
				return false;
				die();
		  		
		  		}
			  		
			});
	
	}

/* ----------------------------------------------------------------------------
	Delete Site on Click
---------------------------------------------------------------------------- */

	function plchf_msb_delete_site_on_click() {
		
		var deleteSiteBtn 	= $('.deletesite');
		
		deleteSiteBtn.live('click', function(event){
			
			// Prevent Default Link Action
			event.preventDefault();
			
			// Get the Site ID we need to Delete
			var siteID = $(this).data('siteid');
			
			// Launch the Confirm Dialogue
			$.confirm({
				'title'		: 'Delete Confirmation',
				'message'	: 'Are You Sure You Want to Delete this site? <br />All data will be lost. Continue?',
				'buttons'	: {
						'Yes'	: {
							'class'	: 'btn btn-primary',
							'action': function(){
								plchf_msb_delete_site(siteID);
							}
						},
						'No'	: {
							'class'	: 'btn btn-primary',
							'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
						}
					}
				}
			);
		});
		
	}
	
	plchf_msb_delete_site_on_click();

/* ----------------------------------------------------------------------------
	Delete Site on Click
---------------------------------------------------------------------------- */
	
	function plchf_msb_delete_site(siteID){
		
		// Get the Data in a String
		var data = 'site_id=' + siteID + '&action=plchf_msb_delete_site_ajax';
		
		// Site to Remove
		var siteToRemove 		= $('[data-widgetid="'+siteID+'"]');
		var redirectAfterDelete = $(siteToRemove).attr('data-redirectafterdelete');
		
		// Submit the data with AJAX
		$.ajax({
			type: 'POST',
		  	url: ajaxurl,
		  	data: data,
		  	success: function(response){
		  		siteToRemove.fadeOut();
		  		window.location.replace(redirectAfterDelete);
				return false;
				die();
		  	}
			  		
		});	
		
	}

/* ----------------------------------------------------------------------------
	Remove Page Elements
---------------------------------------------------------------------------- */
	
	function plchf_msb_remove_page_element() {
			  		
  		$('.element-remove').live("click", function(){
  			
  			// Get the Panel Wrapper
  			var item = $(this).parent().parent().parent().parent().parent();
  			
  			// Launch the Confirm Dialogue
			$.confirm({
				'title'		: 'Delete Confirmation',
				'message'	: 'Are You Sure You Want to Remove This Element? <br />All data will be lost. Continue?',
				'buttons'	: {
					'Yes'	: {
						'class'	: 'btn btn-primary',
						'action': function(){
							item.remove();
							plchf_msb_save_mobile_page_content();
						}
					},
					'No'	: {
						'class'	: 'btn btn-primary',
						'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});
  		
  		});
  		
  	}
  	
  	plchf_msb_remove_page_element();
 
/* ----------------------------------------------------------------------------
	Create New Mobile Pages
---------------------------------------------------------------------------- */
 	
	function plchf_msb_mobile_create_new_pages() {
	
		var submitBtn = $('input.create-new-page');
		
		submitBtn.live('click', function(event){
		
		event.preventDefault();
		
		// Serialize the Menu Manager Form
		var createSiteForm = $('#menu-manager').serialize();
		
		// Get the Div we need to prepend the new page to
		var sitePages = $('.menu-builder .menu-container');
		
		// Put the data together from the form and submit to the correct AJAX action
		var data = createSiteForm + '&action=plchf_msb_create_new_page_with_ajax';	
			
			// Submit the Data with AJAX, prepend the response and save the content		
			$.ajax({
				type: 'POST',
			  	url: ajaxurl,
			  	data: data,
			  	success: function(response){
			  		sitePages.prepend(response);
			  		plchf_msb_save_mobile_page_order();
					return false;
					die();
			  	}	
	
			});	
		
		});
	
	}	
	
	plchf_msb_mobile_create_new_pages();
	
/* ----------------------------------------------------------------------------
	Delete Mobile Page
---------------------------------------------------------------------------- */
 	
	function plchf_msb_delete_page_self(){
	
		var deletePageBtn = $('.deletepageself');
		
		deletePageBtn.live('click', function(event){
			
			event.preventDefault();
			
			var pageID		= $(this).parent().parent().attr('data-id');
			var data 		= 'page_id=' + pageID + '&action=plchf_msb_delete_mobile_site_page_self';
			var parentItem 	= $(this).parent().parent();

			$.confirm({
				'title'		: 'Delete Confirmation',
				'message'	: 'Are You Sure You Want to Delete This Page? <br />All data will be lost. Continue?',
				'buttons'	: {
					'Yes'	: {
						'class'	: 'btn btn-primary',
						'action': function(response){
							$.ajax({
								type: 'POST',
							  	url: ajaxurl,
							  	data: data,
							  	success: function(data){
							  		// alert(data);
							  		window.location.replace(data);
							  		return false;
									die();
							  	}	
					
							});		
						}
					},
					'No'	: {
						'class'	: 'btn btn-primary',
						'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});
			
		});			
	
	}
	
	plchf_msb_delete_page_self();
	
/* ----------------------------------------------------------------------------
	Delete Mobile Page
---------------------------------------------------------------------------- */
 	
	function plchf_msb_delete_page(){
	
		var deletePageBtn = $('.deletepage');
		
		deletePageBtn.live('click', function(event){
			
			event.preventDefault();
			
			var pageID		= $(this).parent().parent().attr('data-id');
			var data 		= 'page_id=' + pageID + '&action=plchf_msb_delete_mobile_site_page';
			var parentItem 	= $(this).parent().parent();

			$.confirm({
				'title'		: 'Delete Confirmation',
				'message'	: 'Are You Sure You Want to Delete This Page? <br />All data will be lost. Continue?',
				'buttons'	: {
					'Yes'	: {
						'class'	: 'btn btn-primary',
						'action': function(response){
							$.ajax({
								type: 'POST',
							  	url: ajaxurl,
							  	data: data,
							  	success: function(response){
							  		parentItem.remove();
							  		plchf_msb_save_mobile_page_order();
							  		// alert(response);
							  		return false;
									die();
							  	}	
					
							});		
						}
					},
					'No'	: {
						'class'	: 'btn btn-primary',
						'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});
			
		});
	
	}
	
	plchf_msb_delete_page();

/* ----------------------------------------------------------------------------
	Make Menu Manager Sortable
---------------------------------------------------------------------------- */
	
	function plchf_msb_sortable_pages(){
	
		var PageList = $('.menu-container');
	 
		PageList.sortable({
			handle: '.menuitem-move',
			update: function(event, ui) {
				plchf_msb_save_mobile_page_order();
			}
		});
	
	}
	
	plchf_msb_sortable_pages();

/* ----------------------------------------------------------------------------
	Save Pages Order
---------------------------------------------------------------------------- */	
	
	function plchf_msb_save_mobile_page_order() {
		
		var PageList = $('.menu-container');
		
		opts = {
			url: ajaxurl, // ajaxurl is defined by WordPress and points to /wp-admin/admin-ajax.php
			type: 'POST',
			async: true,
			cache: false,
			dataType: 'json',
			data:{
				action: 'plchf_msb_pages_sort', 	// Tell WordPress how to handle this ajax request
				order: PageList.sortable('toArray').toString() // Passes ID's of list items in	1,3,2 format
			},
			success: function(response) {
				// $('#loading-animation').hide(); // Hide the loading animation
				// plchf_msb_save_mobile_page_content();
				plchf_msb_refresh_iphone_preview();
				return; 
			},
			error: function(xhr,textStatus,e) {  // This can be expanded to provide more information
				// alert('There was an error saving the updates');
				plchf_msb_refresh_iphone_preview();
				// $('#loading-animation').hide(); // Hide the loading animation
				return; 
			}
		};
		
		$.ajax(opts);
		
	}

/* ----------------------------------------------------------------------------
	End jQuery Document Ready
---------------------------------------------------------------------------- */

});