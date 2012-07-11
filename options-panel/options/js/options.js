jQuery(document).ready(function(){
	
	
	if(jQuery('#last_tab').val() == ''){

		jQuery('.pluginchiefmsb-opts-group-tab:first').slideDown('fast');
		jQuery('#pluginchiefmsb-opts-group-menu li:first').addClass('active');
	
	}else{
		
		tabid = jQuery('#last_tab').val();
		jQuery('#'+tabid+'_section_group').slideDown('fast');
		jQuery('#'+tabid+'_section_group_li').addClass('active');
		
	}
	
	
	jQuery('input[name="'+pluginchiefmsb_opts.opt_name+'[defaults]"]').click(function(){
		if(!confirm(pluginchiefmsb_opts.reset_confirm)){
			return false;
		}
	});
	
	jQuery('.pluginchiefmsb-opts-group-tab-link-a').click(function(){
		relid = jQuery(this).attr('data-rel');
		
		jQuery('#last_tab').val(relid);
		
		jQuery('.pluginchiefmsb-opts-group-tab').each(function(){
			if(jQuery(this).attr('id') == relid+'_section_group'){
				jQuery(this).delay(400).fadeIn(1200);
			}else{
				jQuery(this).fadeOut('fast');
			}
			
		});
		
		jQuery('.pluginchiefmsb-opts-group-tab-link-li').each(function(){
				if(jQuery(this).attr('id') != relid+'_section_group_li' && jQuery(this).hasClass('active')){
					jQuery(this).removeClass('active');
				}
				if(jQuery(this).attr('id') == relid+'_section_group_li'){
					jQuery(this).addClass('active');
				}
		});
	});
	
	
	
	
	if(jQuery('#pluginchiefmsb-opts-save').is(':visible')){
		jQuery('#pluginchiefmsb-opts-save').delay(4000).slideUp('slow');
	}
	
	if(jQuery('#pluginchiefmsb-opts-imported').is(':visible')){
		jQuery('#pluginchiefmsb-opts-imported').delay(4000).slideUp('slow');
	}	
	
	jQuery('input, textarea, select').change(function(){
		jQuery('#pluginchiefmsb-opts-save-warn').slideDown('slow');
	});
	
	
	jQuery('#pluginchiefmsb-opts-import-code-button').click(function(){
		if(jQuery('#pluginchiefmsb-opts-import-link-wrapper').is(':visible')){
			jQuery('#pluginchiefmsb-opts-import-link-wrapper').fadeOut('fast');
			jQuery('#import-link-value').val('');
		}
		jQuery('#pluginchiefmsb-opts-import-code-wrapper').fadeIn('slow');
	});
	
	jQuery('#pluginchiefmsb-opts-import-link-button').click(function(){
		if(jQuery('#pluginchiefmsb-opts-import-code-wrapper').is(':visible')){
			jQuery('#pluginchiefmsb-opts-import-code-wrapper').fadeOut('fast');
			jQuery('#import-code-value').val('');
		}
		jQuery('#pluginchiefmsb-opts-import-link-wrapper').fadeIn('slow');
	});
	
	
	
	
	jQuery('#pluginchiefmsb-opts-export-code-copy').click(function(){
		if(jQuery('#pluginchiefmsb-opts-export-link-value').is(':visible')){jQuery('#pluginchiefmsb-opts-export-link-value').fadeOut('slow');}
		jQuery('#pluginchiefmsb-opts-export-code').toggle('fade');
	});
	
	jQuery('#pluginchiefmsb-opts-export-link').click(function(){
		if(jQuery('#pluginchiefmsb-opts-export-code').is(':visible')){jQuery('#pluginchiefmsb-opts-export-code').fadeOut('slow');}
		jQuery('#pluginchiefmsb-opts-export-link-value').toggle('fade');
	});
	
	

	
	
	
});