<?php

if ( ! defined( 'AFFWP_THEME_VERSION' ) )
	define( 'AFFWP_THEME_VERSION', '1.0' );

if ( ! defined( 'AFFWP_INCLUDES_DIR' ) )
	define( 'AFFWP_INCLUDES_DIR', trailingslashit( get_template_directory() ) . 'includes' ); /* Sets the path to the theme's includes directory. */

/**
 * Includes
 * @since 1.0
*/
require_once( trailingslashit( AFFWP_INCLUDES_DIR ) . 'scripts.php' );
require_once( trailingslashit( AFFWP_INCLUDES_DIR ) . 'sharing.php' );
require_once( trailingslashit( AFFWP_INCLUDES_DIR ) . 'gforms.php' );
require_once( trailingslashit( AFFWP_INCLUDES_DIR ) . 'ajax-functions.php' );

/**
 * Cloud typography fonts
 *
 * @since 1.0
*/
function affwp_webfonts() { ?>
	<link rel="stylesheet" type="text/css" href="//cloud.typography.com/6988232/608824/css/fonts.css" />
<?php }
add_action( 'wp_head', 'affwp_webfonts', 5 );

/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since AffiliateWP 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function affwp_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentyfourteen' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'affwp_wp_title', 10, 2 );