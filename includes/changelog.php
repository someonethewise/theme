<?php
/**
 * Changelog
 *
 * Loads AffiliateWP's changelog via ajax, caches it, and displays it in a modal window
 * See also changelog.php in the theme's root directory
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Append changelog to the changelog page
 *
 * @since 1.0.0
 */
function affwp_theme_append_changelog() {

	if ( ! is_page( 'changelog' ) ) {
		return;
	}

	echo affwp_theme_get_changelog();
}
add_action( 'themedd_entry_content_end', 'affwp_theme_append_changelog' );

/**
 * Get changelog
 * @since 1.0.0
 */
function affwp_theme_get_changelog() {

    // Check for transient, if none, grab remote HTML file
	if ( false === ( $html = get_transient( 'affwp_changelog' ) ) ) {

        // Get remote HTML file
		$response = wp_remote_get( 'https://affiliatewp.com/addons/affiliatewp/changelog' );

        // Check for error
		if ( is_wp_error( $response ) ) {
			return;
		}

        // Parse remote HTML file
		$data = wp_remote_retrieve_body( $response );

        // Check for error
		if ( is_wp_error( $data ) ) {
			return;
		}

        // Store remote HTML file in transient, expire after 24 hours
		set_transient( 'affwp_changelog', $data, 24 * HOUR_IN_SECONDS );

	}

	if ( $html ) {
		return stripslashes_deep( $html );
	} else {
		return stripslashes_deep( $data );
	}

}
