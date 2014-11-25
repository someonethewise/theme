<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php affwp_page_header(); ?>

<section class="section columns-3 columns main">
	<div class="item left bdr">
		<?php echo get_avatar( get_the_author_meta('email'), '80' ); ?>
		<p>
		<span>Written by <?php the_author(); ?></span>
		<?php if ( 'post' == get_post_type() ) : ?>
			<?php printf( '<time datetime="%1$s">%2$s</time>',
				esc_attr( get_the_date( 'c' ) ),
				esc_html( get_the_date() )
			); ?>
		<?php endif; ?>
		</p>

		<?php if ( in_array( 'category', get_object_taxonomies( get_post_type() ) ) && affwp_categorized_blog() ) : ?>
			<p><span>Categories</span>
			<?php echo get_the_category_list( _x( ', ', 'Used between list items, there is a space after the comma.', 'affwp' ) ); ?>
			</p>
		<?php endif; ?>

		<?php the_tags( '<p><span>Tags</span> ', ', ', '</p>' ); ?>
		<p>
			<span>Comments</span>
			
			<?php comments_popup_link( __( 'Leave a comment', 'affwp' ), __( '1', 'affwp' ), __( '%', 'affwp' ) ); ?>
			
		</p>

	</div>


	<div class="primary item content-area">
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
				//	affwp_single_post_nav();
					?>

					<?php
					// If comments are open or we have at least one comment, load up the comment template.
					// if ( comments_open() || get_comments_number() ) {
					// 	comments_template();
					// }
				endwhile;
			?>
	</div>

	<div class="item right bdr">


		<?php /*
		<a title="Blog" class="back" href="<?php echo site_url( 'blog' ); ?>">Back to blog</a>
		*/ ?>
		

		<?php if ( has_category( 'pro-add-ons', get_the_ID() ) ) : ?>
		<div class="note">
			<h3>Note</h3>
			<p>This add-on is only available for ultimate or professional license holders.</p><p>If you don’t have one of these licenses, you can upgrade with just a couple of clicks from your <a href="<?php echo site_url( 'account' ); ?>">account</a> page.</p>
		</div>
		<?php endif; ?>

		<?php do_action( 'affwp_single_right_column' ); ?>
	</div>
		
</section>

<?php do_action( 'affwp_single_content_after' ); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php if ( comments_open() || get_comments_number() ) {
		comments_template();
	} ?>

<?php endwhile; ?>

<?php
get_footer();