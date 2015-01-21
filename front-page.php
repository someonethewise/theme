<?php
/**
 * Our custom front page for the coming soon page.
 */
get_header(); ?>

<section class="section columns-3 columns benefits">

		<div class="wrapper">
			<div class="item">
				<i class="icon-benefit-1"></i>
				<h1>Higher Visibility</h1>
				<p>Affiliates constantly promote your products and services, drastically improving your website’s SEO.</p>
			</div>
			
			<div class="item">
				<i class="icon-benefit-2"></i>
				<h1>More Traffic</h1>
				<p>Higher visibility means more people will visit your website, and see your products and services.</p>
			</div>

			<div class="item last">
				<i class="icon-benefit-3"></i>
				<h1>Increased Sales</h1>
				<p>More traffic to your website means an increased likelihood of converting them into real customers.</p>
			</div>
		</div>	
	</section>


	<section class="section featured">

		<div class="wrapper">
		<h1>Introducing <span>AffiliateWP</span></h1>	
		<h2>Complete Integration</h2>

			<div class="flexslider">
				<ul class="slides">
					<li>
						<img alt="Complete Integration" src="<?php echo get_stylesheet_directory_uri() . '/images/home-1.png'; ?>">
					</li>
					<li>
						<img alt="Manage Your Affiliates" src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>">
					</li>
					<li>
						<img alt="A Dashboard For Your Affiliates" src="<?php echo get_stylesheet_directory_uri() . '/images/home-3.png'; ?>">
					</li>
					<li>
						<img alt="Real Time Reporting" src="<?php echo get_stylesheet_directory_uri() . '/images/home-4.png'; ?>">
					</li>

				</ul>
			</div>
		</div>
	</section>

	<section id="slider-nav" class="columns columns-4 section features">
		<div class="wrapper">
			<div class="item">
				<div>
					<h3>Complete Integration</h3>	
					<p>AffiliateWP has complete integration with all major WordPress ecommerce and membership plugins. </p>
				</div>
				<p><a class="feature-link" title="View all integrations" href="http://docs.affiliatewp.com/category/75-integrations" target="_blank">View all integrations</a></p>

			</div>

			<div class="item">
				<div>
					<h3>Manage Your Affiliates</h3>
					<p>See your top earning affiliates, view affiliate reports, and even moderate affiliate registrations.</p>
				</div>
			</div>
			
			<div class="item">
				<div>
					<h3>Affiliate Dashboard</h3>
					<p>Affiliates can easily see how much they have earned, how much is awaiting payment, and even how their referral URLs have done over time.</p>
				</div>
			</div>

			<div class="item">
				<div>
					<h3>Real Time Reporting</h3>	
					<p>View graphs of referrals over time, easily seeing your site's affiliate marketing performance.</p>
				</div>
			</div>
		</div>

		<div class="wrapper see-features">
			<p>
				<a title="See a full list of features" href="<?php echo site_url( 'features' ); ?>">See a full list of features &rarr;</a>
			</p>	
		</div>

	</section>

	<section class="section columns-4 columns more-features">

		<div class="wrapper">
			
			<div class="item">
				
				<i class="icon-reliable-tracking"></i>
				
				<h3>Reliable Affiliate Tracking</h3>	
				<p>AffiliateWP tracks affiliate referrals reliably, even on servers with aggressive caching.</p>
			</div>

		
			<div class="item">
				<i class="icon-easy-setup"></i>
				<h3>Easy Setup</h3>	
				<p>Just install and activate and you've got your very own affiliate network within minutes.</p>
			</div>
			
			<div class="item">
				<i class="icon-unlimited-affiliates"></i>
				<h3>Unlimited Affiliates</h3>	
				<p>Have an unlimited number of affiliates actively promoting your products and services.</p>
			</div>

			<div class="item">
				<i class="icon-moderated-registration"></i>
				<h3>Moderated Registration</h3>
				<p>Affiliates' registrations can be moderated or fully open, you can even create accounts manually.</p>
			</div>

			<div class="item">
				<i class="icon-extensive-docs"></i>
				<h3>Extensive Documentation</h3>	
				<p>We've got all the documentation you need to quickly get up and running.</p>
			</div>

			<div class="item">
				<i class="icon-support"></i>
				<h3>World Class Support</h3>	
				<p>If you require assistance, our support is considered to be the best in the industry.</p>
			</div>

			<div class="item">
				<i class="icon-translation-ready"></i>
				<h3>Fully Internationalized</h3>	
				<p>AffiliateWP is ready to be translated into your language. As always, translations are welcome!</p>
			</div>

			<div class="item">
				<i class="icon-coupon-tracking"></i>
				<h3>Coupon Tracking</h3>	
				<p>Affiliate coupon tracking for WooCommerce, Easy Digital Downloads, and Restrict Content Pro.</p>
			</div>
		</div>

	</section>

	<section class="section">
		<div class="wrapper">

			<a class="button huge" href="<?php echo site_url( 'pricing' ); ?>">Get Started</a>
		</div>
	</section>

	<section class="section used-by">
		<div class="wrapper">
			<h1>Some of the awesome companies that use <span>AffiliateWP</span></h1>
			<h2>We also <a title="Affiliate system" href="<?php echo site_url( 'account/affiliates' );?>">use it ourselves</a></h2>
			
			<ul>
				<li class="ninja-forms"><img alt="Used by Ninja Forms" src="<?php echo get_stylesheet_directory_uri() . '/images/ninja-forms.png'; ?>"></li>
				<li class="edd"><img alt="Used by Easy Digital Downloads" src="<?php echo get_stylesheet_directory_uri() . '/images/edd.png'; ?>"></li>
				<li class="searchwp"><img alt="Used by SearchWP" src="<?php echo get_stylesheet_directory_uri() . '/images/searchwp.png'; ?>"></li>
				<li class="wpsessions"><img alt="Used by WPSessions" src="<?php echo get_stylesheet_directory_uri() . '/images/wpsessions.png'; ?>"></li>
				<li class="foo-plugins"><img alt="Used by Foo Plugins" src="<?php echo get_stylesheet_directory_uri() . '/images/foo-plugins.png'; ?>"></li>
				<li class="facetwp last"><img alt="Used by FacetWP" src="<?php echo get_stylesheet_directory_uri() . '/images/facetwp.png'; ?>"></li>
			</ul>

		</div>	
	</section>

	<section class="section home alt how-it-works">
		<div class="wrapper">
			<h1>How Affiliate Marketing works</h1>	
			<figure>
				<img src="<?php echo get_stylesheet_directory_uri() . '/images/how-it-works.png'; ?>">
			</figure>
		</div>
	</section>

	<section class="section home columns-2 columns testimonials grid">
		<h1>A few of our happy customers</h1>
		<a href="<?php echo site_url( 'testimonials' ); ?>" class="button" title="Read testimonials">Read testimonials</a>

		<div class="wrapper">
			<div class="item">
				<blockquote>
		          <p>Affiliates can have a huge impact on sales, but the solutions out there are clunky. I wanted something self hosted, well written, and built on WordPress’ foundation. Coming from something dated, slow, and unstable: AffiliateWP is a breath of fresh air.</p>
		          <footer>Jonathan Christopher, SearchWP</footer>
		        </blockquote>
			</div>

			<div class="item">
				 <blockquote>
		          <p>AffiliateWP allowed me to have a feature rich affiliate system for WP-Push in less than 10 minutes. Super simple to setup, easy to maintain, and perfect for my needs.</p>
		          <footer>Chris Klosowski, WP-Push</footer>
		        </blockquote>
			</div>
			
			<div class="item">
				 <blockquote>
		          <p>I needed a simple, user friendly referral system to help promote my digital products on my site. AffiliateWP provides this for me along with an easy integration with my store. No other affiliate system available is better.</p>
		          <footer>Sebs Studio</footer>
		        </blockquote>
			</div>

			<div class="item last">
				 <blockquote>
		          <p>I spend all day in my WordPress dashboard so I wanted, nay, needed an affiliate solution that integrated flawlessly with WordPress. AffiliateWP was set up in minutes, is completely accurate, and helps me grow my business. It doesn't hurt that it's built by people you can trust either.</p>
		          <footer>James Laws, Ninja Forms</footer>
		        </blockquote>
			</div>
		</div>


	</section>

	<?php
	/**
	 * Pricing options
	 */
	?>
	<section class="section home alt2 pricing">

		<?php affwp_page_header( '30 Day Money Back Guarantee', '<h2>We stand behind our product 100% - <a href="#refund-policy" class="popup-content" data-effect="mfp-move-from-bottom">see our refund policy</a></h2>' ); ?>

		<?php affwp_pricing_options(); ?>
		
		<div id="stripe-checkout-wrap" style="display:none;">
			<?php echo edd_get_purchase_link( array( 'download_id' => affwp_get_affiliatewp_id(), 'direct' => true ) ); ?>
		</div>

		<p class="clause">* You must renew the license after one calendar year for continued updates and support. Discounted renewal rates available. See information below for details. All purchases are subject to our terms and condition of use.</p>

		<?php affwp_add_on_popups(); ?>	

		<?php 
		$refund_policy = get_page_by_title( 'refund policy' );
		?>
		<div id="refund-policy" class="popup entry-content mfp-with-anim mfp-hide">
			<h1>
				<?php echo $refund_policy->post_title; ?>
			</h1>

			<?php echo stripslashes( wpautop( $refund_policy->post_content, true ) ); ?>
		</div>
		
	</section>



	<section id="sign-up" class="section home subscribe">
		<h1>We’re only just getting started</h1>
		<h2>Sign up below and we'll keep you in the loop</h2>
		<div class="mailing-list">

			<div class="wrapper box">
				<?php 

					if ( function_exists( 'gravity_form' ) ) {
						gravity_form( 1, false, false, false, '', true );
					}
				?>

			</div>
			
		</div>
	</section>

		
	<section class="section home share" id="sharing-home">
		<?php echo affwp_share_box( '', 'AffiliateWP - The best affiliate marketing plugin for WordPress' ); ?>
	</section>




<?php get_footer(); ?>