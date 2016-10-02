<?php

/**
 * Forces AffiliateWP's front-end scripts to load on our /affiliates page
 * We're not using the [affiliate_area] shortcode since we don't want a form to show when logged out
 */
function affwp_theme_force_affwp_scripts( $ret ) {

	if ( is_page( 'affiliates' ) ) {
		$ret = true;
	}

	return $ret;
}
add_filter( 'affwp_force_frontend_scripts', 'affwp_theme_force_affwp_scripts' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since 1.0.0
 */
function affwp_theme_affiliates_body_classes( $classes ) {
	global $post;

	if ( is_page( 'affiliates' ) ) {
		$classes[] = 'affiliate-area';
	}

	return $classes;
}
add_filter( 'body_class', 'affwp_theme_affiliates_body_classes' );

/**
 * Redirect affiliates
 * @since 1.0.0
 * @return void
 */
function affwp_theme_affiliate_redirect() {

	if ( is_user_logged_in() && function_exists( 'affwp_is_affiliate' ) && affwp_is_affiliate() ) {
		if ( is_page( 'affiliates/login' ) || is_page( 'affiliates/join' ) ) {
			// redirect affiliates to their affiliate area if they try and access either the login or join pages
			wp_redirect( site_url( 'affiliates' ), 301 );
			exit;
		}
	}

}
add_action( 'template_redirect', 'affwp_theme_affiliate_redirect' );
