<?php
/**
 * Integration type
 */

get_header(); ?>

<?php themedd_post_header( array( 'title' => single_cat_title( '', false ), 'subtitle' => term_description() ) ); ?>

<?php if ( have_posts() ) : ?>

<section class="container-fluid highlight pv-xs-2 pv-sm-3 pv-lg-1">

	<div class="wrapper wide mb-xs-2 mb-lg-4">
		<div class="integration-grid grid row has-overlay">
			<?php while ( have_posts() ) : the_post();
			global $post;
			?>

			<div data-order="<?php echo $post->menu_order;?>" <?php post_class( array( 'mix', 'col-xs-12', 'col-md-6', 'col-lg-4', 'grid-item', 'mb-xs-2', 'mb-sm-0', $post->post_name ) ); ?>>

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

	<?php echo affwp_theme_integration_notice(); ?>

</section>
<?php endif; ?>

 <?php
 get_footer();
