<?php
/**
 * EDD Modifications
 */


/**
 * Change labels
 */
function affwp_edd_default_downloads_name( $defaults ) {

	$defaults = array(
	   'singular' => __( 'Add-on', 'affwp' ),
	   'plural' => __( 'Add-ons', 'affwp')
	);

	return $defaults;
}
add_filter( 'edd_default_downloads_name', 'affwp_edd_default_downloads_name');

/**
 * Processes the license upgrade
 */
function affwp_process_license_upgrade() {

	// get type. business or developer
	$type = isset( $_GET['type'] ) ? $_GET['type'] : '';

	if ( ! is_user_logged_in() || ! ( 'business' == $type || 'developer' == $type ) ) {
		// Isn't logged in, so go back to pricing
		wp_redirect( home_url( '/pricing' ) ); exit;
	}

	$affwp_id = affwp_get_affiliatewp_id();

	switch ( $type ) {

		case 'developer':
			// user has developer license already
			if ( edd_has_user_purchased( get_current_user_id(), $affwp_id, 2 ) ) {
				wp_die( 'You already have a Developer\'s license', '', array( 'back_link' => true ) );
			} 
			elseif ( edd_has_user_purchased( get_current_user_id(), $affwp_id, 1 ) ) {
				// Has a business license
				$discount = 99;
			} 
			elseif ( edd_has_user_purchased( get_current_user_id(), $affwp_id ) ) {
				// Has a personal license
				$discount = 49;
			} 
			else {
				// Hasn't purchased, so go back to pricing
				wp_redirect( home_url( '/pricing' ) ); exit;
			}

			$price_id = 2;

			break;

		case 'business':
			// user has developer license already
			if ( edd_has_user_purchased( get_current_user_id(), $affwp_id, 1 ) ) {
				wp_die( 'You already have a Business license', '', array( 'back_link' => true ) );
			} 
			elseif ( edd_has_user_purchased( get_current_user_id(), $affwp_id, 0 ) ) {
				// Has a personal license
				$discount = 49;
			}
			else {
				// Hasn't purchased, so go back to pricing
				wp_redirect( home_url( '/pricing' ) ); exit;
			}

			$price_id = 1;

			break;

	} // end switch

	// Remove anything in the cart
	edd_empty_cart();

	// Add the correct license
	edd_add_to_cart( $affwp_id, array( 'price_id' => $price_id ) );

	EDD()->fees->add_fee( $discount * -1, 'License Upgrade Discount' );
	//EDD()->session->set( 'is_upgrade', '1' );

	wp_redirect( edd_get_checkout_uri() ); exit;

}
add_action( 'edd_upgrade_affwp_license', 'affwp_process_license_upgrade' );

/**
 * Process add-on Downloads
 *
 * Handles the file download process for add-ons.
 *
 * @access      private
 * @since       1.1
 * @return      void
 */
function affwp_process_add_on_download() {

	if( ! isset( $_GET['add_on'] ) ) {
		return;
	}

	if( ! is_user_logged_in() ) {
		return;
	}

	$add_on   = absint( $_GET['add_on'] );

	if( 'download' != get_post_type( $add_on ) ) {
		return;
	}

	$affwp_id = affwp_get_affiliatewp_id();

	if( ! edd_has_user_purchased( get_current_user_id(), $affwp_id, 2 ) ) {
		wp_die( 'You need to have a Developer\'s license key to download this add-on' );
	}

	$user_info = array();
	$user_data 			= get_userdata( get_current_user_id() );
	$user_info['email'] = $user_data->user_email;
	$user_info['id'] 	= $user_data->ID;
	$user_info['name'] 	= $user_data->display_name;

	edd_record_download_in_log( $add_on, 0, $user_info, edd_get_ip(), 0, 0 );

	$download_files = edd_get_download_files( $add_on );
	$requested_file = $download_files[0]['file'];
	$file_extension = edd_get_file_extension( $requested_file );
	$ctype          = edd_get_file_ctype( $file_extension );

	if ( ! edd_is_func_disabled( 'set_time_limit' ) && !ini_get('safe_mode') ) {
		set_time_limit(0);
	}
	if ( function_exists( 'get_magic_quotes_runtime' ) && get_magic_quotes_runtime() ) {
		set_magic_quotes_runtime(0);
	}

	@session_write_close();
	if( function_exists( 'apache_setenv' ) ) @apache_setenv('no-gzip', 1);
	@ini_set( 'zlib.output_compression', 'Off' );

	nocache_headers();
	header("Robots: none");
	header("Content-Type: " . $ctype . "");
	header("Content-Description: File Transfer");
	header("Content-Disposition: attachment; filename=\"" . basename( $requested_file ) . "\"");
	header("Content-Transfer-Encoding: binary");

	$method = edd_get_file_download_method();
	if( 'x_sendfile' == $method && ( ! function_exists( 'apache_get_modules' ) || ! in_array( 'mod_xsendfile', apache_get_modules() ) ) ) {
		// If X-Sendfile is selected but is not supported, fallback to Direct
		$method = 'direct';
	}

	switch( $method ) :

		case 'redirect' :

			// Redirect straight to the file
			header( "Location: " . $requested_file );
			break;

		case 'direct' :
		default:

			$direct       = false;
			$file_details = parse_url( $requested_file );
			$schemes      = array( 'http', 'https' ); // Direct URL schemes
			if ( ( ! isset( $file_details['scheme'] ) || ! in_array( $file_details['scheme'], $schemes ) ) && isset( $file_details['path'] ) && file_exists( $requested_file ) ) {

				/** This is an absolute path */
				$direct    = true;
				$file_path = $requested_file;

			} else if( defined( 'UPLOADS' ) && strpos( $requested_file, UPLOADS ) !== false ) {

				/** 
				 * This is a local file given by URL so we need to figure out the path
				 * UPLOADS is always relative to ABSPATH
				 * site_url() is the URL to where WordPress is installed
				 */
				$file_path  = str_replace( site_url(), '', $requested_file );
				$file_path  = realpath( ABSPATH . $file_path );
				$direct     = true;
				
			} else if( strpos( $requested_file, WP_CONTENT_URL ) !== false ) {

				/** This is a local file given by URL so we need to figure out the path */
				$file_path  = str_replace( WP_CONTENT_URL, WP_CONTENT_DIR, $requested_file );
				$file_path  = realpath( $file_path );
				$direct     = true;

			}

			// Now deliver the file based on the kind of software the server is running / has enabled
			if ( function_exists( 'apache_get_modules' ) && in_array( 'mod_xsendfile', apache_get_modules() ) ) {

				header("X-Sendfile: $file_path");

			} elseif ( stristr( getenv( 'SERVER_SOFTWARE' ), 'lighttpd' ) ) {

				header( "X-LIGHTTPD-send-file: $file_path" );

			} elseif ( stristr( getenv( 'SERVER_SOFTWARE' ), 'nginx' ) || stristr( getenv( 'SERVER_SOFTWARE' ), 'cherokee' ) ) {

				// We need a path relative to the domain
				$file_path = str_ireplace( $_SERVER[ 'DOCUMENT_ROOT' ], '', $file_path );
				header( "X-Accel-Redirect: /$file_path" );

			} else

			if( $direct ) {
				edd_deliver_download( $file_path );
			} else {
				// The file supplied does not have a discoverable absolute path
				header( "Location: " . $requested_file );
			}

			break;

	endswitch;

	edd_die();

	exit;
}
add_action( 'edd_add_on_download', 'affwp_process_add_on_download', 100 );

/**
 * Add-on info box
 *
 * @since  1.1.9
 */
function affwp_add_on_info( $position = '' ) {

	$version 				= get_post_meta( get_the_ID(), '_edd_sl_version', true );
	$requires 				= get_post_meta( get_the_ID(), '_affwp_addon_requires', true );
	$released				= get_post_meta( get_the_ID(), '_affwp_addon_release_date', true );
	$edd_version_required 	= get_post_meta( get_the_ID(), '_affwp_addon_edd_version_required', true );
	$external_download_url 	= get_post_meta( get_the_ID(), '_affwp_addon_download_url', true );

	

	?>
	<aside class="add-on-info<?php echo ' ' . $position; ?>">
		
		<?php if ( $version ) : ?>
			<p><span>Version</span><br />v<?php echo esc_attr( $version ); ?></p>
		<?php endif; ?>	

		<?php if ( $requires ) : ?>
			<p><span>Requires AffiliateWP</span><br />v<?php echo esc_attr( $requires ); ?></p>
		<?php endif; ?>

		<?php if ( $edd_version_required ) : ?>
			<p><span>Requires<br /><a title="Easy Digital Downloads" target="_blank" href="http://easydigitaldownloads.com">Easy Digital Downloads</a></span><br />v<?php echo esc_attr( $edd_version_required ); ?></p>
		<?php endif; ?>

		<?php if ( $released ) : ?>
			<p><span>Released</span><br /><?php echo esc_attr( $released ); ?></p>
		<?php endif; ?>


		<?php if ( $external_download_url ) : ?>
			<a title="Download Now" target="_blank" href="<?php echo esc_url( $external_download_url ); ?>" class="button">Download Now</a>
		<?php endif; ?>

		<?php if ( ! has_term( 'free', 'download_category' ) ) : ?>
				<?php if ( is_user_logged_in() && edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 2 ) ) : ?>

					<?php if ( edd_get_download_files( get_the_ID() ) ) : ?>
						<a title="Get this add-on" href="<?php echo affwp_get_add_on_download_url( get_the_ID() ); ?>" class="button">Download Now</a>
					<?php endif; ?>
				<?php
					// if the user is logged and has purchased a lower license, show a link to upgrade their license 
					elseif ( is_user_logged_in() && 
						edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 0 )  ||
						edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 1 ) )
				: ?>
					
					<a title="License Upgrade Required" href="<?php echo affwp_get_dev_license_upgrade_url(); ?>" class="button">License Upgrade Required</a>
					<p>This add-on will become immediately available to you after you <a title="Upgrade Your License" href="<?php echo affwp_get_dev_license_upgrade_url(); ?>">upgrade your license</a>.</p>
				<?php else : // user is logged in and has not purchased, or is logged out. Direct link to purchase dev license 
					$purchase_url = edd_get_checkout_uri() . '?edd_action=add_to_cart&amp;download_id=' . affwp_get_affiliatewp_id() .'&amp;edd_options[price_id]=2';
				?>
					
					<a title="Buy Developer License" class="button" href="<?php echo $purchase_url; ?>">Buy Developer License</a>
					<p>This add-on is only available to <a title="Developer License" href="<?php echo site_url( 'pricing' ); ?>">Developer License</a> holders</p>
				<?php endif; ?>
		<?php endif; ?>
		
		

	</aside>
	<?php
}