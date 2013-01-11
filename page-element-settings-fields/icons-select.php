<?php
/**
 * plchf_msb_page_element_settings_field_icon_select function.
 * Icon Select Field
 * @access public
 * @param mixed $fields
 * @param mixed $element_type
 * @param mixed $count
 * @param mixed $values
 * @return void
 */
function plchf_msb_page_element_settings_field_icon_select($fields, $element_type, $count, $values) {
	#Get the Element Type
	$element_type =& $element_type;

	$type 			=& $fields['field']['type'];
	$label 			=& $fields['field']['name'];
	$tooltip	 	=& $fields['field']['tooltip'];
	$placeholder=& $fields['field']['placeholder'];
	$field_id		=& $fields['field']['id'];
	$options		=& $fields['field']['options'];

	#Get the saved Value
	$value			=& $values[''.$field_id.''];

	#To save a ton of work we're going to parse the font-awesome icons and generate them on the fly
	$pattern = '/\.(icon-(?:\w+(?:-)?)+):before\s+{\s*content:\s*"(.+)";\s+}/';
	$subject = file_get_contents(PLUGINCHIEFMSB . 'lib/fontawesome/css/font-awesome.css');
	preg_match_all($pattern, $subject, $matches, PREG_SET_ORDER);
	sort($matches);

	#Field Label
	$output = '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20" height="20" class="info-tooltip-icon">
		</a>
	</label>
	';

	#Select Field
	$output .= '<select class="slick-dropdown" name="field['.$element_type.'_'.$count.']['.$field_id.']">';
		$output .=' <option value="no-icon">No Icon</option>';
		foreach($matches as $match){
		    $output .= "<option data-imagesrc='$match[1]' value='$match[1]'>".str_replace('icon-', NULL, $match[1])."</option>";
		}


	#End Select Field
	$output .= '</select>';

	echo apply_filters('plchf_msb_page_element_settings_field_select_filter', $output);

}

add_action('plchf_msb_page_element_settings_field_icon_select','plchf_msb_page_element_settings_field_icon_select', 10, 4);