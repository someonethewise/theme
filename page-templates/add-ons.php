<?php
/**
 * Template Name: Add-ons
 */

get_header(); ?>

<?php themedd_post_header( array( 'title' => 'Make AffiliateWP more powerful with add-ons', 'subtitle' => 'Extend AffiliateWP’s functionality with official and 3rd-party add-ons' ) ); ?>

<?php

$pro_add_on_page = get_page_by_title( 'Pro add-ons' );
$pro_add_on_page = $pro_add_on_page ? $pro_add_on_page->ID : '';

$official_free_add_on_page = get_page_by_title( 'Official free add-ons' );
$official_free_add_on_page = $official_free_add_on_page ? $official_free_add_on_page->ID : '';

$third_party_add_on_page = get_page_by_title( '3rd-party add-ons' );
$third_party_add_on_page = $third_party_add_on_page ? $third_party_add_on_page->ID : '';

$args = array(
    'include' => array( $pro_add_on_page, $official_free_add_on_page, $third_party_add_on_page ),
    'sort_column' => 'menu_order',
);

$pages = get_pages( $args );

$count = 0;

if ( $pages ) : ?>

<section class="container-fluid highlight add-ons pv-xs-4">
	<div class="container-fluid wrapper">
		<div class="row">
			<?php foreach ( $pages as $page ) : ?>
				<div class="col-xs-12 col-sm-6 col-md-4 grid-item">
					<div class="grid-item-inner">
						<?php if ( themedd_post_thumbnail() ) : ?>
						<div class="grid-item-image">
							<?php themedd_post_thumbnail(); ?>
						</div>
						<?php endif; ?>

						<div>
							<h3>
								<a href="<?php echo get_the_permalink( $page->ID ); ?>">
									<?php echo get_the_title( $page->ID ); ?>
								</a>
							</h3>

							<p><?php echo $page->post_excerpt; ?></p>
						</div>

						<footer>
	                        <a href="<?php echo get_the_permalink( $page->ID ); ?>">View add-ons</a>
	                    </footer>

					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>

<?php endif; ?>

<?php get_footer();
