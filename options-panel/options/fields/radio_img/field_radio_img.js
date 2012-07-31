/*
 *
 * PLCHF_MSB__Options_radio_img function
 * Changes the radio select option, and changes class on images
 *
 */
function plchf_msb__radio_img_select(relid, labelclass){
	jQuery(this).prev('input[type="radio"]').prop('checked');

	jQuery('.plchf_msb_radio-img-'+labelclass).removeClass('plchf_msb_radio-img-selected');	
	
	jQuery('label[for="'+relid+'"]').addClass('plchf_msb_radio-img-selected');
}//function