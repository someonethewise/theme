<?php

/**
 * Get mime type of featured image
 *
 * @since 1.0.0
 */
function affwp_theme_featured_image_mime_type() {

	$id        = get_post_thumbnail_id();
	$type      = get_post_mime_type( $id );

	$mime_type = explode( '/', $type );
	$type      = isset( $mime_type['1'] ) ? $mime_type['1'] : '';

	return $type;
}

/**
 * Retrieve the featured icon
 *
 * @since 1.0.0
 */
function affwp_theme_featured_icon() {

	if ( class_exists( 'MultiPostThumbnails' ) && MultiPostThumbnails::get_the_post_thumbnail( get_post_type(), 'feature-icon', get_the_ID() ) ) {
		return MultiPostThumbnails::get_the_post_thumbnail( get_post_type(), 'feature-icon', get_the_ID() );
	}

	return false;
}

/**
 * Is Gravity Forms active?
 *
 * @since 1.0.0
 * @return bool
 */
function affwp_theme_is_gforms_active() {
	return class_exists( 'GFForms' );
}

/**
 * Count how many screenshots there are
 * Images must be uploaded directly to post/page and cannot already exist (or the parent ID will be incorrect)
 *
 * @since 1.0.0
 */
function affwp_theme_screenshot_count() {

	$count = 0;

	$page = get_page_by_title( 'Screenshots' );

	$args = array(
		'post_mime_type' => 'image',
		'numberposts'    => -1,
		'post_parent'    => $page->ID,
		'post_type'      => 'attachment',
	);

	$gallery = get_children( $args );

	if ( $gallery ) {
		$count = count( $gallery );
	}

	return $count;

}

/**
 * Determine if the purchase was part of the Black Friday/Cyber Monday sale
 * Returns true if the discount was used
 */
function affwp_theme_was_sale() {

	// has discount expired?
	$is_discount_expired = edd_is_discount_expired( edd_get_discount_id_by_code( 'BFCM2016' ) );

	// is active?
	$is_discount_active = edd_is_discount_active( edd_get_discount_id_by_code( 'BFCM2016' ) );

	$is_discount_started = edd_is_discount_started( edd_get_discount_id_by_code( 'BFCM2016' ) );

	$purchase_session = edd_get_purchase_session();

	if ( $purchase_session && ! ( isset( $_GET['payment_key'] ) && $_GET['payment_key'] ) ) {

		// main purchase confirmation page
		$payment_id = edd_get_purchase_id_by_key( $purchase_session['purchase_key'] );

	} elseif ( isset( $_GET['payment_key'] ) && $_GET['payment_key'] ) {

		$payment_key = isset( $_GET['payment_key'] ) ? $_GET['payment_key'] : '';

		if ( $payment_key ) {
			// get the payment ID from the purchase key
			$payment_id = edd_get_purchase_id_by_key( $payment_key );
		}
	}

	// payment ID found
	if ( isset( $payment_id ) ) {

		$payment   = new EDD_Payment( $payment_id );
		$discounts = $payment->discounts;

		if ( 'BFCM2016' === $discounts && $is_discount_started && $is_discount_active && ! $is_discount_expired ) {
			return true;
		}

	}

	return false;
}
