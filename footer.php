<?php
/**
 * The template for displaying the footer
 */
?>

</div> <!-- .wrapper -->
<?php do_action( 'affwp_content_end' ); ?>
</div> <!-- #content -->
<?php do_action( 'affwp_content_after' ); ?>

	<footer id="footer">
		<div id="mascot-2"></div>

		<?php if ( ! edd_is_checkout() ) : ?>
		<section class="section alt columns columns-4">
			<div class="wrapper">
				<div class="item">
				<!-- <h3>Links</h3> -->
					<ul>
						<li><a href="<?php echo site_url( 'pricing' ); ?>" title="Pricing">Pricing</a></li>
						<li><a href="<?php echo site_url( 'about' ); ?>" title="About">About</a></li>
						<li><a href="<?php echo site_url( 'blog' ); ?>" title="Blog">Blog</a></li>

					</ul>
				</div>

				<div class="item">
				<!-- <h3>Links</h3> -->
					<ul>
						<li><a href="<?php echo site_url( 'support' ); ?>" title="Support">Support</a></li>
						<li><a href="<?php echo site_url( 'support/documentation' ); ?>" title="Documentation">Documentation</a></li>
						<li><a href="<?php echo site_url( 'account' ); ?>" title="Account">Account</a></li>
						<li><a href="<?php echo site_url( 'account/affiliates' ); ?>" title="Affiliates">Affiliates</a></li>
					</ul>
				</div>

				<div class="item">
				<h3>Follow Us</h3>

				
				<ul>
					<li><a class="link" href="http://twitter.com/pippinsplugins" title="Pippin's Plugins" target="_blank">@pippinsplugins</a></li>
					<li><a class="link" href="http://twitter.com/sumobi_" title="Sumobi" target="_blank">@sumobi_</a></li>
				</ul>

				</div>

				<div class="item">
				<h3>Our Sites</h3>
					<ul>
						<li><a class="link" href="http://pippinsplugins.com" title="Pippin's Plugins" target="_blank">Pippin's Plugins</a></li>
						<li><a class="link" href="http://sumobi.com" title="Sumobi" target="_blank">Sumobi</a></li>
						<li><a class="link" href="http://easydigitaldownloads.com" title="Easy Digital Downloads" target="_blank">Easy Digital Downloads</a></li>
					</ul>
				</div>

				
			</div>

		</section>
		<?php endif; ?>
		
		<section class="section alt copyright">
			<div class="wrapper">
					Copyright &copy; 2014, AffiliateWP
			</div>

		</section>

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