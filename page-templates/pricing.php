<?php
/**
 * Template Name: Pricing
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


<section class="pricing">
	<?php
	// get ID of download by slug
	$id = affwp_get_post_by_title( 'affiliatewp', 'download' );
	$download_id = $id->ID;
	$download_url = edd_get_checkout_uri() . '?edd_action=add_to_cart&amp;download_id=' . $download_id;

	?>
	<ul class="pricing-chart">

		<li class="business">
			<h2>Business</h2>
			<div class="price">$99</div>
			<div class="count">3 sites</div>
			<div>1 Year of Updates &amp; Support *</div>

			<a title="Buy now" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=1">Buy now</a>
			
		</li>

		<li class="developer">
			<h2>Developer</h2>
			<div class="price">$199</div>
			<div class="count">Unlimited sites</div>
			<div>Access to all official add-ons</div>
			<div>1 Year of Updates &amp; Support *</div>

			<a title="Buy now" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=2">Buy now</a>
		</li>

		<li class="personal">
			<h2>Personal</h2>
			<div class="price">$49</div>
			<div class="count">1 site</div>
			<div>1 Year of Updates &amp; Support *</div>
			
			<a title="Buy now" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=0">Buy now</a>
		</li>

	</ul>

	<p>*You must renew the license after one calendar year for continued updates and support. Discounted renewal rates available. See information below for details. All purchases are subject to our terms and condition of use.</p>

	

</section>



	</div>
</div>

<section class="section columns columns-2 pre-sale-questions">
	
		<div class="item">
			<h4>Do you have a refund policy?</h4>
			<p><a title="Refund Policy" href="<?php echo site_url( 'refund-policy' ); ?>">Yes we do</a>! We firmly believe in and stand behind the quality of our product and will refund 100% of your money if you are unhappy with the plugin.</p>
		</div>

		<div class="item">
			<h4>Do I get updates for the plugin?</h4>
			<p>Yes! Automatic updates are delivered 100% free of charge to all users with a valid license key.</p>
		</div>

		<div class="item">
			<h4>Do I need to renew my license?</h4>
			<p>The license key is valid for one year from the purchase date. An active license key is needed for access to automatic updates and support. Your license can be renewed each year at a 40% discount of the current price.</p>
		</div>

		<div class="item">
			<h4>Do you offer support if I need help?</h4>
			<p>Yes! We believe that top-notch support is key for a quality product and will do our very best to resolve any issues you encounter via our <a title="Support" href="<?php echo site_url( 'support' ); ?>">support page</a>.</p>
		</div>
		<div class="item">
			<h4>Does AffiliateWP work on WordPress.com?</h4>
			<p>No, AffiliateWP does not work on WordPress.com, only self-hosted WordPress installs.</p>
		</div>
		<div class="item">
			<h4>I have other pre-sale questions, can you help?</h4>
			<p>Yes! You are welcome to ask any question you wish from our <a title="Support" href="<?php echo site_url( 'support' ); ?>">support page</a>.</p>
		</div>
		


	</section>

<?php
get_footer();
