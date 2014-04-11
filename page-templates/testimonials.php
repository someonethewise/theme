<?php
/**
 * Template Name: Testimonials
 *
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div class="wrapper">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

			endwhile;
		?>
	</div>
</div>

<section class="section columns-2 columns testimonials">
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

			<div class="item">
				 <blockquote>
		          <p>Honestly, I'm super picky about what plugins I'll run on my sites. I've wanted to set up an affiliate program for a while, but all of the plugins I tried were buggy, overloaded with options, and difficult to use. When I heard Pippin was going to build one, I couldn't wait to try it. </p><p>Now that I've used it, I can honestly say that he's completely outdone himself. AffiliateWP is by far the most well-coded and easiest-to-use affiliate management plugin ever made for WordPress. There's no crazy setup or clunky dashboard to deal with.</p> <p>Everything works exactly like it should; just like core WordPress features. You literally install AffiliateWP, pick an option or two, and within a few minutes you've got a fully-functioning affiliate program. It doesn't get much better than that.</p>
		          <footer>Audit WP</footer>
		        </blockquote>
			</div>


		</div>	
	</section>

<?php
get_footer();