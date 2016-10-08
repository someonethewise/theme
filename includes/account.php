<?php
/**
 * Account
 */

/**
 * Show notice if customer can upgrade their license
 *
 * @since 1.0.0
 */
function affwp_theme_licenses_upgrade_notice() {

	// don't show on actual upgrade page
	if ( isset( $_GET['view'] ) ) {
		return;
	}

	// don't show notice if customer cannot upgrade their license
	if ( ! themedd_edd_can_upgrade_license() ) {
		return;
	}

	?>
	<p class="notice">Upgrade your license and receive a pro-rated discount. Click the "View Upgrades" link below to continue.</p>
	<?php
}
add_action( 'themedd_licenses_tab', 'affwp_theme_licenses_upgrade_notice', 1 );

/**
 * Add "downloads" tab to account area
 *
 * @since 1.0.0
 */
function affwp_theme_account_tabs( $tabs ) {

	$affwp_new_tabs = array(
		'downloads' => array(
			'tab_title'         => 'Downloads',
			'tab_order'         => 4,
			'tab_content'       => affwp_theme_account_downloads(),
			'tab_content_title' => 'Downloads',
		),
	);

	return array_merge( $tabs, $affwp_new_tabs );

}
add_filter( 'themedd_account_tabs', 'affwp_theme_account_tabs' );

/**
 * List downloads inside "Downloads" of account page
 *
 * @since 1.0.0
 */
function affwp_theme_account_downloads() {

	$price_ids = function_exists( 'affwp_theme_get_users_price_ids' ) ? affwp_theme_get_users_price_ids() : array();

	$has_ultimate_license     = in_array( 3, $price_ids );
	$has_professional_license = in_array( 2, $price_ids );
	$has_plus_license         = in_array( 1, $price_ids );
	$has_personal_license     = in_array( 0, $price_ids );

	global $post;

	/**
	 * Displays the most recent post
	 */
	$args = array(
		'posts_per_page' 	=> -1,
		'post_type'			=> 'download',
		'tax_query' => array(
			array(
				'taxonomy' => 'download_category',
				'field' => 'slug',
				'terms' => 'pro'
			),
		)
	);

	$add_ons = new WP_Query( $args );

	ob_start();

	?>

	<?php if ( function_exists( 'affwp_theme_edd_download_url' ) && affwp_theme_edd_download_url( affwp_theme_get_download_id() ) ) : ?>
		<p><strong>AffiliateWP</strong></p>
		<p><a href="<?php echo affwp_theme_edd_download_url( affwp_theme_get_download_id() ); ?>" class="button">Download AffiliateWP</a></p>
	<?php endif; ?>

	<p><strong>Pro add-ons</strong></p>

	<table id="pro-add-ons">
		<thead>
			<tr>
				<th>Name</th>
				<th>Version</th>
				<th>AffiliateWP Version required</th>
				<th>Download</th>
			</tr>
		</thead>

		<tbody>

	<?php if ( have_posts() ) : ?>

			<?php while ( $add_ons->have_posts() ) : $add_ons->the_post(); ?>

			<?php

				$version 	= get_post_meta( get_the_ID(), '_edd_sl_version', true );
				$requires 	= get_post_meta( get_the_ID(), '_edd_download_meta_affwp_version_required', true );
			?>
			<tr>
				<td>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</td>
				<td><?php echo esc_attr( $version ); ?></td>
				<td><?php echo esc_attr( $requires ); ?></td>
				<td>
					<?php if ( edd_get_download_files( get_the_ID() ) ) : ?>

						<?php if ( ! ( $has_ultimate_license || $has_professional_license ) ) : ?>

								<?php if ( $has_plus_license || $has_personal_license ) : // upgrade ?>

									<a href="#upgrade" title="Upgrade License" class="popup-content" data-effect="mfp-move-from-bottom">Upgrade license to download</a>

								<?php else : // no license ?>
									<a href="<?php echo site_url('pricing'); ?>">Purchase Professional or Ultimate<br/> license to download</a>
								<?php endif; ?>

						<?php else : ?>

							<?php if ( $has_ultimate_license || $has_professional_license ) : ?>
									<a href="<?php echo affwp_theme_get_add_on_download_url( get_the_ID() ); ?>">Download add-on</a>
							<?php endif; ?>
						<?php endif; ?>

					<?php endif; // edd_get_download_files ?>
				</td>
			</tr>

		<?php endwhile; ?>

	<?php endif; wp_reset_postdata(); ?>
		</tbody>
	</table>

	<?php

	return ob_get_clean();

}


remove_action( 'themedd_account_tabs_after', 'themedd_account_tab_affiliate_area' );

/**
 * Add an "Affiliate Area" link to the bottom of the account section
 * Shows a "Become an affiliate" link otherwise
 *
 * @since 1.0.0
 */
function affwp_theme_themedd_account_tab_affiliate_area() {

	if ( ! function_exists( 'affwp_get_affiliate_area_page_url' ) ) {
		return;
	}

	$text = function_exists( 'affwp_is_affiliate' ) && affwp_is_affiliate() ? 'Affiliate Area' : 'Become an affiliate';
	?>
	<li class="follow-link affiliates" data-link="affiliate-area"><a href="<?php echo affwp_get_affiliate_area_page_url(); ?>"><?php echo $text; ?></a></li>
	<?php
}
add_action( 'themedd_account_tabs_after', 'affwp_theme_themedd_account_tab_affiliate_area' );

/**
 * Add a welcome message + log out link to the account header
 *
 * @since 1.0.0
 */
function affwp_theme_welcome_message( $defaults ) {

	if ( ! is_page( 'account' ) ) {
		return $defaults;
	}

	if ( is_user_logged_in() ) {
		$defaults['subtitle'] = sprintf( __( 'Welcome, %s (%s)' , 'themedd' ), wp_get_current_user()->display_name, '<a href="' . wp_logout_url( get_permalink() ) . '">Log out?</a>' );
	} else {
		$defaults['subtitle'] = __( 'Come on in!', 'themedd' );
	}

	return $defaults;

}
add_filter( 'themedd_header_defaults', 'affwp_theme_welcome_message' );
