<?php
/**
 * Append cart onto primary navigation
 *
 * @since 1.0
*/
function affwp_wp_nav_menu_items( $items, $args ) {
    if ( 'primary' == $args->theme_location ) {
    	
    	$home = ! is_front_page() ? affwp_nav_home() : '';
    	$items .= affwp_nav_account();
    	$items .= affwp_nav_buy_now();
    }

	return $home . $items;
}
add_filter( 'wp_nav_menu_items', 'affwp_wp_nav_menu_items', 10, 2 );

/**
 * Append account to main navigation
 * @return [type] [description]
 */
function affwp_nav_account() { 

	global $current_user;
	get_currentuserinfo();

//	$account_page_id = ( get_theme_mod( 'account_page' ) ) ? get_theme_mod( 'account_page' ) : '';
	$account_page_id = 57;

	$account_link_text = 'Account';

	$active = is_page( $account_page_id ) ? ' current-menu-item' : '';


	 ob_start();
	?>

	<?php if( ! is_user_logged_in() ) : ?>
		<li class="account"><a class="button" title="<?php _e( 'Login', 'affwp' ); ?>" href="<?php echo get_permalink( $account_page_id ); ?>">Login</a></li>
	<?php else: ?>
		<li class="menu-item has-sub-menu account<?php echo $active; ?>">
			<a title="<?php echo $account_link_text; ?>" href="<?php echo get_permalink( $account_page_id ); ?>"><?php echo $account_link_text; ?></a>
			<ul class="sub-menu">
				<li>
					<a title="<?php _e( 'Affiliates', 'affwp' ); ?>" href="/affiliates"><?php _e( 'Affiliates', 'affwp' ); ?></a>
				</li>
				<li>
					<a title="<?php _e( 'Log out', 'affwp' ); ?>" href="<?php echo wp_logout_url( add_query_arg( 'logout', 'success', get_permalink( $account_page_id ) ) ); ?>"><?php _e( 'Log out', 'affwp' ); ?></a>
				</li>
			</ul>
		</li>
	<?php endif; ?>

	<?php $content = ob_get_contents();
    ob_end_clean();

    return $content;

    ?>

<?php }

/**
 * Prepend home link to main navigation
 * @return [type] [description]
 */
function affwp_nav_home() { 
	 ob_start();
	?>
	
	<li class="menu-item home">
		<a title="Home" href="/">Home</a>
	</li>

	<?php $content = ob_get_contents();
    ob_end_clean();

    return $content;

    ?>

<?php }

/**
 * Append buy now link to main navigation
 * @return [type] [description]
 */
function affwp_nav_buy_now() { 
	 ob_start();
	
	$cart_items = edd_get_cart_contents();

	//var_dump( $cart_items ); wp_die();

	// $text = $cart_items ? 'Checkout' : 'Buy';
	?>
	
	<?php if ( $cart_items ) : ?>
		<li class="action checkout menu-item">
			<a class="button" title="Checkout" href="/checkout">Checkout</a>
		</li>
	<?php else : ?>
		<li class="action purchase menu-item">
			<a class="button" title="Buy" href="/pricing">Buy</a>
		</li>
	<?php endif; ?>

	<?php $content = ob_get_contents();
    ob_end_clean();

    return $content;

    ?>

<?php }
