<div id="affwp-affiliate-dashboard-creatives" class="affwp-tab-content">

	<h4><?php _e( 'Creatives', 'affiliate-wp' ); ?></h4>

	<p>See more <a href="<?php echo site_url('assets-banners'); ?>" title="AffiliateWP Creatives">AffiliateWP creatives</a>.</p>

	<?php
		echo affiliate_wp()->creative->affiliate_creatives() ? affiliate_wp()->creative->affiliate_creatives() : __( 'Sorry, there are currently no creatives available.', 'affiliate-wp' );
	?>
	
</div>