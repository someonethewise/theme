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

		<div id="stripe-checkout-wrap" style="display:none;">
			<?php echo edd_get_purchase_link( array( 'download_id' => affwp_get_affiliatewp_id(), 'direct' => true ) ); ?>
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
				<p>The license key is valid for one year from the purchase date. An active license key is needed for access to automatic updates and support. Your license can be renewed each year at a 40% discount of the current price.</p>
			</article>
			
			<article>
				<h4>Can I upgrade my license?</h4>
				<p>Yes, we offer a 1-click upgrade process from your <a href="<?php echo site_url( 'account' ); ?>" title="Account" >account</a> page.</p>
			</article>

			<article>
				<h4>Do I get access to add-ons?</h4>
				<p>There are <a href="#modal-offical-free-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $official_free_add_ons; ?> official free add-ons</a> and <a href="#modal-third-party-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $third_party_add_ons; ?> third party add-ons</a> (free and paid) available for all license holders.</p>
				<p>Those lucky enough to have either an ultimate or professional license receive free access to <a href="#modal-pro-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $professional_add_ons; ?> pro add-ons</a> as a special perk, including any we release in the future.</p>
			</article>

			<article>
				<h4>Will AffiliateWP work on WordPress.com?</h4>
				<p>No, AffiliateWP will not work on WordPress.com. It only works on self-hosted WordPress installs.</p>
			</article>
			
		</div>

		<div class="item">

			<article>
				<h4>Do you have a refund policy?</h4>
				<p><a href="#refund-policy" class="popup-content" data-effect="mfp-move-from-bottom">Yes we do</a>! We firmly believe in and stand behind the quality of our product and will refund 100% of your money if you are unhappy with the plugin.</p>
			</article>

			<?php /*
			<article>
				<h4>What are the benefits of the developer license?</h4>
				<p>In addition to being able to use AffiliateWP on an unlimited number of sites, a developer license also gives you access to all <a href="#modal-pro-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $professional_add_ons; ?> pro add-ons</a>, including any we release in the future. This makes it a considerably valuable license to hold.</p>
			</article>
			*/ ?>
		
			<article>
				<h4>Do I get updates for the plugin?</h4>
				<p>Yes! Automatic updates are delivered 100% free of charge to all users with a valid license key.</p>
			</article>

			<article>
				<h4>Do you offer support if I need help?</h4>
				<p>Yes! We believe that top-notch support is key for a quality product and will do our very best to resolve any issues you encounter via our <a title="Support" href="<?php echo site_url( 'support' ); ?>">support page</a>.</p>
			</article>

		

			
			
			<article>
				<h4>I have other pre-sale questions, can you help?</h4>
				<p>Yes! You are welcome to ask any question you wish from our <a title="Support" href="<?php echo site_url( 'support' ); ?>">support page</a>.</p>
			</article>
			
		</div>

		
	</div>

	<div class="align-center">
		<a href="#site" class="scroll button huge">Ready to increase sales?</a>
	</div>
</section>

<?php
get_footer();
