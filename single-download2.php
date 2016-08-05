<?php
/**
 * The template for single integrations
 *
 */

get_header();

$integration_name = get_the_title( get_the_ID() );

?>



<?php while ( have_posts() ) : the_post(); ?>
<header class="page-header<?php echo themedd_page_header_classes(); ?>">
	<h1 class="page-title">
        <span class="entry-title-primary"><?php the_title(); ?></span>
    </h1>
	<div class="wrapper"><?php rcp_edd_download_pro_add_on(); ?></div>
</header>
<?php endwhile; ?>



<section class="container-fluid">
	<div class="wrapper">
		<div id="primary" class="content-area">

			<!-- <div class="row center-xs">
				    <div class="col-xs-12 col-lg-6">
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
					</div>

			</div> -->

			<div class="row center-xs">


					<div class="col-xs-12 col-lg-8 alignleft">


                            <?php
                            // Start the loop.
                            while ( have_posts() ) : the_post();

                                /*
                                 * Include the post format-specific template for the content. If you want to
                                 * use this in a child theme, then include a file called called content-___.php
                                 * (where ___ is the post format) and that will be used instead.
                                 */
                                ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



								    <div class="entry-content">

								        <?php do_action( 'themedd_entry_content_start' ); ?>

								        <?php the_content(); ?>

								        <?php
								            wp_link_pages( array(
								                'before' => '<div class="page-links">' . __( 'Pages:', 'themedd' ),
								                'after'  => '</div>',
								            ) );
								        ?>

								        <?php do_action( 'themedd_entry_content_end' ); ?>

								    </div>
								</article>

								<?php

								//get_template_part( 'template-parts/content', 'download' );

                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;

                            // End the loop.
                            endwhile;
                            ?>


					</div>


					<div class="col-xs-12 col-lg-4">

						<?php themedd_post_thumbnail(); ?>
						<?php //do_action( 'themedd_sidebar_download' ); ?>



						<?php if ( is_active_sidebar( 'sidebar-download' ) ) : ?>
							<?php dynamic_sidebar( 'sidebar-download' ); ?>
						<?php endif; ?>

						<?php do_action( 'themedd_sidebar_download_end' ); ?>

					</div>


			</div>

		</div>
	</div>
</section>




<?php
get_footer();
