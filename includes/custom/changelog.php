<?php
/**
 * Changelog
 *
 * Loads AffiliateWP's changelog via ajax, caches it, and displays it in a modal window
 * See also changelog.php in the theme's root directory
 */


/**
 * Get changelog
 * @since 1.0.0
 */
function affwp_theme_get_changelog() {

    // Check for transient, if none, grab remote HTML file
	if ( false === ( $html = get_transient( 'affwp_changelog' ) ) ) {

        // Get remote HTML file
		$response = wp_remote_get( 'https://affiliatewp.com/addons/affiliatewp/changelog' );

        // Check for error
		if ( is_wp_error( $response ) ) {
			return;
		}

        // Parse remote HTML file
		$data = wp_remote_retrieve_body( $response );

        // Check for error
		if ( is_wp_error( $data ) ) {
			return;
		}

        // Store remote HTML file in transient, expire after 24 hours
		set_transient( 'affwp_changelog', $data, 24 * HOUR_IN_SECONDS );

	}

	if ( $html ) {
		return stripslashes_deep( $html );
	} else {
		return stripslashes_deep( $data );
	}

}

/**
 * Changelog
 *
 * @since 1.0.0
 */
function affwp_theme_product_changelog() {
	?>
    <script type="text/javascript">
         jQuery(document).ready(function($) {

           $('#affwp-changelog').magnificPopup({
             type: 'ajax',
             fixedContentPos: true,
             alignTop: true,
             fixedBgPos: true,
             overflowY: 'scroll', // as we know that popup content is tall we set scroll overflow by default to avoid jump
             closeBtnInside: true,
             preloader: false,
             callbacks: {
                 beforeOpen: function() {
                 this.st.mainClass = this.st.el.attr('data-effect');
                 }
             },
             midClick: true,
             removalDelay: 300
           });

         });
       </script>

	<?php
}
add_action( 'wp_footer', 'affwp_theme_product_changelog', 100 );
