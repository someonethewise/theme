<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;


/**
 * Modify the rewrite option to include the download category
 * This will be moved into the custom functionality plugin at a later date
 *
 * @since 1.0.0
 */
function affwpcf_edd_download_post_type_args( $download_args ) {

	$download_args['rewrite'] = array( 'slug' => 'add-ons/%download_category%' );

	return $download_args;
}
add_filter( 'edd_download_post_type_args', 'affwpcf_edd_download_post_type_args' );

/**
 * Modify the add-on links to includes the download category
 * This will be moved into the custom functionality plugin at a later date
 *
 * @since 1.0.0
 */
function affwpcf_edd_addon_links( $post_link, $id = 0 ) {

    $post = get_post( $id );

    if ( is_object( $post ) ) {
        $terms = wp_get_object_terms( $post->ID, 'download_category' );
        if ( $terms ) {
            return str_replace( '%download_category%' , $terms[0]->slug , $post_link );
        }
    }

    return $post_link;

}
add_filter( 'post_type_link', 'affwpcf_edd_addon_links', 1, 3 );

/**
 * Pre get post queries
 *
 * @since 1.0.0
 */
function affwp_theme_pre_get_posts( $query ) {

    if ( $query->is_main_query() && ! is_admin() ) {

		// show all downloads on /add-ons/pro
		if ( $query->is_tax( 'download_category' ) ) {
			$query->set( 'posts_per_page', -1 );
		}

		// limit blog posts to 10 perpage
		if ( $query->is_home ) {
			$query->set( 'posts_per_page', 9 );
		}

    }

}
add_action( 'pre_get_posts', 'affwp_theme_pre_get_posts' );

/**
 * Modify EDD download price
 *
 * 10.00 becomes 10
 * 10.50 becomes 10.5
 *
 * @since 1.0.0
 */
function affwp_theme_edd_download_price( $price, $download_id, $price_id ) {
	return floatval( $price );
}
add_filter( 'edd_download_price', 'affwp_theme_edd_download_price', 10, 3 );

/**
 * Remove the Software Licensing "License Keys" column from the purchase history table
 *
 * @since 1.0.0
 */
// remove_action( 'edd_purchase_history_row_end', 'edd_sl_site_management_links', 10 );
// remove_action( 'edd_purchase_history_header_after', 'edd_sl_add_key_column' );

/**
 * Redirect to correct tab when profile is updated
 */
function affwp_theme_edd_profile_updated( $user_id, $userdata ) {
	wp_safe_redirect( add_query_arg( 'updated', 'true', '#tabs=3' ) );
	exit;
}
add_action( 'edd_user_profile_updated', 'affwp_theme_edd_profile_updated', 10, 2 );

/**
 * Redirect to the second account tab when clicking the update payment method link
 */
function affwp_theme_edd_subscription_update_url( $url, $object ) {

	$url = add_query_arg( array( 'action' => 'update', 'subscription_id' => $object->id ), '#tabs=1' );

	return $url;
}
//add_filter( 'edd_subscription_update_url', 'affwp_theme_edd_subscription_update_url', 10, 2 );


/**
 * Optimizely revenue tracking
 *
 * @since 1.0.0
 */
function affwp_theme_edd_optimizely_revenue_tracking() {

	$session = edd_get_purchase_session();
	if( ! $session || ! edd_is_success_page() ) {
		return;
	}

	$payment_id = edd_get_purchase_id_by_key( $session['purchase_key'] );

?>
<script>
	var price = <?php echo edd_get_payment_amount( $payment_id ); ?>;
	window.optimizely = window.optimizely || [];
	window.optimizely.push(['trackEvent', 'purchase_complete', {'revenue': price * 100}]);
</script>
<?php
}
add_action( 'wp_head', 'affwp_theme_edd_optimizely_revenue_tracking');


/**
 * Add learn more link to pro add-ons
 *
 * @since 1.0.0
 */
function affwp_theme_learn_more() {

	if ( ! has_term( 'pro', 'download_category', get_the_ID() ) ) {
		return;
	}

	?>

	<footer>
		<a href="<?php echo get_permalink( get_the_ID() ); ?>">Learn more</a>
	</footer>

	<?php
}
add_action( 'edd_download_after', 'affwp_theme_learn_more' );


/**
 * Upgrade or purchase license modal
 *
 * @since 1.0.0
 */
function affwp_theme_upgrade_or_purchase_modal() {

	$has_plus_license     = in_array( 1, affwp_theme_get_users_price_ids() );
	$has_personal_license = in_array( 0, affwp_theme_get_users_price_ids() );
	$upgrade_required     = $has_personal_license || $has_plus_license;
	$professional_add_ons = affwp_theme_get_pro_add_on_count();

	?>
	<div id="no-access" class="popup entry-content mfp-with-anim mfp-hide">

		<?php if ( $upgrade_required ) : // has personal or plus license ?>
			<h1>Upgrade your license and get instant access!</h1>
		<?php else : // is logged out, or with no access ?>
			<h1>Get instant access to all pro add-ons!</h1>
		<?php endif; ?>

		<p>Pro add-ons are only available to <strong>Professional</strong> or <strong>Ultimate</strong> license-holders.
		Once you have one of these licenses you'll have access to all <?php echo $professional_add_ons; ?> pro add-ons (including this one), as well as any pro add-ons we build in the future.</p>

		<?php if ( ! $upgrade_required ) : // has personal or plus license ?>
		<p>If you already have a license that grants you access to the pro add-ons, simply log in to <a href="/account">your account</a> and visit the "downloads" section. Or, come back to this page to download!</p>
		<?php endif; ?>

		<?php

		$licenses = affwp_theme_get_users_licenses();

		if ( $licenses ) : ?>
		<div class="affwp-licenses">
			<?php

			$license_heading = count( $licenses ) > 1 ? 'Your current licenses' : 'Your current license';
			?>

			<h2><?php echo $license_heading; ?></h2>

			<?php
				// a customer can happily have more than 1 license of any type
				if ( $licenses ) : ?>

					<?php foreach ( $licenses as $id => $license ) :

						if ( $license['limit'] == 0 ) {
							$license['limit'] = 'Unlimited';
						} else {
							$license['limit'] = $license['limit'];
						}

						$license_limit_text = $license['limit'] > 1 || $license['limit'] == 'Unlimited' ? ' sites' : ' site';

						?>
						<div class="affwp-license">

							<p><strong><?php echo edd_get_price_option_name( affwp_theme_get_download_id(), $license['price_id'] ); ?></strong>  - <?php echo $license['license']; ?></p>

							<?php if ( affwp_theme_has_license_expired( $license['license'] ) ) :

								$renewal_link = edd_get_checkout_uri( array(
									'edd_license_key' => $license['license'],
									'download_id'     => affwp_theme_get_download_id()
								) );

								?>
								<p class="license-expired"><a href="<?php echo esc_url( $renewal_link ); ?>">Your license has expired. Renew your license now and save 40% &rarr;</a></p>
							<?php endif; ?>

							<ul>
								<?php if ( $license['price_id'] == 1 || $license['price_id'] == 2 ) : // personal or plus license

									// IDs are that of the "License Upgrade Paths" from the download page
								?>
									<li><a href="<?php echo esc_url( edd_sl_get_license_upgrade_url( $id, 2 ) ); ?>">Upgrade to Professional license (unlimited sites + pro add-ons)</a></li>
									<li><a href="<?php echo esc_url( edd_sl_get_license_upgrade_url( $id, 3 ) ); ?>">Upgrade to Ultimate license (unlimited sites + pro add-ons)</a></li>
								<?php endif; ?>
							</ul>

						</div>

					<?php endforeach; ?>

				<?php else : ?>
					<p>You do not have a license yet. <a href="<?php echo site_url( 'pricing' ); ?>">View pricing &rarr;</a></p>
				<?php endif; ?>
		</div>
		<?php endif; ?>

		<h2>The Professional license</h2>
		<ul>
			<li>Access all <?php echo $professional_add_ons; ?> pro add-ons, including any built in the future</li>
			<li>Use AffiliateWP on as many sites as you'd like</li>
			<li>1 year of updates and support</li>
		</ul>

		<?php

			$download_id = function_exists( 'affwp_theme_get_download_id' ) ? affwp_theme_get_download_id() : '';
			$checkout_url = function_exists( 'edd_get_checkout_uri' ) ? edd_get_checkout_uri() : '';

			$download_url = add_query_arg( array( 'edd_action' => 'add_to_cart', 'download_id' => $download_id ), $checkout_url );

			$text = $upgrade_required ? 'Upgrade to' : 'Purchase';

			if ( $upgrade_required ) {
				$purchase_link = edd_sl_get_license_upgrade_url( $id, 2 );
			} else {
				// purchase link
				$purchase_link = $download_url . '&amp;edd_options[price_id]=3';
			}

		?>

		<a href="<?php echo esc_url( $purchase_link ); ?>" class="button"><?php echo $text; ?> Professional license</a>

		<h2>The Ultimate license</h2>
		<ul>
			<li>Access all <?php echo $professional_add_ons; ?> pro add-ons, including any built in the future</li>
			<li>Use AffiliateWP on as many sites as you'd like</li>
			<li>Receive unlimited updates and support &mdash; you'll never have to renew your license</li>
		</ul>

		<?php

		if ( $upgrade_required ) {
			$purchase_link = edd_sl_get_license_upgrade_url( $id, 3 );
		} else {
			// purchase link
			$purchase_link = $download_url . '&amp;edd_options[price_id]=4';
		}
		?>

		<a href="<?php echo esc_url( $purchase_link ); ?>" class="button"><?php echo $text; ?> Ultimate license</a>

	</div>

	<?php
}

/**
 * Remove pricing from pro add-on single download pages
 *
 * @since 1.0.0
 */
function affwp_theme_remove_pricing_pro_addons() {
	remove_action( 'themedd_sidebar_download', 'themedd_edd_pricing' );
}
add_action( 'template_redirect', 'affwp_theme_remove_pricing_pro_addons' );


/**
 * EDD Purchase link defaults
 */
function affwp_theme_edd_purchase_link_defaults( $args ) {

	// add "download" CSS class to download buttons on official-free addon pages
	if ( has_term( 'official-free', 'download_category', get_the_ID() ) ) {
		$args['class'] .= ' download';
	}

	return $args;
}
add_filter( 'edd_purchase_link_defaults', 'affwp_theme_edd_purchase_link_defaults' );

/**
 * Shows a download button for logged-in Professional or Ultimate license holders
 * Shows an upgrade notice for logged-in Personal or Plus license holders
 * Shows a purchase button for logged-out users
 *
 * @since 1.0.0
 */
function affwp_theme_edd_single_download_buttons() {

	?>
	<aside>
		<?php

			/**
			 * The "Download Now" button on a pro add-on page
			 */
			if ( has_term( 'pro', 'download_category' ) && edd_get_download_files( get_the_ID() ) ) :

			$has_ultimate_license     = in_array( 4, affwp_theme_get_users_price_ids() );
			$has_professional_license = in_array( 3, affwp_theme_get_users_price_ids() );

			if ( $has_ultimate_license || $has_professional_license ) : ?>
				<a href="<?php echo affwp_theme_get_add_on_download_url( get_the_ID() ); ?>" class="button download">Download Now</a>
			<?php else :  ?>
				<a href="#no-access" class="button wide popup-content download" data-effect="mfp-move-from-bottom">Download Now</a>
				<?php affwp_theme_upgrade_or_purchase_modal();
			endif;

			?>

		<?php endif; ?>

		<?php
			/**
			 * The "Free Download" button on a single download page
			 */
			if ( has_term( 'official-free', 'download_category', get_the_ID() ) ) {
				themedd_edd_purchase_link();
			}
		?>

		<?php do_action( 'download_add_on_end' ); ?>

	</aside>
<?php
}
add_action( 'themedd_sidebar_download', 'affwp_theme_edd_single_download_buttons' );

/**
 * Supported integrations button
 * Shows on a single download page
 *
 * @since 1.0.0
 */
function affwp_theme_edd_download_integrations() {

	// get the integrations
	$integrations = affwp_theme_get_integrations( get_the_ID() );

	if ( ! $integrations ) {
		return;
	}

	?>
	<a id="button-supported-integrations" href="#supported-integrations" class="button wide outline secondary popup-content" data-effect="mfp-move-from-bottom">View supported integrations</a>
	<?php affwp_theme_add_on_supported_integrations_modal(); ?>
<?php
}
add_action( 'download_add_on_end', 'affwp_theme_edd_download_integrations', 100 );

/**
 * Supported integrations modal window
 *
 * @since 1.0.0
 */
function affwp_theme_add_on_supported_integrations_modal() {

	// get the integrations
	$integrations = affwp_theme_get_integrations( get_the_ID() );

	?>
	<div id="supported-integrations" class="popup wide entry-content mfp-with-anim mfp-hide">

		<h1 class="aligncenter">Supported Integrations</h1>
		<p class="aligncenter"><?php echo get_the_title(); ?> supports the following integrations.</p>

		<?php if ( $integrations ) : ?>
        <div class="row grid row mb-xs-2 mb-sm-4 has-overlay">

            <?php foreach ( $integrations as $post_id ) : ?>

                <div class="grid-item col-xs-12 col-sm-6 mb-xs-2 mb-sm-0 type-integration <?php echo get_post( $post_id )->post_name; ?>">
                    <div class="grid-item-inner">

						<div class="grid-item-image">
						<?php echo get_the_post_thumbnail( $post_id, 'post-thumbnail' ); ?>
						</div>

    					<div class="overlay">
    						<a href="<?php echo get_the_permalink( $post_id );?>">
    							<?php if ( get_the_excerpt($post_id) ) : ?>
    							<p><?php echo get_the_excerpt( $post_id); ?></p>
    							<?php endif; ?>

    							<footer>
    								<span>Learn more</span>
    							</footer>
    						</a>
    					</div>

    				</div>
                </div>
            <?php endforeach; ?>
        </div>
		<?php endif; ?>

	</div>

	<?php
}



/**
 * Prevent pro or free addons from being added to cart with ?edd_action=add_to_cart&download_id=XXX
 *
 * @param int $download_id Download Post ID
 * @since 1.0.0
 */
function affwp_theme_edd_pre_add_to_cart( $download_id, $options ) {

	if (
		has_term( 'official-free', 'download_category', $download_id ) ||
		has_term( 'pro', 'download_category', $download_id )
	) {
		wp_die( 'This add-on cannot be purchased', 'Error', array( 'back_link' => true, 'response' => 403 ) );
	}

}
add_action( 'edd_pre_add_to_cart', 'affwp_theme_edd_pre_add_to_cart', 10, 2 );

/**
 * Redirect requests to single 3rd-party add-on pages to the main 3rd party page
 *
 * @since 1.0.0
 */
function affwp_theme_redirect_addons() {

	if ( is_singular( 'download' ) && has_term( '3rd-party', 'download_category' ) ) {
		wp_redirect( site_url( 'add-ons/3rd-party/' ), 301 );
		exit;
	}

}
add_action( 'template_redirect', 'affwp_theme_redirect_addons' );


/**
 * Show related pro add-ons
 *
 * @since 1.0.0
 */
function affwp_theme_show_related_pro_add_ons() {

	if ( affwp_theme_is_pro_add_on() ) {
		$term = 'pro';
		$type = 'Pro';
	} else {
		$term = 'official-free';
		$type = 'Official Free';
	}

	/**
	 * Related Pro Add-ons
	 */
	$args = array(

	    'posts_per_page' => -1,
		'post__not_in'   => array( get_the_ID() ),
	    'post_type' => 'download',
	    'tax_query' => array(
			array(
				'taxonomy' => 'download_category',
				'field'    => 'slug',
				'terms'    => $term,
			),
		),
	);

	    $pro_add_ons    = get_posts( $args );
	    $pro_add_on_ids = wp_list_pluck( $pro_add_ons, 'ID' );

	?>

	<?php if ( $pro_add_ons ) : ?>

	<section class="highlight container-fluid related-add-ons mb-xs-2 mb-lg-4">
	    <div class="wrapper">

			<header class="center-xs pv-xs-2 pv-lg-4 aligncenter">
				<h3>Explore more <?php echo $type; ?> add-ons</h3>
			</header>

        	<div class="slider">

                <?php foreach ( $pro_add_on_ids as $id ) : ?>
                    <div class="slick-item">
                        <div class="slick-inner">

                            <?php if ( function_exists( 'has_post_thumbnail' ) && has_post_thumbnail( $id ) ) : ?>
                                <div class="edd_download_image">
                                <a href="<?php the_permalink( $id );?>"><?php echo get_the_post_thumbnail( $id, 'large' ); ?></a>
                                </div>
                            <?php endif; ?>

                            <h3 class="grid-item-title">
                                <a href="<?php the_permalink( $id ); ?>"><?php echo get_the_title( $id ); ?></a>
                            </h3>

                            <div class="grid-item-content">

                                <?php $excerpt_length = apply_filters( 'excerpt_length', 30 ); ?>

                                <div itemprop="description" class="edd_download_excerpt">
                                    <?php echo apply_filters( 'edd_downloads_excerpt', wp_trim_words( get_post_field( 'post_excerpt', $id ), $excerpt_length ) ); ?>
                                </div>

                            </div>

							<footer>
								<a href="<?php the_permalink( $id );?>">Learn more</a>
							</footer>

                        </div>
                    </div>
                <?php endforeach; wp_reset_postdata(); ?>

            </div>

	    </div>
	</section>


	<script type="text/javascript">

      jQuery(document).on('ready', function() {

        jQuery(".slider").slick({
            dots: true,
            infinite: true,
            speed: 300,
			arrows: false,
            slidesToShow: 2,
            slidesToScroll: 2,
			cssEase: 'cubic-bezier(.31,1.12,.53,1.16)',
	        customPaging : function(slider, i) {
	            return '';
	        },
            responsive: [
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2, // 2 slides below 1024
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 680,
                settings: {
                  slidesToShow: 1, // 1 slide below 480px
                  slidesToScroll: 1
                }
              }
            ]
        });

      });

    </script>


	<?php endif; ?>

	<?php
}
add_action( 'themedd_single_download_primary_end', 'affwp_theme_show_related_pro_add_ons' );
