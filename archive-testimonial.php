<?php
/**
 * Testimonials
 */
get_header(); ?>

<?php themedd_post_header( array( 'title' => post_type_archive_title( '', false ), 'subtitle' => 'What our customers have to say' ) ); ?>

<?php if ( have_posts() ) : ?>
<section class="container-fluid highlight3 testimonials">
	<div class="wrapper wide">
		<div class="row around-sm mb-xs-2 mb-lg-4">
			<?php while ( have_posts() ) : the_post();
				$company = get_post_meta( get_the_ID(), '_affwp_testimonial_company', true );
			?>
			<div class="col-xs-12 col-sm-6 col-lg-4">
				<div class="testimonial">
					<blockquote><?php the_content(); ?></blockquote>
					<footer>

						<?php if ( has_post_thumbnail() ) : ?>
						<div class="avatar">
							<?php the_post_thumbnail( array( 64, 64 ) ); ?>
						</div>
						<?php endif; ?>

						<div class="info">
							<span class="name"><?php the_title(); ?></span>
							<span class="company"><?php echo $company; ?></span>
						</div>

					</footer>
				</div>
			</div>
			<?php endwhile; ?>
		</div>
	</div>
</section>
<?php endif; ?>

<section class="container-fluid tweets highlight pv-xs-4">
	<div class="wrapper center-xs aligncenter">
		<?php echo affwp_theme_tweet_slider(); ?>
	</div>
</section>

<?php get_footer(); ?>
