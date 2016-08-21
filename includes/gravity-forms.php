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
add_filter( 'gform_submit_button_1', '__return_false' );

/**
 * Get form ID of pricing calculator
 * @todo make dynamic
 */
function affwp_theme_pricing_calculator_form_id() {
	return 1;
}
