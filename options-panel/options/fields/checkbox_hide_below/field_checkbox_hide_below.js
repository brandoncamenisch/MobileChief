jQuery(document).ready(function(){
	
	jQuery('.plchf_msb_opts-checkbox-hide-below').each(function(){
		if(!jQuery(this).is(':checked')){
			jQuery(this).closest('tr').next('tr').hide();
		}
	});
	
	jQuery('.plchf_msb_opts-checkbox-hide-below').click(function(){
		jQuery(this).closest('tr').next('tr').fadeToggle('slow');
	});
	
});