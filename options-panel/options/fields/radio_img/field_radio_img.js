/*
 *
 * PLUGINCHIEFMSB_Options_radio_img function
 * Changes the radio select option, and changes class on images
 *
 */
function pluginchiefmsb_radio_img_select(relid, labelclass){
	jQuery(this).prev('input[type="radio"]').prop('checked');

	jQuery('.pluginchiefmsb-radio-img-'+labelclass).removeClass('pluginchiefmsb-radio-img-selected');	
	
	jQuery('label[for="'+relid+'"]').addClass('pluginchiefmsb-radio-img-selected');
}//function