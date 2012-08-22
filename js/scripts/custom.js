jQuery(document).ready(function($){

/* ----------------------------------------------------------------------------
	Dropdowns
---------------------------------------------------------------------------- */

	function plchf_msb_dropdowns() {
		
		$('.dropdown-toggle').dropdown();
		
	}
	
	plchf_msb_dropdowns();

/* ----------------------------------------------------------------------------
	DDSlick - Slick Dropdown Selects
---------------------------------------------------------------------------- */
	
	/*
	
	function plchf_msb_slick_menus() {
		
		$('.slick-dropdown').ddslick({
			onSelected: function(data){
				if(data.selectedIndex > 0) {
	                $(this).nextAll('.slick-dropdown-value').attr('value', data.selectedData.value);
	            }
			}
		});
	
	}
	
	plchf_msb_slick_menus();
	
	*/
	
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
	Tipsy Tooltips
---------------------------------------------------------------------------- */	
	
	function plchf_msb_tipsy() {
	
		$('a.tipsy-se').tipsy({
			live: true,
			gravity: 'se'
		});
	
	}
	
	plchf_msb_tipsy();
	
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

			$('.colorpicker').each(function(){
				
				$this = $(this);
				id = $(this).attr('data-colorpicker');
				$('#' + id).farbtastic($this);
			
			});
			
	    }
	    
	}
	
	plchf_msb_colorpicker();
	
/* ----------------------------------------------------------------------------
	Mobile Page Generator
---------------------------------------------------------------------------- */
	
	function plchf_msb_sortable() {
	
		var pageForm	= $('#page-generator');
	  	
		// Set the Page Elements to Sortable
		pageForm.sortable({
	  		items: '.sortable',
	  		opacity: 0.6,
			cursor: 'move',
			axis: 'y',
			placeholder: 'element-placeholder',
			handle: '.element-move',
			receive: function(response){
				//alert(response);
			},
			start: function(e, ui) {
				$(this).find('.tinymce').each(function(){
			        tinyMCE.execCommand( 'mceRemoveControl', false, $(this).attr('id') );
			    });
			},
			stop: function(e, ui, response){
				$(this).find('.tinymce').each(function(){
			        tinyMCE.execCommand( 'mceAddControl', true, $(this).attr('id') );
			        $(this).sortable("refresh");
			    });
			    plchf_msb_save_mobile_page_content();
			}
	  	});
	  	
	}
	
	plchf_msb_sortable();	
	
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
			  		plchf_msb_save_mobile_page_content();
			  		plchf_msb_colorpicker();
			  		plchf_msb_datepicker();
			  		plchf_msb_tinymce();
			  		plchf_msb_sortable();
			  		plchf_msb_dropdowns();
			  		// plchf_msb_slick_menus();
			  		// tinymce();
			  		// vzcc_save_mobile_page_content();
			  		// vzcc_click_to_save_mobile_page();
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
	
		// $('form').bind('form-pre-serialize', function(e) {
		//    tinyMCE.triggerSave();
		// });
	
		var elementForm = $('#page-generator').serialize();
		var postID 		= $('.page-generator').attr('data-postid');
		
		var data = '' + elementForm + '&post_id=' + postID + '&action=plchf_msb_save_the_page_elements_ajax';
	
		$.ajax({
			type: 'POST',
		  	url: ajaxurl,
		  	data: data,
		  	success: function(response){
		  		alert(response);
		  		plchf_msb_refresh_iphone_preview();
		  		// $('.mobile-preview-loader').fadeIn();
		  		// $('#preview-frame').attr('src', $('#preview-frame').attr('src'));
				// $('.mobile-preview-loader').delay(300).fadeOut();
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
						'class'	: 'button-primary',
						'action': function(){
							item.remove();
							plchf_msb_save_mobile_page_content();
						}
					},
					'No'	: {
						'class'	: 'button-primary',
						'action': function(){}	// Nothing to do in this case. You can as well omit the action property.
					}
				}
			});
  		
  		});
  		
  	}
  	
  	plchf_msb_remove_page_element();

/* ----------------------------------------------------------------------------
	And jQuery Document Ready
---------------------------------------------------------------------------- */
});
 
