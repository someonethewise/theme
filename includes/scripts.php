<?php
/**
 * Enqueue scripts and styles
 */


function affwp_enqueue_scripts() {

	// Loads our main stylesheet.
	wp_enqueue_style( 'affwp-style', get_stylesheet_uri(), array(), AFFWP_THEME_VERSION );

	$custom_js = get_stylesheet_directory() . '/js/affwp.js';

	if ( file_exists( $custom_js ) ) {
		wp_enqueue_script( 'affwp-js', get_stylesheet_directory_uri() . '/js/affwp.js',  array( 'jquery' ), AFFWP_THEME_VERSION, true );
	}

	wp_localize_script( 'affwp-js', 'affwp_scripts', array(
			'ajaxurl'                 => edd_get_ajax_url(),
			'ajax_nonce'              => wp_create_nonce( 'affwp_ajax_nonce' )
		)
	);

	/**
	 * Mixitup
	 */
	wp_register_script( 'mixitup', get_template_directory_uri() . '/js/jquery.mixitup.min.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );
	
	// if ( is_page_template( 'page-templates/docs.php' ) || is_tax( 'doc_category' ) || is_singular( 'docs' ) ) {
	// 	wp_enqueue_script( 'mixitup' );
	// }

	/**
	 * Modernizr (includes html5 shim)
	 * This can be overrided on a child theme basis by including the same file in the child theme's /js folder
	 * Needs to be loaded in the header or IE 8 will freak out
	 */
	wp_register_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.min.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );
	wp_enqueue_script( 'modernizr' );

	/**
	 * Respond.js
	 * This makes media queries work in IE 8
	 */
	wp_register_script( 'respondjs', get_template_directory_uri() . '/js/respond.min.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );
	wp_enqueue_script( 'respondjs' );


	/**
	 * Fancybox
	 */
	wp_register_script( 'share', get_template_directory_uri() . '/js/share.js', array( 'jquery' ), AFFWP_THEME_VERSION, true );
//	wp_enqueue_script( 'share' );

	/**
	 * Fancybox
	 */
	wp_register_script( 'fancybox', get_template_directory_uri() . '/js/jquery.fancybox.pack.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );
	wp_enqueue_script( 'fancybox' );

	/**
	 * Fittext
	 */
	//wp_register_script( 'fittext', get_template_directory_uri() . '/js/jquery.fittext.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );
	//wp_enqueue_script( 'fittext' );

	/**
	 * Share
	 */
	//wp_register_script( 'fittext', get_template_directory_uri() . '/js/jquery.fittext.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );

	//wp_enqueue_script( 'fittext' );
	/**
	 * Flexslider
	 */
	//wp_register_script( 'easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );
	wp_register_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );

	/**
	 * Testimonials
	 */
	wp_register_script( 'testimonials', get_template_directory_uri() . '/js/testimonials.js', array( 'jquery' ), AFFWP_THEME_VERSION, false );

	if ( is_front_page() ) {
//		wp_enqueue_script( 'testimonials' );
		wp_enqueue_script( 'flexslider' );
	}

	/**
	 * Comments
	 */
	wp_register_script( 'comment-reply', '', '', '',  true );

	// We don't need the script on pages where there is no comment form and not on the homepage if it's a page. Neither do we need the script if comments are closed or not allowed. In other words, we only need it if "Enable threaded comments" is activated and a comment form is displayed.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// dequeue AffiliateWP's form.css stylesheet
	wp_dequeue_style( 'affwp-forms' );

}
add_action( 'wp_enqueue_scripts', 'affwp_enqueue_scripts' );

/**
 * Fittext
 *
 * @since 1.0
*/
function affwp_fittext() { 
?>
	<script type="text/javascript">
	 jQuery(document).ready(function($) {
	 	jQuery("h1.intro").fitText( 0.5, { maxFontSize: '56px' });	

	 });
	</script>
<?php }
//add_action( 'wp_footer', 'affwp_fittext', 50 );

/**
 * Share
 *
 * @since 1.0
*/
function affwp_home_share() { 
?>
<script>
 // jQuery('#share-button-top').share();

	jQuery(document).ready(function() {
 		new Share('.share-button');

 	});
  // new Share(".share-button", {
  //   networks: {
  //     facebook: {
  //       before: function(element) {
  //         this.url = element.getAttribute("data-url");
  //         return this
  //       },
  //       after: function() {
  //         console.log("User shared:", this.url);
  //       }
  //     }
  //   }
  // });

</script>

	
<?php }
//add_action( 'wp_footer', 'affwp_home_share', 100 );
 

/**
 * Fittext
 *
 * @since 1.0
*/
function affwp_flexslider() {

	if ( ! is_front_page() )
		return;
?>
	<script type="text/javascript">
		jQuery(window).load(function() {
			jQuery('.flexslider').flexslider({
				animation: "fade",
			//	easing: "easeInOutQuad",
				manualControls: "#slider-nav .item",
				directionNav: false,
				animationSpeed: 250,
				pauseOnHover: true,
				after: function( slider ) {
					var targetText = jQuery('.flex-active-slide img').attr('alt');
					jQuery( 'section.featured h2' ).text( targetText );
				}
			});

			// wraps the next/prev text with <span> tag for the arrows
			jQuery('.flexslider .flex-direction-nav li a').wrapInner('<span class="screen-reader-text" />');

			// duplicate the class of the anchor links and add them to the <li>
			jQuery('.flexslider .flex-direction-nav li a').each(function(){
			 $this = jQuery(this);
			 $this.closest('li').addClass( $this.attr('class') ); 
			 $this.removeClass();
			});
		});
	</script>
<?php }
add_action( 'wp_footer', 'affwp_flexslider', 50 );

/**
 * Fancybox
 * @since  1.0
 */
function affwp_fancybox() {
?>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery(".fancybox").fancybox({
				helpers: {
				    overlay: {
				      locked: false
				    }
				  },
				openEffect	: 'elastic',
				closeEffect	: 'elastic'
			});
		});
	</script>
<?php }
//add_action( 'wp_footer', 'affwp_fancybox', 100 );

/**
 * We don't use the shortcode so frontend.js never loads
 * @since  1.0
 */
function affwp_frontend_styling() {

	global $post;

	if( ! is_object( $post ) ) {
		return;
	}

	if ( is_page_template( 'page-templates/affiliates.php' ) ) {
		wp_enqueue_script( 'affwp-frontend', AFFILIATEWP_PLUGIN_URL . 'assets/js/frontend.js', array( 'jquery' ), AFFILIATEWP_VERSION );
		wp_localize_script( 'affwp-frontend', 'affwp_vars', array(
			'affwp_version' => AFFILIATEWP_VERSION,
			'permalinks'    => get_option( 'permalink_structure' ),
			'currency_sign' => affwp_currency_filter(''),
			'currency_pos'  => affiliate_wp()->settings->get( 'currency_position', 'before' ),
		));
	}

}
//add_action( 'wp_enqueue_scripts', 'affwp_frontend_styling' );

