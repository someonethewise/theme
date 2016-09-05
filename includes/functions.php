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
 * Determine if the blog post image is an SVG image
 *
 * @since 1.0.0
 */
function affwp_theme_has_svg() {

	$return = false;

	switch ( affwp_theme_featured_image_mime_type() ) {
		case 'svg+xml':
			$return = true;
			break;
	}

	return $return;
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
