<?php
/**
 * Footer links
 *
 * @since 1.0.0
 * @todo add links to menu rather than hardcoding them
 */
function affwp_theme_footer_menu() {
?>
<?php if ( ! ( is_404() || ( function_exists( 'edd_is_failed_transaction_page' ) && edd_is_failed_transaction_page() ) ) ) : ?>
		<div id="mascot-2"></div>
		<?php endif; ?>


<section class="container-fluid footer-links">
	<div class="wrapper">
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<div class="row">
					<div class="col-xs-12 col-sm-3">

						<h4>Product</h4>
						<ul>
							<li><a href="<?php echo site_url( 'pricing' ); ?>">Pricing</a></li>
							<li><a href="<?php echo site_url( 'features' ); ?>">All features</a></li>
							<li><a href="<?php echo site_url( 'screenshots' ); ?>">Screenshots</a></li>
							<li><a href="<?php echo site_url( 'add-ons' ); ?>">Add-ons</a></li>
							<li><a href="<?php echo site_url( 'testimonials' ); ?>">Testimonials</a></li>
							<li><a href="<?php echo get_stylesheet_directory_uri() . '/changelog.php'; ?>" id="affwp-changelog" data-effect="mfp-move-from-bottom">Changelog</a></li>
						</ul>

					</div>

					<div class="col-xs-12 col-sm-3">

						<h4>Company</h4>
						<ul>
							<li><a href="<?php echo esc_url( site_url('about') ); ?>">About us</a></li>
							<li><a href="<?php echo esc_url( site_url('blog') ); ?>">Blog</a></li>
							<li><a href="<?php echo esc_url( site_url('brand-assets') ); ?>">Brand assets</a></li>
							<li><a href="<?php echo esc_url( site_url('refund-policy') ); ?>">Refund policy</a></li>
							<li><a href="https://twitter.com/affwp" target="_blank">Follow us on Twitter</a></li>
						</ul>

					</div>

					<div class="col-xs-12 col-sm-3">

						<h4>Get help</h4>
						<ul>
							<li><a href="<?php echo esc_url( site_url('support') ); ?>">Support</a></li>
							<li><a href="http://docs.affiliatewp.com/" target="_blank">Documentation</a></li>
							<li><a href="<?php echo esc_url( site_url('consultants') ); ?>">Consultants</a></li>
						</ul>

					</div>

					<div class="col-xs-12 col-sm-3 meet-the-family">

						<h4>Meet the family</h4>
						<ul>

							<li>
								<a href="https://easydigitaldownloads.com/?ref=4657" target="_blank">
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

<?php
}
add_action( 'themedd_footer_before_site_info', 'affwp_theme_footer_menu' );
