<?php
/**
 * Template Name: About
 */

get_header(); ?>

<?php affwp_page_header(); ?>

<div class="primary content-area">
	<div class="wrapper">

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

			endwhile;
		?>

		<section class="section columns columns-3 about">
		<div class="wrapper">
			
			<div class="item">
				<div class="wrapper">
				
				<img class="profile" alt="Pippin Williamson" src="<?php echo get_stylesheet_directory_uri() . '/images/about-pippin.jpg'; ?>">
				<h2>Pippin Williamson</h2>

				<p class="about-details">
					<a href="http://twitter.com/pippinsplugins" title="Pippin's Plugins" target="_blank">@pippinsplugins</a><br/>
					<a href="http://pippinsplugins.com" title="Pippin's Plugins" target="_blank">http://pippinsplugins.com</a>
				</p>
				<p>Pippin Williamson is an avid WordPress plugin developer from Hutchinson, Kansas and the lead developer for AffiliateWP. Along with AffiliateWP, Pippin is the founder of Easy Digital Downloads, a complete e-commerce plugin for selling digital products through WordPress, and Restrict Content Pro, a plugin for managing and selling memberships to premium content.</p>

				<p>Beyond the world of WordPress, Pippin is a devoted father and husband. He thoroughly enjoys brewing coffee varieties from around the world, indulging in craft beers, and riding his bicycle from point A to point B whenever possible.</p>
				
				</div>		
			</div>

		
			<div class="item">
				<div class="wrapper">
				
					<img class="profile" alt="Andrew Munro" src="<?php echo get_stylesheet_directory_uri() . '/images/about-andrew.jpg'; ?>">
					<h2>Andrew Munro</h2>

					<p class="about-details">
						<a href="http://twitter.com/sumobi_" title="Sumobi" target="_blank">@sumobi_</a><br/>
						<a href="http://sumobi.com" title="Sumobi" target="_blank">http://sumobi.com</a>
					</p>

					<p>Andrew Munro lives on the other side of the world in New Zealand, which is typically associated with Hobbits and occasionally left off world maps because of its size and location.

	<p>With a self-professed love for eCommerce, Andrew happily spends his days building plugins for EDD (Easy Digital Downloads), contributing code to EDD, or helping customers in the EDD support forums.</p>

	<p>Andrew doesn't own a bicycle like Pippin, and although his car can get from A to B, he is often wondering whether it can get from point B to A again.</p>

				</div>	
			</div>

			<div class="item">
				<div class="wrapper">
				
				<img class="profile" alt="Rami Abraham" src="<?php echo get_stylesheet_directory_uri() . '/images/about-rami.jpg'; ?>">
				<h2>Rami Abraham</h2>
				
				<p class="about-details">
					<a href="http://twitter.com/ramiabraham" title="Rami Abraham" target="_blank">@ramiabraham</a><br/>
					<a href="http://ramiabraham.com" title="Rami Abraham" target="_blank">http://ramiabraham.com</a>
				</p>

				<p>Rami is a WordPress developer that’s been building with WordPress since version 2.8. Prior to using WordPress, he built sites with static html, and a variety of server-side languages. He loves making cool things with AffiliateWP.

				<p>JavaScript and bad dad jokes are what he knows best.</p>

				<p>He helps organize WordCamp Lancaster, and is an adequate Lego craftsman.</p>

				</div>
			</div>
			
		</div>
		</section>
	</div>
</div>
<?php
get_footer();
