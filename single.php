<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

	<header class="entry-header">
		
		<div class="entry-meta">
			<?php
				if ( 'post' == get_post_type() )
					affwp_posted_on();

				if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) :
			?>
			
			<?php
				endif;

				//edit_post_link( __( 'Edit', 'twentyfourteen' ), '<span class="edit-link">', '</span>' );
			?>

		</div><!-- .entry-meta -->
		<?php

			affwp_the_title();
			
			// if ( is_single() ) :
			// 	the_title( '<h1 class="entry-title">', '</h1>' );
			// else :
			// 	the_title( '<h1 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h1>' );
			// endif;
		?>

		<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'twentyfourteen' ), __( '1 Comment', 'twentyfourteen' ), __( '% Comments', 'twentyfourteen' ) ); ?></span>

		
	</header><!-- .entry-header -->
	
	<div id="primary" class="content-area">
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					/*
					 * Include the post format-specific template for the content. If you want to
					 * use this in a child theme, then include a file called called content-___.php
					 * (where ___ is the post format) and that will be used instead.
					 */
					get_template_part( 'content', get_post_format() );

					// Previous/next post navigation.
				//	affwp_post_nav();
					affwp_single_post_nav();
					?>



					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
