<?php
/**
 * The template used for displaying page content
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>



	<div class="entry-content">

		<?php do_action( 'themedd_entry_content_start' ); ?>

<div class="row">
    <div class="col-xs-12 col-lg-6">
        <?php the_content(); ?>
    </div>

    <div class="col-xs-12 col-lg-6">
        <?php themedd_post_thumbnail(); ?>
    </div>

</div>




		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'themedd' ),
				'after'  => '</div>',
			) );
		?>

		<?php do_action( 'themedd_entry_content_end' ); ?>

	</div>
</article>
