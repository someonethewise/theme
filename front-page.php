<?php
/**
 * Our custom front page for the coming soon page.
 */
get_header(); ?>

<div class="mailing-list">

	<h2>We're nearly done!</h2>
	<p>AffiliateWP is an affiliate plugin brought to you by <a href="http://twitter.com/pippinsplugins" title="Pippin Wiliamson" target="_blank">Pippin Williamson</a> and <a href="http://twitter.com/sumobi_" title="Andrew Munro" target="_blank">Andrew Munro</a>. It’s currently in active development and will be released soon.</p>
	
	<div class="wrapper">
		<?php 

			if ( function_exists( 'gravity_form' ) ) {
				gravity_form( 1, false, false, false, '', true );
			}

			echo affwp_share_box();
		?>
	</div>	
</div>
<?php get_footer(); ?>