<?php
/**
 * Template Name: Affiliates
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div class="wrapper">

		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
			
			// echo '<div class="wrapper">';
			// echo do_shortcode( '[affiliate_area]' );
			// echo '</div>';
		?>
		<?php // echo do_shortcode( '[affiliate_area]' ); ?>
			


	</div>
</div>
<?php
get_footer();



