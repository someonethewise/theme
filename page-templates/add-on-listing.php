<?php
/**
 * Template name: Add-on listing
 *
 */

get_header(); ?>

<?php themedd_post_header(); ?>

<section class="container-fluid">
	<div class="wrapper">
		<?php
		   // Start the Loop.
		   while ( have_posts() ) : the_post();

			   // Include the page content template.
			   get_template_part( 'template-parts/content', 'page' );

				 // If comments are open or we have at least one comment, load up the comment template.
			   if ( comments_open() || get_comments_number() ) {
				   comments_template();
			   }

		   endwhile;
	   ?>
	</div>
</section>

 <?php
 get_footer();
