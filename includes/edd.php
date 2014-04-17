<?php
/**
 * EDD Modifications
 */


/**
 * Change labels
 */
function affwp_edd_default_downloads_name( $defaults ) {

	$defaults = array(
	   'singular' => __( 'Add-on', 'affwp' ),
	   'plural' => __( 'Add-ons', 'affwp')
	);

	return $defaults;
}
add_filter( 'edd_default_downloads_name', 'affwp_edd_default_downloads_name');

/**
 * Processes the license upgrade
 */
function affwp_process_license_upgrade() {

	if( ! is_user_logged_in() ) {
		// Isn't logged in, so go back to pricing
		wp_redirect( home_url( '/pricing' ) ); exit;
	}

	$affwp_id = affwp_get_affiliatewp_id();

	if( edd_has_user_purchased( get_current_user_id(), $affwp_id, 2 ) ) {

		wp_die( 'You already have a Developer\'s license' );

	} elseif( edd_has_user_purchased( get_current_user_id(), $affwp_id, 1 ) ) {

		// Has a business license
		$discount = 99;

	} elseif( edd_has_user_purchased( get_current_user_id(), $affwp_id ) ) {

		// Has a personal license
		$discount = 49;

	} else {

		// Hasn't purchased, so go back to pricing
		wp_redirect( home_url( '/pricing' ) ); exit;

	}

	// Remove anything in the cart
	edd_empty_cart();

	// Add the dev license
	edd_add_to_cart( $affwp_id, array( 'price_id' => 2 ) ) {
	EDD()->fees->add_fee( $discount * -1, 'License Upgrade Discount' );
	//EDD()->session->set( 'is_upgrade', '1' );

	wp_redirect( edd_get_checkout_uri() ); exit;

}
add_action( 'edd_upgrade_affwp_license', 'affwp_process_license_upgrade' );