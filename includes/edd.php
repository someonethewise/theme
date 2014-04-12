<?php
/**
 * EDD Modifications
 */


/**
 * Change labels
 */
function affwp_edd_default_downloads_name( $defaults ) {
   
	$defaults = array(
	   'singular' => __( 'Add-on', 'affwp' ),
	   'plural' => __( 'Add-ons', 'affwp')
	);

	return $defaults;
}
add_filter( 'edd_default_downloads_name', 'affwp_edd_default_downloads_name');