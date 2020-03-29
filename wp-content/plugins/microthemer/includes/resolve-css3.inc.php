<?php
// Stop direct call
if(preg_match('#' . basename(__FILE__) . '#', $_SERVER['PHP_SELF'])) {
	die('Please do not call this page directly.');
}

// gradient
if ( ($property == 'gradient_a' or
$property == 'gradient_b' or
$property == 'gradient_b_pos' or
$property == 'gradient_c' or
$property == 'gradient_angle')
and empty($array['styles']['gradient']['rendered']) ) {

	// !important is a bit different for css3 - only one "i" per line - do another check
	$sty['css_important'] = $this->tvr_css3_imp($section_name, $css_selector, $property_group_name, 'gradient_c', $con, $mq_key);
	//$sty['data'].= "$section_name, $css_selector_slug, $property_group_name, 'gradient_c', $con, $mq_key - ".$sty['css_important'];

	// get Gradient A or default to other gradient
	if ( !empty($property_group_array['gradient_a'])) {
		$gradient_a = $property_group_array['gradient_a'];
	}
	else {
		// make same as B if set
		if ( !empty($property_group_array['gradient_b']) ) {
			$gradient_a = $property_group_array['gradient_b'];
		}
		// else make same as C
		elseif ( !empty($property_group_array['gradient_c']) ) {
			$gradient_a = $property_group_array['gradient_c'];
		}
	}

	// get Gradient B if set (it's optional so no default)
	if ( !empty($property_group_array['gradient_b'])) {
		$gradient_b = $property_group_array['gradient_b'];
		$gradient_b_pos = '50%';
		// get B Position if set
		if ( !empty($property_group_array['gradient_b_pos'])) {
			$gradient_b_pos = $this->maybe_apply_px($property_group_name, 'gradient_b_pos', $property_group_array['gradient_b_pos']);
		}
		// create middle color-stop syntax for -webkit-gradient and others
		$wbkold_bstop = "color-stop($gradient_b_pos, $gradient_b), ";
		$new_bstop = "$gradient_b $gradient_b_pos, ";
	}
	else {
		$wbkold_bstop = '';
		$new_bstop = '';
	}

	// get Gradient C or default to other gradient
	if ( !empty($property_group_array['gradient_c'])) {
		$gradient_c = $property_group_array['gradient_c'];
	}
	else {
		// make same as B if set
		if ( !empty($property_group_array['gradient_b'])) {
			$gradient_c = $property_group_array['gradient_b'];
		}
		// else make same as C
		elseif ( !empty($property_group_array['gradient_a']) ) {
			$gradient_c = $property_group_array['gradient_a'];
		}
	}

	// get Gradient Angle or default to vertical
	if (!empty($property_group_array['gradient_angle'])) {
		$gradient_angle = $property_group_array['gradient_angle'];
	}
	else {
		$gradient_angle = 'top to bottom';
	}
	// convert angle values to browser specific
	switch ($gradient_angle) {
		case 'left to right':
			$wbkold_angle = 'left center, right center';
			$new_angle = '0deg';
			$non_prefix_angle = '90deg'; // non prefixed linear gradient has a different standard for angles (north starting) to prefixed versions
			break;
		case 'top left to bottom right':
			$wbkold_angle = 'left top, right bottom';
			$new_angle = '-45deg';
			$non_prefix_angle = '135deg';
			break;
		case 'top to bottom':
			$wbkold_angle = 'center top, center bottom';
			$new_angle = '-90deg';
			$non_prefix_angle = '180deg';
			break;
		case 'top right to bottom left':
			$wbkold_angle = 'right top, left bottom';
			$new_angle = '-135deg';
			$non_prefix_angle = '-135deg';
			break;
		case 'right to left':
			$wbkold_angle = 'right center, left center';
			$new_angle = '180deg';
			$non_prefix_angle = '-90deg';
			break;
		case 'bottom right to top left':
			$wbkold_angle = 'right bottom, left top';
			$new_angle = '135deg';
			$non_prefix_angle = '-45deg';
			break;
		case 'bottom to top':
			$wbkold_angle = 'center bottom, center top';
			$new_angle = '90deg';
			$non_prefix_angle = '0deg';
			break;
		case 'bottom left to top right':
			$wbkold_angle = 'left bottom, right top';
			$new_angle = '45deg';
			$non_prefix_angle = '45deg';
			break;
		default:
			$wbkold_angle = $gradient_angle;
			$new_angle = $gradient_angle;
			$non_prefix_angle = $gradient_angle;
	}

	// check if bg-color property need to go in
	$user_bg_color = '';
	if (!empty($array['styles']['background']['background_color'])) {
		$user_bg_color = ', ' .$array['styles']['background']['background_color'];
	}

	// check if bg image properties need to go in
	$user_bg_image = '';
	if (!empty($array['styles']['background']['background_image'])) {
		$user_bg_image = "none";
		if ($array['styles']['background']['background_image'] != 'none') {
			$user_bg_image = "url(".$array['styles']['background']['background_image'].")";
		}
		if (!empty($array['styles']['background']['background_repeat'])) {
			$user_bg_image.= ' '.$array['styles']['background']['background_repeat'];
		}
		if (!empty($array['styles']['background']['background_attachment'])) {
			$user_bg_image.= ' '.$array['styles']['background']['background_attachment'];
		}
		if (!empty($array['styles']['background']['background_position'])) {

			$user_bg_image.= ' '.$this->maybe_apply_px('background', 'background_position', $array['styles']['background']['background_position']);
		}
		// size and clip are sep with /
		if (!empty($array['styles']['background']['background_size'])) {
			$user_bg_image.= ' / '.$this->maybe_apply_px('background', 'background_size', $array['styles']['background']['background_size']);
		}
		if (!empty($array['styles']['background']['background_clip'])) {
			$user_bg_image.= ' '.$array['styles']['background']['background_clip'];
		}
		$user_bg_image.= ', ';
	}

	// dont render if no color was set at all
	if (!empty($gradient_a) and !empty($gradient_c)){
		// render the gradient
		$sty['data'].= "	{$tab}background: {$user_bg_image}-webkit-gradient(linear, $wbkold_angle, from($gradient_a), {$wbkold_bstop}to($gradient_c)){$user_bg_color}{$sty['css_important']};
	{$tab}background: {$user_bg_image}-webkit-linear-gradient($new_angle, $gradient_a, {$new_bstop}$gradient_c){$user_bg_color}{$sty['css_important']};
	{$tab}background: {$user_bg_image}-moz-linear-gradient($new_angle, $gradient_a, {$new_bstop}$gradient_c){$user_bg_color}{$sty['css_important']};
	{$tab}background: {$user_bg_image}-ms-linear-gradient($new_angle, $gradient_a, {$new_bstop}$gradient_c){$user_bg_color}{$sty['css_important']};
	{$tab}background: {$user_bg_image}-o-linear-gradient($new_angle, $gradient_a, {$new_bstop}$gradient_c){$user_bg_color}{$sty['css_important']};
	{$tab}background: {$user_bg_image}linear-gradient($non_prefix_angle, $gradient_a, {$new_bstop}$gradient_c){$user_bg_color}{$sty['css_important']};
	{$tab}-pie-background: {$user_bg_image}linear-gradient($new_angle, $gradient_a, {$new_bstop}$gradient_c){$user_bg_color}{$sty['css_important']};
";
	}


	// record that this property group has been rendered
	$array['styles']['gradient']['rendered'] = true;
	$pie_relevant = true;
}

// border radius
if ( ($property == 'border_top_left_radius' or
$property == 'border_top_right_radius' or
$property == 'border_bottom_right_radius' or
$property == 'border_bottom_left_radius') and
empty($array['styles']['radius']['rendered']) ) {

	// !important is a bit different for css3 - only one "i" per line - do another check
	$sty['css_important'] = $this->tvr_css3_imp($section_name, $css_selector, $property_group_name, 'border_bottom_left_radius', $con, $mq_key);

	// support / syntax for two values per corner
	$c2 = false;

	// top left
	$radius_top_left = 0;
	if (!empty($property_group_array['border_top_left_radius'])) {
		$radius_top_left = $this->maybe_apply_px($property_group_name, 'border_top_left_radius', $property_group_array['border_top_left_radius']);
	}
	$corner = $this->check_two_radius($radius_top_left, $c2);
	$radius_top_left = $corner[0];
	$c2 = $corner[1];

	// top right (why isn't this a loop?)
	$radius_top_right = 0;
	if (!empty($property_group_array['border_top_right_radius'])) {
		$radius_top_right = $this->maybe_apply_px($property_group_name, 'border_top_right_radius', $property_group_array['border_top_right_radius']);
	}
	$corner = $this->check_two_radius($radius_top_right, $c2);
	$radius_top_right = $corner[0];
	$c2 = $corner[1];

	// bottom right
	$radius_bottom_right = 0;
	if (!empty($property_group_array['border_bottom_right_radius'])) {
		$radius_bottom_right = $this->maybe_apply_px($property_group_name, 'border_bottom_right_radius', $property_group_array['border_bottom_right_radius']);
	}
	$corner = $this->check_two_radius($radius_bottom_right, $c2);
	$radius_bottom_right = $corner[0];
	$c2 = $corner[1];

	// bottom left
	$radius_bottom_left = 0;
	if (!empty($property_group_array['border_bottom_left_radius'])) {
		$radius_bottom_left = $this->maybe_apply_px($property_group_name, 'border_bottom_left_radius', $property_group_array['border_bottom_left_radius']);
	}
	$corner = $this->check_two_radius($radius_bottom_left, $c2);
	$radius_bottom_left = $corner[0];
	$c2 = $corner[1];

	if ($this->is_single_keyword($radius_top_left)){
		$radius_rule = $radius_top_left;
	} else {
		$radius_rule = "$radius_top_left $radius_top_right $radius_bottom_right $radius_bottom_left";
		if ($c2){
			$radius_rule.= ' / ' . implode(' ', $c2);
		}
	}

	$radius_rule.= "{$sty['css_important']};";

	$sty['data'].= $tab."	-webkit-border-radius: $radius_rule
	{$tab}-moz-border-radius: $radius_rule
	{$tab}border-radius: $radius_rule
";
	// record that this property group has been rendered
	$array['styles']['radius']['rendered'] = true;
	$pie_relevant = true;
}

// box shadow
if ( ($property == 'box_shadow_color' or
$property == 'box_shadow_x' or
$property == 'box_shadow_y' or
$property == 'box_shadow_blur') and
empty($array['styles']['box_shadow']['rendered'])) {

	// !important is a bit different for css3 - only one "i" per line - do another check
	$sty['css_important'] = $this->tvr_css3_imp($section_name, $css_selector, $property_group_name, 'box_shadow_inset', $con, $mq_key);

	// x-offset
	$box_shadow_x = 0;
	if (!empty($property_group_array['box_shadow_x'])) {
		$box_shadow_x = $this->maybe_apply_px($property_group_name, 'box_shadow_x', $property_group_array['box_shadow_x']);
	}

	// y-offset
	$box_shadow_y = 0;
	if (!empty($property_group_array['box_shadow_y'])) {
		$box_shadow_y = $this->maybe_apply_px($property_group_name, 'box_shadow_y', $property_group_array['box_shadow_y']);
	}

	// blur
	$box_shadow_blur = 0;
	if (!empty($property_group_array['box_shadow_blur'])) {
		$box_shadow_blur = $this->maybe_apply_px($property_group_name, 'box_shadow_blur', $property_group_array['box_shadow_blur']);
	}

	// spread
	$box_shadow_spread = 0;
	if (!empty($property_group_array['box_shadow_spread'])) {
		$box_shadow_spread = $this->maybe_apply_px($property_group_name, 'box_shadow_spread', $property_group_array['box_shadow_spread']);
	}

	// shadow color
	$box_shadow_color = '#CCCCCC';
	if (!empty($property_group_array['box_shadow_color'])) {
		$box_shadow_color = $property_group_array['box_shadow_color'];
	}

	// inset
	$box_shadow_inset = '';
	if (!empty($property_group_array['box_shadow_inset'])) {
		$box_shadow_inset = ' ' . $property_group_array['box_shadow_inset'];
	}

	if ($this->is_single_keyword($box_shadow_x)){
		$box_shad = "$box_shadow_x{$sty['css_important']};";
	} else {
		$box_shad = "$box_shadow_x $box_shadow_y $box_shadow_blur $box_shadow_spread $box_shadow_color{$box_shadow_inset}{$sty['css_important']};";
	}

	$sty['data'].= $tab."	-webkit-box-shadow: $box_shad
{$tab}	-moz-box-shadow: $box_shad
{$tab}	box-shadow: $box_shad
";
 // record that this property group has been rendered
	$array['styles']['box_shadow']['rendered'] = true;
	$pie_relevant = true;

}


// text shadow
if ( (
$property == 'text_shadow_x' or
$property == 'text_shadow_y' or
$property == 'text_shadow_blur' or
$property == 'text_shadow_color') and
empty($array['styles']['text_shadow']['rendered'])) {

	// !important is a bit different for css3 - only one "i" per line - do another check
	$sty['css_important'] = $this->tvr_css3_imp($section_name, $css_selector, $property_group_name, 'text_shadow_color', $con, $mq_key);

	// x-offset
	$text_shadow_x = 0;
	if (!empty($property_group_array['text_shadow_x'])) {
		$text_shadow_x = $this->maybe_apply_px($property_group_name, 'text_shadow_x', $property_group_array['text_shadow_x']);
	}

	// y-offset
	$text_shadow_y = 0;
	if (!empty($property_group_array['text_shadow_y'])) {
		$text_shadow_y = $this->maybe_apply_px($property_group_name, 'text_shadow_y', $property_group_array['text_shadow_y']);
	}

	// blur radius
	$text_shadow_blur = 0;
	if (!empty($property_group_array['text_shadow_blur'])) {
		$text_shadow_blur = $this->maybe_apply_px($property_group_name, 'text_shadow_blur', $property_group_array['text_shadow_blur']);
	}

	// shadow color
	$text_shadow_color = '';
	if (!empty($property_group_array['text_shadow_color'])) {
		$text_shadow_color = $property_group_array['text_shadow_color'];
	}

	// allow just none/initial/inherit
	if ($this->is_single_keyword($text_shadow_x)){
		$resolved_text_shadow = $text_shadow_x;
	} else {
		$resolved_text_shadow = "$text_shadow_x $text_shadow_y $text_shadow_blur $text_shadow_color";
	}

	$sty['data'].= $tab."	text-shadow: $resolved_text_shadow{$sty['css_important']};
";

 // record that this property group has been rendered
	$array['styles']['text_shadow']['rendered'] = true;
}
