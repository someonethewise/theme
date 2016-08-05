<?php
/**
 * Front page
 */
get_header(); ?>

<?php /*
<section class="container-fluid pv-xs-2 pv-lg-4">
    <div class="wrapper">
        <div class="row center-xs">
            <div class="col-xs-12 col-sm-8">
                <h2>One of these graphs is not like the other.</h2>
                <p>Look familiar? This will write about the pains and struggles of the status quo. You hustle every day, give it your all, but all you see it ups and downs. The question is how you you make more money? The answer is Affiliate Marketing. The solution is AffiliateWP.</p>

            </div>

        </div>



    </div>
</section>
*/ ?>

<?php
/**
 * 3 features
 */
?>





<section class="container-fluid news section-grey">
    <div class="wrapper">
		<div class="row center-xs pv-xs-2">
			<div class="col-xs-12">
				<h3 class="label mb-xs-1 mb-sm-0">New</h3>
				<p>We've just released Direct Link Tracking, a new pro add-on. <a href="#">Check it out &rarr;</a></p>
			</div>
		</div>
	</div>
</section>


<section class="container-fluid pv-xs-2 pv-lg-8">
    <div class="wrapper">
        <!-- <h1 class="aligncenter mb-xs-4">What affiliate marketing can do for you</h1> -->
        <!-- <h1 class="aligncenter mb-xs-4">Rank higher. Boost traffic. Earn more.</h1> -->
        <div class="row center-xs mb-xs-4">
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

        <div class="row center-xs">
            <div class="col-xs-12 col-sm-10">
                <a href="#" id="how-it-works">Learn how affiliate marketing works</a>
                <img style="display:none;" src="<?php echo get_stylesheet_directory_uri() . '/images/how-it-works.svg'; ?>" alt="How affiliate marketing works" />
            </div>
        </div>

    </div>
</section>


<section class="mb-xs-4 feature-highlights highlight">

        <div class="feature-highlights-slider">


            <?php
            /**
             * Referrals
             */
            ?>
            <div>
                <div class="row center-xs">
                    <div class="col-xs col-lg-6">
                        <h1>An affiliate marketing solution that feels like part of WordPress</h1>
                    </div>
                </div>

                <div class="row center-xs mb-lg-5">
                    <div class="col-xs col-lg-7">
                        <!-- <p>Every time an affiliate successfully refers a customer, who then purchases from your site, a referral is created in AffiliateWP. See a detailed overview of how much your affiliates earn for each successful referral.</p> -->
                        <!-- <p>Every time an affiliate makes you another sale, a referral is created in AffiliateWP. See a detailed overview of how much your affiliates earn for each successful referral.</p> -->
                        <!-- <p>Every time an affiliate refers a customer who successfully purchases from your site, a referral is instantly created in AffiliateWP. See a detailed overview of how much your affiliates earn for each successful referral.</p> -->
                        <!-- <p>Every time an affiliate helps to make you another sale,  successfully refers a customer, who then purchases from your site, a referral is created in AffiliateWP. A referral will help...</p> -->
                        <!-- <p>Every time a customer visits your site via an affiliate's referral link, and completes their purchase, a referral is instantly created for the referring affiliate. AffiliateWP provides a detailed overview of how much your affiliates have earned for each successful referral.</p> -->
                        <!-- <p>Every time a customer visits your site via an affiliate's referral link and completes their purchase, a referral is instantly created for the referring affiliate. AffiliateWP provides a detailed overview of how much your affiliates have earned for each successful referral.</p> -->
                        <p>Every time a customer is referred to your site by an affiliate, and completes their purchase, a referral is instantly created for the referring affiliate. AffiliateWP provides a detailed overview of how much your affiliates have earned for each successful referral.</p>
                    </div>
                </div>

                <div class="image">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />
                </div>
            </div>

            <?php
            /**
             * Managing Affiliates
             */
            ?>
            <div>
                <div class="row center-xs">
                    <div class="col-xs col-lg-6">
                        <h1>AffiliateWP makes it easy to manage your affiliates</h1>
                    </div>
                </div>

                <div class="row center-xs mb-lg-5">
                    <div class="col-xs col-lg-7">
                        <p>Manage all of your affiliates effortlessly. See your top earning affiliates, view an affiliate's reports and moderate affiliate registrations. You can also edit individual affiliate accounts to set per-affiliate referral rates, see their registration date and more.</p>
                    </div>
                </div>

                <div class="image">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />
                </div>
            </div>

            <?php
            /**
             * Affiliate Dashboard
             */
            ?>
            <div>
                <div class="row center-xs">
                    <div class="col-xs col-lg-6">
                        <h1>A place for your affiliates to call home</h1>
                    </div>
                </div>

                <div class="row center-xs mb-lg-5">
                    <div class="col-xs col-lg-7">
                        <p>The Affiliate Area is a place for affiliates to log in and see how well they are performing, check their earnings, update their settings, retrieve their referral URL, find creatives to promote your site, and more! AffiliateWP blends seamlessly with the currently installed WordPress theme; your affiliates will feel right at home.</p>
                    </div>
                </div>

                <div class="image">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />
                </div>
            </div>

            <?php
            /**
             * Realtime Reporting
             */
            ?>
            <div>
                <div class="row center-xs">
                    <div class="col-xs col-lg-6">
                        <h1>Real Time Reporting</h1>
                    </div>
                </div>

                <div class="row center-xs mb-lg-5">
                    <div class="col-xs col-lg-7">
                        <p>View graphs of referrals over time, easily seeing your site's affiliate marketing performance.</p>
                    </div>
                </div>

                <div class="image">
                    <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />
                </div>
            </div>

        </div>


       <ul class="slick-nav">
           <li class="slick-prev"><img src="<?php echo get_stylesheet_directory_uri() . '/images/svgs/arrow-left.svg'; ?>" /></li>
           <li class="slick-next"><img src="<?php echo get_stylesheet_directory_uri() . '/images/svgs/arrow-right.svg'; ?>" /></li>
       </ul>

</section>


<script type="text/javascript">

jQuery('.feature-highlights-slider').on('setPosition', function () {

    jQuery(this).find('.slick-slide').height('auto');

    var slickTrack = jQuery(this).find('.slick-track');
    var slickTrackHeight = jQuery(slickTrack).height();

    jQuery(this).find('.slick-slide').css('height', slickTrackHeight + 'px');

});

jQuery(document).on('ready', function() {

    jQuery(".feature-highlights-slider").slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        slidesToScroll: 1,
        cssEase: 'cubic-bezier(.31,1.12,.53,1.16)',
        customPaging : function(slider, i) {
            return '';
        },
        prevArrow: jQuery('.feature-highlights .slick-prev'),
        nextArrow: jQuery('.feature-highlights .slick-next')
    });

    // $(".slider").slick({
    //
    //     autoplay: true,
    //     dots: true,
    //     customPaging : function(slider, i) {
    //         var thumb = $(slider.$slides[i]).data('thumb');
    //         return '<a><img src="'+thumb+'"></a>';
    //     },
    //
    //     responsive: [{
    //         breakpoint: 500,
    //         settings: {
    //             dots: false,
    //             arrows: false,
    //             infinite: false,
    //             slidesToShow: 2,
    //             slidesToScroll: 2
    //         }
    //     }]
    // });

});

</script>

<section class="container-fluid pv-xs-2 pv-lg-2 screenshots">
    <div class="wrapper">
        <div class="row center-xs">
            <div class="col-xs">
                <a href="<?php echo site_url('screenshots'); ?>" class="button outline secondary">View 67 Screenshots of AffiliateWP</a>
            </div>
        </div>
    </div>
</section>


<?php
/**
 * Features
 */
?>
<section class="container-fluid pv-xs-2 pv-lg-8 features">
    <div class="wrapper">
        <div class="row mb-xs-2 center-xs">
            <div class="col-xs">
                <h1>Everything you need, nothing you don't</h1>
                <p></p>
            </div>
        </div>

        <div class="row start-xs">

            <div class="col-xs-12 col-sm-6 col-lg-3 mb-lg-2">

                <svg width="48px" height="48px">
					<use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-easy-setup'; ?>"></use>
				</svg>

                <h5>Easy setup</h5>
				<p>Your affiliate program will be up and running in minutes. Simply install and activate and you’re ready to go!</p>

            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3 mb-lg-2">

                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-accurate-affiliate-tracking'; ?>"></use>
                </svg>

                <!-- <h5>Reliable Affiliate Tracking</h5> -->
                <h5>Accurate affiliate tracking</h5>
				<p>AffiliateWP tracks affiliate referrals reliably, even on servers with aggressive caching.</p>

            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-integration'; ?>"></use>
                </svg>
                <h5>Complete integration</h5>
                <p>AffiliateWP integrates fully with popular WordPress eCommerce and membership plugins.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-reporting'; ?>"></use>
                </svg>
                <h5>Real-time Reporting</h5>
				<p>Track affiliate-referred visits, referrals, earnings and affiliate registrations in real time, without delay.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3 mb-lg-2">
                <svg width="48px" height="48px">
					<use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-unlimited-affiliates'; ?>"></use>
				</svg>
                <h5>Unlimited affiliates</h5>
				<p>Have an unlimited number of affiliates actively promoting your website, products, and services.</p>

            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-creatives'; ?>"></use>
                </svg>
                <h5>Unlimited creatives</h5>
				<p>Give your affiliates unlimited visual resources or text links for faster, more effective promotion of your site.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3 mb-lg-2">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-coupon-tracking'; ?>"></use>
                </svg>
                <h5>Coupon Tracking</h5>
				<p>Connect coupon codes to specific affiliate accounts with <a target="_blank" href="http://docs.affiliatewp.com/article/59-affiliate-coupon-tracking">affiliate coupon tracking</a>.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-affiliate-management'; ?>"></use>
                </svg>
                <h5>Easy Affiliate Management</h5>
				<p>See your top earning affiliates, view affiliate reports, edit individual affiliate accounts, and moderate affiliate registrations.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-automatic-affiliate-creation'; ?>"></use>
                </svg>
                <h5>Automatic affiliate creation</h5>
                <p>Enable automatic affiliate account creation for all users who register a new WordPress user account on your site.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3 mb-lg-2">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-affiliate-approval'; ?>"></use>
                </svg>
                <h5>Manual affiliate approval</h5>
                <p>Affiliate registrations can be moderated by admins, automatically accepted, or accounts can be manually created.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-affiliate-area'; ?>"></use>
                </svg>
                <h5>Affiliate Area</h5>
				<p>A dashboard for your affiliates to track their performance, view earnings, retrieve their referral URL, find creatives, and more!</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-referral-link-generator'; ?>"></use>
                </svg>
                <h5>Referral link generator</h5>
				<p>Affiliates can generate their own referral links from the Affiliate Area with the built-in referral link generator.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-referral-rate-types'; ?>"></use>
                </svg>
                <h5>Referral rate types</h5>
				<p>Choose between flat rate and percentage referral rate types on a global, per-affiliate, and per-product basis.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-custom-emails'; ?>"></use>
                </svg>
                <h5>Customizable emails</h5>
                <p>Emails for admin notifications, pending affiliate applications, affiliate application approval and rejection, and new referral notifications.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-export'; ?>"></use>
                </svg>
                <h5>Export data to CSV</h5>
                <p>Export affiliate data and referral data to a CSV file for forecasting, bookkeeping, and accounting purposes.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3 mb-lg-2">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-translated'; ?>"></use>
                </svg>
                <h5>Fully Internationalized</h5>
				<p>AffiliateWP is ready to be translated into your language. As always, translations are welcome!</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-wordpress'; ?>"></use>
                </svg>
                <h5>Made for WordPress</h5>
                <p>AffiliateWP looks and feels like WordPress; seamlessly integrated. It lives on your website (not someone else’s) so you have full control.</p>
            </div>




            <div class="col-xs-12 col-sm-6 col-lg-3 mb-lg-2">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-documentation'; ?>"></use>
                </svg>
                <h5>Extensive documentation</h5>
				<p>We have all the documentation you need to help you get up and running quickly.</p>
            </div>

            <div class="col-xs-12 col-sm-6 col-lg-3 mb-lg-2">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-support'; ?>"></use>
                </svg>
                <h5>World-class support</h5>
				<p>If you require assistance, our support is considered the best in the industry. We’re here to help!</p>

            </div>





            <div class="col-xs-12 col-sm-6 col-lg-3">
                <svg width="48px" height="48px">
                    <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-feature-developer-friendly'; ?>"></use>
                </svg>
                <h5>Developer-friendly</h5>
                <p>AffiliateWP is extremely extensible with plenty of hooks and templates to add custom features and functionality.</p>
            </div>

            <!-- shortcodes, Credit last referrer, pretty affiliate URLs, Easy affiliate registration
            per-affiliate referral rates, -->
        </div>



    </div>
</section>

<?php
/**
 * Integrations
 */

$args = array(
    'post_type'      => 'integration',
    'posts_per_page' => -1,
    'order_by'       => 'menu_order',
    'order'          => 'ASC'
);

$integrations = new WP_Query( $args );

if ( $integrations->have_posts() ) : ?>


<?php /*
<section class="container-fluid highlight pv-xs-2 pv-lg-8 integrations">
    <div class="wrapper full-width">
        <div class="row">
            <div class="col-xs center-xs mb-xs-4">
                <h1 class="mb-xs-0">Complete Integration</h1>
                <p>AffiliateWP integrates seamlessly with popular eCommerce, Membership, Form, and Invoice WordPress plugins.</p>
                <a href="<?php echo site_url( 'integrations' ); ?>" class="">See all supported integrations &rarr;</a>
            </div>
        </div>

        <div class="integration-slider has-overlay">

            <?php while ( $integrations->have_posts() ) : $integrations->the_post();
			global $post;
			?>

                <div <?php post_class( array( 'grid-item', 'col-xs-12 col-sm-6 col-md-4', $post->post_name ) ); ?>>
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
            <?php endwhile; ?>
        </div>



    </div>
</section>
*/ ?>

<?php /*
<section class="container-fluid highlight pv-xs-2 pv-lg-8 integrations">
    <div class="wrapper">
        <div class="row">
            <div class="col-xs center-xs mb-xs-4">
                <h1 class="mb-xs-0">Complete Integration</h1>
                <p>AffiliateWP integrates seamlessly with popular eCommerce, Membership, Form, and Invoice WordPress plugins.</p>
                <a href="<?php echo site_url( 'integrations' ); ?>" class="">See all supported integrations &rarr;</a>
            </div>
        </div>

        <div class="row grid row mb-xs-4 has-overlay">

            <?php while ( $integrations->have_posts() ) : $integrations->the_post();
			global $post;
			?>

                <div <?php post_class( array( 'grid-item', 'col-xs-12 col-sm-6 col-md-4', $post->post_name ) ); ?>>
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
            <?php endwhile; ?>
        </div>

    </div>
</section>
*/ ?>

<?php
/**
 * Integrations
 */
 ?>
<section class="container-fluid highlight pv-xs-2 pv-lg-8 integrations">
    <div class="wrapper">
        <div class="row">
            <div class="col-xs center-xs mb-xs-4">
                <h1 class="mb-xs-0">Beautifully integrated with your eCommerce, Membership or Form plugin</h1>
                <p>AffiliateWP integrates seamlessly with popular eCommerce, Membership, Form, and Invoice WordPress plugins.</p>
            </div>
        </div>

        <div class="row grid hidden-integrations row mb-xs-4 has-overlay">

            <?php while ( $integrations->have_posts() ) : $integrations->the_post();
			global $post;
			?>

                <div <?php post_class( array( 'grid-item', 'col-xs-12 col-sm-6 col-md-4', $post->post_name ) ); ?>>
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
            <?php endwhile; ?>
        </div>

        <?php /*
        <div class="row">
            <div class="col-xs center-xs">
                <a id="show-integrations" href="#" class="button">See all supported integrations &darr;</a>
            </div>
        </div>
        */ ?>

        <div class="aligncenter" id="show-integrations">
            <a href="#" class="button outline secondary">See all <?php echo $integrations->found_posts; ?> supported integrations</a>
        </div>

    </div>
</section>

<?php endif; ?>

<script>
    jQuery(document).ready(function($) {

        $('#show-integrations a').on( 'click', function(e) {
            e.preventDefault();

            $('.hidden-integrations').addClass('reveal');
             console.log( 'clicked' );

            $(this).remove();
        });


    });
</script>

<script type="text/javascript">

// jQuery('.integration-slider').on('setPosition', function () {
//
//     jQuery(this).find('.slick-slide').height('auto');
//
//     var slickTrack = jQuery(this).find('.slick-track');
//     var slickTrackHeight = jQuery(slickTrack).height();
//
//     jQuery(this).find('.slick-slide').css('height', slickTrackHeight + 'px');
//
// });
//
//   jQuery(document).on('ready', function() {
//
//     jQuery(".integration-slider").slick({
//         dots: false,
//         infinite: true,
//         speed: 500,
//         slidesToShow: 3,
//         slidesToScroll: 1,
//         cssEase: 'cubic-bezier(.31,1.12,.53,1.16)',
//   //       centerMode: true,
//   // centerPadding: '0px',
//
//         // centerMode: true,
//         //  centerPadding: '60px',
//         responsive: [
//         //   {
//         //     breakpoint: 1024,
//         //     settings: {
//         //       slidesToShow: 1, // 1
//         //       slidesToScroll: 1,
//         //     }
//         //   },
//           {
//             breakpoint: 1200,
//             settings: {
//               slidesToShow: 2, // 2 slides below 1024
//               slidesToScroll: 1
//             }
//           },
//           {
//             breakpoint: 880,
//             settings: {
//               slidesToShow: 1, // 1 slide below 480px
//               slidesToScroll: 1
//             }
//           }
//           // You can unslick at a given breakpoint now by adding:
//           // settings: "unslick"
//           // instead of a settings object
//         ]
//     });
//
//   });

</script>


<section class="container-fluid add-ons pv-xs-8">

            <div class="row center-xs">
                <div class="col-xs col-lg-6">
                    <h1>The most extensible affiliate marketing solution available</h1>
                </div>
            </div>

            <div class="row center-xs mb-lg-5">
                <div class="col-xs col-lg-7">
                    <p>Add-ons are available for AffiliateWP to help you run your affiliate marketing program even more efficiently. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-lg-6 highlight-alt2">

                    <div class="row center-xs">
                        <div class="col-xs col-lg-10">
                            <h2>Pro add-ons</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                        </div>
                    </div>

                </div>
                <div class="col-xs-12 col-lg-6">

                    <div class="row center-xs">
                        <div class="col-xs col-lg-10">
                            <h2>Free add-ons</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>

                        </div>
                    </div>

                </div>
            </div>

</section>

<section class="container-fluid highlight-alt used-by middle-xs center-xs">
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



<?php /*
<section class="container-fluid mb-xs-4" id="plus-more">
    <div class="wrapper wide">

        <h3 class="title-rule"><span>Plus More</span></h3>

        <div class="row center-xs">

            <div class="col-xs-12 col-md-4 col-lg-4 ">
                <h4>World-class support</h4>
                <p>We're here to answer any Post Promoter Pro related questions you have with friendly, email-based support.</p>

            </div>

            <div class="col-xs-12 col-md-4 col-lg-4">
                <h4>Developer Friendly</h4>
                <p>This extensible plugin is built from the ground up, using WordPress actions and filters that allow you to adapt it for your specific needs.</p>
            </div>

            <div class="col-xs-12 col-md-4 col-lg-4">
                <h4>World-class support</h4>
                <p>We're here to answer any Post Promoter Pro related questions you have with friendly, email-based support.</p>
            </div>

        </div>
    </div>
</section>
*/ ?>









































<?php /*
<section class="container-fluid pv-xs-2 pv-lg-4">
    <div class="wrapper">
        <h1>Introducing AffiliateWP</h1>
    </div>
</section>
*/ ?>

<?php /*
<section class="container-fluid pv-xs-2 pv-lg-4 ph-lg-4">
    <div class="wrapper wide">

        <div class="row middle-xs">

            <div class="col-xs-12 col-md-8">
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-1.png'; ?>" />
            </div>

            <div class="col-xs-12 col-md-4">
                <!-- <h2>Easily share to Twitter, Facebook and LinkedIn</h2> -->
                <img class="icon" src="<?php echo get_stylesheet_directory_uri() . '/svgs/time-2.svg'; ?>" />
                <h2>Complete Integration</h2>

                <p class="mb-xs-0">AffiliateWP has complete integration with all major WordPress ecommerce and membership plugins.</p>
            </div>

        </div>


    </div>
</section>
*/ ?>

<?php /*
<section class="container-fluid pv-xs-2 ph-lg-4">
    <div class="wrapper wide">

        <div class="row pv-xs-2 pv-sm-4 middle-xs">

            <div class="col-xs-12 col-sm-8">
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />
            </div>

            <div class="col-xs-12 col-sm-4 first-xs">
                <img class="icon" src="<?php echo get_stylesheet_directory_uri() . '/svgs/calendar.svg'; ?>" />
                <h2>Manage Your Affiliates</h2>
                <p>See your top earning affiliates, view affiliate reports, and even moderate affiliate registrations.</p>
            </div>

        </div>


    </div>
</section>

<section class="container-fluid pv-xs-2 pv-lg-4 ph-lg-4">
    <div class="wrapper wide">

        <div class="row middle-xs">

            <div class="col-xs-12 col-md-8">
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-3.png'; ?>" />
            </div>

            <div class="col-xs-12 col-md-4">
                <img class="icon" src="<?php echo get_stylesheet_directory_uri() . '/svgs/time-2.svg'; ?>" />
                <h2>Affiliate Dashboard</h2>

                <p class="mb-xs-0">Affiliates can easily see how much they have earned, how much is awaiting payment, and even how their referral URLs have done over time.</p>
            </div>

        </div>


    </div>
</section>

<section class="container-fluid pv-xs-2 ph-lg-4">
    <div class="wrapper wide">

        <div class="row pv-xs-2 pv-sm-4 middle-xs">

            <div class="col-xs-12 col-sm-8">
                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-4.png'; ?>" />
            </div>

            <div class="col-xs-12 col-sm-4 first-xs">
                <img class="icon" src="<?php echo get_stylesheet_directory_uri() . '/svgs/calendar.svg'; ?>" />
                <h2>Real Time Reporting</h2>
                <p>View graphs of referrals over time, easily seeing your site's affiliate marketing performance.</p>
            </div>

        </div>


    </div>
</section>




<section class="container-fluid mb-xs-4" id="plus-more">
    <div class="wrapper wide">

        <h3 class="title-rule"><span>Plus More</span></h3>

        <div class="row center-xs">

            <div class="col-xs-12 col-md-4 col-lg-4 ">
                <h4>World-class support</h4>
                <p>We're here to answer any Post Promoter Pro related questions you have with friendly, email-based support.</p>

            </div>

            <div class="col-xs-12 col-md-4 col-lg-4">
                <h4>Developer Friendly</h4>
                <p>This extensible plugin is built from the ground up, using WordPress actions and filters that allow you to adapt it for your specific needs.</p>
            </div>

            <div class="col-xs-12 col-md-4 col-lg-4">
                <h4>World-class support</h4>
                <p>We're here to answer any Post Promoter Pro related questions you have with friendly, email-based support.</p>
            </div>

        </div>
    </div>
</section>
*/ ?>

<?php
/**
 * Flickity
 */
?>
<?php /*
<section class="mb-xs-4 pv-xs-4 screenshots">

        <div class="js-flickity" data-flickity-options='{ "autoPlay": false, "wrapAround": true, "prevNextButtons": true, "selectedAttraction": 0.2, "friction": 0.8 }'>


            <div class="gallery-cell ph-xs-2 slide-1">

                <div class="wrapper">

                    <div class="row pv-xs-2 pv-sm-4">
                        <div class="col-xs-12 col-sm-8">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-1.png'; ?>" />
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h2>Complete Integration</h2>
                            <p>AffiliateWP has complete integration with all major WordPress ecommerce and membership plugins.</p>
                            <p><a class="next" href="#">See the supported integrations</a></p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="gallery-cell ph-xs-2 ph-sm-8 center-xs slide-2">

                <div class="wrapper slim">
                    <h2>Manage Your Affiliates</h2>
                    <p>See your top earning affiliates, view affiliate reports, and even moderate affiliate registrations.</p>

                    <p><a class="next" href="#">Learn how to manage your affiliates</a></p>
                </div>

                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />

            </div>



            <div class="gallery-cell ph-xs-2 slide-3">

                <div class="wrapper">

                    <div class="row pv-xs-2 pv-sm-4">
                        <div class="col-xs-12 col-sm-8">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-3.png'; ?>" />
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h2>Affiliate Dashboard</h2>

                            <p>Affiliates can easily see how much they have earned, how much is awaiting payment, and even how their referral URLs have done over time.</p>
                            <p><a class="next" href="#">Explore the Affiliate Area</a></p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="gallery-cell ph-xs-2 slide-3">

                <div class="wrapper">

                    <div class="row pv-xs-2 pv-sm-4">
                        <div class="col-xs-12 col-sm-8">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-4.png'; ?>" />
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h2>Real Time Reporting</h2>
                            <p>View graphs of referrals over time, easily seeing your site's affiliate marketing performance.</p>
                        </div>
                    </div>
                </div>

            </div>



        </div>



</section>
*/ ?>
<?php /*
<section class="mb-xs-4 pv-xs-4 screenshots">

        <div class="js-flickity" data-flickity-options='{ "autoPlay": true, "wrapAround": true, "prevNextButtons": true, "selectedAttraction": 0.2, "friction": 0.8 }'>


            <div class="gallery-cell ph-xs-2 slide-1">

                <div class="wrapper">

                    <div class="row pv-xs-2 pv-sm-4">
                        <div class="col-xs-12 col-sm-8">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-1.png'; ?>" />
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h2>Complete Integration</h2>
                            <p>AffiliateWP has complete integration with all major WordPress ecommerce and membership plugins.</p>
                            <p><a class="next" href="#">See the supported integrations</a></p>
                        </div>
                    </div>
                </div>

            </div>


            <div class="gallery-cell ph-xs-2 ph-sm-8 center-xs slide-2">

                <div class="wrapper slim">
                    <h2>Manage Your Affiliates</h2>
                    <p>See your top earning affiliates, view affiliate reports, and even moderate affiliate registrations.</p>

                    <p><a class="next" href="#">Learn how to manage your affiliates</a></p>
                </div>

                <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-2.png'; ?>" />

            </div>



            <div class="gallery-cell ph-xs-2 slide-3">

                <div class="wrapper">

                    <div class="row pv-xs-2 pv-sm-4">
                        <div class="col-xs-12 col-sm-8">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-3.png'; ?>" />
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h2>Affiliate Dashboard</h2>

                            <p>Affiliates can easily see how much they have earned, how much is awaiting payment, and even how their referral URLs have done over time.</p>
                            <p><a class="next" href="#">Explore the Affiliate Area</a></p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="gallery-cell ph-xs-2 slide-3">

                <div class="wrapper">

                    <div class="row pv-xs-2 pv-sm-4">
                        <div class="col-xs-12 col-sm-8">
                            <img src="<?php echo get_stylesheet_directory_uri() . '/images/home-4.png'; ?>" />
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <h2>Real Time Reporting</h2>
                            <p>View graphs of referrals over time, easily seeing your site's affiliate marketing performance.</p>
                        </div>
                    </div>
                </div>

            </div>



        </div>



</section>
*/ ?>


<?php /*
<section class="container-fluid pv-xs-2 pv-lg-4 detail">
    <div class="wrapper wide">
        <div class="blip"></div>
        <img src="<?php echo get_stylesheet_directory_uri() . '/images/meta-box.png'; ?>" />


    </div>
</section>
*/ ?>

<?php /*
<section class="container-fluid pv-xs-2 pv-md-4 benefits">
    <div class="wrapper wide">

        <div class="row center-xs">

            <div class="col-xs-12 col-md-4 col-lg-4 ">
                <img src="<?php echo get_stylesheet_directory_uri() . '/svgs/sharing.svg'; ?>" />
                <h2>Get more followers</h2>
                <p>Since your content will be view and shared by many more people, you'll receive more followers on social media as a result.</p>

            </div>



            <div class="col-xs-12 col-md-4 col-lg-4">

                    <img src="<?php echo get_stylesheet_directory_uri() . '/svgs/time-2.svg'; ?>" />


                <h2>Time is precious. Have some back.</h2>
                <p>Post Promoter Pro gives you more time to focus on what matters most; writing great content. Post your content and let Post Promoter Pro handle the rest. Something about easy scheduling</p>
            </div>

            <div class="col-xs-12 col-md-4 col-lg-4">


                    <!-- <img src="<?php echo get_stylesheet_directory_uri() . '/svgs/business-graph-bar-increase.svg'; ?>" /> -->



                    <img src="<?php echo get_stylesheet_directory_uri() . '/svgs/money-stack.svg'; ?>" />




                <h2>Make more money</h2>
                <p>Your site will see an influx of site traffic, leading to more sales, since more people are seeing your content.</p>
            </div>

        </div>
    </div>
</section>
*/ ?>
<?php /*
<section class="container-fluid pv-xs-2 pv-md-4 features">
    <div class="wrapper wide">

        <div class="row center-xs">

            <div class="col-xs-12 col-md-4 col-lg-4">
                <img src="<?php echo get_stylesheet_directory_uri() . '/svgs/sharing.svg'; ?>" />
                <h2>Scheduling Made Easy</h2>
                <p>Write and promote content at the same time from your WordPress admin. Get rid of your multiple apps - all you need is right here!</p>
            </div>

            <div class="col-xs-12 col-md-4 col-lg-4 ">
                <img src="<?php echo get_stylesheet_directory_uri() . '/svgs/sharing.svg'; ?>" />
                <h2>Developer Friendly</h2>
                <p>Write and promote content at the same time from your WordPress admin. Get rid of your multiple apps - all you need is right here!</p>
            </div>

            <div class="col-xs-12 col-md-4 col-lg-4 ">
                <img src="<?php echo get_stylesheet_directory_uri() . '/svgs/sharing.svg'; ?>" />
                <h2>Top notch support</h2>
                <p>Write and promote content at the same time from your WordPress admin. Get rid of your multiple apps - all you need is right here!</p>
            </div>


        </div>
    </div>
</section>
*/ ?>

<?php //echo affwp_tweet_slider(); ?>



<?php
/**
 * Pricing table
 */
?>

<?php /*
<header id="header-pricing" class="page-header<?php echo themedd_page_header_classes(); ?>">
	<h1 class="page-title"><span class="entry-title-primary">30 Day Money Back Guarantee</span><span class="subtitle mb-sm-6">We stand behind our product 100% <?php echo affwp_show_refund_policy_link(); ?></span></h1>
</header>
*/ ?>

<section id="section-pricing" class="container-fluid pv-xs-4 pv-lg-8">

	<div class="wrapper wide">

        <h1 class="page-title aligncenter mb-xs-4 mb-sm-8">
            <!-- <span class="entry-title-primary">Start earning more, risk-free, with our 30 Day Money Back Guarantee</span> -->
            <span class="entry-title-primary">Start making more money, risk-free.</span>
            <span class="subtitle">Purchase in confidence with our 30 Day Money Back Guarantee <?php echo affwp_show_refund_policy_link(); ?></span>
        </h1>

		<?php if ( function_exists( 'affwp_pricing_table' ) ) { affwp_pricing_table(); } ?>
	</div>
</section>

<?php affwp_theme_pricing_calculator(); ?>


<?php
/**
 * Twitter testimonials
 */
?>
<section class="tweets container-fluid highlight pv-xs-2 pv-lg-8">
    <div class="wrapper center-xs">
		<?php echo affwp_tweet_slider(); ?>
        <a href="<?php echo site_url( 'testimonials' ); ?>" id="view-testimonials">View more testimonials</a>
    </div>
</section>

<?php /*
<section class="container-fluid highlight action pv-xs-4">
    <div class="wrapper">

        <div class="row center-xs">
            <div class="col-xs-12 col-sm-8">

				<h2>Start making more money</h2>
                <p>We’ve made it incredibly easy for you to get affiliates, manage your affiliates, and have these affiliates make more sales for you. Let us show you.</p>
				<a href="<?php echo site_url( 'pricing' ); ?>" class="button">Let's get started</a>
                <div id="graph" class="ct-chart"></div>

            </div>
        </div>
    </div>
</section>
*/ ?>
<?php get_footer(); ?>
