<?php

function affwp_theme_integration_taxonomies() {

	$labels = array(
		'name'              => _x( 'Features', 'taxonomy general name' ),
		'singular_name'     => _x( 'Feature', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Features' ),
		'all_items'         => __( 'All Features' ),
		'parent_item'       => __( 'Parent Feature' ),
		'parent_item_colon' => __( 'Parent Feature:' ),
		'edit_item'         => __( 'Edit Feature' ),
		'update_item'       => __( 'Update Feature' ),
		'add_new_item'      => __( 'Add New Feature' ),
		'new_item_name'     => __( 'New Feature Name' ),
		'menu_name'         => __( 'Feature' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'feature' ),
	);

	register_taxonomy( 'feature', array( 'integration' ), $args );
}
add_action( 'init', 'affwp_theme_integration_taxonomies', 0 );
