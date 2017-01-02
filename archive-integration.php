<?php
/**
 * Integrations page
 */
get_header(); ?>

<?php themedd_post_header( array( 'title' => 'One-click integration with your favorite WordPress plugins', 'subtitle' => 'AffiliateWP integrates beautifully with popular eCommerce, membership, form, and invoice plugins for WordPress.' ) ); ?>

<?php if ( have_posts() ) : ?>
<section class="container-fluid highlight pv-xs-2 pv-sm-3 pv-lg-4">

	<div class="wrapper wide integration-filter aligncenter">
		<a class="button small" href="#" data-filter="all">All</a>
		<a class="button small" href="#" data-filter=".type-ecommerce">eCommerce</a>
		<a class="button small" href="#" data-filter=".type-form">Form</a>
		<a class="button small" href="#" data-filter=".type-invoice">Invoice</a>
		<a class="button small" href="#" data-filter=".type-lms">LMS</a>
		<a class="button small" href="#" data-filter=".type-membership">Membership</a>
	</div>

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

<?php get_footer(); ?>
