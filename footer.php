<?php
/**
 * The template for displaying the footer
 */
?>


<?php do_action( 'affwp_content_end' ); ?>
</div> <!-- #content -->
<?php do_action( 'affwp_content_after' ); ?>

	<footer id="footer">
		<div class="wrapper">

		<?php if ( ! ( is_404() || edd_is_failed_transaction_page() ) ) : ?>	
		<div id="mascot-2"></div>
		<?php endif; ?>

		<?php if ( function_exists( 'edd_is_checkout' ) && ! edd_is_checkout() ) : ?>

		<section class="section columns columns-5">

			<div class="item">
				<h3>AffiliateWP</h3>
				<ul class="page-links">
					<li><a href="<?php echo site_url( 'pricing' ); ?>" title="Pricing">Pricing</a></li>
					<li><a href="<?php echo site_url( 'features' ); ?>" title="Features">Features</a></li>
					<li><a href="<?php echo site_url( 'screenshots' ); ?>" title="Screenshots">Screenshots</a></li>
					<li><a href="<?php echo site_url( 'addons' ); ?>" title="Add-ons">Add-ons</a></li>
					<li><a href="<?php echo site_url( 'testimonials' ); ?>" title="Testimonials">Testimonials</a></li>
					<li><a href="<?php echo site_url( 'changelog' ); ?>" title="View the changelog">Changelog</a></li>
					<li><a href="<?php echo site_url( 'refund-policy' ); ?>" title="Refund Policy">Refund Policy</a></li>
					<li><a href="<?php echo site_url( 'brand-assets' ); ?>" title="Brand Assets">Brand Assets</a></li>
					<li><a href="<?php echo site_url( 'about' ); ?>" title="About">About</a></li>
					<li><a href="<?php echo site_url( 'blog' ); ?>" title="Blog">Blog</a></li>
					<li><a href="<?php echo site_url( 'consultants' ); ?>" title="Consultants">Consultants</a></li>
				</ul>
			</div>

			<div class="item">
				<h3>Support</h3>
				<ul class="page-links">
					<li><a href="<?php echo site_url( 'support' ); ?>" title="Support">Contact</a></li>
					<li><a href="http://docs.affiliatewp.com/" title="Documentation">Documentation</a></li>
					<li><a href="http://docs.affiliatewp.com/category/7-getting-started" title="Getting Started">Getting Started</a></li>
					<li><a href="http://docs.affiliatewp.com/category/75-integrations" title="Integrations">Integrations</a></li>
					<li><a href="http://docs.affiliatewp.com/category/65-short-codes" title="Shortcodes">Shortcodes</a></li>
					<li><a href="http://docs.affiliatewp.com/category/10-tutorials" title="Tutorials">Tutorials</a></li>
					<li><a href="http://docs.affiliatewp.com/category/51-faqs" title="FAQ">FAQ</a></li>

					<?php /*
					<li><a href="<?php echo site_url( 'account' ); ?>" title="Account">Account</a></li>
					<li><a href="<?php echo site_url( 'account/affiliates' ); ?>" title="Affiliates">Affiliates</a></li>
					*/ ?>
				</ul>
			</div>

			<div class="item">
				<h3>Follow Us</h3>
					<ul class="page-links">
						<li><a href="https://twitter.com/affwp" target="_blank">AffiliateWP</a></li>
						<li><a href="https://twitter.com/pippinsplugins" target="_blank">Pippin Williamson</a></li>
						<li><a href="https://twitter.com/sumobi_" target="_blank">Andrew Munro</a></li>
					</ul>

				
			</div>

			<div class="item">
				<h3>Our Sites</h3>	
				<ul class="page-links">
					<li><a href="http://pippinsplugins.com" title="Pippin's Plugins" target="_blank">Pippin's Plugins</a></li>
					<li><a href="http://sumobi.com" title="Sumobi" target="_blank">Sumobi</a></li>
					<li><a href="http://easydigitaldownloads.com" title="Easy Digital Downloads" target="_blank">Easy Digital Downloads</a></li>
				</ul>

				
			</div>

			


			<div class="item last">
				<div class="wrap">
				<?php if ( ! is_home() ) : ?>
					<h3>Stay up to date</h3> 
					<?php 
						if ( function_exists( 'gravity_form' ) ) {
							gravity_form( 1, false, false, false, '', true );
						}
					?>
				<?php endif; ?>

				</div>

			</div>

		</section>

		<?php endif; ?>
		
		<section class="section copyright">
			<div class="wrapper">
				Copyright &copy; <?php echo date('Y') . ', ' . get_bloginfo('name'); ?>
			</div>
		</section>

		</div>
	</footer>
</div> <!-- #site -->	

<?php wp_footer(); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49845932-1', 'affiliatewp.com');
  ga('send', 'pageview');

</script>
</body>
</html>