<?php
/**
 * Template Name: Pricing
 *
 */

get_header(); 

$developer_add_ons     = affwp_get_add_on_count( 'developer-add-ons' );
$official_free_add_ons = affwp_get_add_on_count( 'official-free' );
$third_party_add_ons   = affwp_get_add_on_count( '3rd-party' );


?>

<div class="primary content-area">
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

			<ul>
				<li class="price">$99</li>
				<li class="count">3 sites</li>
				<li>1 Year of Updates &amp; Support *</li>
			</ul>

			<div class="option_a">
				<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=1">Purchase</a>
			</div>	
			<div class="option_b" style="display:none">
				<a title="Purchase" class="button checkout-option" data-price-id="1" href="#">Purchase</a>
			</div>	
		</li>

		<li class="developer">
			<h2>Developer</h2>

			<ul>
				<li class="price">$199</li>
				<li class="count">Unlimited sites</li>
				<li class="highlight">Access to <a href="<?php echo site_url( 'addons/#official-developer-addons' ); ?>"><?php echo $developer_add_ons; ?> official developer add-ons</a></li>
				<li>1 Year of Updates &amp; Support *</li>
			</ul>

			<div class="option_a">
				<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=2">Purchase</a>
			</div>
			<div class="option_b" style="display:none">
				<a title="Purchase" class="button checkout-option" data-price-id="2" href="#">Purchase</a>
			</div>
		</li>

		<li class="personal">
			<h2>Personal</h2>

			<ul>
				<li class="price">$49</li>
				<li class="count">1 site</li>
				<li>1 Year of Updates &amp; Support *</li>
			</ul>
			<div class="option_a">
				<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=0">Purchase</a>
			</div>
			<div class="option_b" style="display:none">
				<a title="Purchase" class="button checkout-option" data-price-id="0" href="#">Purchase</a>
			</div>
		</li>

	</ul>

	<div id="stripe-checkout-wrap" style="display:none;">
		<?php echo edd_get_purchase_link( array( 'download_id' => 17, 'direct' => true ) ); ?>
	</div>

	<p class="clause">* You must renew the license after one calendar year for continued updates and support. Discounted renewal rates available. See information below for details. All purchases are subject to our terms and condition of use.</p>

</section>



	</div>
</div>

<section class="section columns columns-3 pre-sale-questions">
	<div class="wrapper">

		<div class="item">
			<?php /*
			<article>
				<h4>Is there a live demo I can try?</h4>
				<p>There sure is. You can <a href="http://demo.affiliatewp.com" target="_blank">try out AffiliateWP</a> live in your browser before you decide to purchase.</p>
			</article>
		*/ ?>
			
			<article>
				<h4>Do I need to renew my license?</h4>
				<p>The license key is valid for one year from the purchase date. An active license key is needed for access to automatic updates and support. Your license can be renewed each year at a 40% discount of the current price.</p>
			</article>
			
			<article>
				<h4>Can I upgrade my license?</h4>
				<p>Yes, we offer a 1-click upgrade process from your <a href="<?php echo site_url( 'account' ); ?>" title="Account" >account</a> page.</p>
			</article>

			<article>
				<h4>Do all license holders have access to add-ons?</h4>
				<p>Yes, there are <a title="Offical Free add-ons" href="<?php echo site_url( 'addons/#official-free-add-ons' ); ?>"><?php echo $official_free_add_ons; ?> official free</a> add-ons and <a title="Third Party add-ons" href="<?php echo site_url( 'addons/#third-party-add-ons' ); ?>"><?php echo $third_party_add_ons; ?> third party</a> (free and paid) add-ons available for all license holders.</p><p>In addition, our developer license holders receive access to <a href="<?php echo site_url( 'addons/#official-developer-addons' ); ?>"><?php echo $developer_add_ons; ?> official developer add-ons</a> as a special perk, including any we release in the future.</p>
			</article>
			
		</div>

		<div class="item">

			<article>
				<h4>Do you have a refund policy?</h4>
				<p><a title="Refund Policy" href="<?php echo site_url( 'refund-policy' ); ?>">Yes we do</a>! We firmly believe in and stand behind the quality of our product and will refund 100% of your money if you are unhappy with the plugin.</p>
			</article>

			<article>
				<h4>What are the benefits of a developer license?</h4>
				<p>In addition to being able to use AffiliateWP on an unlimited number of sites, a developer license also gives you access to all <a href="<?php echo site_url( 'addons/#official-developer-addons' ); ?>"><?php echo $developer_add_ons; ?> official developer add-ons</a>, including any we release in the future. This makes it a considerably valuable license to hold.</p>
			</article>

			<article>
				<h4>Do I get updates for the plugin?</h4>
				<p>Yes! Automatic updates are delivered 100% free of charge to all users with a valid license key.</p>
			</article>

			
			
		</div>

		<div class="item">
			<article>
				<h4>Do you offer support if I need help?</h4>
				<p>Yes! We believe that top-notch support is key for a quality product and will do our very best to resolve any issues you encounter via our <a title="Support" href="<?php echo site_url( 'support' ); ?>">support page</a>.</p>
			</article>

			<article>
				<h4>Will AffiliateWP work on WordPress.com?</h4>
				<p>No, AffiliateWP will not work on WordPress.com. It only works on self-hosted WordPress installs.</p>
			</article>

			
			
			<article>
				<h4>I have other pre-sale questions, can you help?</h4>
				<p>Yes! You are welcome to ask any question you wish from our <a title="Support" href="<?php echo site_url( 'support' ); ?>">support page</a>.</p>
			</article>

		</div>
	</div>	
</section>

<?php
get_footer();
