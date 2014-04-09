<?php

/**
 * Home
 */

function affwp_home_how_it_works() {

	if ( ! is_front_page() )
		return;
	?>

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

			<div class="item">
				<i class="icon-benefit-3"></i>
				<h1>Increased Sales</h1>
				<p>More traffic to your website means an increased likelihood of converting them into real customers.</p>
			</div>
		</div>	
	</section>


	<section class="section featured">

		

		<div class="wrapper">
		<h1>Introducing <span>AffiliateWP</span></h1>	
		<h2>Complete integration</h2>

			<div class="flexslider">
				<ul class="slides">
					<li>
						<img alt="Complete integration" src="<?php echo get_stylesheet_directory_uri() . '/images/home-1.png'; ?>">
					</li>
					<li>
						<img alt="Manage Your Affiliates" src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>">
					</li>
					<li>
						<img alt="A Dashboard For Your Affiliates" src="<?php echo get_stylesheet_directory_uri() . '/images/home-3.png'; ?>">
					</li>
					<li>
						<img alt="Real time reporting" src="<?php echo get_stylesheet_directory_uri() . '/images/home-4.png'; ?>">
					</li>

				</ul>
			</div>
		</div>
	</section>

	<section id="slider-nav" class="columns columns-4 section features">
		<div class="wrapper">
			<div class="item">
				<h3>Complete integration</h3>	
				<p>AffiliateWP has complete integration with all major WordPress ecommerce and membership plugins.</p>
			</div>

			<div class="item">
				<h3>Manage Your Affiliates</h3>
				<p>See your top earning affiliates, view affiliate reports, and even moderate affiliate registrations.</p>
			</div>
			
			<div class="item">
				<h3>A Dashboard For Your Affiliates</h3>
			<p>Affiliates can easily see how much they have earned, how much is awaiting payment, and even how their referral URLs have done over time.</p>
			</div>

			<div class="item">
				<h3>Real Time Reporting</h3>	
				<p>View graphs of referrals over time, easily seeing your site's affiliate marketing performance.</p>
			</div>
		</div>	
	</section>

	<section class="section columns-4 columns more-features">
		<!-- <h1>More Goodies</h1> -->

		<div class="wrapper">
			
			<div class="item">
				<h3>Reliable Affiliate Tracking</h3>	
				<p>AffiliateWP tracks affiliate's referrals reliably, even on servers with aggressive caching.</p>
			</div>

		
			<div class="item">
				<h3>Easy Setup</h3>	
				<p>Just install and activate and you've got your very own affiliate network within minutes.</p>
			</div>
			
			<div class="item">
				<h3>Unlimited Affiliates</h3>	
				<p>Have an unlimited number of affiliates actively promoting your products and services.</p>
			</div>

			<div class="item">
				<h3>Moderated Registration</h3>
				<p>Affiliates registrations can be moderated or fully open, you can even create accounts manually.</p>
			</div>

			<div class="item">
				<h3>Extensive Documentation</h3>	
				<p>We've got all the videos and documentation you need to quickly get up and running.</p>
			</div>

			<div class="item">
				<h3>World Class Support</h3>	
				<p>If you require assistance, our support is considered to be the best in the industry.</p>
			</div>

			<div class="item">
				<h3>Fully localized/Translation Ready</h3>	
				<p>AffiliateWP is ready to be translated into your language. As always, translations are welcome!</p>
			</div>

			<div class="item">
				<h3>And More!</h3>	
				<p>Join us on our journey to create the best affiliate platform for WordPress.</p>
			</div>
		</div>	
	</section>

	<section class="section">
		<div class="wrapper">
			<div class="action">
				<?php echo affwp_button_get_started(); ?>
			</div>	
		</div>
	</section>

	<section class="section used-by">
		<div class="wrapper">
			<h1>Some of the awesome companies that use <span>AffiliateWP</span></h1>
			<h2>We also <a title="Affiliate system" href="<?php echo site_url( 'account/affiliates' );?>">use it ourselves</a></h2>
			
			<ul>
				<li><img alt="Used by Ninja Forms" src="<?php echo get_stylesheet_directory_uri() . '/images/ninja-forms.png'; ?>"></li>
				<li><img alt="Used by Easy Digital Downloads" src="<?php echo get_stylesheet_directory_uri() . '/images/edd.png'; ?>"></li>
				<li><img alt="Used by SearchWP" src="<?php echo get_stylesheet_directory_uri() . '/images/searchwp.png'; ?>"></li>
			</ul>

		</div>	
	</section>

	<section class="section alt">
		<div class="wrapper">
			<h1>How affiliate marketing works</h1>	
			<figure>
				<img src="<?php echo get_stylesheet_directory_uri() . '/images/how-it-works.png'; ?>">
			</figure>
		</div>
	</section>

	<section class="section columns-2 columns testimonials">
		<h1>A few of our happy customers</h1>

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

			<div class="item">
				 <blockquote>
		          <p>I spend all day in my WordPress dashboard so I wanted, nay, needed an affiliate solution that integrated flawlessly with WordPress. AffiliateWP was set up in minutes, is completely accurate, and helps me grow my business. It doesn't hurt that it's built by people you can trust either.</p>
		          <footer>James Laws, Ninja Forms</footer>
		        </blockquote>
			</div>

		</div>	
	</section>

	<section class="section">
		<div class="wrapper">
			<div class="action">
				<?php echo affwp_button_get_started(); ?>
			</div>	
		</div>
	</section>

	<section class="section subscribe">
		<h1>And we're just getting started</h1>
		<h2>Signup below and we'll keep you in the loop</h2>
		<div class="mailing-list">

			<div class="wrapper box">
				<?php 

					if ( function_exists( 'gravity_form' ) ) {
						gravity_form( 1, false, false, false, '', true );
					}
				?>

			</div>
			<i class="icon icon-thumbs-up"></i>
		</div>
	</section>

<?php }
add_action( 'affwp_content_before', 'affwp_home_how_it_works' );