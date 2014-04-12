<?php
/**
 * The Template for displaying all single addons
 */
get_header(); ?>

	<div id="primary" class="content-area">
	
	<?php

	?>
	<a class="back" href="<?php echo site_url( 'addons' ); ?>">Back to add-ons</a>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
			<?php affwp_post_thumbnail(); ?>
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'affwp' ) ); ?>
				</div>
			</article>

		<?php endwhile; ?>
	</div>

<?php
get_sidebar();
get_footer();