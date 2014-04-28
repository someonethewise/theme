<?php

/**
 * Main share box that is displayed on the page
 */
function affwp_share_box( $url = '', $twitter_text = '' ) {
	
	
	//$twitter_text = isset( $twitter_text ) ? $twitter_text : 'I just purchased AffiliateWP, the best affiliate marketing plugin for WordPress!';

	// URL to share

	if ( $url )
		$share_url = $url;
	else
		$share_url = get_home_url( '', '', 'http' );

	ob_start();

?>
	<div class="sharing">

		<?php 
			$twitter_username = 'affwp';
			$twitter_count_box = 'vertical';
			$twitter_button_size = 'medium';
		?>
		<div class="share twitter">
			<a href="https://twitter.com/share" data-lang="en" class="twitter-share-button" data-count="<?php echo $twitter_count_box; ?>" data-size="<?php echo $twitter_button_size; ?>" data-counturl="<?php echo $share_url; ?>" data-url="<?php echo $share_url; ?>" data-text="<?php echo $twitter_text; ?>" data-via="<?php echo $twitter_username; ?>" data-related="pippinsplugins, sumobi_">
				Share
			</a>
		</div>

		<?php
			$data_share = 'true';
			$facebook_button_layout = 'box_count';
		?>
		
		<?php /* */ ?>
		<div class="share facebook">
			<div class="fb-like" data-href="<?php echo $share_url; ?>" data-send="true" data-action="like" data-layout="<?php echo $facebook_button_layout; ?>" data-share="<?php echo $data_share; ?>" data-width="" data-show-faces="false"></div>
		</div>
		
		<?php 
			$googleplus_button_size = 'tall';
			$google_button_annotation = 'bubble';
			$google_button_recommendations = 'false';
		?>
		<div class="share googleplus">
			<div class="g-plusone" data-recommendations="<?php echo $google_button_recommendations; ?>" data-annotation="<?php echo $google_button_annotation;?>" data-callback="plusOned" data-size="<?php echo $googleplus_button_size; ?>" data-href="<?php echo $share_url; ?>"></div>
		</div>

		<?php 
			$linkedin_counter = 'top';
		?>
		<div class="share linkedin">
		<script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
		<script type="IN/Share" data-counter="<?php echo $linkedin_counter; ?>" data-onSuccess="share" data-url="<?php echo $share_url; ?>"></script>
		</div>

	</div>

<?php 
	return ob_get_clean();
}

/**
 * Social sharing scripts
 *
 * @since 2.0
*/
function affwp_social_scripts() {
	global $post;

	$success_page = edd_get_option( 'success_page' ) ? is_page( edd_get_option( 'success_page' ) ) : false;

	if ( ! ( $success_page || is_front_page() ) )
		return;
	
	?>
	<script type="text/javascript">

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

	</script>
	<?php
}
add_action( 'wp_footer', 'affwp_social_scripts', 9999 );