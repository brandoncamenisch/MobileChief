<?php

/* ---------------------------------------------------------------------------- */
/* Icon Select Field
/* ---------------------------------------------------------------------------- */

function plchf_msb_site_settings_field_icon_select($fields, $count) {

	// Get the Element Type
	$element_type 	= $element_type;

	$type 			= $fields['type'];
	$label 			= $fields['name'];
	$tooltip	 	= $fields['tooltip'];
	$placeholder	= $fields['placeholder'];
	$field_id		= $fields['id'];
	$options		= $fields['options'];

	// Get the saved Value
	$value			= plchf_msb_get_site_option($type, $field_id);

	// Field Label
	$output .= '
	<label>'.$label.'
		<a href="#" class="tipsy-se floatr" rel="tooltip" data-placement="top" data-original-title="'.$tooltip.'">
			<img src="'.PLUGINCHIEFMSB.'images/element-icons/element-info.png" width="20" height="20" class="info-tooltip-icon">
		</a>
	</label>';

	// Select Field
$output .= '<select class="slick-dropdown" name="field['.$element_type.'_'.$count.']['.$field_id.']">';

		$output .=' <option value="no-icon">No Icon</option>';

		$output .= '<option data-imagesrc="icon-glass" value="icon-glass"';
			if( $value == 'icon-glass'){ $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'Glass')).'</option>';

       	$output .= '<option data-imagesrc="icon-music" value="icon-music"';
			if ( $value == 'icon-music') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'Music')).'</option>';

       	$output .= '<option data-imagesrc="icon-envelope" value="icon-envelope"';
			if ( $value == 'icon-envelope') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'Envelope')).'</option>';

       	$output .= '<option data-imagesrc="icon-heart" value="icon-heart"';
			if ( $value == 'icon-heart') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'heart')).'</option>';

       	$output .= '<option data-imagesrc="icon-star" value="icon-star"';
			if ( $value == 'icon-star') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'star')).'</option>';

       	$output .= '<option data-imagesrc="icon-star-empty" value="icon-star-empty"';
			if ( $value == 'icon-star-empty') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'star-empty')).'</option>';

       	$output .= '<option data-imagesrc="icon-user" value="icon-user"';
			if ( $value == 'icon-user') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'user')).'</option>';

       	$output .= '<option data-imagesrc="icon-film" value="icon-film"';
			if ( $value == 'icon-film') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'film')).'</option>';

       	$output .= '<option data-imagesrc="icon-th-large" value="icon-th-large"';
			if ( $value == 'icon-th-large') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'th-large')).'</option>';

       	$output .= '<option data-imagesrc="icon-th" value="icon-th"';
			if ( $value == 'icon-th') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'th')).'</option>';

       	$output .= '<option data-imagesrc="icon-th-list" value="icon-th-list"';
			if ( $value == 'icon-th-list') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'th-list')).'</option>';

       	$output .= '<option data-imagesrc="icon-ok" value="icon-ok"';
			if ( $value == 'icon-ok') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'ok')).'</option>';

       	$output .= '<option data-imagesrc="icon-remove" value="icon-remove"';
			if ( $value == 'icon-remove') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'remove')).'</option>';

       	$output .= '<option data-imagesrc="icon-zoom-in" value="icon-zoom-in"';
			if ( $value == 'icon-zoom-in') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'zoom-in')).'</option>';

       	$output .= '<option data-imagesrc="icon-zoom-out" value="icon-zoom-out"';
			if ( $value == 'icon-zoom-out') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'zoom-out')).'</option>';

       	$output .= '<option data-imagesrc="icon-off" value="icon-off"';
			if ( $value == 'icon-off') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'off')).'</option>';

       	$output .= '<option data-imagesrc="icon-signal" value="icon-signal"';
			if ( $value == 'icon-signal') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'signal')).'</option>';

       	$output .= '<option data-imagesrc="icon-cog" value="icon-cog"';
			if ( $value == 'icon-cog') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'cog')).'</option>';

       	$output .= '<option data-imagesrc="icon-trash" value="icon-trash"';
			if ( $value == 'icon-trash') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'trash')).'</option>';

       	$output .= '<option data-imagesrc="icon-home" value="icon-home"';
			if ( $value == 'icon-home') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'home')).'</option>';

       	$output .= '<option data-imagesrc="icon-file" value="icon-file"';
			if ( $value == 'icon-file') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'file')).'</option>';

       	$output .= '<option data-imagesrc="icon-time" value="icon-time"';
			if ( $value == 'icon-time') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'time')).'</option>';

       	$output .= '<option data-imagesrc="icon-road" value="icon-road"';
			if ( $value == 'icon-road') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'road')).'</option>';

       	$output .= '<option data-imagesrc="icon-download-alt" value="icon-download-alt"';
			if ( $value == 'icon-download-alt') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'download-alt')).'</option>';

       	$output .= '<option data-imagesrc="icon-download" value="icon-download"';
			if ( $value == 'icon-download') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'download')).'</option>';

       	$output .= '<option data-imagesrc="icon-upload" value="icon-upload"';
			if ( $value == 'icon-upload') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'upload')).'</option>';

       	$output .= '<option data-imagesrc="icon-inbox" value="icon-inbox"';
			if ( $value == 'icon-inbox') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'inbox')).'</option>';

       	$output .= '<option data-imagesrc="icon-play-circle" value="icon-play-circle"';
			if ( $value == 'icon-play-circle') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'play-circle')).'</option>';

       	$output .= '<option data-imagesrc="icon-repeat" value="icon-repeat"';
			if ( $value == 'icon-repeat') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'repeat')).'</option>';

       	$output .= '<option data-imagesrc="icon-refresh" value="icon-refresh"';
			if ( $value == 'icon-refresh') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'refresh')).'</option>';

       	$output .= '<option data-imagesrc="icon-list-alt" value="icon-list-alt"';
			if ( $value == 'icon-list-alt') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'list-alt')).'</option>';

       	$output .= '<option data-imagesrc="icon-lock" value="icon-lock"';
			if ( $value == 'icon-lock') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'lock')).'</option>';

       	$output .= '<option data-imagesrc="icon-flag" value="icon-flag"';
			if ( $value == 'icon-flag') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'flag')).'</option>';

       	$output .= '<option data-imagesrc="icon-headphones" value="icon-headphones"';
			if ( $value == 'icon-headphones') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'headphones')).'</option>';

       	$output .= '<option data-imagesrc="icon-volume-off" value="icon-volume-off"';
			if ( $value == 'icon-volume-off') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'volume-off')).'</option>';

       	$output .= '<option data-imagesrc="icon-volume-down" value="icon-volume-down"';
			if ( $value == 'icon-volume-down') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'volume-down')).'</option>';

       	$output .= '<option data-imagesrc="icon-volume-up" value="icon-volume-up"';
			if ( $value == 'icon-volume-up') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'volume-up')).'</option>';

       	$output .= '<option data-imagesrc="icon-qrcode" value="icon-qrcode"';
			if ( $value == 'icon-qrcode') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'qrcode')).'</option>';

       	$output .= '<option data-imagesrc="icon-barcode" value="icon-barcode"';
			if ( $value == 'icon-barcode') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'barcode')).'</option>';

       	$output .= '<option data-imagesrc="icon-tag" value="icon-tag"';
			if ( $value == 'icon-tag') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'tag')).'</option>';

       	$output .= '<option data-imagesrc="icon-tags" value="icon-tags"';
			if ( $value == 'icon-tags') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'tags')).'</option>';

       	$output .= '<option data-imagesrc="icon-book" value="icon-book"';
			if ( $value == 'icon-book') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'book')).'</option>';

       	$output .= '<option data-imagesrc="icon-bookmark" value="icon-bookmark"';
			if ( $value == 'icon-bookmark') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'bookmark')).'</option>';

       	$output .= '<option data-imagesrc="icon-print" value="icon-print"';
			if ( $value == 'icon-print') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'print')).'</option>';

       	$output .= '<option data-imagesrc="icon-camera" value="icon-camera"';
			if ( $value == 'icon-camera') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'camera')).'</option>';

       	$output .= '<option data-imagesrc="icon-font" value="icon-font"';
			if ( $value == 'icon-font') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'font')).'</option>';

       	$output .= '<option data-imagesrc="icon-bold" value="icon-bold"';
			if ( $value == 'icon-bold') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'bold')).'</option>';

       	$output .= '<option data-imagesrc="icon-italic" value="icon-italic"';
			if ( $value == 'icon-italic') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'italicitalic')).'</option>';

       	$output .= '<option data-imagesrc="icon-text-height" value="icon-text-height"';
			if ( $value == 'icon-text-height') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'text-height')).'</option>';

       	$output .= '<option data-imagesrc="icon-text-width" value="icon-text-width"';
			if ( $value == 'icon-text-width') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'text-width')).'</option>';

       	$output .= '<option data-imagesrc="icon-align-left" value="icon-align-left"';
			if ( $value == 'icon-align-left') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'align-left')).'</option>';

       	$output .= '<option data-imagesrc="icon-align-center" value="icon-align-center"';
			if ( $value == 'icon-align-center') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'align-center')).'</option>';

       	$output .= '<option data-imagesrc="icon-align-right" value="icon-align-right"';
			if ( $value == 'icon-align-right') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'align-rightalign-right')).'</option>';

       	$output .= '<option data-imagesrc="icon-align-justify" value="icon-align-justify"';
			if ( $value == 'icon-align-justify') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'align-justify')).'</option>';

       	$output .= '<option data-imagesrc="icon-list" value="icon-list"';
			if ( $value == 'icon-list') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'list')).'</option>';

       	$output .= '<option data-imagesrc="icon-indent-left" value="icon-indent-left"';
			if ( $value == 'icon-indent-left') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'indent-left')).'</option>';

       	$output .= '<option data-imagesrc="icon-indent-right" value="icon-indent-right"';
			if ( $value == 'icon-indent-right') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'indent-right')).'</option>';

       	$output .= '<option data-imagesrc="icon-facetime-video" value="icon-facetime-video"';
			if ( $value == 'icon-facetime-video') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'facetime-video')).'</option>';

       	$output .= '<option data-imagesrc="icon-picture" value="icon-picture"';
			if ( $value == 'icon-picture') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'picture')).'</option>';

       	$output .= '<option data-imagesrc="icon-pencil" value="icon-pencil"';
			if ( $value == 'icon-pencil') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'pencil')).'</option>';

       	$output .= '<option data-imagesrc="icon-map-marker" value="icon-map-marker"';
			if ( $value == 'icon-map-marker') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'map-marker')).'</option>';

       	$output .= '<option data-imagesrc="icon-adjust" value="icon-adjust"';
			if ( $value == 'icon-adjust') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'adjust')).'</option>';

       	$output .= '<option data-imagesrc="icon-tint" value="icon-tint"';
			if ( $value == 'icon-tint') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'tint')).'</option>';

       	$output .= '<option data-imagesrc="icon-edit" value="icon-edit"';
			if ( $value == 'icon-edit') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'edit')).'</option>';

       	$output .= '<option data-imagesrc="icon-share" value="icon-share"';
			if ( $value == 'icon-share') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'share')).'</option>';

       	$output .= '<option data-imagesrc="icon-check" value="icon-check"';
			if ( $value == 'icon-check') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'check')).'</option>';

       	$output .= '<option data-imagesrc="icon-move" value="icon-move"';
			if ( $value == 'icon-move') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'move')).'</option>';

       	$output .= '<option data-imagesrc="icon-step-backward" value="icon-step-backward"';
			if ( $value == 'icon-step-backward') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'step-backward')).'</option>';

       	$output .= '<option data-imagesrc="icon-fast-backward" value="icon-fast-backward"';
			if ( $value == 'icon-fast-backward') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'fast-backward')).'</option>';

       	$output .= '<option data-imagesrc="icon-backward" value="icon-backward"';
			if ( $value == 'icon-backward') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'backward')).'</option>';

       	$output .= '<option data-imagesrc="icon-play" value="icon-play"';
			if ( $value == 'icon-play') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'play')).'</option>';

       	$output .= '<option data-imagesrc="icon-pause" value="icon-pause"';
			if ( $value == 'icon-pause') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'pause')).'</option>';

       	$output .= '<option data-imagesrc="icon-stop" value="icon-stop"';
			if ( $value == 'icon-stop') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'stop')).'</option>';

       	$output .= '<option data-imagesrc="icon-forward" value="icon-forward"';
			if ( $value == 'icon-forward') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'forward')).'</option>';

       	$output .= '<option data-imagesrc="icon-fast-forward" value="icon-fast-forward"';
			if ( $value == 'icon-fast-forward') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'fast-forward')).'</option>';

       	$output .= '<option data-imagesrc="icon-step-forward" value="icon-step-forward"';
			if ( $value == 'icon-step-forward') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'step-forward')).'</option>';

       	$output .= '<option data-imagesrc="icon-eject" value="icon-eject"';
			if ( $value == 'icon-eject') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'icon-eject')).'</option>';

       	$output .= '<option data-imagesrc="icon-chevron-left" value="icon-chevron-left"';
			if ( $value == 'icon-chevron-left') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'chevron-left')).'</option>';

       	$output .= '<option data-imagesrc="icon-chevron-right" value="icon-chevron-right"';
			if ( $value == 'icon-chevron-right') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'chevron-right')).'</option>';

       	$output .= '<option data-imagesrc="icon-plus-sign" value="icon-plus-sign"';
			if ( $value == 'icon-plus-sign') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'plus-sign')).'</option>';

       	$output .= '<option data-imagesrc="icon-minus-sign" value="icon-minus-sign"';
			if ( $value == 'icon-minus-sign') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'minus-sign')).'</option>';

       	$output .= '<option data-imagesrc="icon-remove-sign" value="icon-remove-sign"';
			if ( $value == 'icon-remove-sign') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'remove-sign')).'</option>';

       	$output .= '<option data-imagesrc="icon-ok-sign" value="icon-ok-sign"';
			if ( $value == 'icon-ok-sign') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'ok-sign')).'</option>';

       	$output .= '<option data-imagesrc="icon-question-sign" value="icon-question-sign"';
			if ( $value == 'icon-question-sign') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'question-sign')).'</option>';

       	$output .= '<option data-imagesrc="icon-info-sign" value="icon-info-sign"';
			if ( $value == 'icon-info-sign') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'info-sign')).'</option>';

       	$output .= '<option data-imagesrc="icon-screenshot" value="icon-screenshot"';
			if ( $value == 'icon-screenshot') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'screenshot')).'</option>';

       	$output .= '<option data-imagesrc="icon-remove-circle" value="icon-remove-circle"';
			if ( $value == 'icon-remove-circle') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'remove-circle')).'</option>';

       	$output .= '<option data-imagesrc="icon-ok-circle" value="icon-ok-circle"';
			if ( $value == 'icon-ok-circle') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'ok-circle')).'</option>';

       	$output .= '<option data-imagesrc="icon-ban-circle" value="icon-ban-circle"';
			if ( $value == 'icon-ban-circle') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'ban-circle')).'</option>';

       	$output .= '<option data-imagesrc="icon-arrow-left" value="icon-arrow-left"';
			if ( $value == 'icon-arrow-left') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'arrow-left')).'</option>';

       	$output .= '<option data-imagesrc="icon-arrow-right" value="icon-arrow-right"';
			if ( $value == 'icon-arrow-right') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'arrow-right')).'</option>';

       	$output .= '<option data-imagesrc="icon-arrow-up" value="icon-arrow-up"';
			if ( $value == 'icon-arrow-up') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'arrow-up')).'</option>';

       	$output .= '<option data-imagesrc="icon-arrow-down" value="icon-arrow-down"';
			if ( $value == 'icon-arrow-down') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'arrow-down')).'</option>';

       	$output .= '<option data-imagesrc="icon-share-alt" value="icon-share-alt"';
			if ( $value == 'icon-share-alt') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'share-alt')).'</option>';

       	$output .= '<option data-imagesrc="icon-resize-full" value="icon-resize-full"';
			if ( $value == 'icon-resize-full') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'resize-full')).'</option>';

       	$output .= '<option data-imagesrc="icon-resize-small" value="icon-resize-small"';
			if ( $value == 'icon-resize-small') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'resize-small')).'</option>';

       	$output .= '<option data-imagesrc="icon-plus" value="icon-plus"';
			if ( $value == 'icon-minus') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'plus')).'</option>';

       	$output .= '<option data-imagesrc="icon-minus" value="icon-minus"';
			if ( $value == 'icon-asterisk') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'minus')).'</option>';

       	$output .= '<option data-imagesrc="icon-exclamation-sign" value="icon-exclamation-sign"';
			if ( $value == 'icon-exclamation-sign') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'exclamation-sign')).'</option>';

       	$output .= '<option data-imagesrc="icon-gift" value="icon-gift"';
			if ( $value == 'icon-gift') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'gift')).'</option>';

       	$output .= '<option data-imagesrc="icon-leaf" value="icon-leaf"';
			if ( $value == 'icon-leaf') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'leaf')).'</option>';

       	$output .= '<option data-imagesrc="icon-fire" value="icon-fire"';
			if ( $value == 'icon-fire') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'fire')).'</option>';

       	$output .= '<option data-imagesrc="icon-eye-open" value="icon-eye-open"';
			if ( $value == 'icon-eye-open') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'eye-open')).'</option>';

       	$output .= '<option data-imagesrc="icon-eye-close" value="icon-eye-close"';
			if ( $value == 'icon-eye-close') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'warning-sign')).'</option>';

       	$output .= '<option data-imagesrc="icon-warning-sign" value="icon-warning-sign"';
			if ( $value == 'icon-plane') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'plane')).'</option>';

       	$output .= '<option data-imagesrc="icon-calendar" value="icon-calendar"';
			if ( $value == 'icon-calendar') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'random')).'</option>';

       	$output .= '<option data-imagesrc="icon-random" value="icon-random"';
			if ( $value == 'icon-random') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'comment')).'</option>';

       	$output .= '<option data-imagesrc="icon-comment" value="icon-comment"';
			if ( $value == 'icon-magnet') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'magnet')).'</option>';

       	$output .= '<option data-imagesrc="icon-chevron-up" value="icon-chevron-up"';
			if ( $value == 'icon-chevron-up') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'chevron-down')).'</option>';

       	$output .= '<option data-imagesrc="icon-chevron-down" value="icon-chevron-down"';
			if ( $value == 'icon-retweet') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'retweet')).'</option>';

       	$output .= '<option data-imagesrc="icon-shopping-cart" value="icon-shopping-cart"';
			if ( $value == 'icon-shopping-cart') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'shopping-cart')).'</option>';

       	$output .= '<option data-imagesrc="icon-folder-close" value="icon-folder-close"';
			if ( $value == 'icon-folder-close') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'folder-close')).'</option>';

       	$output .= '<option data-imagesrc="icon-folder-open" value="icon-folder-open"';
			if ( $value == 'icon-folder-open') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'resize-folder-open')).'</option>';

       	$output .= '<option data-imagesrc="icon-resize-vertical" value="icon-resize-vertical"';
			if ( $value == 'icon-resize-vertical') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'resize-vertical')).'</option>';

       	$output .= '<option data-imagesrc="icon-resize-horizontal" value="icon-resize-horizontal"';
			if ( $value == 'icon-resize-horizontal') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'resize-horizontal')).'</option>';

       	$output .= '<option data-imagesrc="icon-hdd" value="icon-hdd"';
			if ( $value == 'icon-hdd') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'hdd')).'</option>';

       	$output .= '<option data-imagesrc="icon-bullhorn" value="icon-bullhorn"';
			if ( $value == 'icon-bullhorn') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'bullhorn')).'</option>';

       	$output .= '<option data-imagesrc="icon-bell" value="icon-bell"';
			if ( $value == 'icon-bell') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'bell')).'</option>';

       	$output .= '<option data-imagesrc="icon-certificate" value="icon-certificate"';
			if ( $value == 'icon-certificate') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'certificate')).'</option>';

       	$output .= '<option data-imagesrc="icon-thumbs-up" value="icon-thumbs-up"';
			if ( $value == 'icon-thumbs-up') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'thumbs-up')).'</option>';

       	$output .= '<option data-imagesrc="icon-thumbs-down" value="icon-thumbs-down"';
			if ( $value == 'icon-thumbs-down') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'thumbs-down')).'</option>';

       	$output .= '<option data-imagesrc="icon-hand-right" value="icon-hand-right"';
			if ( $value == 'icon-hand-right') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'hand-right')).'</option>';

       	$output .= '<option data-imagesrc="icon-hand-left" value="icon-hand-left"';
			if ( $value == 'icon-hand-left') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'hand-left')).'</option>';

       	$output .= '<option data-imagesrc="icon-hand-up" value="icon-hand-up"';
			if ( $value == 'icon-hand-up') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'hand-up')).'</option>';

       	$output .= '<option data-imagesrc="icon-hand-down" value="icon-hand-down"';
			if ( $value == 'icon-hand-down') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'hand-down')).'</option>';

       	$output .= '<option data-imagesrc="icon-circle-arrow-right" value="icon-circle-arrow-right"';
			if ( $value == 'icon-circle-arrow-right') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'circle-arrow-right')).'</option>';

       	$output .= '<option data-imagesrc="icon-circle-arrow-left" value="icon-circle-arrow-left"';
			if ( $value == 'icon-circle-arrow-left') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'circle-arrow-left')).'</option>';

       	$output .= '<option data-imagesrc="icon-circle-arrow-up" value="icon-circle-arrow-up"';
			if ( $value == 'icon-circle-arrow-up') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'circle-arrow-up')).'</option>';

       	$output .= '<option data-imagesrc="icon-circle-arrow-down" value="icon-circle-arrow-down"';
			if ( $value == 'icon-circle-arrow-down') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'circle-arrow-down')).'</option>';

       	$output .= '<option data-imagesrc="icon-globe" value="icon-globe"';
			if ( $value == 'icon-globe') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'globe')).'</option>';

       	$output .= '<option data-imagesrc="icon-wrench" value="icon-wrench"';
			if ( $value == 'icon-wrench') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'wrench')).'</option>';

       	$output .= '<option data-imagesrc="icon-tasks" value="icon-tasks"';
			if ( $value == 'icon-tasks') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'tasks')).'</option>';

       	$output .= '<option data-imagesrc="icon-filter" value="icon-filter"';
			if ( $value == 'icon-filter') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'filter')).'</option>';

       	$output .= '<option data-imagesrc="icon-briefcase" value="icon-briefcase"';
			if ( $value == 'icon-briefcase') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'briefcase')).'</option>';

       	$output .= '<option data-imagesrc="icon-fullscreen" value="icon-fullscreen"';
			if ( $value == 'icon-fullscreen') { $output .= 'selected="selected"'; } else { }
		$output .= '>'.ucwords(str_replace('-', ' ', 'fullscreen')).'</option>';

	// End Select Field
	$output .= '</select>';

	echo apply_filters('plchf_msb_page_element_settings_field_select_filter', $output);

}

add_action('plchf_msb_site_settings_field_icon_select','plchf_msb_site_settings_field_icon_select', 10, 4);