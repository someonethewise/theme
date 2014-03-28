<?php

if ( ! defined( 'AFFWP_THEME_VERSION' ) )
	define( 'AFFWP_THEME_VERSION', '1.0' );

if ( ! defined( 'AFFWP_INCLUDES_DIR' ) )
	define( 'AFFWP_INCLUDES_DIR', trailingslashit( get_template_directory() ) . 'includes' ); /* Sets the path to the theme's includes directory. */

/**
 * Includes
 * @since 1.0
*/
require_once( trailingslashit( AFFWP_INCLUDES_DIR ) . 'scripts.php' );
require_once( trailingslashit( AFFWP_INCLUDES_DIR ) . 'sharing.php' );
require_once( trailingslashit( AFFWP_INCLUDES_DIR ) . 'gforms.php' );
require_once( trailingslashit( AFFWP_INCLUDES_DIR ) . 'ajax-functions.php' );

/**
 * Typekit fonts
 * @return [type] [description]
 */
function affwp_webfonts() { ?>
	<script type="text/javascript">
  (function(d) {
    var config = {
      kitId: 'llz0jhz',
      scriptTimeout: 3000
    },
    h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
  })(document);
</script>
<?php }
add_action( 'wp_head', 'affwp_webfonts', 5 );


/**
 * Create a nicely formatted and more specific title element text for output
 * in head of document, based on current view.
 *
 * @since AffiliateWP 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
function affwp_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'affwp' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'affwp_wp_title', 10, 2 );