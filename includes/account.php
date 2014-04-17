<?php
/**		
 * Account
 * @since 1.0 
*/
function affwp_account() { ?>
	
	<?php
	global $current_user;
	get_currentuserinfo();

/**
 * Logout message
 */
if ( isset( $_GET['logout'] ) && $_GET['logout'] == 'success' ) { ?>
	<p class="alert notice">
		<?php _e( 'You have been successfully logged out', 'affwp' ); ?>
	</p>
<?php } ?>

	<?php
/**
 * Login message
 */
if ( isset( $_GET['login'] ) && $_GET['login'] == 'success' ) { ?>
	
	<p class="alert success">
		<?php printf( __( 'Welcome %s', 'affwp' ), $current_user->display_name ); ?>
	</p>

<?php } ?>

	<?php 
	// user is not logged in
	if ( ! is_user_logged_in() ) : ?>
		<p>
			<a href="<?php echo site_url( 'account/affiliates' ); ?>">Looking for our affiliate area?</a>
		</p>

		<?php echo edd_login_form( add_query_arg( array('login' => 'success', 'logout' => false ), site_url( $_SERVER['REQUEST_URI'] ) ) ); ?>
		
	<?php 
	// user is logged in
	else : ?>


	<?php if ( edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 2 ) ) : ?>

	<h2>Developer Add-ons</h2>
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
					'terms' => 'add-ons'
				)
			)
	);

	$add_ons = new WP_Query( $args ); ?>
	<table id="edd-developer-add-ons">
		<thead>
			<tr>
				<th><?php _e( 'Name', 'affwp' ); ?></th>
				<th><?php _e( 'Version', 'affwp' ); ?></th>
				<th><?php _e( 'Affiliate WP version required', 'affwp' ); ?></th>
				<th><?php _e( 'Download', 'affwp' ); ?></th>
			</tr>
		</thead>

		<tbody>

	<?php if ( have_posts() ) : ?>
			
			<?php while ( $add_ons->have_posts() ) : $add_ons->the_post(); ?>
			
			<?php
				$version 	= get_post_meta( get_the_ID(), '_affwp_addon_version', true );
				$requires 	= get_post_meta( get_the_ID(), '_affwp_addon_requires', true );
			?>
			<tr>
				<td><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></td>
				<td><?php echo esc_attr( $version ); ?></td>
				<td><?php echo esc_attr( $requires ); ?></td>
				<td>
					<?php if ( edd_get_download_files( get_the_ID() ) ) : ?>
						<a href="<?php echo affwp_get_add_on_download_url( get_the_ID() ); ?>">Download add-on</a>
					<?php endif; ?>
				</td>
			</tr>
			
		<?php endwhile; ?>
			
	<?php endif; wp_reset_postdata(); ?>
		</tbody>
	</table>
	<?php endif; ?>

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