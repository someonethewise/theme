<?php
/**
 * Integrations page
 */
get_header(); ?>


<header class="page-header highlight mb-xs-2 mb-lg-4<?php echo themedd_page_header_classes(); ?>">
	<h1 class="page-title">
		<span class="entry-title-primary"><?php post_type_archive_title(); ?></span>
		<!-- <span class="subtitle">AffiliateWP integrates seamlessly with your favorite eCommerce system, Membership platform, or Forms plugin.</span> -->
		<span class="subtitle">AffiliateWP integrates seamlessly with popular eCommerce, Membership, Form, and Invoice WordPress plugins.</span>
	</h1>
</header>

<?php if ( have_posts() ) : ?>
<section class="container-fluid">
    <div class="wrapper container-fluid">
		<div class="grid row mb-xs-4 has-overlay">
			<?php while ( have_posts() ) : the_post();
			global $post;
			?>

			<div <?php post_class( array( 'col-xs-12', 'col-sm-6', 'col-md-4', 'grid-item', $post->post_name ) ); ?>>

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

					<?php /*
					<div class="grid-item-content">
						<h3 class="grid-item-title"><?php the_title(); ?></h3>
					</div>
					*/ ?>

				</div>
			</div>

			<?php endwhile; ?>
		</div>
    </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
