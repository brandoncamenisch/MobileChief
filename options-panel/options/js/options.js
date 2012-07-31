jQuery(document).ready(function(){
	
	
	if(jQuery('#last_tab').val() == ''){

		jQuery('.plchf_msb_opts-group-tab:first').slideDown('fast');
		jQuery('#plchf_msb_opts-group-menu li:first').addClass('active');
	
	}else{
		
		tabid = jQuery('#last_tab').val();
		jQuery('#'+tabid+'_section_group').slideDown('fast');
		jQuery('#'+tabid+'_section_group_li').addClass('active');
		
	}
	
	
	jQuery('input[name="'+plchf_msb__opts.opt_name+'[defaults]"]').click(function(){
		if(!confirm(plchf_msb__opts.reset_confirm)){
			return false;
		}
	});
	
	jQuery('.plchf_msb_opts-group-tab-link-a').click(function(){
		relid = jQuery(this).attr('data-rel');
		
		jQuery('#last_tab').val(relid);
		
		jQuery('.plchf_msb_opts-group-tab').each(function(){
			if(jQuery(this).attr('id') == relid+'_section_group'){
				jQuery(this).delay(400).fadeIn(1200);
			}else{
				jQuery(this).fadeOut('fast');
			}
			
		});
		
		jQuery('.plchf_msb_opts-group-tab-link-li').each(function(){
				if(jQuery(this).attr('id') != relid+'_section_group_li' && jQuery(this).hasClass('active')){
					jQuery(this).removeClass('active');
				}
				if(jQuery(this).attr('id') == relid+'_section_group_li'){
					jQuery(this).addClass('active');
				}
		});
	});
	
	
	
	
	if(jQuery('#plchf_msb_opts-save').is(':visible')){
		jQuery('#plchf_msb_opts-save').delay(4000).slideUp('slow');
	}
	
	if(jQuery('#plchf_msb_opts-imported').is(':visible')){
		jQuery('#plchf_msb_opts-imported').delay(4000).slideUp('slow');
	}	
	
	jQuery('input, textarea, select').change(function(){
		jQuery('#plchf_msb_opts-save-warn').slideDown('slow');
	});
	
	
	jQuery('#plchf_msb_opts-import-code-button').click(function(){
		if(jQuery('#plchf_msb_opts-import-link-wrapper').is(':visible')){
			jQuery('#plchf_msb_opts-import-link-wrapper').fadeOut('fast');
			jQuery('#import-link-value').val('');
		}
		jQuery('#plchf_msb_opts-import-code-wrapper').fadeIn('slow');
	});
	
	jQuery('#plchf_msb_opts-import-link-button').click(function(){
		if(jQuery('#plchf_msb_opts-import-code-wrapper').is(':visible')){
			jQuery('#plchf_msb_opts-import-code-wrapper').fadeOut('fast');
			jQuery('#import-code-value').val('');
		}
		jQuery('#plchf_msb_opts-import-link-wrapper').fadeIn('slow');
	});
	
	
	
	
	jQuery('#plchf_msb_opts-export-code-copy').click(function(){
		if(jQuery('#plchf_msb_opts-export-link-value').is(':visible')){jQuery('#plchf_msb_opts-export-link-value').fadeOut('slow');}
		jQuery('#plchf_msb_opts-export-code').toggle('fade');
	});
	
	jQuery('#plchf_msb_opts-export-link').click(function(){
		if(jQuery('#plchf_msb_opts-export-code').is(':visible')){jQuery('#plchf_msb_opts-export-code').fadeOut('slow');}
		jQuery('#plchf_msb_opts-export-link-value').toggle('fade');
	});
	
	

	
	
	
});