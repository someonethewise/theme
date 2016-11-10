<?php

/**
 * Dequeue simple notices pro
 */
function affwp_theme_dequeue_style() {
	wp_dequeue_style( 'notifications' );
}
add_action( 'wp_enqueue_scripts', 'affwp_theme_dequeue_style' );

/**
 * Show notices
 */
function affwp_theme_display_notice() {

	// don't display notice if there's a discount being used
	if ( isset( $_GET['discount'] ) ) {
		return;
	}

	/// this displays the notification area if the user has not read it before
	global $user_ID;

	$notice_args = array(
		'post_type'      => 'notices',
		'posts_per_page' => 1,
		'meta_key'       => '_enabled',
		'meta_value'     => '1'
	);

	$expired = get_page_by_title( 'License expired', 'OBJECT', 'notices' );

	// exclude notice if license has not expired
	if ( $expired && ! affwp_theme_has_users_license_expired() ) {
		$notice_args['exclude'] = array( $expired->ID );
	}

	$notices = get_posts( $notice_args );

	if ( $notices ) {

		foreach ( $notices as $key => $notice ) {

			$logged_in_only = get_post_meta($notice->ID, '_notice_for_logged_in_only', true);

			$can_view = false;

			if ( $logged_in_only == 'All' ) {
				$can_view = true;
			} else if ( $logged_in_only == 'Logged In' && is_user_logged_in() ) {
				$can_view = true;
			} else if ( $logged_in_only == 'Logged Out' && ! is_user_logged_in() ) {
				$can_view = true;
			}

			if ( $can_view ) {

				if ( function_exists( 'pippin_check_notice_is_read' ) && pippin_check_notice_is_read( $notice->ID, $user_ID ) != true ) { ?>

					<div id="notification-area" class="snp-hidden">

							<div class="notice-content">

								<svg id="announcement" width="32px" height="32px">
								   <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-announcement'; ?>"></use>
								</svg>

								<?php echo do_shortcode( wpautop( $notice->post_content ) ); ?>

							</div>

							<?php if( ! get_post_meta($notice->ID, '_hide_close', true)) { ?>

							<a class="remove-notice" href="#" id="remove-notice" rel="<?php echo $notice->ID; ?>">
							<svg width="24px" height="24px">
								   <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-remove'; ?>"></use>
								</svg>
							</a>

							<?php } ?>
					</div>
				<?php }

			} // can view
		}
	}
}

remove_action( 'wp_footer', 'pippin_display_notice' );
add_action( 'themedd_site_before', 'affwp_theme_display_notice' );

/**
 * Let the customer know the discount was successfully applied
 */
function affwp_theme_discount_success() {

	$discount = isset( $_GET['discount'] ) && $_GET['discount'] ? $_GET['discount'] : '';

	$link  = false;
	$class = '';

	// remove link and change message on account page because they will be upgrading etc
	if ( is_page( 'account' ) ) {
		$text  = 'Woohoo! Your discount was successfully added to checkout.';
	} else {
		$text  = 'Woohoo! Your discount was successfully added to checkout. Purchase AffiliateWP now &rarr;';
		$link  = true;
		$class = ' link';
	}

	if ( ! $discount ) {
		return;
	}

	?>
	<div id="notification-area" class="discount-applied<?php echo $class; ?>">
		<div id="notice-content">

		<?php if ( $link ) : ?>
			<a href="/pricing">
		<?php endif; ?>
			<svg id="announcement" width="32px" height="32px">
			   <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-thumbs-up'; ?>"></use>
			</svg>
			<p><strong><?php echo $text; ?></strong></p>
		<?php if ( $link ) : ?>
			</a>
		<?php endif; ?>

		</div>
	</div>
		<?php
}
add_action( 'themedd_site_before', 'affwp_theme_discount_success' );
