<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Custom scripts
 */


/**
 * Enqueue scripts
 *
 * @since 1.0.0
 */
function affwp_theme_enqueue_scripts() {

	// in addition to the parent theme's JS we load our own
	wp_register_script( 'affwp-js', get_stylesheet_directory_uri() . '/js/affiliatewp.min.js', array( 'jquery' ), AFFWP_THEME_VERSION, true );
	wp_enqueue_script( 'affwp-js' );

}
add_action( 'wp_enqueue_scripts', 'affwp_theme_enqueue_scripts' );


/**
 * Load Twitter JS on about page
 *
 * @since 1.0.0
 */
function affwp_theme_twitter_scripts() {

	if ( ! ( is_page( 'about' ) || is_singular( 'post' ) ) ) {
		return;
	}

	?>

	<script>window.twttr = (function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0],
	    t = window.twttr || {};
	  if (d.getElementById(id)) return t;
	  js = d.createElement(s);
	  js.id = id;
	  js.src = "https://platform.twitter.com/widgets.js";
	  fjs.parentNode.insertBefore(js, fjs);

	  t._e = [];
	  t.ready = function(f) {
	    t._e.push(f);
	  };

	  return t;
	}(document, "script", "twitter-wjs"));</script>

	<?php

}
add_action( 'wp_footer', 'affwp_theme_twitter_scripts' );



/**
 * Dequeue scripts
 */
function affwp_theme_dequeue_scripts() {

	// remove EDD Free Downloads scripts from all non official-free add-on pages
	if ( ! ( is_singular( 'download' ) && has_term( 'official-free', 'download_category' ) ) ) {
		// scripts
		wp_dequeue_script( 'edd-free-downloads-mobile' );
		wp_dequeue_script( 'edd-free-downloads-modal' );
		wp_dequeue_script( 'edd-free-downloads' );

		// styles
		wp_dequeue_style( 'edd-free-downloads-modal' );
		wp_dequeue_style( 'edd-free-downloads' );
	}

	// Remove Help Scout Beacon from EDD checkout
	if (
		is_front_page() ||
		edd_is_checkout() ||
		is_page( 'pricing' ) ||
		is_page( 'account' )
	) {
		wp_dequeue_script( 'beacon' );
	}

}
add_action( 'wp_enqueue_scripts', 'affwp_theme_dequeue_scripts');

/**
 * Perform actions on template_redirect hook
 */
function affwp_theme_edd_template_redirect() {

	// remove HTML from EDD Free Downloads
	if ( ! ( is_singular( 'download' ) && has_term( 'official-free', 'download_category' ) ) ) {
		remove_action( 'wp_footer', 'edd_free_downloads_display_inline' );
	}
}
add_action( 'template_redirect', 'affwp_theme_edd_template_redirect' );
