<?php

if ( have_posts() ) {

	while ( have_posts() ) {

		the_post();

		$url = esc_url( add_query_arg( array(
			'utm_source'   => 'plugin-addons-page',
			'utm_medium'   => 'plugin',
			'utm_campaign' => 'AffWPAddonsPage',
			'utm_content'  => get_the_title()
		), get_permalink() ) );

		?>

		<div class="affwp-add-on">
			<h3 class="affwp-add-on-title"><?php echo get_the_title(); ?></h3>
			<a href="<?php echo $url; ?>" title="<?php echo get_the_title(); ?>">
				<?php echo the_post_thumbnail( 'affwp-post-thumbnail', array( 'title' => get_the_title() ) ); ?>
			</a>
			<p><?php echo get_the_excerpt(); ?></p>
			<a href="<?php echo $url; ?>" class="button-secondary">Get this add-on</a>

		</div>

		<?php
	}
}
exit;
