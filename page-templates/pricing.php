<?php
/**
 * Template Name: Pricing
 *
 */

get_header(); 

$professional_add_ons  = affwp_get_add_on_count( 'pro-add-ons' );
$official_free_add_ons = affwp_get_add_on_count( 'official-free' );
$third_party_add_ons   = affwp_get_add_on_count( '3rd-party' );
?>

<?php affwp_page_header( '30 Day Money Back Guarantee', '<h2>We stand behind our product 100% - <a href="#refund-policy" class="popup-content" data-effect="mfp-move-from-bottom">see our refund policy</a></h2>' ); ?>

<div class="primary content-area">
	<div class="wrapper">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

			endwhile;
		?>
		
		<?php affwp_pricing_options(); ?>
		
		<?php 
		$refund_policy = get_page_by_title( 'refund policy' );
		?>
		<div id="refund-policy" class="popup entry-content mfp-with-anim mfp-hide">
			<h1>
				<?php echo $refund_policy->post_title; ?>
			</h1>

			<?php echo stripslashes( wpautop( $refund_policy->post_content, true ) ); ?>
		</div>

		<p class="clause">* You must renew the license after one calendar year for continued updates and support. Discounted renewal rates available. See information below for details. All purchases are subject to our terms and condition of use.</p>

		

		<?php affwp_add_on_popups(); ?>			

	</div>
</div>

<section class="section columns columns-2 pre-sale-questions">
	<div class="wrapper">

		<div class="item">
			
			
			<article>
				<h4>Do I need to renew my license?</h4>
				<p>Your license key is valid for one year from the purchase date. You need an active license key for continued access to automatic updates and support. If you renew your license each year you’ll receive a huge 40% discount off the current price!</p>
			</article>
			
			<article>
				<h4>Can I upgrade my license?</h4>
				<p>Yes, you can easily upgrade your license from your <a href="<?php echo site_url( 'account' ); ?>" title="Account" >account</a> page.</p>
			</article>

			<article>
				<h4>Do I get access to add-ons?</h4>
				<p>We have <a href="#modal-offical-free-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $official_free_add_ons; ?> official free add-ons</a> and <a href="#modal-third-party-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $third_party_add_ons; ?> third party add-ons</a> (free and paid) available for all license holders.</p>

				<p>If you have either an ultimate or professional license you also receive free access to <a href="#modal-pro-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $professional_add_ons; ?> pro add-ons</a>, plus any additional add-ons we release in the future.</p>

			</article>

			<article>
				<h4>Will AffiliateWP work on WordPress.com?</h4>
				<p>No, AffiliateWP will not work on WordPress.com. It only works on self-hosted WordPress installs.</p>
			</article>
			
		</div>

		<div class="item">

			<article>
				<h4>Do you have a refund policy?</h4>
				<p><a href="#refund-policy" class="popup-content" data-effect="mfp-move-from-bottom">Yes we do</a>! We stand behind the quality of our product and will refund 100% of your money if you are unhappy with the plugin.</p>
			</article>

			<article>
				<h4>Do I get updates for the plugin?</h4>
				<p>Yes! Automatic updates are available free of charge to all users with a valid license key.</p>
			</article>

			<article>
				<h4>Do you offer support if I need help?</h4>
				<p>Yes! Top-notch customer support is key for a quality product, so we’ll do our very best to resolve any issues you encounter via our <a title="Support" href="<?php echo site_url( 'support' ); ?>">support page</a>.</p>
			</article>

			<article>
				<h4>I have other pre-sale questions, can you help?</h4>
				<p>Yes! You can ask us any question through our <a title="Support" href="<?php echo site_url( 'support' ); ?>">support page</a>.</p>
			</article>
			
		</div>

		
	</div>

	<div class="align-center">
		<a href="#site" class="scroll button huge">Ready to increase sales?</a>
	</div>
</section>

<?php
get_footer();
