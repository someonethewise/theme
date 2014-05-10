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

		<?php if ( function_exists( 'edd_is_checkout' ) && ! edd_is_checkout() ) : ?>
		<section class="section alt columns columns-4">
			<div class="wrapper">
			<?php 
			$current_version = get_post_meta( affwp_get_affiliatewp_id(), '_edd_sl_version', true );

			?>
				<div class="item">
					<h3>Current Release</h3> 
					<a title="View the changelog" class="button current-version" href="<?php echo site_url( 'changelog' ); ?>"><i class="icon-affwp"></i>v<?php echo $current_version; ?></a>

					<?php if ( ! is_home() ) : ?>
					<h3>Stay up to date</h3> 
					<?php 
						if ( function_exists( 'gravity_form' ) ) {
							gravity_form( 1, false, false, false, '', true );
						}
					?>
					<?php endif; ?>
				</div>

				<div class="item">
				<h3>Pages</h3>
					<ul class="page-links">
						<li><a href="<?php echo site_url( 'pricing' ); ?>" title="Pricing">Pricing</a></li>
						<li><a href="<?php echo site_url( 'about' ); ?>" title="About">About</a></li>
						<li><a href="<?php echo site_url( 'blog' ); ?>" title="Blog">Blog</a></li>
						<li><a href="<?php echo site_url( 'support' ); ?>" title="Support">Support</a></li>
						<li><a href="<?php echo site_url( 'support/documentation' ); ?>" title="Documentation">Documentation</a></li>
						<li><a href="<?php echo site_url( 'account' ); ?>" title="Account">Account</a></li>
						<li><a href="<?php echo site_url( 'account/affiliates' ); ?>" title="Affiliates">Affiliates</a></li>
						<li><a href="<?php echo site_url( 'testimonials' ); ?>" title="Testimonials">Testimonials</a></li>
					</ul>
				</div>

				<div class="item">
				<h3>Follow Us</h3>

				<ul class="links">
					
					<li>
						<a href="https://twitter.com/affwp" class="twitter-follow-button" data-show-count="false" data-size="large" data-lang="en">@affwp</a>
				    </li>

					<li>
						<a href="https://twitter.com/pippinsplugins" class="twitter-follow-button" data-show-count="false" data-size="large" data-lang="en">@pippinsplugins</a>
				    </li>

			    	<li>
			    		<a href="https://twitter.com/sumobi_" class="twitter-follow-button" data-show-count="false" data-size="large" data-lang="en">@sumobi_</a>
			        </li>

					
				</ul>

				</div>

				<div class="item">
				<h3>Our Sites</h3>
					<ul class="links">
						<li><a href="http://pippinsplugins.com" title="Pippin's Plugins" target="_blank">Pippin's Plugins</a></li>
						<li><a href="http://sumobi.com" title="Sumobi" target="_blank">Sumobi</a></li>
						<li><a href="http://easydigitaldownloads.com" title="Easy Digital Downloads" target="_blank">Easy Digital Downloads</a></li>
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