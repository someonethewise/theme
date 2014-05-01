<?php
/**
 * The Template for displaying all single posts
 */
get_header(); ?>



<header class="entry-header">
<a class="back" href="<?php echo site_url( 'support/documentation' ); ?>">Back to documentation</a>
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

	<?php
	$excerpt = $post->post_excerpt;
	
	if ( $excerpt )
		echo '<h2>' . $excerpt . '</h2>';
	?>

</header>
	<div id="primary" class="content-area">
	
	<?php

	?>
	

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			
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