<?php
/**
 * Compatibility tweaks
 */

function affwp_theme_filter_title( $title, $id ) {
	global $post;

	if ( has_shortcode( $post->post_content, 'downloads' ) ) {
		add_filter( 'subtitle_view_supported', '__return_false' );
	}

	return $title;
}
add_filter( 'the_title', 'affwp_theme_filter_title', 10, 2 );
