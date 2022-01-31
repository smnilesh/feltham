<?php

/**
 * Default header dash
 */
if ( ! function_exists( 'boldthemes_header_headline_dash' ) ) {
	function boldthemes_header_headline_dash() {
		return "bottom"; // 
	}
}
add_filter( 'boldthemes_header_headline_dash', 'boldthemes_header_headline_dash' );

/**
 * Default header parallax
 */
if ( ! function_exists( 'boldthemes_header_headline_parallax' ) ) {
	function boldthemes_header_headline_parallax() {
		return "0.6"; // 
	}
}
add_filter( 'boldthemes_header_headline_parallax', 'boldthemes_header_headline_parallax' );

/**
 * Shop share
 */
if ( ! function_exists( 'boldthemes_shop_share_settings' ) ) {
	function boldthemes_shop_share_settings() {
		return array( 'small', 'filled', 'square' );
	}
}
add_filter( 'boldthemes_shop_share_settings', 'boldthemes_shop_share_settings' );

function load_and_go_image_sizes() {
	add_image_size( 'load_and_go_medium_latest_posts', 640, 640, true );	
}
add_action( 'after_setup_theme', 'load_and_go_image_sizes' );
