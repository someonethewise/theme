<?php

/**
 * Register an integration post type.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */
function affwp_custom_post_types() {

	$labels = array(
		'name'               => _x( 'Integrations', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Integration', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Integrations', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Integration', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'integration', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Integration', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Integration', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Integration', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Integration', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Integrations', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Integrations', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Integrations:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No integrations found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No integrations found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'integrations', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-admin-generic',
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' )
	);

	register_post_type( 'integration', $args );

	$labels = array(
		'name'               => _x( 'Testimonials', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'Integration', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'Testimonials', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'Testimonial', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'testimonial', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New Testimonial', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New Testimonial', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit Testimonial', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View Testimonial', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All Testimonials', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search Testimonials', 'your-plugin-textdomain' ),
		'parent_item_colon'  => __( 'Parent Testimonials:', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No testimonials found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No testimonials found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
        'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'testimonials', 'with_front' => false ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-admin-generic',
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'page-attributes' )
	);

	register_post_type( 'testimonial', $args );
}
add_action( 'init', 'affwp_custom_post_types' );

function affwp_theme_order_cpt( $query ) {

	if ( ! is_admin() && $query->is_post_type_archive() && $query->is_main_query() ) {
		$query->set( 'orderby', 'menu_order');
		$query->set( 'order', 'ASC' );
		return $query;
	}

}
add_action( 'pre_get_posts', 'affwp_theme_order_cpt');
