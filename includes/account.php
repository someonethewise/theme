<?php
/**		
 * Account
 * @since 1.0 
*/
function affwp_account() { ?>
	
	<?php

	$has_ultimate_license     = in_array( 3, affwp_get_users_licenses() );
	$has_professional_license = in_array( 2, affwp_get_users_licenses() );
	$has_plus_license         = in_array( 1, affwp_get_users_licenses() );
	$has_personal_license     = in_array( 0, affwp_get_users_licenses() );

/**
 * Logout message
 */
if ( isset( $_GET['logout'] ) && $_GET['logout'] == 'success' ) { ?>
	<p class="alert notice">
		<?php _e( 'You have been successfully logged out', 'affwp' ); ?>
	</p>
<?php } ?>



	<?php 
	// user is not logged in
	if ( ! is_user_logged_in() ) : ?>
		<p>
			<a href="<?php echo site_url( 'account/affiliates' ); ?>">Looking for our affiliate area?</a>
		</p>
		<p>
			<a href="<?php echo site_url( 'account/register' ); ?>">Need to register an account?</a>
		</p>

		<?php echo edd_login_form( add_query_arg( array('login' => 'success', 'logout' => false ), site_url( $_SERVER['REQUEST_URI'] ) ) ); ?>
		
	<?php 
	// user is logged in
	else : ?>


	<h2>Professional Add-ons</h2>
	<?php 

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
					'terms' => 'pro-add-ons'
				),
			)
	);

	$add_ons = new WP_Query( $args ); ?>
	<table id="edd-pro-add-ons">
		<thead>
			<tr>
				<th><?php _e( 'Name', 'affwp' ); ?></th>
				<th><?php _e( 'Version', 'affwp' ); ?></th>
				<th><?php _e( 'AffiliateWP version required', 'affwp' ); ?></th>
				<th><?php _e( 'Download', 'affwp' ); ?></th>
			</tr>
		</thead>

		<tbody>

	<?php if ( have_posts() ) : ?>
			
			<?php while ( $add_ons->have_posts() ) : $add_ons->the_post(); ?>
			
			<?php

				$version 	= get_post_meta( get_the_ID(), '_edd_sl_version', true );
				$requires 	= get_post_meta( get_the_ID(), '_affwp_addon_requires', true );
			?>
			<tr>
				<td>
					<?php if ( affwp_addon_is_coming_soon( get_the_ID() ) && current_user_can( 'manage_options' ) ) : ?>	
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php elseif ( affwp_addon_is_coming_soon( get_the_ID() ) ) : ?>
						<?php the_title(); ?> - coming soon
					<?php else : ?>	
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<?php endif; ?>

				</td>
				<td><?php echo esc_attr( $version ); ?></td>
				<td><?php echo esc_attr( $requires ); ?></td>
				<td>
					<?php if ( edd_get_download_files( get_the_ID() ) ) : ?>

						<?php if ( ! ( $has_ultimate_license || $has_professional_license ) ) : ?>

							<?php if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

								<?php if ( $has_plus_license || $has_personal_license ) : // upgrade ?>
									
									<a href="#upgrade" title="Upgrade License" class="popup-content" data-effect="mfp-move-from-bottom">Upgrade license to download</a>
									
								<?php else : // no license ?>
									<a href="<?php echo site_url('pricing'); ?>">Purchase ultimate or professional<br/> license to download</a>
								<?php endif; ?>

							<?php endif; ?>	

						<?php else : ?>

							<?php if ( $has_ultimate_license || $has_professional_license ) : ?>
								
								<?php if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

									<a href="<?php echo affwp_get_add_on_download_url( get_the_ID() ); ?>">Download add-on</a>

								<?php endif; ?>	

							<?php endif; ?>
						<?php endif; ?>

					<?php endif; // edd_get_download_files ?>
				</td>
			</tr>
			
		<?php endwhile; ?>
			
	<?php endif; wp_reset_postdata(); ?>
		</tbody>
	</table>


	<?php affwp_upgrade_license_modal(); ?>

	<div class="affwp-licenses">
		<?php
			$license_heading = count( affwp_get_users_licenses() ) > 1 ? 'Your Licenses' : 'Your license';
		?>

		<h2><?php echo $license_heading; ?></h2>

		<?php
			$download_price_ids = affwp_get_users_licenses();

			// a customer can happily have more than 1 license of any type
			if ( $download_price_ids ) : ?>

				<?php foreach ( $download_price_ids as $id ) : ?>
					
					<?php 
						foreach ( edd_get_variable_prices( affwp_get_affiliatewp_id() ) as $key ) {

							if ( $key['name'] == edd_get_price_option_name( affwp_get_affiliatewp_id(), $id ) ) {
								
								$license_limit = $key['license_limit'];

								if ( $license_limit == 0 ) {
									$license_limit = 'Unlimited';
								} else {
									$license_limit = $key['license_limit'];
								}
								
							}
						}

						$license_limit_text = $license_limit > 1 || $license_limit == 'Unlimited' ? ' sites' : ' site';
					?>

					<div class="affwp-license">
						<p><strong><?php echo edd_get_price_option_name( affwp_get_affiliatewp_id(), $id ); ?></strong> (<?php echo $license_limit . $license_limit_text; ?>)</p>

						<?php if ( $id != 3 ) : // only provide upgrade if not ultimate ?>

							<ul>
								<?php if ( $id == 0 ) : // personal ?>
									<li><a title="Upgrade to Ultimate license" href="<?php echo affwp_get_license_upgrade_url( 'ultimate' ); ?>">Upgrade to Ultimate license (unlimited sites)</a></li>
									<li><a title="Upgrade to Professional license" href="<?php echo affwp_get_license_upgrade_url( 'professional' ); ?>">Upgrade to Professional license (unlimited sites)</a></li>
									<li><a title="Upgrade to Plus license" href="<?php echo affwp_get_license_upgrade_url( 'plus' ); ?>">Upgrade to Plus license (3 sites)</a></li>
								<?php endif; ?>

								<?php if ( $id == 1 ) : // plus ?>
									<li><a title="Upgrade to Ultimate license" href="<?php echo affwp_get_license_upgrade_url( 'ultimate' ); ?>">Upgrade to Ultimate license (unlimited sites)</a></li>
									<li><a title="Upgrade to Professional license" href="<?php echo affwp_get_license_upgrade_url( 'professional' ); ?>">Upgrade to Professional license (unlimited sites)</a></li>
								<?php endif; ?>

								<?php if ( $id == 2 ) : // professional ?>
									<li><a title="Upgrade to Ultimate license" href="<?php echo affwp_get_license_upgrade_url( 'ultimate' ); ?>">Upgrade to Ultimate license (unlimited sites)</a></li>
								<?php endif; ?>
							</ul>

						<?php endif; ?>	
						
					</div>

				<?php endforeach; ?>
	
			<?php else : ?>
				<p>You do not have a license yet. <a href="<?php echo site_url( 'pricing' ); ?>">View pricing &rarr;</a></p>
			<?php endif; ?>

	</div>


	

	<?php
		// purchase history
		echo '<h2>' . __( 'Purchase History', 'affwp' ) . '</h2>';
		echo edd_purchase_history();

		// download history
		echo '<h2>' . __( 'Download History', 'affwp' ) . '</h2>';
		echo edd_download_history();
		
	

		// profile editor
		echo '<h2>' . __( 'Edit your profile', 'affwp' ) . '</h2>';
		echo do_shortcode( '[edd_profile_editor]' ); 
	?>
	
	<?php endif; ?>

<?php }