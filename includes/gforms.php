<?php

/**
 * Gravity Forms - remove validation message
 *
 * @since 1.0
*/
function affwp_gform_validation_message( $validation_message, $form ) {
	return '';
}
add_filter( 'gform_validation_message', 'affwp_gform_validation_message', 10, 2 );

/**
 * Gravity Forms - change spinner
 *
 * @since 1.0
*/
function affwp_gform_ajax_spinner_url( $uri, $form ) {
	return get_stylesheet_directory_uri() . '/images/ajax-loader.gif';
}
add_filter( 'gform_ajax_spinner_url', 'affwp_gform_ajax_spinner_url', 10, 2 );

/**
 * Gravity Forms - add note after button
 *
 * @since 1.0
*/
function affwp_gform_submit_button( $button_input, $form ) {
	ob_start();
?>
	<span class="no-spam">We hate spam just as much as you</span>

	<?php 
	return $button_input . ob_get_clean();
}
add_filter( 'gform_submit_button', 'affwp_gform_submit_button', 10, 2 );

/**
 * Gravity Forms - add icon after email submission
 *
 * @since 1.0
*/
function affwp_gform_pre_enqueue_scripts() { ?>
	<i class="icon icon-mail"></i>
<?php }
add_action( 'gform_post_submission', 'affwp_gform_pre_enqueue_scripts' );

/**
 * Gravity Forms - confirmation message
 * I'm too lazy to do it from the settings
 *
 * @since 1.0
*/
function affwp_gform_confirmation( $confirmation, $form, $lead, $ajax ) {
	ob_start();

	?>
	<p>Awesome! We'll let you know as soon as it's ready. In the meantime, why not spread the word?</p>
<?php 
	
	//echo affwp_share_box();

	return ob_get_clean();
}
add_filter( 'gform_confirmation', 'affwp_gform_confirmation', 10, 4 );