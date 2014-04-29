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
				?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php
						// Page thumbnail and title.
						affwp_post_thumbnail();

						affwp_the_title();
						
						
					?>

					<?php affiliate_wp()->login->print_errors(); ?>
					
					<?php affiliate_wp()->register->print_errors(); ?>	
					
					<div class="entry-content">
						<?php
							the_content();
						?>
					</div><!-- .entry-content -->
				</article><!-- #post-## -->


				<?php

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