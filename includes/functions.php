<?php

/**
 * Get post by title
 * 
 * @since 1.0
 */
function affwp_get_post_by_title( $page_title, $post_type = 'post' , $output = OBJECT ) {
    global $wpdb;
        $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type= %s", $page_title, $post_type) );
        if ( $post )
            return get_post($post, $output);

    return null;
}

/**
 * Get ID of AffiliateWP product
 * 
 * @since  1.0.3
 */
function affwp_get_affiliatewp_id() {
	$id = affwp_get_post_by_title( 'affiliatewp', 'download' );
	$id = $id->ID;

	if ( $id )
		return $id;

	return null;
}