<?php

/* Exit if accessed directly. */
if ( ! defined( 'ABSPATH' ) ) exit;

// Add custom meta box for the integrations
add_action( 'add_meta_boxes', 'affwp_theme_create_meta_boxes' );

// Save metabox data.
add_action( 'save_post', 'affwp_theme_save_meta_boxes', 10, 2 );

/**
 * Add Integrations Meta Box.
 *
 * @since 1.0
 */
function affwp_theme_create_meta_boxes() {
	add_meta_box( 'affwp_theme_metabox', esc_html__( 'Integrations', 'affwp' ), 'affwp_theme_meta_box', array( 'post', 'download' ), 'side', 'core' );
}

/**
 * Display the integrations meta box.
 *
 * @since 0.1
 */
function affwp_theme_meta_box( $post_object, $box ) { ?>

	<?php wp_nonce_field( basename( __FILE__ ), 'edd_download_info_meta_box_nonce' ); ?>

	<?php
		$checked = get_post_meta( $post_object->ID, '_affwp_integration_all', true );
	?>
	<p>
		<label for="integrations-all">
		<input type="checkbox" name="affwp_integration_all" id="integrations-all" value="all" <?php checked( $checked, true ); ?>/>
		All (not integration specific)
		</label>
	</p>

    <?php

	$args = array(
	 	'posts_per_page'   => -1,
	 	'post_type'        => 'integration',
	 	'post_status'      => 'publish',
	 );
	 $integration_posts = get_posts( $args );

	 $integrations = array();

	 if ( $integration_posts ) {
		 foreach ($integration_posts as $key => $integration_post ) {
		 	$integrations[$key] = (int) $integration_post->ID;
		 }
	 }

    if ( $integrations ) {
        foreach ( $integrations as $key => $integration_id ) {

			$current_ids = get_post_meta( $post_object->ID, '_affwp_integration' );

			$checked = in_array( $integration_id, $current_ids ) ? true : false;

            ?>
            <p>
                <label for="integration[<?php echo $key; ?>]">
                <input type="checkbox" name="affwp_integration[<?php echo $key; ?>]" id="integration[<?php echo $key; ?>]" value="<?php echo $integration_id; ?>" <?php checked( $checked, true ); ?>/>
                <?php echo get_the_title( $integration_id ); ?>
                </label>
            </p>
            <?php
        }
    }

    ?>

	<?php
}

/**
 * Save data from download info meta box.
 *
 * @since 0.1
 */
function affwp_theme_save_meta_boxes( $post_id, $post ) {

	// Verify the nonce before proceeding
	if ( ! isset( $_POST['edd_download_info_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['edd_download_info_meta_box_nonce'], basename( __FILE__ ) ) ) {
		return $post_id;
	}

	// Check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}

	// Get the post type object
	$post_type = get_post_type_object( $post->post_type );

	// Check if the current user has permission to edit the post
	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) ) {
		return $post_id;
	}

	// Get meta keys links in an array and save.
	$fields = apply_filters( 'affwp_theme_save_meta_boxes_fields_save', array(
			'affwp_integration',
			'affwp_integration_all'
		)
	);

	// Loop through
	foreach ( $fields as $field ) {

		// create the meta key
		$meta_key = '_' . $field;

		if ( 'affwp_integration' === $field ) {

			// Integration array that is posted
			$integrations = isset( $_POST['affwp_integration'] ) ? $_POST['affwp_integration'] : array();

			// Get an array of the current IDs
			$current_ids = get_post_meta( $post_id, $meta_key );

			// integrations array
			if ( $integrations ) {

				$ids_to_remove = array_diff( $current_ids, $integrations );

				if ( $ids_to_remove ) {
					foreach( $ids_to_remove as $id ){
						delete_post_meta( $post_id, $meta_key, $id );
					}
				}

				// loop through each integration
				foreach ( $integrations as $integration_id ) {

					// Integration ID hasn't been added yet, let's add it
					if ( ! in_array( $integration_id, $current_ids ) ) {
						add_post_meta( $post_id, $meta_key, $integration_id );
					}

				}

			} elseif ( ! $integrations ) {
				// if no integrations are posted, remove all of them
				delete_post_meta( $post_id, $meta_key );
			}

		}

		// supports all integrations
		if ( 'affwp_integration_all' === $field ) {

			if (  isset( $_POST['affwp_integration_all'] ) ) {
				add_post_meta( $post_id, $meta_key, true );
				// delete any integration specific keys
				delete_post_meta( $post_id, 'affwp_integration' );
			} else {
				delete_post_meta( $post_id, $meta_key, true );
			}

		}


	}

}
