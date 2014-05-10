<?php
/**
 * The Template for displaying all single posts
 */
get_header(); ?>



<?php affwp_page_header(); ?>

<section class="section columns-3 columns">
	<div class="item left bdr">
		<?php echo affwp_add_on_info( 'left' ); ?>	
	</div>
	
	<div class="primary item">
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
				<?php affwp_post_thumbnail(); ?>
					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'affwp' ) ); ?>
					</div>
				</article>

			<?php endwhile; ?>

	</div>

	<div class="item right bdr">
		<a class="back" href="<?php echo site_url( 'support/documentation' ); ?>">Back to documentation</a>

		<?php do_action( 'affwp_single_right_column' ); ?>
	</div>
		
</section>




	

<?php
get_sidebar();
get_footer();