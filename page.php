<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @since AffiliateWP 1.0
 */

get_header(); ?>

<header class="entry-header">
	<?php affwp_the_title(); ?>

	<?php
	$excerpt = $post->post_excerpt;

	if ( $excerpt )
		echo '<h2>' . $excerpt . '</h2>';
	?>
</header>

<div id="primary" class="content-area">
	
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
		?>

</div><!-- #primary -->
<?php get_sidebar( 'content' ); ?>

<?php
//get_sidebar();
get_footer();
