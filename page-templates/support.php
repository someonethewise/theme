<?php
/**
 * Template Name: Support
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<header class="entry-header">
	<?php affwp_the_title(); ?>

	<?php
	$excerpt = get_the_excerpt();
	
	if ( $excerpt )
		echo '<h2>' . $excerpt . '</h2>';
	?>
</header>

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
		?>
	</div>
</div>
<?php
get_footer();
