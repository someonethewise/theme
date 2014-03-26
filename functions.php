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