<?php

/**
 * Color schemes
 */
 
function bt_adjustBrightness($hex, $steps) {
    // Steps should be between -255 and 255. Negative = darker, positive = lighter
    $steps = max(-255, min(255, $steps));

    // Normalize into a six character long hex string
    $hex = str_replace('#', '', $hex);
    if (strlen($hex) == 3) {
        $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
    }

    // Split into three parts: R, G and B
    $color_parts = str_split($hex, 2);
    $return = '#';

    foreach ($color_parts as $color) {
        $color   = hexdec($color); // Convert to decimal
        $color   = max(0,min(255,$color + $steps)); // Adjust color
        $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT); // Make two char hex code
    }

    return $return;
}

if ( ! function_exists( 'wheelco_color_schemes' ) ) {
	function wheelco_color_schemes( $color_scheme_arr ) {

		$theme_color_schemes = array();
		$theme_color_schemes[] = 'dark-skin;Light primary, dark secondary (or details);#ffffff;#252525';
		$theme_color_schemes[] = 'light-skin;Dark primary, light secondary (or details);#252525;#ffffff';
		
		$theme_color_schemes[] = 'accent-light-skin;Accent primary, dark secondary (or details);' . boldthemes_get_option( 'accent_color' ) . ';#252525';
		$theme_color_schemes[] = 'accent-dark-skin;Accent primary, light secondary (or details);' . boldthemes_get_option( 'accent_color' ) . ';#ffffff';

		$theme_color_schemes[] = 'transparent-accent-dark-skin;Transparent accent primary, light secondary (or details);' . bt_adjustBrightness( boldthemes_get_option( 'accent_color' ), 60) . ';#ffffff';
		$theme_color_schemes[] = 'transparent-alternate-dark-skin;Transparent alternate primary, light secondary (or details);' . bt_adjustBrightness( boldthemes_get_option( 'alternate_color' ), 60) . ';#ffffff';
		
		$theme_color_schemes[] = 'light-accent-skin;Dark primary, accent secondary (or details);#252525;' . boldthemes_get_option( 'accent_color' );
		$theme_color_schemes[] = 'dark-accent-skin;Light primary, accent secondary (or details);#ffffff;' . boldthemes_get_option( 'accent_color' );
		
		$theme_color_schemes[] = 'alternate-light-skin;Alternate primary, dark secondary (or details);' . boldthemes_get_option( 'alternate_color' ) . ';#252525';
		$theme_color_schemes[] = 'alternate-dark-skin;Alternate primary, light secondary (or details);' . boldthemes_get_option( 'alternate_color' ) . ';#ffffff';
		$theme_color_schemes[] = 'light-alternate-skin;Dark primary, alternate secondary (or details);#252525;' . boldthemes_get_option( 'alternate_color' );
		$theme_color_schemes[] = 'dark-alternate-skin;Light primary, alternate secondary (or details);#ffffff;' . boldthemes_get_option( 'alternate_color' );
		$theme_color_schemes[] = 'gray-dark-skin;Gray background;#252525;#f5f5f5';

		return array_merge( $theme_color_schemes, $color_scheme_arr );
	}
}

/*
* set content width
*/
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

/**
 * Change number of related products
 */
if ( ! function_exists( 'boldthemes_change_number_related_products' ) ) {
	function boldthemes_change_number_related_products( $args ) {
		$args['posts_per_page'] = 4; // # of related products
		$args['columns'] = 4; // # of columns per row
		return $args;
	}
}

/**
 * Loop shop per page
 */
 
if ( ! function_exists( 'boldthemes_loop_shop_per_page' ) ) {
	function boldthemes_loop_shop_per_page( $cols ) {
		return 9;
	}
}

/**
 * Loop columns
 */
if ( ! function_exists( 'boldthemes_loop_shop_columns' ) ) {
	function boldthemes_loop_shop_columns() {
		return 3; // 3 products per row
	}
}