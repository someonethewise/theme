<?php
/**
 * Integrations page
 */
get_header(); ?>

<?php themedd_post_header( array( 'title' => post_type_archive_title( '', false ), 'subtitle' => 'AffiliateWP integrates seamlessly with popular eCommerce, Membership, Form, and Invoice WordPress plugins.' ) ); ?>

<?php if ( have_posts() ) : ?>
<section class="container-fluid highlight pv-xs-2 pv-sm-3 pv-lg-4">
    <div class="wrapper wide container-fluid">
		<div class="grid row has-overlay">
			<?php while ( have_posts() ) : the_post();
			global $post;
			?>

			<div <?php post_class( array( 'col-xs-12', 'col-sm-6', 'col-md-4', 'grid-item', 'mb-xs-2', 'mb-sm-0', $post->post_name ) ); ?>>

				<div class="grid-item-inner">

					<?php if ( themedd_post_thumbnail() ) : ?>
					<div class="grid-item-image">
						<?php themedd_post_thumbnail(); ?>
					</div>
					<?php endif; ?>

					<div class="overlay">
						<a href="<?php the_permalink();?>">
							<?php if ( the_excerpt() ) : ?>
							<p><?php echo the_excerpt(); ?></p>
							<?php endif; ?>

							<footer><span>Learn more</span></footer>
						</a>
					</div>

				</div>
			</div>

			<?php endwhile; ?>
		</div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
