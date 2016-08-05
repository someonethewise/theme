<?php

/**
 *
 * 10.00 becomes 10
 * 10.50 becomes 10.5
 *
 * @since 1.0
 */
function themedd_edd_download_price( $price, $download_id, $price_id ) {
	return floatval( $price );
}
add_filter( 'edd_download_price', 'themedd_edd_download_price', 10, 3 );

/**
 * Determine if a download is a pro add-on or not
 *
 * @since  1.0.0
 */
function affwp_is_pro_add_on( $download_id = 0 ) {

	if ( has_term( 'pro', 'download_category', $download_id ) ) {
		return true;
	}

	return false;

}












/**
 * Get ID of AffiliateWP based on title
 *
 * @since  1.0.0
 */
function affwp_get_download_id() {

	$download     = get_page_by_title( 'AffiliateWP', OBJECT, 'download' );
	$download_id  = $download ? $download->ID : '';

	if ( $download_id ) {
		return $download_id;
	}

	return false;
}

/**
 * Get number of add-ons in the pro add-ons category
 * Excludes any add-ons that are coming soon
 *
 * @since  1.3
 * @return int number of add-ons
 */
function affwp_get_pro_add_on_count() {

	$args = array(
		'post_type'         => 'download',
		'download_category' => 'pro',
		'posts_per_page'    => -1,
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
 * Add learn more link to pro add-ons
 */
function rcp_show_learn_more() {

	if ( ! has_term( 'pro', 'download_category', get_the_ID() ) ) {
		return;
	}

	?>

	<footer>
		<a href="<?php echo get_permalink( get_the_ID() ); ?>">Learn more</a>
	</footer>

	<?php
}
add_action( 'edd_download_after', 'rcp_show_learn_more' );



/**
 * Upgrade or purchase license modal
 */
function affwp_upgrade_or_purchase_modal() {

	$has_plus_license     = in_array( 2, affwp_get_users_price_ids() );
	$has_personal_license = in_array( 1, affwp_get_users_price_ids() );
	$upgrade_required     = $has_personal_license || $has_plus_license;
	$professional_add_ons = affwp_get_pro_add_on_count();

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

		$licenses = affwp_get_users_licenses();

		if ( $licenses ) : ?>
		<div class="rcp-licenses">
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
						<div class="rcp-license">

							<p><strong><?php echo edd_get_price_option_name( affwp_get_download_id(), $license['price_id'] ); ?></strong>  - <?php echo $license['license']; ?></p>

							<?php if ( rcp_has_license_expired( $license['license'] ) ) :

								$renewal_link = edd_get_checkout_uri( array(
									'edd_license_key' => $license['license'],
									'download_id'     => affwp_get_download_id()
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

			$download_id = function_exists( 'affwp_get_download_id' ) ? affwp_get_download_id() : '';
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
 * Returns the URL to download an add on
 *
 * @since 1.3
 *
 * @return string
*/
function affwp_get_add_on_download_url( $add_on_id = 0 ) {

	$args = array(
		'edd_action' => 'add_on_download',
		'add_on'     => $add_on_id,
	);

	return add_query_arg( $args, home_url() );
}

/**
 * Get a user's download price IDs that they have access to
 *
 * @since  1.9
 */
function affwp_get_users_licenses( $user_id = 0 ) {

	if ( ! function_exists( 'edd_software_licensing' ) ) {
		return;
	}

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
				'license'     => get_post_meta( $key, '_edd_sl_key', true ),
				'price_id'    => get_post_meta( $key, '_edd_sl_download_price_id', true ),
				'limit'       => edd_software_licensing()->get_license_limit( affwp_get_affiliatewp_id(), $key ),
				'expires'     => edd_software_licensing()->get_license_expiration( $key )
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
 * Remove pricing from pro add-on single download pages
 */
function rcp_remove_pricing_pro_addons() {

	//if ( has_term( 'pro', 'download_category', get_the_ID() ) ) {
		remove_action( 'themedd_sidebar_download', 'themedd_edd_pricing' );
	//}

}
add_action( 'template_redirect', 'rcp_remove_pricing_pro_addons' );


/**
 * The combined price and purchase button shown on the single download page
 *
 * @since 1.0.0
 */
function affwp_themedd_free_add_on_pricing() {

	if ( ! has_term( 'official-free', 'download_category', get_the_ID() ) ) {
		return;
	}

	?>
	<aside>

		<?php themedd_edd_purchase_link(); ?>
	</aside>
<?php
}
add_action( 'themedd_sidebar_download', 'affwp_themedd_free_add_on_pricing' );

/**
 * Shows a download button for logged-in Professional or Ultimate license holders
 * Shows an upgrade notice for logged-in Personal or Plus license holders
 * Shows a purchase button for logged-out users
 *
 * @since 1.0.0
 */
function rcp_edd_download_pro_add_on() {

	if ( ! has_term( 'pro', 'download_category' ) || ! edd_get_download_files( get_the_ID() ) ) {
		return;
	}

	?>
	<aside>
		<?php
			$has_ultimate_license     = in_array( 4, affwp_get_users_price_ids() );
			$has_professional_license = in_array( 3, affwp_get_users_price_ids() );

			if ( $has_ultimate_license || $has_professional_license ) : ?>
				<a href="<?php echo affwp_get_add_on_download_url( get_the_ID() ); ?>" class="button">Download Now</a>
			<?php else :  ?>
				<a href="#no-access" class="button wide popup-content" data-effect="mfp-move-from-bottom">Download Now</a>
				<?php affwp_upgrade_or_purchase_modal();
			endif;
		?>
	</aside>
<?php
}
add_action( 'themedd_sidebar_download', 'rcp_edd_download_pro_add_on' );

/**
 * Prevent pro addons from being added to cart with ?edd_action=add_to_cart&download_id=XXX
 *
 * @param int $download_id Download Post ID
 */
function rcp_edd_pre_add_to_cart( $download_id, $options ) {

	if ( has_term( 'pro', 'download_category', $download_id ) ) {
		wp_die( 'This add-on cannot be purchased', 'Error', array( 'back_link' => true, 'response' => 403 ) );
	}

}
add_action( 'edd_pre_add_to_cart', 'rcp_edd_pre_add_to_cart', 10, 2 );

/**
 * Show related pro add-ons
 */
function affwp_themedd_show_related_pro_add_ons() {

	if ( affwp_is_pro_add_on() ) {
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

			<header class="center-xs pv-xs-2 pv-lg-4">
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

                            <h3 class="slick-title">
                                <a href="<?php the_permalink( $id );?>"><?php echo get_the_title( $id ); ?></a>
                            </h3>

                            <div class="slick-item-content">

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

    jQuery('.slider').on('setPosition', function () {

        jQuery(this).find('.slick-slide').height('auto');

        var slickTrack = jQuery(this).find('.slick-track');
        var slickTrackHeight = jQuery(slickTrack).height();

        jQuery(this).find('.slick-slide').css('height', slickTrackHeight + 'px');

    });

      jQuery(document).on('ready', function() {

        jQuery(".slider").slick({
            dots: true,
            infinite: true,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 2,
			cssEase: 'cubic-bezier(.31,1.12,.53,1.16)',
	        customPaging : function(slider, i) {
	            return '';
	        },
            prevArrow: jQuery('.tweets .slick-prev'),
            nextArrow: jQuery('.tweets .slick-next'),
            // centerMode: true,
            //  centerPadding: '60px',
            responsive: [
            //   {
            //     breakpoint: 1024,
            //     settings: {
            //       slidesToShow: 1, // 1
            //       slidesToScroll: 1,
            //     }
            //   },
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
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
        });

      });

    </script>


	<?php endif; ?>

	<?php
}
add_action( 'themedd_single_download_primary_end', 'affwp_themedd_show_related_pro_add_ons' );
// add_action( 'themedd_content_end', 'affwp_themedd_show_related_pro_add_ons' );




function affwp_themedd_sidebar_download_sharing() {
	?>

	<!-- Sharingbutton Facebook -->
	<a class="resp-sharing-button__link" href="https://facebook.com/sharer/sharer.php?u=http%3A%2F%2Fsharingbuttons.io" target="_blank" aria-label="">
	  <div class="resp-sharing-button resp-sharing-button--facebook resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
	    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	        <path stroke-width="2px" stroke-linejoin="round" stroke-miterlimit="10" d="M18.768 7.5h-4.268v-1.905c0-.896.594-1.105 1.012-1.105h2.988v-3.942l-4.329-.013c-3.927 0-4.671 2.938-4.671 4.82v2.145h-3v4h3v12h5v-12h3.851l.417-4z" fill="none"/>
	    </svg>
	    </div>
	  </div>
	</a>

	<!-- Sharingbutton Twitter -->
	<a class="resp-sharing-button__link" href="https://twitter.com/intent/tweet/?text=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;url=http%3A%2F%2Fsharingbuttons.io" target="_blank" aria-label="">
	  <div class="resp-sharing-button resp-sharing-button--twitter resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
	    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	        <path stroke-width="2px" stroke-linejoin="round" stroke-miterlimit="10" d="M23.407 4.834c-.814.363-1.5.375-2.228.016.938-.562.981-.957 1.32-2.019-.878.521-1.851.9-2.886 1.104-.827-.882-2.009-1.435-3.315-1.435-2.51 0-4.544 2.036-4.544 4.544 0 .356.04.703.117 1.036-3.776-.189-7.125-1.998-9.366-4.748-.391.671-.615 1.452-.615 2.285 0 1.577.803 2.967 2.021 3.782-.745-.024-1.445-.228-2.057-.568l-.001.057c0 2.202 1.566 4.038 3.646 4.456-.666.181-1.368.209-2.053.079.579 1.804 2.257 3.118 4.245 3.155-1.944 1.524-4.355 2.159-6.728 1.881 2.012 1.289 4.399 2.041 6.966 2.041 8.358 0 12.928-6.924 12.928-12.929l-.012-.588c.886-.64 1.953-1.237 2.562-2.149z" />
	    </svg>
	    </div>
	  </div>
	</a>

	<!-- Sharingbutton E-Mail -->
	<a class="resp-sharing-button__link" href="mailto:?subject=Super%20fast%20and%20easy%20Social%20Media%20Sharing%20Buttons.%20No%20JavaScript.%20No%20tracking.&amp;body=http%3A%2F%2Fsharingbuttons.io" target="_blank" aria-label="">
	  <div class="resp-sharing-button resp-sharing-button--email resp-sharing-button--small"><div aria-hidden="true" class="resp-sharing-button__icon resp-sharing-button__icon--normal">
	      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
	        <g stroke-width="2px" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" fill="none">
	            <path d="M23.5 18c0 .828-.672 1.5-1.5 1.5h-20c-.828 0-1.5-.672-1.5-1.5v-12c0-.829.672-1.5 1.5-1.5h20c.828 0 1.5.671 1.5 1.5v12zM20.5 8.5l-8.5 5.5-8.5-5.5M3.5 16l3.5-2M20.5 16l-3.5-2"/>
	        </g>
	    </svg>
	    </div>
	  </div>
	</a>

	<style>
	.resp-sharing-button {
  display: inline-block;
  border-radius: 5px;
  border-width: 1px;
  border-style: solid;
  transition: background-color 25ms ease-out, border-color 25ms ease-out, opacity 250ms ease-out;
  margin: 0.5em;
  padding: 0.5em 0.75em;
  font-family: Helvetica Neue,Helvetica,Arial,sans-serif;
}

.resp-sharing-button a {
  text-decoration: none;
  color: #FFF;
  display: block;
}

.resp-sharing-button__icon {
  display: inline-block;
}

.resp-sharing-button__icon svg {
  width: 1em;
  height: 1em;
  margin-bottom: -0.1em;
}

/* Non solid icons get a stroke */
.resp-sharing-button__icon {
  stroke: #FFF;
  fill: none;
}

/* Solid icons get a fill */
.resp-sharing-button__icon--solid,
.resp-sharing-button__icon--solidcircle {
  fill: #FFF;
  stroke: none;
}

.resp-sharing-button__link {
  text-decoration: none;
  color: #FFF;
}

.resp-sharing-button--large .resp-sharing-button__icon svg {
  padding-right: 0.4em;
}

.resp-sharing-button__wrapper {
  display: inline-block;
}

.resp-sharing-button--facebook {
  background-color: #3b5998;
  border-color: #3b5998;
}

.resp-sharing-button--facebook:hover,
.resp-sharing-button--facebook:active {
  background-color: #2d4373;
  border-color: #2d4373;
}

.resp-sharing-button--twitter {
  background-color: #55acee;
  border-color: #55acee;
}

.resp-sharing-button--twitter:hover,
.resp-sharing-button--twitter:active {
  background-color: #2795e9;
  border-color: #2795e9;
}

.resp-sharing-button--email {
  background-color: #444444;
  border-color: #444444;
}

.resp-sharing-button--email:hover
.resp-sharing-button--email:active {
  background-color: #2B2B2B;
  border-color: #2B2B2B;
}

</style>

	<?php
}
//add_action( 'themedd_sidebar_download_end', 'affwp_themedd_sidebar_download_sharing' );
