<?php
/**
 * Compatibility tweaks
 */

/**
 * Remove subtitles on download grid
 * For some reason or another this only happens on the live site
 *
 * @since 1.0.0
 */
function affwp_theme_download_grid_subtitles( ) {
	add_filter( 'subtitle_view_supported', '__return_false' );
}
add_action( 'edd_download_before', 'affwp_theme_download_grid_subtitles' );
