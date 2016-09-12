<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Remove the primary navigation from its default location
 *
 * @since 1.0.0
 */
remove_action( 'themedd_site_header_main_end', 'themedd_primary_menu' );

/**
 * Add the primary navigation next to the logo
 *
 * @since 1.0.0
 */
add_action( 'themedd_site_header_main', 'themedd_primary_menu' );

/**
 * Disable the primary menu from showing in the footer at mobile resolutions
 *
 * @since 1.0.0
 */
add_filter( 'themedd_footer_primary_menu', '__return_false' );

/**
 * Hide the cart when on the pricing page
 *
 * @since 1.0.0
 */
function affwp_theme_nav_cart( $return ) {

	if ( is_page( 'pricing' ) ) {
		return false;
	}

	return $return;
}
add_filter( 'themedd_show_nav_cart', 'affwp_theme_nav_cart' );

/**
 * Add the cart to the primary navigation (defaults to the secondary menu)
 *
 * @since 1.0.0
 */
function affwp_theme_cart_link_position() {
	return 'primary_menu';
}
add_filter( 'themedd_cart_link_position', 'affwp_theme_cart_link_position' );

/**
 * Add the account menu just before the cart icon
 *
 * @since 1.0.0
 * @uses affwp_theme_nav_account()
 */
function affwp_account_menu( $items ) {
    return $items . affwp_theme_nav_account();
}
add_filter( 'themedd_wp_nav_menu_items', 'affwp_account_menu');

/**
 * Append account to main navigation
 *
 * @since 1.0.0
 */
function affwp_theme_nav_account() {

	$account_page 		= '/account';
	$affiliates_page 	= '/affiliates';
	$active 			= is_page( 'account' ) || is_page( 'affiliates' ) ? ' current-menu-item' : '';

	ob_start();
	?>

    <?php if ( ! is_user_logged_in() ) : ?>
        <li class="menu-item account<?php echo $active; ?>">
            <a title="Log in" href="<?php echo site_url( $account_page ); ?>"><?php echo affwp_theme_icon_login(); ?>Log in</a>
        </li>
    <?php endif; ?>

	<?php if ( is_user_logged_in() ) : ?>
        <li class="menu-item account<?php echo $active; ?>">
            <a title="Account" href="<?php echo site_url( $account_page ); ?>"><?php echo affwp_theme_icon_account(); ?>Account</a>
        </li>
    <?php endif; ?>

	<?php

	$content = ob_get_contents();
    ob_end_clean();

    return $content;

    ?>

<?php }

/**
 * Highlight menu items if on single download/post page
 *
 * @since 1.0.0
 */
function affwp_theme_highlight_menu_item( $classes ) {

	if ( is_singular( 'download' ) ) {
	    if ( in_array ( 'add-ons', $classes ) ) {
	      $classes[] = 'current-menu-item';
	    }
	}

	if ( is_singular( 'post' ) ) {
	    if ( in_array ( 'blog', $classes ) ) {
	      $classes[] = 'current-menu-item';
	    }
	}

	return $classes;
}
add_filter( 'nav_menu_css_class', 'affwp_theme_highlight_menu_item' );


/**
 * Change the cart icon
 *
 * @since 1.0.0
 */
function affwp_theme_edd_cart_icon() {
    $cart_items = function_exists( 'edd_get_cart_contents' ) ? edd_get_cart_contents() : '';

	ob_start();
?>

	<div>
		<svg width="32" height="32" id="nav-cart-icon" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
			 viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve">
		<style type="text/css">
			.st0{fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-width:1.5;}
			.st2{display:inline;fill:none;stroke:#ffffff;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;stroke-width:1.5;}
		</style>
		<g id="cart">
			<circle class="st0" cx="24.8" cy="29.5" r="2"/>
			<circle class="st0" cx="9.9" cy="29.5" r="2"/>
			<polyline class="st0" points="0.5,4.5 4.5,4.5 9.9,27.5 24.8,27.5 	"/>
			<polyline class="st0" points="9.3,24.8 26.8,24.8 30.8,12.6 6.5,12.6 	"/>
		</g>
		<?php if ( $cart_items ) : ?>
		<g id="cart-contents">
			<polyline class="st0" points="17.3,12.6 12,7.2 6.5,12.6 	"/>
			<polyline class="st0" points="24.1,12.6 28.1,3.6 31.5,5.2 28.1,12.6 	"/>
			<polyline class="st0" points="19.4,12.6 19.4,8.6 13.3,8.6 	"/>
		</g>
		<?php else : ?>
		<g id="arrow-down">
			<line class="st0" x1="17.4" y1="0.5" x2="17.4" y2="9.9"/>
			<polyline class="st0" points="13.3,5.9 17.4,9.9 21.4,5.9 	"/>
		</g>
		<?php endif; ?>
		</svg>
	</div>
	<?php if ( $cart_items ) : ?>
		<span class="cart-icon-text">Checkout</span>
	<?php else : ?>
		<span class="cart-icon-text">Buy</span>
		<?php endif; ?>

    <?php

	$content = ob_get_contents();

    ob_end_clean();

    return $content;
}
add_filter( 'themedd_edd_cart_icon', 'affwp_theme_edd_cart_icon' );

/**
 * Modify the EDD cart link defaults
 *
 * @since 1.0.0
 */
function affwp_theme_edd_cart_link_defaults( $defaults ) {

	// Remove animate class from cart icon
	$defaults['classes']   = '';

	return $defaults;
}
add_filter( 'themedd_edd_cart_link_defaults', 'affwp_theme_edd_cart_link_defaults' );


/**
 * Icons
 *
 * @since 1.0.0
 */
function affwp_theme_site_menu_icons( $item_output, $item, $depth, $args ) {

	if ( $item->title === 'Pricing' ) {
		$item_output = str_replace( 'Pricing', affwp_theme_icon_pricing() . 'Pricing', $item_output );
	}

	if ( $item->title === 'Product' ) {
		$item_output = str_replace( 'Product', affwp_theme_icon_product() . 'Product', $item_output );
	}

	if ( $item->title === 'Add-ons' ) {
		$item_output = str_replace( 'Add-ons', affwp_theme_icon_add_ons() . 'Add-ons', $item_output );
	}

	if ( $item->title === 'Support' && $item->type_label === 'Page' ) {
		$item_output = str_replace( 'Support', affwp_theme_icon_support() . 'Support', $item_output );
	}

	if ( $item->title === 'Blog' ) {
		$item_output = str_replace( 'Blog', affwp_theme_icon_blog() . 'Blog', $item_output );
	}

	return $item_output;

}
add_filter( 'walker_nav_menu_start_el', 'affwp_theme_site_menu_icons', 10, 4 );
