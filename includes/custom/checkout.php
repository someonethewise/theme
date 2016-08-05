<?php
/**
 * Checkout modifications
 */

/**
 * Remove navigation on EDD checkout
 * @since 1.0.0
 */
function affwp_theme_remove_checkout_navigation() {

	if ( ! ( function_exists( 'themedd_is_edd_active' ) && themedd_is_edd_active() ) ) {
		return;
	}

	if ( ! edd_is_checkout() ) {
		return;
	}

	remove_action( 'themedd_site_header_main', 'themedd_primary_menu' );

}
add_action( 'template_redirect', 'affwp_theme_remove_checkout_navigation' );
