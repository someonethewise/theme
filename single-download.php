<?php
/**
 * The Template for displaying all single addons
 */
get_header(); ?>
	
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		<h2>Allow your affiliates to easily share generated referral URLs, right from the affiliate dashboard</h2>
	</header>

<section class="section columns-3 columns">
	<div class="item left">
		<?php echo affwp_add_on_info( 'left' ); ?>	
	</div>
	
	<div class="item primary">
			<?php while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					
				<?php affwp_post_thumbnail(); ?>
					<div class="entry-content">
						<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'affwp' ) ); ?>
					</div>
				</article>

			<?php endwhile; ?>

	</div>

	<div class="item right">
		<a class="back" href="<?php echo site_url( 'addons' ); ?>">Back to add-ons</a>

		<?php echo affwp_add_on_info( 'right' ); ?>

		<?php do_action( 'affwp_single_download_right_column' ); ?>
	</div>
		
	</section>
<?php
get_sidebar();
get_footer();