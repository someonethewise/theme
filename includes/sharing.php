<?php

/**
 * Main share box that is displayed on the page
 */
function affwp_share_box() {
	global $edd_options;
	
	// Introducing AffiliateWP, an affiliate marketing for WordPress you'll love http://affiliatewp.dev
	$twitter_default_text = 'I just purchased @affwp, the best affiliate marketing plugin for WordPress!';

	// URL to share
	$share_url = get_home_url();

	//echo $share_url;
	ob_start();

?>
	<div class="sharing">

		<?php 
			$twitter_username = '';
			$twitter_count_box = 'vertical';
			$twitter_button_size = 'medium';
		?>
		<div class="share twitter">
			<a href="https://twitter.com/share" data-lang="en" class="twitter-share-button" data-count="<?php echo $twitter_count_box; ?>" data-size="<?php echo $twitter_button_size; ?>" data-counturl="<?php echo $share_url; ?>" data-url="<?php echo $share_url; ?>" data-text="<?php echo $twitter_default_text; ?>" data-via="<?php echo $twitter_username; ?>" data-related="pippinsplugins, sumobi_">
				Share
			</a>
		</div>

		<?php
			$data_share = 'true';
			$facebook_button_layout = 'box_count';
		?>
		
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
		<script src="http://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
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
	$success_page = edd_get_option( 'success_page' ) ? is_page( edd_get_option( 'success_page' ) ) : false;

	if ( ! $success_page )
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

	twttr.ready(function (twttr) {
	    twttr.events.bind('tweet', function (event) {
	        jQuery.event.trigger({
	            type: "productShared",
	            url: event.target.baseURI
	        });
	    });
	});


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

	function plusOned(obj) {
		console.log(obj);
		jQuery.event.trigger({
		    type: "productShared",
		    url: obj.href
		});
	}

	<?php 
	/**
	 * LinkedIn
	*/
	?>
	function share(url) {
		console.log(url);
	 	jQuery.event.trigger({
            type: "productShared",
            url: url
        });
	}


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

	    FB.Event.subscribe('edge.create', function(href, widget) {
	        jQuery.event.trigger({
	            type: "productShared",
	            url: href
	        });     
	    });
	};

	jQuery(document).ready(function ($) {

		jQuery(document).on( 'productShared', function(e) {

		//	if( e.url == window.location.href ) {

		    	var postData = {
		            action: 'share_thanks',
		            nonce: affwp_scripts.ajax_nonce
		        };

		    	$.ajax({
	            type: "POST",
	            data: postData,
	            dataType: "json",
	            url: affwp_scripts.ajaxurl,
	            success: function ( share_response ) {

	                if( share_response ) {
	                	
	                    if ( share_response.msg == 'valid' ) {
	                       console.log('successfully shared');
	                       console.log( share_response );

	                       jQuery('.mailing-list > h2').html( share_response.success_title );

	                       // add CSS class so the box can be styled
	                       jQuery('.mailing-list').addClass('shared');
	                    } 
	                    else {
	                        console.log('failed to share');
	                        console.log( share_response );
	                    }
	                } 
	                else {
	                    console.log( share_response );
	                }
	            }
	        }).fail(function (data) {
	            console.log( data );
	        });

		//	}
		});
	});
	</script>
	<?php
}
add_action( 'wp_footer', 'affwp_social_scripts', 9999 );