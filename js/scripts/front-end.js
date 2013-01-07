jQuery(document).ready(function($){
	
/* ----------------------------------------------------------------------------
	Set Parent Width
---------------------------------------------------------------------------- */
	
	function plchf_msb_front_end_parent_wrapper_width(){
	
		var plchfWrapperParent = $('#pluginchiefmsb-wrapper').parent();
		
		plchfWrapperParent.css('min-width','830px');
		
	}
	
	// plchf_msb_front_end_parent_wrapper_width();

/* ----------------------------------------------------------------------------
	Set Parent Width
---------------------------------------------------------------------------- */

	function plchf_msb_front_end_show_stripe_add_more_site_hosting_form() {
		
		// Buy More BTN
		var buyMoreTimeBTN 	= $('.plchf_buymoretime');
		var payForm 		= $('.plchf_buymoreform');
		
		payForm.hide();
		
		// 
		buyMoreTimeBTN.live('click', function(event){
			
			event.preventDefault();
			
			var priceAmt = $(this).attr('data-price');
			var siteID 	 = $(this).attr('data-site_id');
			var Days 	 = $(this).attr('data-days');
			var pmtForm  = $(this).parent().parent().parent().parent().parent().parent().nextAll('.plchf_buymoreform');
			
			$('.days_'+siteID).val(Days);
			$('.price_'+siteID).val(priceAmt);
			$('.additional_time_'+siteID).html(Days);
			$('.additional_time_price_'+siteID).html(priceAmt);
				
			pmtForm.slideDown();
			
			
		});
		
	}
	
	plchf_msb_front_end_show_stripe_add_more_site_hosting_form();
	
	
});