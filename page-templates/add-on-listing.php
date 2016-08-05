<?php
/**
 * Template name: Add-on listing
 *
 */

 get_header(); ?>

 <?php while ( have_posts() ) : the_post(); ?>
 <header class="page-header<?php echo themedd_page_header_classes(); ?>">
 	<h1 class="page-title"><?php echo get_the_title( get_the_ID() ); ?></h1>
 </header>
 <?php endwhile; ?>

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
