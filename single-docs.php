<?php
/**
 * The Template for displaying all single posts
 */
get_header(); ?>



<?php affwp_page_header(); ?>

<section class="section columns-3 columns">
	<div class="item left bdr">
		<p>
		<span>Published</span>
		<?php if ( 'docs' == get_post_type() ) : ?>
			<?php printf( '<time datetime="%1$s">%2$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			); ?>
		<?php endif; ?>
		</p>

		<?php if ( in_array( 'doc_category', get_object_taxonomies( get_post_type() ) ) && affwp_categorized_blog() ) : ?>
			<p><span>Categories</span>
			<?php echo get_the_term_list( get_the_ID(), 'doc_category', '', '<br/>' ); ?>
			</p>
		<?php endif; ?>
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

		<?php if ( has_term( 'tutorials', 'doc_category', get_the_ID() ) ) : ?>
		<div class="using-code">
			<h3>Using code examples</h3>
			<p>Copy and paste the code example into your child theme's functions.php or place inside a custom plugin.</p>
		</div>
		<?php endif; ?>

		<?php do_action( 'affwp_single_right_column' ); ?>

	</div>
		
</section>

<?php
get_footer();