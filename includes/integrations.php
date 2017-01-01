<?php

/**
 * Specify the container for filtering
 */
function affwp_theme_integration_footer_js() {

	if ( ! is_post_type_archive( 'integration' ) ) {
		return;
	}

	?>
	<script>
		var containerEl = document.querySelector('.integration-grid');

		var mixer = mixitup(containerEl);

		var filter = document.querySelectorAll('.integration-filter a');

		for( i = 0; i < filter.length; i++ ) {
			filter[i].addEventListener("click", function(e) {
				e.preventDefault();
			});
		};

	</script>
	<?php
}
add_action( 'wp_footer', 'affwp_theme_integration_footer_js', 100 );

/**
 * Enqueue scripts
 *
 * @since 1.0.0
 */
function affwp_theme_integration_enqueue_scripts() {

	// in addition to the parent theme's JS we load our own
	wp_register_script( 'mixitup', get_stylesheet_directory_uri() . '/js/mixitup.min.js', '', AFFWP_THEME_VERSION, true );

	if ( is_post_type_archive( 'integration' ) ) {
		wp_enqueue_script( 'mixitup' );
	}



}
add_action( 'wp_enqueue_scripts', 'affwp_theme_integration_enqueue_scripts' );

/**
 * Add post classes to each integration so we can filter them
 */
function affwp_theme_integration_post_classes( $classes ) {

	global $post;

	switch ( $post->post_name ) {
		case 'caldera-forms':
		case 'formidable-pro':
		case 'gravity-forms':
		case 'ninja-forms':
		case 'give':
		case 'contact-form-7':
			$classes[] = 'form';
			break;

		case 'ithemes-exchange':
		case 'jigoshop':
		case 'marketpress':
		case 'shopp':
		case 'wp-easycart':
		case 'wp-ecommerce':
		case 'easy-digital-downloads':
		case 'woocommerce':
		case 'paypal':
			$classes[] = 'ecommerce';
			break;


		case 'membermouse':
		case 'memberpress':
		case 'paid-memberships-pro':
		case 's2member':
		case 'restrict-content-pro':
		case 'optimizemember':
		case 'paid-memberships-pro':
			$classes[] = 'membership';
			break;

		case 'sprout-invoices':
		case 'wp-invoice':
			$classes[] = 'invoice';
			break;

		case 'lifterlms':
		case 'zippy-courses':
			$classes[] = 'lms';
			break;

	}

	return $classes;

}
add_filter( 'post_class', 'affwp_theme_integration_post_classes' );
