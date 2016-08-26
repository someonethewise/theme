<?php
/**
 * Compatibility tweaks
 */

function affwp_theme_filter_title( ) {
	add_filter( 'subtitle_view_supported', '__return_false' );
}
add_action( 'edd_download_before', 'affwp_theme_filter_title' );
