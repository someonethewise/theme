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

    // remove the primary navigation
	remove_action( 'themedd_site_header_main', 'themedd_primary_menu' );

    // remove the mobile menu
    remove_action( 'themedd_site_header_main', 'themedd_menu_toggle' );
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

	// Does the cart contain a recurring subscription?
	$cart_contains_recurring = function_exists( 'EDD_Recurring' ) && EDD_Recurring()->cart_contains_recurring() ? true: false;

	// Tweak the agreement text if a subscription in being purchased.
	$extra_text = $cart_contains_recurring ? ' am purchasing a subscription and' : '';

	if ( isset( $edd_options['show_agree_to_terms'] ) ) : ?>

	<fieldset id="edd_terms_agreement">
		<input name="edd_agree_to_terms" class="required" type="checkbox" id="edd_agree_to_terms" value="1" />
		<label for="edd_agree_to_terms">
			I acknowledge and agree that I<?php echo $extra_text; ?> have read the <?php echo '<a href="#refund-policy" class="popup-content" data-effect="mfp-move-from-bottom">purchase terms and refund policy</a>'; ?>
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

/**
 * Add a hook before the content, but only on the EDD success page
 */
function affwp_theme_edd_success_page_the_content( $content ) {

	global $post;

	if ( $post && edd_is_success_page() && is_main_query() && ! post_password_required() ) {
		ob_start();
		do_action( 'affwp_theme_edd_success_page_the_content', $post->ID );
		$content = ob_get_clean() . $content;
	}

	return $content;
}
add_filter( 'the_content', 'affwp_theme_edd_success_page_the_content' );

/**
 * Share purchase via Twitter
 */
function affwp_theme_edd_share_purchase() {

/**
 * Ask the customer to share via Twitter if the purchase included a sale discount and the sale is still going (discount not expired, is active etc)
 */
if ( affwp_theme_was_sale() ) :

	$purchase_session = edd_get_purchase_session();
	$tweet            = 'I just saved 30%25 on AffiliateWP (@affwp), an affiliate marketing plugin for WordPress! %23BlackFriday %23CyberMonday';
	$url              = 'https://afffiliatewp.com';

?>

<section class="signup box mb-xs-4" id="sign-up">

	<h4 class="signup-header">You just saved a huge 30% on AffiliateWP during our Black Friday/Cyber Monday sale</h4>
	<p class="signup-intro">Tell your friends on Twitter or they will miss out!</p>

	<div class="aligncenter">
		<a class="button large twitter" href="https://twitter.com/intent/tweet/?text=<?php echo $tweet; ?>&amp;url=<?php echo $url; ?>" target="_blank">
			<svg version="1.1" x="0px" y="0px" width="24px" height="24px" viewBox="0 0 24 24" enable-background="new 0 0 24 24" xml:space="preserve">
				<g>
					<path d="M23.444,4.834c-0.814,0.363-1.5,0.375-2.228,0.016c0.938-0.562,0.981-0.957,1.32-2.019c-0.878,0.521-1.851,0.9-2.886,1.104 C18.823,3.053,17.642,2.5,16.335,2.5c-2.51,0-4.544,2.036-4.544,4.544c0,0.356,0.04,0.703,0.117,1.036 C8.132,7.891,4.783,6.082,2.542,3.332C2.151,4.003,1.927,4.784,1.927,5.617c0,1.577,0.803,2.967,2.021,3.782 C3.203,9.375,2.503,9.171,1.891,8.831C1.89,8.85,1.89,8.868,1.89,8.888c0,2.202,1.566,4.038,3.646,4.456 c-0.666,0.181-1.368,0.209-2.053,0.079c0.579,1.804,2.257,3.118,4.245,3.155C5.783,18.102,3.372,18.737,1,18.459 C3.012,19.748,5.399,20.5,7.966,20.5c8.358,0,12.928-6.924,12.928-12.929c0-0.198-0.003-0.393-0.012-0.588 C21.769,6.343,22.835,5.746,23.444,4.834z"/>
				</g>
			</svg>

			<span>Tell your friends on Twitter!</span>

		</a>
	</div>

</section>

<section class="more-deals">
	<h3 class="signup-header">More amazing deals!</h3>
	<p>We're also having a 30% off sale on our sister products:</p>

	<a href="https://easydigitaldownloads.com/?ref=4657" target="_blank">
		<img class="mb-xs-1" src="<?php echo get_stylesheet_directory_uri() . '/images/sale-easy-digital-downloads.png'; ?>" />
	</a>

	<p>Easy Digital Downloads is the easiest way to sell digital products with WordPress. <br /><a href="https://easydigitaldownloads.com/?ref=4657" target="_blank">View sale &rarr;</a></p>

	<a href="https://restrictcontentpro.com/?ref=4570" target="_blank">
		<img class="mb-xs-1" src="<?php echo get_stylesheet_directory_uri() . '/images/sale-restrict-content-pro.png'; ?>" />
	</a>

	<p>Restrict Content Pro is a full-featured, powerful membership solution for WordPress.<br /><a href="https://restrictcontentpro.com/?ref=4570" target="_blank">View sale &rarr;</a></p>

</section>

<?php endif; ?>

<h3>Payment Details</h3>

<?php
}
//add_action( 'affwp_theme_edd_success_page_the_content', 'affwp_theme_edd_share_purchase' );

/**
 * Add a subtitle to the purchase confirmation page
 *
 * @since 1.0.0
 */
function affwp_theme_purchase_subtitle( $defaults ) {

	if ( function_exists( 'edd_is_success_page' ) && edd_is_success_page() ) {
		$defaults['subtitle'] = sprintf( __( 'Your purchase means a lot to us. In just a few moments you\'ll receive an email containing a download link for AffiliateWP. You can also download AffiliateWP from <a href="%s">your account</a> or at the bottom of this page.', 'themedd' ), site_url( '/account/' ) );
	}

	return $defaults;

}
add_filter( 'themedd_header_defaults', 'affwp_theme_purchase_subtitle' );
