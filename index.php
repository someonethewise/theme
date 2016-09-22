<?php
/**
 * Index
 */
get_header(); ?>

<?php themedd_post_header( array( 'title' => 'Seen our latest articles?', 'subtitle' => 'Check them out below!' ) ); ?>

<?php if ( have_posts() ) : ?>
<section class="container-fluid highlight pv-xs-2 pv-sm-3 pv-lg-1">
    <div class="wrapper mb-xs-2 mb-lg-4">
		<div class="grid row">
			<?php while ( have_posts() ) : the_post();
			global $post;
			?>

			<div <?php post_class( array( 'col-xs-12', 'col-sm-6', 'col-md-4', 'grid-item', 'mb-xs-2', 'mb-sm-0', $post->post_name ) ); ?>>

				<div class="grid-item-inner">

					<?php
						$class = '';

						if ( class_exists( 'MultiPostThumbnails' ) && MultiPostThumbnails::get_the_post_thumbnail( get_post_type(), 'feature-icon', get_the_ID() ) ) {
							$image = MultiPostThumbnails::get_the_post_thumbnail( get_post_type(), 'feature-icon', get_the_ID() );
							$class = ' has-featured-icon';
						} elseif ( has_post_thumbnail() ) {
							$image = get_the_post_thumbnail( get_the_ID(), 'affwp-post-thumbnail', array( 'alt' => get_the_title() ) );
						} else {
							$image = '';
						}

					if ( $image ) : ?>

					<div class="grid-item-image<?php echo $class; ?>">
						<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
							<?php echo $image; ?>
						</a>
					</div>
					<?php endif; ?>

					<?php
						if ( in_array( get_post_type(), array( 'post', 'attachment' ) ) ) {
							themedd_entry_date();
						}
					?>

					<h3 class="grid-item-title"><a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a></h3>

					<div class="grid-item-content">
						<?php if ( the_excerpt() ) : ?>
						<p><?php echo the_excerpt(); ?></p>
						<?php endif; ?>
					</div>

					<footer>
						<a href="<?php the_permalink(); ?>">Read more</a>
					</footer>

				</div>
			</div>

			<?php endwhile; ?>

		</div>

		<?php themedd_paging_nav(); ?>

    </div>

</section>
<?php endif; ?>

<?php get_footer(); ?>
