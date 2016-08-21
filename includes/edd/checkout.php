<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Checkout modifications
 */

/**
 * Remove header on checkout page
 *
 * @since 1.0.0
 */
function affwp_theme_remove_header( $return ) {

	if ( edd_is_checkout() ) {
		$return = false;
	}

	return $return;
}
add_filter( 'themedd_post_header', 'affwp_theme_remove_header' );

/**
 * Redirect to pricing page when cart is empty.
 *
 * @since 1.0.0
 * @return void
 */
function affwp_theme_empty_cart_redirect() {
	$cart     = function_exists( 'edd_get_cart_contents' ) ? edd_get_cart_contents() : false;
	$redirect = site_url( 'pricing' );

	if ( function_exists( 'edd_is_checkout' ) && edd_is_checkout() && ! $cart ) {
		wp_redirect( $redirect, 301 );
		exit;
	}
}
add_action( 'template_redirect', 'affwp_theme_empty_cart_redirect' );

/**
 * Remove navigation on EDD checkout
 *
 * @since 1.0.0
 */
function affwp_theme_remove_checkout_navigation() {

	if ( ! ( function_exists( 'themedd_is_edd_active' ) && themedd_is_edd_active() ) ) {
		return;
	}

	if ( ! edd_is_checkout() ) {
		return;
	}

	remove_action( 'themedd_site_header_main', 'themedd_primary_menu' );

}
add_action( 'template_redirect', 'affwp_theme_remove_checkout_navigation' );

/**
 * Filter the page titles
 *
 * @since 1.0.0
*/
function affwp_theme_show_the_title( $title, $id ) {

	// purchase confirmation
	if ( function_exists( 'edd_is_success_page' ) && edd_is_success_page() && $id == get_the_ID() ) {

		if ( isset( $_GET['edd-confirm'] ) && 'paypal_express' === $_GET['edd-confirm'] ) {
			$title = sprintf( __( 'Almost there, %s!', 'affwp' ), affwp_theme_edd_purchase_get_first_name() ); // title for PayPal Express
		} elseif ( edd_get_purchase_session() ) {
			$title = sprintf( __( 'Thanks %s!', 'affwp' ), affwp_theme_edd_purchase_get_first_name() );
		} else {
			$title = __( 'Thanks!', 'affwp' ); // no purchase session
		}

	}

    return $title;
}
add_filter( 'the_title', 'affwp_theme_show_the_title', 10, 2 );

/**
 * Link to terms page
 * @return [type] [description]
 */
function affwp_edd_terms_agreement() {
	global $edd_options;

	if ( isset( $edd_options['show_agree_to_terms'] ) ) : ?>


	<fieldset id="edd_terms_agreement">
		<input name="edd_agree_to_terms" class="required" type="checkbox" id="edd_agree_to_terms" value="1" />
		<label for="edd_agree_to_terms">
			I acknowledge and agree that I am purchasing a subscription and have read the <?php echo '<a href="#refund-policy" class="popup-content" data-effect="mfp-move-from-bottom">purchase terms and refund policy</a>'; ?>
		</label>
	</fieldset>

	<?php // seems to only work when placed here ?>
	<script type="text/javascript">
		jQuery(document).ready(function($) {

		// inline
		$('.popup-content').magnificPopup({
			type: 'inline',
			fixedContentPos: true,
			fixedBgPos: true,
			overflowY: 'scroll',
			closeBtnInside: true,
			preloader: false,
			callbacks: {
				beforeOpen: function() {
				this.st.mainClass = this.st.el.attr('data-effect');
				}
			},
			midClick: true,
			removalDelay: 300
        });

		});
	</script>

	<?php endif;
}
remove_action( 'edd_purchase_form_before_submit', 'edd_terms_agreement' );
add_action( 'edd_purchase_form_before_submit', 'affwp_edd_terms_agreement' );
