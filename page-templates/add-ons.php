<?php
/**
 * Template Name: Add-ons
 */

get_header(); ?>

<header class="page-header mb-xs-0 mb-sm-2<?php echo themedd_page_header_classes(); ?>">
	<h1 class="page-title">
		<span class="entry-title-primary">Make AffiliateWP more powerful with add-ons</span>
		<span class="subtitle">Extend AffiliateWP’s functionality with official and 3rd-party add-ons</span>
	</h1>

	<?php /*
	<svg width="48" viewBox="0 0 32 32" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve">

			<g transform="matrix(1.26984,0,0,1.26984,0.825397,5.84127)" class="icon">
				<g>
					<path d="M23.5,8C23.5,9 22.7,10.5 21.5,10.5C20.3,10.5 20.2,9.5 19,9.5C18.1,9.5 18.8,12.8 19.2,14.5C19.3,15 18.9,15.5 18.4,15.5L14,15.5C13.6,15.5 13.4,15 13.7,14.7C14.1,14.3 14.5,13.7 14.5,13C14.5,12 13.6,11.5 12,11.5C10.4,11.5 9.5,12 9.5,13C9.5,13.7 9.9,14.3 10.3,14.7C10.6,15 10.4,15.5 10,15.5L5.5,15.5C5,15.5 4.6,15 4.7,14.5C5.1,12.8 5.8,9.5 4.9,9.5C3.7,9.5 3.6,10.5 2.4,10.5C1.2,10.5 0.4,9 0.4,8C0.4,7 1.2,5.5 2.4,5.5C3.6,5.5 3.7,6.5 4.9,6.5C5.8,6.5 5.1,3.2 4.7,1.5C4.6,1 5,0.5 5.5,0.5L10,0.5C10.4,0.5 10.6,1 10.3,1.3C9.9,1.7 9.5,2.3 9.5,3C9.5,4 10.4,4.5 12,4.5C13.6,4.5 14.5,4 14.5,3C14.5,2.3 14.1,1.7 13.7,1.3C13.4,1 13.6,0.5 14,0.5L18.5,0.5C19,0.5 19.4,1 19.3,1.5C18.9,3.2 18.2,6.5 19.1,6.5C20.3,6.5 20.4,5.5 21.6,5.5C22.7,5.5 23.5,7 23.5,8Z" />
				</g>
			</g>

	</svg>
*/ ?>
</header>


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
<section class="container-fluid highlight add-ons">

		<div class="grid row">
			<?php foreach( $pages as $page ) : $count++; ?>

			<div class="col-xs-12 col-sm-6 col-md-4 grid-item <?php echo 'box-' . $count; ?>">

				<div class="grid-item-inner">

					<?php if ( themedd_post_thumbnail() ) : ?>
					<div class="grid-item-image">
						<?php themedd_post_thumbnail(); ?>
					</div>
					<?php endif; ?>

					<div class="grid-item-content">
                        <h2>
                            <a href="<?php echo get_the_permalink( $page->ID ); ?>">
                                <?php echo get_the_title( $page->ID ); ?>
                            </a>
                        </h2>

                        <p><?php echo $page->post_excerpt; ?></p>
					</div>

                    <footer>
                        <a href="<?php echo get_the_permalink( $page->ID ); ?>">View add-ons &rarr;</a>
                    </footer>
				</div>
			</div>

			<?php endforeach; ?>
		</div>

</section>
<?php endif; ?>

<?php get_footer();
