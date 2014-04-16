<?php
/**
 * Template Name: Changelog
 *
 */

get_header(); ?>

<div id="primary" class="content-area">
	<div class="wrapper">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
				// Page thumbnail and title.
				affwp_post_thumbnail();

				affwp_the_title();
			?>

			<div class="entry-content">
				<?php
					$changelog = get_post_meta( affwp_get_affiliatewp_id(), '_edd_sl_changelog', true );
					echo wpautop( $changelog, true );
				?>
			</div>
		</article>
	</div>
</div>
<?php
get_footer();
