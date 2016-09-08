<?php
/**
 * Gravity Forms modifications
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Gravity Forms - change spinner
 *
 * @since 1.0.0
 */
function affwp_theme_gform_ajax_spinner_url( $uri, $form ) {
	return get_stylesheet_directory_uri() . '/images/spinner.svg';
}
add_filter( 'gform_ajax_spinner_url', 'affwp_theme_gform_ajax_spinner_url', 10, 2 );

/**
 * Remove submit button from the pricing calculator
 *
 * @since 1.0.0
 */
add_filter( 'gform_submit_button_' . affwp_theme_pricing_calculator_form_id(), '__return_false' );

/**
 * Get form ID of pricing calculator
 *
 * @since 1.0.0
 */
function affwp_theme_pricing_calculator_form_id() {
	return RGFormsModel::get_form_id( 'AffiliateWP Pricing Calculator' );
}

/**
 * Get form ID of signup form
 *
 * @since 1.0.0
 */
function affwp_theme_signup_form_id() {
	return RGFormsModel::get_form_id( 'Signup' );
}

/**
 * Load Gravity Form
 *
 * @since 1.0.0
 */
function affwp_theme_gform_signup() {

	// only show on single post
	if ( ! is_singular( 'post' ) ) {
		return;
	}

	if ( function_exists( 'gravity_form' ) ) : ?>

	<?php
		$subscriber_count = function_exists( 'mailchimp_subscriber_count' ) && mailchimp_subscriber_count()->subscriber_count() ? mailchimp_subscriber_count()->subscriber_count() : '';
	?>

	<section class="signup box">

	<h4 class="signup-header">Join <span><?php echo $subscriber_count; ?></span> others growing their business with AffiliateWP</h4>
	<p class="signup-intro">We'll only notify you of new articles, special promotions and updates, no spam!</p>

	<?php gravity_form( affwp_theme_signup_form_id(), false, false, false, '', true ); ?>
	</section>
	<?php endif;


}
add_action( 'themedd_entry_content_end', 'affwp_theme_gform_signup', 15 );

/**
 * Gravity Forms - remove validation message
 *
 * @since 1.0.0
*/
function affwp_theme_gform_validation_message( $validation_message, $form ) {

	// default: There was a problem with your submission. Errors have been highlighted below
	return '<p class="validation_error">Oops! please enter your email address below</p>';
}
add_filter( 'gform_validation_message_' . affwp_theme_signup_form_id(), 'affwp_theme_gform_validation_message', 10, 2 );
