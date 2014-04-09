<?php

/**
 * Get post by title
 */
function affwp_get_post_by_title( $page_title, $post_type = 'post' , $output = OBJECT ) {
    global $wpdb;
        $post = $wpdb->get_var( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_title = %s AND post_type= %s", $page_title, $post_type));
        if ( $post )
            return get_post($post, $output);

    return null;
}