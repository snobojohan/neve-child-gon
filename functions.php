<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
if ( ! function_exists( 'neve_child_load_css' ) ):
	/**
	 * Load CSS file.
	 */
	function neve_child_load_css() {
		wp_enqueue_style( 'neve-child-style', trailingslashit( get_stylesheet_directory_uri() ) . 'style.css', array( 'neve-style' ), NEVE_VERSION );
	}
endif;
add_action( 'wp_enqueue_scripts', 'neve_child_load_css', 20 );

      
if ( ! function_exists( 'gon_load_admin_css' ) ):
	/**
	 * Load Admin CSS file.
	 */
    function gon_load_admin_css() {
    	wp_enqueue_style( 'admin_css', trailingslashit( get_stylesheet_directory_uri() ) . 'admin-style.css', false, '1.0.0' );
    }  
endif;
add_action( 'admin_enqueue_scripts', 'gon_load_admin_css' );

// Gon - remove require phone
add_filter( 'woocommerce_billing_fields', 'gon_phone_field');
function gon_phone_field( $fields ) {
$fields['billing_phone']['required'] = false;
return $fields;
}

// Gon - disable zoom
function remove_image_zoom_support() {
    remove_theme_support( 'wc-product-gallery-zoom' );
}
add_action( 'wp', 'remove_image_zoom_support', 100 );
