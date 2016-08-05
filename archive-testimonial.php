<?php
/**
 * Testimonials
 */
get_header(); ?>

<section class="mb-xs-4">
    <header class="page-header <?php echo themedd_page_header_classes(); ?>">
    	<h1 class="page-title">
    		<span class="entry-title-primary"><?php post_type_archive_title(); ?></span>
    		<?php /*<span class="subtitle"><a href="<?php echo site_url( 'pricing' ); ?>">Join these happy customers</a></span> */ ?>
    	</h1>
    </header>
</section>


<?php if ( have_posts() ) : ?>
<section class="container-fluid faqs faqs-new">
    <div class="wrapper">
        <div class="row around-sm mb-xs-2 mb-lg-4">
            <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-xs-12 col-sm-6 ph-xs-0">
                <div class="faq">
                    <blockquote><?php the_content(); ?></blockquote>
                    <footer><?php the_title(); ?></footer>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<section class="container-fluid tweets highlight pv-xs-4">
	<div class="wrapper center-xs">
		<?php echo affwp_tweet_slider(); ?>
	</div>
</section>

<?php /*
<section class="container-fluid">
	<div class="row center-xs">
	    <div class="col-xs-12 col-sm-8">

	        <a href="<?php echo site_url( 'pricing' ); ?>" class="scroll button large">Join these happy customers</a>
	    </div>
	</div>
</section>
*/ ?>

<?php affwp_themedd_cta(); ?>

<?php get_footer(); ?>
