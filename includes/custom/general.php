<?php
/**
 * General Tweaks
 */

 /**
  * Page heder classes
  *
  * @since 1.0
  */
function affwp_theme_page_header_classes( $classes ) {

	if ( ! is_page( '3rd-party' ) ) {
		return $classes;
	}

	$new_classes = array( 'highlight mb-xs-4' );

	return array_merge( $classes, $new_classes );

}
add_filter( 'themedd_page_header_classes', 'affwp_theme_page_header_classes' );

/**
 * Typekit fonts
 *
 * @since 1.0
 */
function affwp_theme_typekit() {
	?>
	<script src="https://use.typekit.net/gjm4ojr.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
<?php
}
add_action( 'wp_head', 'affwp_theme_typekit' );

/**
 * Load lightbox scripts on specific pages
 *
 * @since 1.0.0
 */
function affwp_theme_load_lightbox( $lightbox ) {

	// load lightbox on pricing page
	if ( is_page( 'pricing' ) || is_front_page() ) {
		$lightbox = true;
	}

	// all add-on pages will have a changelog
	if ( is_singular( 'download' ) ) {
		$lightbox = true;
	}

	return $lightbox;
}
add_filter( 'themedd_enable_popup', 'affwp_theme_load_lightbox' );

/**
 * Disable jetpack carousel comments
 *
 * @since 1.0.0
 */
function affwp_theme_remove_comments_on_attachments( $open, $post_id ) {

	$post = get_post( $post_id );

	if ( $post->post_type == 'attachment' ) {
        return false;
    }

	return $open;

}
add_filter( 'comments_open', 'affwp_theme_remove_comments_on_attachments', 10 , 2 );

/**
 * Order integrations
 *
 * @since 1.0.0
 */
function affwp_theme_sort_integrations( $query ) {

    if ( $query->is_main_query() && ! is_admin() ) {

        if ( $query->is_post_type_archive( 'integration' ) ) {

			$query->set( 'orderby', array( 'menu_order' => 'DESC' ) );
            $query->set( 'order', 'ASC' );
			$query->set( 'posts_per_page', -1 );

        }

    }

}
add_action( 'pre_get_posts', 'affwp_theme_sort_integrations', 100 );

/**
 * Adds custom classes to the array of body classes.
 *
 * @since 1.0.0
 */
function affwp_theme_body_classes( $classes ) {

	global $post;

	if ( is_page_template( 'page-templates/add-on-listing.php' ) ) {
		$classes[] = 'no-sidebar add-on-listing';
	}

	if ( is_page_template( 'page-templates/about.php' ) ) {
		$classes[] = 'about';
	}

	return $classes;

}
add_filter( 'body_class', 'affwp_theme_body_classes' );

/**
 * Hide sidebars
 *
 * @since 1.0.0
 */
function affwp_theme_hide_sidebar( $show ) {

	if ( is_page_template( 'page-templates/add-on-listing.php' ) ) {
		$show = false;
	}

	return $show;

}
add_filter( 'themedd_show_sidebar', 'affwp_theme_hide_sidebar' );


/**
 * Custom copyright
 *
 * @since 1.0.0
 */
function affwp_theme_copyright( $copyright ) {

	$copyright = '<p>' . sprintf( __( '&copy; %s %s', 'themedd' ), date('Y'), get_bloginfo( 'name' ) . ', LLC' ) . '</p>';

	return $copyright;
}
add_filter( 'themedd_copyright', 'affwp_theme_copyright' );
