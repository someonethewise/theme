<?php
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
	wp_register_script( 'chartist-js', get_stylesheet_directory_uri() . '/js/chartist.min.js', array( 'jquery' ), AFFWP_THEME_VERSION );

	wp_enqueue_script( 'affwp-js' );

	if ( is_home() || is_singular( 'integration' ) || is_post_type_archive( 'testimonial' ) ) {
		wp_enqueue_script( 'chartist-js' );
	}

}
add_action( 'wp_enqueue_scripts', 'affwp_theme_enqueue_scripts' );


/**
 * Load Twitter JS on about page
 *
 * @since 1.0.0
 */
function affwp_theme_twitter_scripts() {

	if ( ! is_page( 'about' ) ) {
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
