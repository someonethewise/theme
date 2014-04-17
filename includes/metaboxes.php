<?php
/**		
 * Metaboxes
*/

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Add Download Type Meta Box.
 *
 * @since 1.0
 */
function affwp_add_meta_box() {
	add_meta_box( 'affwp_addon_meta_box', esc_html__( 'Add-on Information', 'affwp' ), 'affwp_addon_meta_box', 'download', 'side' );
}
add_action( 'add_meta_boxes', 'affwp_add_meta_box' );




/**		
 * Metabox callback
 * @since 1.0
*/
function affwp_addon_meta_box( $post_id ) { 
	?>
	
	<p>
		<label for="affwp-addon-coming-soon">
			<input type="checkbox" name="affwp_addon_coming_soon" id="affwp-addon-coming-soon" value="1" <?php checked( true, affwp_addon_is_coming_soon( get_the_ID() ) ); ?> />
			<?php _e( 'Add-on is coming soon', 'affwp' ); ?>
		</label>
	</p>

	<p><strong><?php _e( 'Version', 'affwp' ); ?></strong></p>
	<p>
		<label for="affwp_addon_version" class="screen-reader-text">
			<?php _e( 'Version', 'affwp' ); ?>
		</label>
		<input class="widefat" type="text" name="affwp_addon_version" id="affwp_addon_version" value="<?php echo esc_attr( get_post_meta( get_the_ID(), '_affwp_addon_version', true ) ); ?>" size="30" />
	</p>

	<p><strong><?php _e( 'AffiliateWP Version Required', 'affwp' ); ?></strong></p>
	<p>
		<label for="affwp_addon_requires" class="screen-reader-text">
			<?php _e( 'Requires', 'affwp' ); ?>
		</label>
		<input class="widefat" type="text" name="affwp_addon_requires" id="affwp_addon_requires" value="<?php echo esc_attr( get_post_meta( get_the_ID(), '_affwp_addon_requires', true ) ); ?>" size="30" />
	</p>

	<p><strong><?php _e( 'Changelog', 'affwp' ); ?></strong></p>
	<p>
		<label for="affwp_addon_changelog" class="screen-reader-text">
			<?php _e( 'Changelog', 'affwp' ); ?>
		</label>
		<textarea name="affwp_addon_changelog" id="affwp_addon_changelog" rows="20" style="width: 100%;"><?php echo esc_attr( get_post_meta( get_the_ID(), '_affwp_addon_changelog', true ) ); ?></textarea>
	</p>

	<p><strong><?php _e( 'Release Date', 'affwp' ); ?></strong></p>
		<p>
			<label for="affwp_addon_release_date" class="screen-reader-text">
				<?php _e( 'Release Date', 'affwp' ); ?>
			</label>
			<input class="widefat" type="text" name="affwp_addon_release_date" id="affwp_addon_release_date" value="<?php echo esc_attr( get_post_meta( get_the_ID(), '_affwp_addon_release_date', true ) ); ?>" size="30" />
		</p>

	<?php wp_nonce_field( 'affwp_addon_metaboxes', 'affwp_addon_metaboxes' ); ?>

<?php }


/**
 * Save function
 *
 * @since 1.1.9
*/
function affwp_addon_save_post( $post_id ) {

	// First we need to check if the current user is authorised to do this action. 
	
	if ( ( isset( $_POST['post_type'] ) && 'download' == $_POST['post_type'] )  ) {
		if ( ! current_user_can( 'edit_page', $post_id ) )
	    	return;
	} else {
		if ( ! current_user_can( 'edit_post', $post_id ) )
	    	return;
	}
	
	if ( ! isset( $_POST['affwp_addon_metaboxes'] ) || ! wp_verify_nonce( $_POST['affwp_addon_metaboxes'], 'affwp_addon_metaboxes' ) ) {
		return;
	}

	if ( ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ( defined( 'DOING_AJAX') && DOING_AJAX ) || isset( $_REQUEST['bulk_edit'] ) ) {
		return;
	}
	
	if ( isset( $post->post_type ) && 'revision' == $post->post_type ) {
		return;
	} 
	
	if ( ! current_user_can( 'edit_product', $post_id ) ) {
		return;
	}


	$fields = apply_filters( 'affwp_addon_metabox_fields_save', array(
			'affwp_addon_coming_soon',
			'affwp_addon_release_date',
			'affwp_addon_version',
			'affwp_addon_requires',
			'affwp_addon_changelog',
		)
	);
	
	foreach ( $fields as $field ) {

		$new = ( isset( $_POST[ $field ] ) ? esc_attr( $_POST[ $field ] ) : '' );
		
		// make number and do from filter
		if ( $field == 'affwp_addon_version' )
			$new = esc_attr( $_POST[ $field ] );

		$new = apply_filters( 'affwp_addon_save_' . $field, $new );

		$meta_key = '_' . $field;

		// Get the meta value of the custom field key.
		$meta_value = get_post_meta( $post_id, $meta_key, true );

		// If a new meta value was added and there was no previous value, add it. 
		if ( $new && '' == $meta_value )
			add_post_meta( $post_id, $meta_key, $new, true );

		// If the new meta value does not match the old value, update it. 
		elseif ( $new && $new != $meta_value )
			update_post_meta( $post_id, $meta_key, $new );

		// If there is no new meta value but an old value exists, delete it. 
		elseif ( '' == $new && $meta_value )
			delete_post_meta( $post_id, $meta_key, $meta_value );
		
	}
}
add_action( 'save_post', 'affwp_addon_save_post' );