<?php
/**
 * Enqueue scripts and styles
 */


function affwp_enqueue_scripts() {

	// Loads our main stylesheet.
	wp_enqueue_style( 'affwp-style', get_stylesheet_uri(), array(), AFFWP_THEME_VERSION );

	/**
	 * AffiliateWP JS
	 * Modernizer, FancyBox, Respond.js, affwp.js
	 */
	wp_register_script( 'affiliatewp', get_template_directory_uri() . '/js/affiliatewp.min.js', array( 'jquery' ), AFFWP_THEME_VERSION, true );
	wp_enqueue_script( 'affiliatewp' );

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
function affwp_flexslider() {

	if ( ! is_front_page() )
		return;
?>
	<script type="text/javascript">
		jQuery(window).load(function() {
			jQuery('.flexslider').flexslider({
				animation: "fade",
				easing: "easeInOutQuad",
				manualControls: "#slider-nav .item div",
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
			jQuery(document).ready(function($) {
				
				// single images
				$("a:has(img)[href$='.jpg'], a:has(img)[href$='.png'], a:has(img)[href$='.gif']").not(".gallery a").addClass('zoom').magnificPopup({
					type: 'image',
					mainClass: 'mfp-with-zoom', // this class is for CSS animation below
					closeOnContentClick: true,
					closeBtnInside: true,
					zoom: {
						enabled: true,
						duration: 250,
						easing: 'ease-in-out',
						opener: function(openerElement) {
							return openerElement.is('img') ? openerElement : openerElement.find('img');
						}
					}

				});

			});
		</script>
<?php }
add_action( 'wp_footer', 'affwp_fancybox', 100 );

/**
 * Magnific Popup
 */
function affwp_magnific_popup() {
	
	$changelog = get_post_meta( get_the_ID(), '_edd_sl_changelog', true );

	//$changelog = get_post_meta( get_the_ID(), '_edd_sl_changelog', true );
	//$affiliate_area = function_exists( 'affiliate_wp' ) ? is_page( affiliate_wp()->settings->get( 'affiliates_page' ) ) : '';

	if ( ! ( is_page( 'pricing' ) || is_front_page() || is_singular( 'download' ) ) ) {
		return;
	}

	if ( is_singular( 'download' ) && ! $changelog ) {
		return;
	}

	// if ( ! ( is_singular( 'download' ) || $changelog || edd_is_checkout() || is_front_page() || $affiliate_area ) ) {
	// 	return;
	//}

	?>

	<script type="text/javascript">
		jQuery(document).ready(function($) {

		// inline
		$('.popup-content').magnificPopup({
			type: 'inline',
			fixedContentPos: true,
			fixedBgPos: true,
			overflowY: 'scroll',
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
add_action( 'wp_footer', 'affwp_magnific_popup', 100 );





/**
 * Try Disco scripts
 */
function affwp_try_disco_js() {

	// get purchase session
	$purchase_session = function_exists( 'edd_get_purchase_session' ) ? edd_get_purchase_session() : '';
	// get the key
	$purchase_key     = $purchase_session['purchase_key'];
	// get the payment ID from the purchase key
	$payment_id       = edd_get_purchase_id_by_key( $purchase_key );
	// get payment amount
	$payment_total    = get_post_meta( $payment_id, '_edd_payment_total', true );

	$amount = edd_is_success_page() ? '?amount=' . $payment_total : '';
 ?>
	<script src="//trydisco.com/thanks-h.js<?php echo $amount; ?>" async></script>
<?php }
add_action( 'wp_footer', 'affwp_try_disco_js', 100 );

/**
 * Home JS
 */
function affwp_social_js() {

	if ( is_front_page() ) :
	
	?>

	<script type="text/javascript">
		jQuery(document).ready(function($) {

	      $("#sharing-home").waypoint(function( direction ) {

	       	// LinkedIn
	       	if ( typeof (IN) != 'undefined' ) {
	       	    IN.parse();
	       	} 
	       	else {
	       	   $.getScript("https://platform.linkedin.com/in.js");
	       	}

	        	<?php 
	        	/**
	        	 * Twitter
	        	*/
	        	?>
	          	window.twttr = (function (d,s,id) {
	        	  var t, js, fjs = d.getElementsByTagName(s)[0];
	        	  if (d.getElementById(id)) return; js=d.createElement(s); js.id=id;
	        	  js.src="https://platform.twitter.com/widgets.js"; fjs.parentNode.insertBefore(js, fjs);
	        	  return window.twttr || (t = { _e: [], ready: function(f){ t._e.push(f) } });
	        	}(document, "script", "twitter-wjs"));

	        	<?php 
	        	/**
	        	 * Google +
	        	*/
	        	?>
	        	window.___gcfg = {
	        	  lang: 'en-US',
	        	  parsetags: 'onload'
	        	};

	        	(function() {
	        	    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
	        	    po.src = 'https://apis.google.com/js/plusone.js';
	        	    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
	        	  })();

	        	<?php
	        	/**
	        	 * Facebook
	        	*/
	        	?>
	        	(function(d, s, id) {
	        	     var js, fjs = d.getElementsByTagName(s)[0];
	        	     if (d.getElementById(id)) {return;}
	        	     js = d.createElement(s); js.id = id;
	        	     js.src = "//connect.facebook.net/en_US/all.js";
	        	     fjs.parentNode.insertBefore(js, fjs);
	        	 }(document, 'script', 'facebook-jssdk'));

	        	window.fbAsyncInit = function() {
	        	    // init the FB JS SDK
	        	    FB.init({
	        	      status	: true,
	        	      cookie	: true,                               
	        	      xfbml		: true                              
	        	    });

	        	};

	      },{
	        offset: 'bottom-in-view'
	      });

		});
	</script>
	<?php endif; ?>

	

<?php }
add_action( 'wp_footer', 'affwp_social_js', 100 );