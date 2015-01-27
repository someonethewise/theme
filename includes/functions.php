<?php

/**
 * Get ID of AffiliateWP product
 * 
 * @since  1.0.3
 */
function affwp_get_affiliatewp_id() {

	$download     = get_page_by_title( 'affiliatewp', OBJECT, 'download' );
	$download_id  = $download->ID;

	if ( $download_id ) {
		return $download_id;
	}

	return null;
}

/**
 * Determine if the download is coming soon or not
 * @param  $download_id ID of download to check
 * @return boolean true if addon is coming soon, false otherwise
 * @since  1.1.9
 */
function affwp_addon_is_coming_soon( $download_id ) {
	$coming_soon = get_post_meta( $download_id, '_affwp_addon_coming_soon', true );

	if ( $coming_soon ) {
		return (bool) true;
	}

	return (bool) false;
}