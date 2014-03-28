<?php
/**
 * Enqueue scripts and styles
 */

if ( ! function_exists( 'affwp_enqueue_scripts' ) ) :
function affwp_enqueue_scripts() {

	// Loads our main stylesheet.
	wp_enqueue_style( 'eddplugins-style', get_stylesheet_uri(), array(), '1.0' );

	$custom_js = get_stylesheet_directory() . '/js/affwp.js';

	if ( file_exists( $custom_js ) ) {
		wp_enqueue_script( 'affwp-js', get_stylesheet_directory_uri() . '/js/affwp.js',  array( 'jquery' ), AFFWP_THEME_VERSION, true );
	}

	wp_localize_script( 'affwp-js', 'affwp_scripts', array(
			'ajaxurl'                 => edd_get_ajax_url(),
			'ajax_nonce'              => wp_create_nonce( 'affwp_ajax_nonce' )
		)
	);

	/**
	 * Modernizr (includes html5 shim)
	 * This can be overrided on a child theme basis by including the same file in the child theme's /js folder
	 * Needs to be loaded in the header or IE 8 will freak out
	 */
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.min.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );
	wp_enqueue_script( 'modernizr' );

	/**
	 * Respond.js
	 * This makes media queries work in IE 8
	 */
	wp_register_script( 'respondjs', get_template_directory_uri() . '/js/respond.min.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );
	wp_enqueue_script( 'respondjs' );


}
endif;
add_action( 'wp_enqueue_scripts', 'affwp_enqueue_scripts' );