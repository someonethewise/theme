<?php

/**
 * Remove the site footer on specific pages
 */
function affwp_theme_remove_footer( $return ) {

	if ( edd_is_checkout() ) {
		$return = false;
	}

	return $return;
}

add_filter( 'affwp_theme_show_footer', 'affwp_theme_remove_footer' );

/**
 * Footer links
 *
 * @since 1.0.0
 * @todo add links to menu rather than hardcoding them
 */
function affwp_theme_footer_menu() {

	if ( ! ( is_page( 'about' ) || is_404() || ( function_exists( 'edd_is_failed_transaction_page' ) && edd_is_failed_transaction_page() ) ) ) : ?>
	<div id="mascot"></div>
	<?php endif; ?>

	<?php if ( apply_filters( 'affwp_theme_show_footer', true ) ) : ?>
	<section class="container-fluid footer-links">
		<div class="wrapper">
			<div class="row">
				<div class="col-xs-12 col-sm-12">
					<div class="row">
						<div class="col-xs-12 col-sm-3">

							<h4>Product</h4>
							<ul>
								<li><a href="<?php echo site_url( '/pricing/' ); ?>">Pricing</a></li>
								<li><a href="<?php echo site_url( '/features/' ); ?>">Features</a></li>
								<li><a href="<?php echo site_url( '/screenshots/' ); ?>">Screenshots</a></li>
								<li><a href="<?php echo site_url( '/add-ons/' ); ?>">Add-ons</a></li>
								<li><a href="<?php echo site_url( '/testimonials/' ); ?>">Testimonials</a></li>
								<li><a href="<?php echo site_url( '/changelog/' ); ?>">Changelog</a></li>
								<li><a href="<?php echo site_url( '/affiliates/' ); ?>">Become an affiliate</a></li>
							</ul>

						</div>

						<div class="col-xs-12 col-sm-3">

							<h4>Company</h4>
							<ul>
								<li><a href="<?php echo site_url( '/about/' ); ?>">About</a></li>
								<li><a href="<?php echo site_url( '/blog/' ); ?>">Blog</a></li>
								<li><a href="<?php echo site_url( '/brand-assets/' ); ?>">Brand assets</a></li>
								<li><a href="<?php echo site_url( '/refund-policy/' ); ?>">Refund policy</a></li>
								<li><a href="https://twitter.com/affwp" target="_blank">Follow us on Twitter</a></li>
							</ul>

						</div>

						<div class="col-xs-12 col-sm-3">

							<h4>Get help</h4>
							<ul>
								<li><a href="<?php echo site_url( '/support/' ); ?>">Support</a></li>
								<li><a href="http://docs.affiliatewp.com/" target="_blank">Documentation</a></li>
								<li><a href="<?php echo site_url( '/consultants/' ); ?>">Consultants</a></li>
							</ul>

						</div>

						<div class="col-xs-12 col-sm-3 meet-the-family">

							<h4>Meet the family</h4>
							<ul>

								<li>
									<a href="https://easydigitaldownloads.com/" target="_blank">
										<img src="<?php echo get_stylesheet_directory_uri() . '/images/meet-easy-digital-downloads.png'; ?>" alt="" />
										<span>Easy Digital Downloads</span>
									</a>

								</li>

								<li>
									<a href="https://restrictcontentpro.com/?ref=4570" target="_blank">
										<img src="<?php echo get_stylesheet_directory_uri() . '/images/meet-restrict-content-pro.png'; ?>" alt="" />
										<span>Restrict Content Pro</span>
									</a>
								</li>
							</ul>

						</div>

					</div>
				</div>

			</div>

		</div>
	</section>
	<?php endif; ?>

<?php
}
add_action( 'themedd_footer_before_site_info', 'affwp_theme_footer_menu' );
