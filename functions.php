<?php
/**
 * Constants
 *
 * @since 1.0
 */
if ( ! defined( 'AFFWP_THEME_INCLUDES_DIR' ) ) {
	define( 'AFFWP_THEME_INCLUDES_DIR', trailingslashit( get_stylesheet_directory() ) . 'includes' ); // Sets the path to the theme's includes directory.
}

if ( ! defined( 'AFFWP_THEME_VERSION' ) ) {
	define( 'AFFWP_THEME_VERSION', '1.0.2' );
}

/**
 * Constants
 *
 * @since 1.0.0
*/
if ( ! defined( 'THEMEDD_VERSION' ) ) {
	define( 'THEMEDD_VERSION', '1.0.5' );
}

/**
 * Setup
 *
 * @since 1.0
 */
function affwp_theme_setup() {

	add_post_type_support( 'page', 'excerpt' );

	// add subtitles to downloads
	add_post_type_support( 'download', 'subtitles' );

	add_image_size( 'affwp-post-thumbnail', 480, 240, true );

	// custom stuff
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'account.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'changelog.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'home.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'gravity-forms.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'scripts.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'general.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'pricing.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'icons.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'twitter.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'footer.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'features.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'compatibility/subtitles.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'functions.php' );
	require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'blog.php' );

	// EDD functions
	if ( function_exists( 'themedd_is_edd_active' ) && themedd_is_edd_active() ) {
		require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'download-meta.php' );
		require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'navigation.php' );
		require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'show-add-on-info.php' );

		// EDD specific
		require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'edd/edd.php' );
		require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'edd/functions.php' );
		require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'edd/upgrades.php' );
		require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'edd/downloads.php' );
		require_once( trailingslashit( AFFWP_THEME_INCLUDES_DIR ) . 'edd/checkout.php' );

	}

}
add_action( 'after_setup_theme', 'affwp_theme_setup' );
