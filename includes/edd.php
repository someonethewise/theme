<?php
/**
 * EDD Modifications
 */



/**
 * Change download labels
 */
function affwp_edd_download_labels( $labels ) {

	$labels = array(
	   'singular' => __( 'Add-on', 'affwp' ),
	   'plural'   => __( 'Add-ons', 'affwp')
	);

	return $labels;

}
add_filter( 'edd_default_downloads_name', 'affwp_edd_download_labels' );


/**
 * Add sad alf to failed transaction page
 */
function affwp_pricing_text() {
	if ( ! edd_is_failed_transaction_page() )
		return;
	?>
	<img id="mascot-sad" alt="" src="<?php echo get_stylesheet_directory_uri() . '/images/alf-sad.png'; ?>">
	
	<?php
}
add_action( 'affwp_page_header_after', 'affwp_pricing_text' );


/**
 * Filter subheading on failed transaction page
 */
function affwp_failed_transaction_excerpt( $sub_heading ) {
	if ( edd_is_failed_transaction_page() ) {
		return '<h2>Your transaction failed. Please try again or <a href="/support">contact support</a>.</h2>';
	}

	return $sub_heading;
}
add_filter( 'affwp_excerpt', 'affwp_failed_transaction_excerpt' );

/**
 * Get number of add-ons in the pro add-ons category
 * Excludes any add-ons that are coming soon
 *
 * @since  1.9.3
 * @return int number of add-ons
 */
function affwp_get_pro_add_on_count() {
	
	$args = array(
		'post_type' => 'download',
		'download_category' => 'pro-add-ons',
		'meta_key' => '_affwp_addon_coming_soon',
		'meta_value' => true, 
		'meta_compare' => 'NOT EXISTS',
		'posts_per_page' => -1,
	); 

	$add_ons = new WP_Query( $args );

	return (int) $add_ons->found_posts;

}


/**
 * Get number of add-ons in each category
 * @return string number of add-ons
 */
function affwp_get_add_on_count( $add_on_category = '' ) {
	
	if ( ! $add_on_category ) {
		return;
	}

	$args = array(
		'type'     => 'download',
		'taxonomy' => 'download_category',
	); 

	$categories = get_categories( $args );

	foreach ( $categories as $category ) {
		if ( $category->slug == $add_on_category ) {
			$count = $category->count;
			return $count;
		}
	}

	
}


/**
 * Redirect to pricing page when cart at checkout is empty.
 * @return void
 */
function affwp_empty_cart_redirect() {
	$cart     = function_exists( 'edd_get_cart_contents' ) ? edd_get_cart_contents() : false;
	$redirect = site_url('pricing');
 
	if ( function_exists( 'edd_is_checkout' ) && edd_is_checkout() && ! $cart ) {
		wp_redirect( $redirect, 301 ); 
		exit;
	}
}
add_action( 'template_redirect', 'affwp_empty_cart_redirect' );


/**
 * If cart is empty and checkout is directly accessed
 * @return void
 */
function affwp_add_to_cart_if_empty() {
	$cart = function_exists( 'edd_get_cart_contents' ) ? edd_get_cart_contents() : false;
	
	if ( function_exists( 'edd_is_checkout' ) && edd_is_checkout() && ! $cart ) {
		edd_add_to_cart( affwp_get_affiliatewp_id(), array( 'price_id' => 0 ) );
	}
}
//add_action( 'template_redirect', 'affwp_add_to_cart_if_empty', 9 );



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
add_filter( 'edd_default_downloads_name', 'affwp_edd_default_downloads_name' );

/**
 * Get's the customer's first name from purchase session
 * @return [type] [description]
 */
function affwp_edd_purchase_get_first_name() {
	// get purchase session
	$purchase_session = edd_get_purchase_session();

	// get the key
	$purchase_key = $purchase_session['purchase_key'];

	// get the payment ID from the purchase key
	$payment_id = edd_get_purchase_id_by_key( $purchase_key );

	$user_info = edd_get_payment_meta_user_info( $payment_id );
	$first_name = $user_info['first_name'];

	if ( $first_name )
		return $first_name;

	return null;
}

/**
 * Thank the customer for purchasing
 */
function affwp_edd_thank_customer() {
	if ( function_exists( 'edd_is_success_page' ) && ! edd_is_success_page() )
		return;

	$message = '<h2>Your purchase was successful</h2>';
	
	if ( $message )
		return $message;

	return null;
}


/**
 * Processes the license upgrade
 */
function affwp_process_license_upgrade() {

	// get type. plus, professional or ultimate
	$type    = isset( $_GET['type'] ) ? strtolower( $_GET['type'] ) : '';
	$license = isset( $_GET['key'] ) ? strtolower( $_GET['key'] ) : '';

	if ( ! is_user_logged_in() || ( 'plus' !== $type && 'professional' !== $type && 'ultimate' !== $type ) ) {
		// Isn't logged in, so go back to pricing
		wp_redirect( home_url( '/pricing' ) ); exit;
	}

	$affwp_id = affwp_get_affiliatewp_id();
	$licenses = affwp_get_users_licenses();

	$has_ultimate_license     = in_array( 3, affwp_get_users_price_ids() );
	$has_professional_license = in_array( 2, affwp_get_users_price_ids() );
	$has_plus_license         = in_array( 1, affwp_get_users_price_ids() );
	$has_personal_license     = in_array( 0, affwp_get_users_price_ids() );

	switch ( $type ) {

		case 'ultimate':

			if ( $has_professional_license ) {
				$discount = 199;
			} elseif ( $has_plus_license ) {
				$discount = 99;
			} elseif ( $has_personal_license ) {
				$discount = 49;
			} else {
				// Hasn't purchased, so go back to pricing
				wp_redirect( home_url( '/pricing' ) ); exit;
			}

			$price_id = 3;

			break;

		case 'professional':
			
			if ( $has_plus_license ) {
				$discount = 99;
			} elseif ( $has_personal_license ) {
				$discount = 49;
			} else {
				// Hasn't purchased, so go back to pricing
				wp_redirect( home_url( '/pricing' ) ); exit;
			}

			$price_id = 2;

			break;

		case 'plus':
			
			if ( $has_personal_license ) {
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
	edd_add_to_cart( $affwp_id, array( 'price_id' => $price_id, 'upgrade' => $license ) );

	EDD()->session->set( 'is_upgrade', '1' );
	EDD()->session->set( 'upgrade_price_id', $price_id );
	EDD()->session->set( 'upgrade_key', $license );
	EDD()->session->set( 'upgrade_discount', $discount );

	wp_redirect( edd_get_checkout_uri() ); exit;

}
add_action( 'edd_upgrade_affwp_license', 'affwp_process_license_upgrade' );

/**
 * Sets the discount amount based on the upgrade fee
 *
 * @param $discount float The discount amount
 * @param $item array the cart item array
 * @return float
 */
function affwp_cart_item_discounted_amount( $discounted_price, $discounts, $item, $price ) {

	if( ! function_exists( 'EDD' ) ) {
		return $discounted_price;
	}

	if( ! EDD()->session->get( 'is_upgrade' ) ) {
		return $discounted_price;
	}

	$price_id         = EDD()->session->get( 'upgrade_price_id' );
	$upgrade_discount = EDD()->session->get( 'upgrade_discount' );
	$cart_discounts   = edd_get_cart_discounts();

	if( $upgrade_discount && edd_cart_has_discounts() ) {

		$discounted_price = $price - $upgrade_discount;
		foreach( $cart_discounts as $discount ) {

			$discounted_price = edd_get_discounted_amount( $discount, $discounted_price );

		}
	}

	return $discounted_price;
}
add_filter( 'edd_get_cart_item_discounted_amount', 'affwp_cart_item_discounted_amount', 10, 4 );


/**
 * Sets the discount amount based on the upgrade fee
 *
 * @param $discount float The discount amount
 * @param $item array the cart item array
 * @return float
 */
function affwp_cart_details_item_discount( $discount, $item ) {

	if( ! function_exists( 'EDD' ) ) {
		return $discount;
	}

	if( ! EDD()->session->get( 'is_upgrade' ) ) {
		return $discount;
	}

	if( edd_cart_has_discounts() ) {
		return $discount;
	}

	$price_id = EDD()->session->get( 'upgrade_price_id' );
	$upgrade_discount = EDD()->session->get( 'upgrade_discount' );
	
	if( $upgrade_discount ) {

		$discount = $upgrade_discount;
	}

	return $discount;
}
add_filter( 'edd_get_cart_content_details_item_discount_amount', 'affwp_cart_details_item_discount', 10, 2 );

/**
 * Displays the upgrade discount row on the cart
 *
 * @return void
 */
function affwp_cart_items_upgrade_row() {

	if( ! EDD()->session->get( 'is_upgrade' ) ) {
		return;
	}

	$upgrade_discount = EDD()->session->get( 'upgrade_discount' );

?>
	<tr class="edd_cart_footer_row edd_sl_renewal_row">
		<td colspan="3"><?php printf( __( 'License upgrade discount: $%s', 'edd_sl' ), $upgrade_discount ); ?></td>
	</tr>
<?php
}
add_action( 'edd_cart_items_after', 'affwp_cart_items_upgrade_row' );

function affwp_post_upgrade_license_updates( $payment_id, $new_status, $old_status ) {

	if ( $old_status == 'publish' || $old_status == 'complete' )
		return; // Make sure that payments are only completed once

	// Make sure the payment completion is only processed when new status is complete
	if ( $new_status != 'publish' && $new_status != 'complete' )
		return;

	$edd_sl = edd_software_licensing();

	$items = edd_get_payment_meta_cart_details( $payment_id );
	foreach( $items as $index => $item ) {
		if( ! empty( $item['item_number']['options']['upgrade'] ) ) {

			// Prevent a new license from being created
			remove_action( 'edd_complete_download_purchase', array( $edd_sl, 'generate_license' ), 0 );
		
			$key     = $item['item_number']['options']['upgrade'];
			$license = $edd_sl->get_license_by_key( $key );

			update_post_meta( $license->ID, '_edd_sl_download_price_id', $item['item_number']['options']['price_id'] );
			update_post_meta( $license->ID, '_edd_sl_cart_index', $index );
			add_post_meta( $license->ID, '_edd_sl_payment_id', $payment_id );

		}
	}

}
add_action( 'edd_update_payment_status', 'affwp_post_upgrade_license_updates', -9999, 3 );

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

	$has_ultimate_license     = in_array( 3, affwp_get_users_price_ids() );
	$has_professional_license = in_array( 2, affwp_get_users_price_ids() );

	if ( ! ( $has_ultimate_license || $has_professional_license ) ) {
		wp_die( 'You need either an Ultimate or Professional license to download this add-on', 'Error', array( 'response' => 403 ) );
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
 * Get a user's download price IDs that they have access to
 *
 * @since  1.9
 */
function affwp_get_users_licenses( $user_id = 0 ) {

	if ( ! $user_id ) {
		$user_id = get_current_user_id();
	}

	// if user is still a guest return an empty array as their ID will be 0
	if ( ! $user_id ) {
		return array();
	}

	$args = array(
		'posts_per_page' => -1,
		'post_type'      => 'edd_license',
		'meta_key'       => '_edd_sl_user_id',
		'meta_value'     => $user_id,
		'fields'         => 'ids'
	);

	$keys     = array();
	$licenses = get_posts( $args );

	if ( $licenses ) {	
		foreach( $licenses as $key ) {
			$keys[ $key ] = array(
				'license'  => get_post_meta( $key, '_edd_sl_key', true ),
				'price_id' => get_post_meta( $key, '_edd_sl_download_price_id', true ),
				'limit'    => edd_software_licensing()->get_license_limit( affwp_get_affiliatewp_id(), $key ),
				'expires'  => edd_software_licensing()->get_license_expiration( $key )
			);
		}
	}

	return $keys;
}

function affwp_get_users_price_ids( $user_id = 0 ) {

	if ( ! $user_id ) {
		$user_id = get_current_user_id();
	}

	$keys = affwp_get_users_licenses( $user_id );

	if( $keys ) {
		$keys = wp_list_pluck( $keys, 'price_id' );
	} else {
		$keys = array();
	}

	return $keys;

}

/**
 * Add-on info box
 *
 * @since  1.1.9
 */
function affwp_add_on_info( $position = '' ) {
	$version               = get_post_meta( get_the_ID(), '_edd_sl_version', true );
	$requires              = get_post_meta( get_the_ID(), '_affwp_addon_requires', true );
	$released              = get_the_date();
	$updated               = intval ( get_post_meta( get_the_ID(), '_affwp_addon_last_updated', true ) );
	$edd_version_required  = get_post_meta( get_the_ID(), '_affwp_addon_edd_version_required', true );
	$external_download_url = get_post_meta( get_the_ID(), '_affwp_addon_download_url', true );
	$external_doc_url      = get_post_meta( get_the_ID(), '_affwp_addon_doc_url', true );
	$developer             = get_post_meta( get_the_ID(), '_affwp_addon_developer', true );
	$developer_url         = get_post_meta( get_the_ID(), '_affwp_addon_developer_url', true );

	$changelog = stripslashes( wpautop( get_post_meta( get_the_ID(), '_edd_sl_changelog', true ), true ) );
?>
	<aside class="add-on-info<?php echo ' ' . $position; ?>">
		
		<?php if ( $version ) : ?>
			<p><span>Version</span> v<?php echo esc_attr( $version ); ?>
			<?php if ( $changelog ) : ?>
				<br /><a href="#changelog" class="popup-content" data-effect="mfp-move-from-bottom">View changelog</a>
			<?php endif; ?>
			</p>

			<?php if ( $changelog ) : ?>
			<div id="changelog" class="popup entry-content mfp-with-anim mfp-hide">

				<h1>Changelog</h1>
				<?php echo $changelog; ?>
			</div>
			<?php endif; ?>

		<?php endif; ?>	

		<?php if ( $requires ) : ?>
			<p><span>Requires AffiliateWP</span> v<?php echo esc_attr( $requires ); ?></p>
		<?php endif; ?>

		<?php if ( $edd_version_required ) : ?>
			<p><span>Requires <a title="Easy Digital Downloads" target="_blank" href="http://easydigitaldownloads.com">Easy Digital Downloads</a></span> v<?php echo esc_attr( $edd_version_required ); ?></p>
		<?php endif; ?>

		<?php if ( $released ) : ?>
			<p><span>Released </span><?php echo esc_attr( $released ); ?></p>
		<?php endif; ?>

		<?php if ( $updated ) : ?>
		<p><span>Last Updated</span><?php echo date( 'F j, Y', $updated ); ?></p>
		<?php endif; ?>
		
		<?php
		if ( function_exists('p2p_register_connection_type') ) :

			// Find connected posts
			$docs = new WP_Query( array(
				'connected_type' => 'download_to_docs',
				'connected_items' => get_queried_object(),
				'nopaging' => true,
				'post_status' => 'publish'
			) );

			if ( $docs->have_posts() ) {
				// Display connected posts
				if ( $docs->have_posts() ) :
					while ( $docs->have_posts() ) : $docs->the_post(); ?>
						<p><span>Documentation</span><a href="<?php the_permalink(); ?>">View Documentation</a></p>
					<?php endwhile;
				wp_reset_postdata();
				endif;
			}
			elseif ( $external_doc_url ) { ?>
				<p><span>Documentation</span><a href="<?php echo esc_url( $external_doc_url ); ?>">View Documentation</a></p>
			<?php }
		endif;
		?>

		<?php if ( $developer ) : ?>

			<?php if ( $developer_url ) : ?>
				<p><span>Developer </span><a href="<?php echo esc_url( $developer_url ); ?>" title="<?php echo esc_attr( $developer ); ?>" target="_blank"><?php echo esc_attr( $developer ); ?></a></p>
			
			<?php else : ?>
				<p><span>Developer </span><?php echo esc_attr( $developer ); ?></p>
			<?php endif; ?>

		<?php endif; ?>



		<?php if ( $external_download_url ) : ?>
			<a title="Download Now" target="_blank" href="<?php echo esc_url( $external_download_url ); ?>" class="button">Download Now</a>
		<?php endif; ?>

		<?php if ( has_term( 'pro-add-ons', 'download_category' ) ) : ?>

			<?php 
				$has_ultimate_license     = in_array( 3, affwp_get_users_price_ids() );
				$has_professional_license = in_array( 2, affwp_get_users_price_ids() );
				$has_plus_license         = in_array( 1, affwp_get_users_price_ids() );
				$has_personal_license     = in_array( 0, affwp_get_users_price_ids() );
			?>

			<?php if ( edd_get_download_files( get_the_ID() ) ) : // must have files attached before a download button can show ?>
				
				<?php if ( $has_ultimate_license || $has_professional_license ) : // user has either ultimate or professional license so can download pro add-ons ?>
					<a title="Get this add-on" href="<?php echo affwp_get_add_on_download_url( get_the_ID() ); ?>" class="button">Download Now</a>
				<?php elseif ( $has_plus_license || $has_personal_license ) : // user must upgrade to download add-on ?>	
					
					<p>
						<a href="#upgrade" title="Upgrade License" class="button popup-content" data-effect="mfp-move-from-bottom">Upgrade license</a>
					</p>

					<p>This add-on is only available to ultimate or professional license holders.</p>
					<p>Upgrade your license to download this add-on for free.</p>

					<?php affwp_upgrade_license_modal(); ?>
					

				<?php else : // user does not have any license, provide links to purchase ?>

					<p>This add-on is available free to <a href="<?php echo site_url( 'pricing' ); ?>">ultimate</a> or <a href="<?php echo site_url( 'pricing' ); ?>">professional</a> license holders.</p>
				<?php endif; ?>

			<?php endif; ?>	



			

		<?php endif; ?>
		
		

	</aside>
	<?php
}


function affwp_upgrade_license_modal() {
	?>
	<div id="upgrade" class="popup entry-content mfp-with-anim mfp-hide">

		<h1>Upgrade your license</h1>
		<p>Pro add-ons are only available to <strong>ultimate</strong> or <strong>professional</strong> license holders.</p>
		<p>Once you upgrade your license you'll have access to all pro add-ons (including this one), as well as any future pro add-ons we build.</p>

		<div class="affwp-license">
			<h2>Ultimate License</h2>
			<p><strong>Unlimited</strong> site licenses, <strong>unlimited</strong> updates, <strong>unlimited support.</p>
			
			<a href="<?php echo affwp_get_license_upgrade_url( 'ultimate' ); ?>" title="Upgrade to Ultimate" class="button">Upgrade to Ultimate</a>
			
		</div>

		<div class="affwp-license">
			<h2>Professional License</h2>
			<p><strong>Unlimited</strong> site licenses, 1 year of updates, 1 year of support.</p>
			
			<a href="<?php echo affwp_get_license_upgrade_url( 'professional' ); ?>" title="Upgrade to Professional" class="button">Upgrade to Professional</a><br/>
			
		</div>

	</div>

	<?php
}


function affwp_edd_optimizely_revenue_tracking() {

	$session = edd_get_purchase_session();
	if( ! $session ) {
		return;
	}

	$payment_id = edd_get_purchase_id_by_key( $session['purchase_key'] );

?>
<script>
	var price = <?php echo edd_get_payment_amount( $payment_id ); ?> 
	window.optimizely = window.optimizely || [];
	window.optimizely.push(['trackEvent', 'purchase_complete', {'revenue': price * 100}]);
</script>
<?php
}
add_action( 'wp_head', 'affwp_edd_optimizely_revenue_tracking');

function affwp_edd_auto_create_user( $payment_id, $payment_data ) {

	if( is_user_logged_in() ) {
		return;
	}

	if( $payment_data['user_info']['id'] > 0 ) {
		return;
	}

	if( get_user_by( 'email', $payment_data['user_email'] ) ) {
		return;
	}

	if( ! is_array( $payment_data['cart_details'] ) ) {
		return;
	}

	foreach( $payment_data['cart_details'] as $item ) {
		if( ! isset( $item['item_number']['options'] ) ) {
			return;
		}

		if( 2 !== (int) $item['item_number']['options']['price_id'] ) {
			return;
		}
	}

	$user_args = array(
		'user_login'      => $payment_data['user_email'],
		'user_pass'       => wp_generate_password( 24 ),
		'user_email'      => $payment_data['user_email'],
		'user_registered' => date( 'Y-m-d H:i:s' ),
		'role'            => get_option( 'default_role' )
	);

	// Insert new user
	$user_id = wp_insert_user( $user_args );

	// Login new user
	edd_log_user_in( $user_id, $payment_data['user_email'], $user_args['user_pass'] );
}
add_action( 'edd_insert_payment', 'affwp_edd_auto_create_user', 10, 2 );