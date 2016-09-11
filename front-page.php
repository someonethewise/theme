<?php
/**
 * Front page
 */
get_header(); ?>

<?php
/**
 * Latest news
 */
?>
<section class="container-fluid news section-grey">
    <div class="wrapper">
		<div class="row pv-xs-2">
			<div class="col-xs-12 aligncenter">
				<h3 class="label mb-xs-1 mb-sm-0">New</h3>
				<p>We've just released Direct Link Tracking, a new pro add-on. <a href="<?php echo site_url( '/direct-link-tracking-released/' ); ?>">Check it out &rarr;</a></p>
			</div>
		</div>
	</div>
</section>

<?php
/**
 * 3 features
 */
?>
<section class="container-fluid pv-xs-2 pv-lg-4">
    <div class="wrapper">

        <div class="row center-xs mb-xs-4 aligncenter">
            <div class="col-xs-12 col-sm-4">

                <img class="mb-xs-1" width="96" height="96" src="<?php echo get_stylesheet_directory_uri() . '/images/svgs/higher-visibility-2.svg'; ?>" />

                <h2>Higher visibility</h2>
                <p class="mb-lg-0">Affiliates constantly promote your products and services, drastically improving your website’s SEO.</p>

            </div>

            <div class="col-xs-12 col-sm-4">

                <img class="mb-xs-1" width="96" height="96" src="<?php echo get_stylesheet_directory_uri() . '/images/svgs/more-traffic-2.svg'; ?>" />
                <h2>More traffic</h2>
                <p class="mb-lg-0">Higher visibility means more people will visit your website, and see your products and services.</p>

            </div>

            <div class="col-xs-12 col-sm-4">

            <img class="mb-xs-1" width="96" height="96" src="<?php echo get_stylesheet_directory_uri() . '/images/svgs/increased-sales-2.svg'; ?>" />
                <h2>Increased sales</h2>
                <p class="mb-lg-0">More traffic to your website means an increased likelihood of converting them into real customers.</p>

            </div>

        </div>

        <div class="row aligncenter center-xs">
            <div class="col-xs-12 col-sm-10">
                <a href="#how-it-works" class="popup-content" id="" data-effect="mfp-move-from-bottom">Learn how affiliate marketing works</a>

            </div>
        </div>

    </div>
</section>

<?php
/**
 * Slider
 */
?>
<section class="mb-xs-4 feature-highlights highlight">

    <div class="feature-highlights-slider">

        <?php
        /**
         * Referrals
         */
        ?>
        <div>
            <div class="row center-xs aligncenter">
                <div class="col-xs col-lg-7">
                    <h1>Sophisticated affiliate tracking for WordPress</h1>
                </div>
            </div>

            <div class="row center-xs aligncenter mb-xs-5">
                <div class="col-xs col-lg-8">
                    <p>Finally, an affiliate marketing solution that feels like WordPress. AffiliateWP provides advanced affiliate and referral tracking, integrated seamlessly with your WordPress site.</p>
                </div>
            </div>

            <div class="image aligncenter">
                <div class="drag-me center-xs middle-xs">Drag</div>
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />
            </div>

        </div>

        <?php
        /**
         * Managing Affiliates
         */
        ?>
        <div>
            <div class="row center-xs aligncenter">
                <div class="col-xs col-lg-7">
                    <h1>Easily manage your team of affiliates</h1>
                </div>
            </div>

            <div class="row center-xs aligncenter mb-xs-5">
                <div class="col-xs col-lg-7">
                    <p>Effortless affiliate management. View top-earning affiliates, edit affiliate accounts, set per-affiliate referral rates and more.</p>
                </div>
            </div>

            <div class="image aligncenter">
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />
            </div>
        </div>

		<?php
        /**
         * Integrations
         */
        ?>
        <div>
            <div class="row center-xs aligncenter">
                <div class="col-xs col-lg-9">
                    <h1>Set up your new affiliate system in just minutes</h1>
                </div>
            </div>

            <div class="row center-xs aligncenter mb-xs-5">
                <div class="col-xs col-lg-7">
                    <p>Get up and running in minutes. AffiliateWP integrates with your favorite WordPress eCommerce, form and membership plugins with one click.</p>
                </div>
            </div>

            <div class="image aligncenter">
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />
            </div>
        </div>

        <?php
        /**
         * Affiliate Dashboard
         */
        ?>
        <div>
            <div class="row center-xs aligncenter">
                <div class="col-xs col-lg-7">
                    <h1>A place for your affiliates to call home</h1>
                </div>
            </div>

            <div class="row center-xs aligncenter mb-xs-5">
                <div class="col-xs col-lg-7">
                    <p>An affiliate dashboard that blends seamlessly with your WordPress theme. Affiliates can view earnings, see their performance statistics, and access creatives.</p>
                </div>
            </div>

            <div class="image aligncenter">
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />
            </div>
        </div>

        <?php
        /**
         * Realtime Reporting
         */
        ?>
        <div>
            <div class="row center-xs aligncenter">
                <div class="col-xs col-lg-7">
                    <h1>View real-time reports and graphs</h1>
                </div>
            </div>

            <div class="row center-xs aligncenter mb-xs-5">
                <div class="col-xs col-lg-7">
                    <p>Get an overview of your affiliates’ performance in real-time with detailed referral data and graphs.</p>
                </div>
            </div>

            <div class="image aligncenter">
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />
            </div>
        </div>

    </div>

</section>


<script type="text/javascript">

( function( $ ) {

    $( document ).ready( function() {

        var drag = $(".drag-me");

        drag.on('click', function() {
            $(this).addClass('hide');
			$(".slick-cloned .drag-me").addClass('hide');
        });

        // remove drag element when slider is dragged
        $('.feature-highlights-slider').on('afterChange', function(event, slick, direction) {
            drag.addClass('hide');
			$(".slick-cloned .drag-me").addClass('hide');
        });

        jQuery(".feature-highlights-slider").slick({
            dots: true,
            infinite: true,
            arrows: false,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            cssEase: 'cubic-bezier(.31,1.12,.53,1.16)',
            customPaging : function(slider, i) {
                return '';
            },
        });



    });

} )( jQuery );

</script>

<?php
/**
 * Screenshots
 */

	$page = get_page_by_title( 'Screenshots' );

	$args = array(
		'post_mime_type' => 'image',
		'numberposts'    => 3,
		'post_parent'    => $page->ID,
		'post_type'      => 'attachment',
		'orderby'        => 'rand'
	);

	$gallery = get_children( $args );

?>

<?php if ( $gallery ) : ?>
<section class="container-fluid pv-xs-2 pv-lg-4 screenshots aligncenter">
	<div class="wrapper">
		<a href="<?php echo site_url( 'screenshots'); ?>" class="button large outline secondary">See all <?php echo affwp_theme_screenshot_count(); ?> screenshots</a>
    </div>
</section>
<?php endif; ?>

<?php
/**
 * Features
 */
?>
<section class="container-fluid pv-xs-2 pv-lg-4 features">
	<div class="wrapper">

		<div class="row mb-xs-2 center-xs aligncenter">
			<div class="col-xs">
				<h1 class="page-title">
					<span class="entry-title-primary">Packed full of features</span>
					<span class="subtitle">Yes, these features are all included!</span>
				</h1>
			</div>
		</div>

		<?php affwp_theme_features_html(); ?>
	</div>
</section>

<?php
/**
 * Integrations
 */

$args = array(
    'post_type'      => 'integration',
    'posts_per_page' => -1,
    'orderby'        => 'menu_order',
    'order'          => 'ASC',
);

$integrations = new WP_Query( $args );

if ( $integrations->have_posts() ) : ?>

<?php
/**
 * Integrations
 */
 ?>
<section class="container-fluid action pv-xs-4 pv-sm-8 integrations">
    <div class="wrapper wide">

		<div class="row">
            <div class="col-xs center-xs aligncenter mb-xs-2 mb-sm-4">
				<h1 class="page-title">
					<span class="entry-title-primary">Beautifully integrated with your favorite WordPress plugins</span>
					<span class="subtitle">AffiliateWP integrates seamlessly with <?php echo $integrations->found_posts; ?> popular eCommerce, membership, form, and invoice WordPress plugins.</span>
				</h1>
            </div>
        </div>

		<?php if ( $integrations->have_posts() ) : $count = 0; ?>
        <div class="row grid hidden-integrations row mb-xs-2 mb-sm-4 has-overlay">

            <?php while ( $integrations->have_posts() ) : $integrations->the_post();
			global $post;
			$count++;
			$hidden_class = $count > 6 ? 'integration-hidden' : '';
			?>

                <div <?php post_class( array( 'grid-item', 'col-xs-12 col-md-6 col-lg-4 mb-xs-2 mb-sm-0', $post->post_name, 'integration-' . $count, $hidden_class ) ); ?>>
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

    							<footer>
    								<span>Learn more</span>
    							</footer>
    						</a>
    					</div>

    				</div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
		<?php endif; ?>

        <div class="aligncenter" id="show-integrations">
            <a href="#" class="button outline white large">See all <?php echo $integrations->found_posts; ?> supported integrations</a>
        </div>

    </div>
</section>


<?php endif; ?>

<script>
    jQuery(document).ready(function($) {

        $('#show-integrations a').on( 'click', function(e) {
            e.preventDefault();
			$(".grid-item.integration-hidden").removeClass('integration-hidden');
            $(this).remove();
        });
    });
</script>

<section class="container-fluid highlight used-by middle-xs center-xs aligncenter">
    <div class="wrapper full-width">
        <h4>Some of the awesome companies that use AffiliateWP</h4>

        <div class="slider-wrap">

            <div class="used-by-slider">

    			<div class="pv-xs-2">

    				<img src="<?php echo get_stylesheet_directory_uri() . '/images/used-by/woothemes.svg'; ?>" alt="" />
    				<img src="<?php echo get_stylesheet_directory_uri() . '/images/used-by/yoast.svg'; ?>" alt="" />
    				<img src="<?php echo get_stylesheet_directory_uri() . '/images/used-by/rainmaker-platform.png'; ?>" alt="" />
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/used-by/easy-digital-downloads.svg'; ?>" alt="" />
                </div>

    			<div class="pv-xs-2">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/used-by/wpsessions.png'; ?>" alt="" />
    				<img src="<?php echo get_stylesheet_directory_uri() . '/images/used-by/searchwp.png'; ?>" alt="" />
    				<img src="<?php echo get_stylesheet_directory_uri() . '/images/used-by/fooplugins.png'; ?>" alt="" />
    				<img src="<?php echo get_stylesheet_directory_uri() . '/images/used-by/facetwp.png'; ?>" alt="" />
                </div>

            </div>

    		<ul class="slick-used-by-nav">
    			<li class="slick-prev">

                    <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                        <g>
                            <g id="XMLID_2_">
                                <path d="M9.5,0.5L0.5,9.5L9.5,18.5" />
                            </g>
                            <g id="XMLID_1_">
                                <path d="M0.5,9.5L23.5,9.5" />
                            </g>
                        </g>
                    </svg>
                </li>
    			<li class="slick-next">
                    <svg width="24" height="100%" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:1.41421;">
                        <g>
                            <g id="XMLID_2_">
                                <path d="M14.5,0.5L23.5,9.5L14.5,18.5" />
                            </g>
                            <g id="XMLID_1_">
                                <path d="M23.5,9.5L0.5,9.5" />
                            </g>
                        </g>
                    </svg>

                </li>
    		</ul>
        </div>
    </div>
</section>

<script type="text/javascript">

  jQuery(document).on('ready', function() {

    jQuery(".used-by-slider").slick({
        dots: false,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
		prevArrow: jQuery('.slick-used-by-nav .slick-prev'),
        nextArrow: jQuery('.slick-used-by-nav .slick-next'),
    });

  });

</script>


<?php
/**
 * Pricing table
 */
?>

<section id="section-pricing" class="container-fluid pv-xs-4 pv-lg-8">

	<div class="wrapper wide">

        <h1 class="page-title aligncenter mb-xs-4 mb-sm-8">
            <span class="entry-title-primary">Start making more money, risk-free.</span>
            <span class="subtitle">Purchase in confidence with our 30 Day Money Back Guarantee <?php echo affwp_show_refund_policy_link(); ?></span>
        </h1>

		<?php if ( function_exists( 'affwp_theme_pricing_table' ) ) { affwp_theme_pricing_table(); } ?>
	</div>
</section>

<?php affwp_theme_pricing_calculator(); ?>


<?php
/**
 * Twitter testimonials
 */
?>
<?php if ( affwp_theme_get_tweets() ) : ?>
<section class="tweets container-fluid highlight pv-xs-2 pv-lg-8">
    <div class="wrapper center-xs aligncenter">
		<?php echo affwp_theme_tweet_slider(); ?>

		<div class="row center-xs aligncenter">
            <div class="col-xs-12">
                <a href="<?php echo site_url( 'testimonials' ); ?>" id="view-testimonials" class="button outline secondary">View testimonials</a>
            </div>
        </div>

    </div>
</section>


<?php endif; ?>

<?php get_footer(); ?>
