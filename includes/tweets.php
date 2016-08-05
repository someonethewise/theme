<?php
/**
 * Tweets
 */

function affwp_tweet_slider() {

    $args = array(
        'id'         => '458773013576417280', // collection ID
        'count'      => 16, // number of tweets to show
        'expiration' => 60*60*24*7 // how long the transient should be stored for
    );

    // make the request
    $request = show_tweets()->request_tweets( $args );

    //var_dump( $request );

    $tweets = function_exists( 'show_tweets' ) ? show_tweets()->get_tweets() : '';

    if ( $tweets ) : ?>
            <h3>What people are saying on <a href="https://twitter.com/affwp/timelines/458773013576417280" target="_blank">Twitter</a></h3>
            <div class="row center-xs">
                <div class="col-xs tweet-slider-wrap">

                    <ul class="slider tweet-slider">

                        <?php foreach ( $tweets as $tweet ) :

                            $text        = $tweet->text;
                            $tweet_id    = $tweet->id;
                            $user_id     = $tweet->user->id;
                            $user_info   = affwp_tweet_get_user_info( $user_id );
                            $name        = $user_info['name'];
                            $screen_name = $user_info['screen_name'];
                            $avatar      = $user_info['avatar'];

                        ?>
                            <li class="tweet">
                                <div class="avatar">
                                  <img alt="<?php echo $name; ?>" src="<?php echo $avatar; ?>">
                                </div>

                                <h3><?php echo $name; ?></h3>

                                <h4><a href="https://twitter.com/<?php echo $screen_name; ?>/status/<?php echo $tweet_id; ?>"><?php echo $screen_name; ?></a></h4>

                                <p><?php echo $text; ?></p>

                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <ul class="slick-nav">
                        <li class="slick-prev"><img src="<?php echo get_stylesheet_directory_uri() . '/images/svgs/arrow-left.svg'; ?>" /></li>
                        <li class="slick-next"><img src="<?php echo get_stylesheet_directory_uri() . '/images/svgs/arrow-right.svg'; ?>" /></li>
                    </ul>

                </div>
            </div>

    <script type="text/javascript">

    jQuery('.tweet-slider').on('setPosition', function () {

        jQuery(this).find('.slick-slide').height('auto');

        var slickTrack = jQuery(this).find('.slick-track');
        var slickTrackHeight = jQuery(slickTrack).height();

        jQuery(this).find('.slick-slide').css('height', slickTrackHeight + 'px');

    });

      jQuery(document).on('ready', function() {

        jQuery(".tweet-slider").slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 4,
            prevArrow: jQuery('.tweets .slick-prev'),
            nextArrow: jQuery('.tweets .slick-next'),
            // centerMode: true,
            //  centerPadding: '60px',
            responsive: [
            //   {
            //     breakpoint: 1024,
            //     settings: {
            //       slidesToShow: 1, // 1
            //       slidesToScroll: 1,
            //     }
            //   },
              {
                breakpoint: 1024,
                settings: {
                  slidesToShow: 2, // 2 slides below 1024
                  slidesToScroll: 2
                }
              },
              {
                breakpoint: 680,
                settings: {
                  slidesToShow: 1, // 1 slide below 480px
                  slidesToScroll: 1
                }
              }
              // You can unslick at a given breakpoint now by adding:
              // settings: "unslick"
              // instead of a settings object
            ]
        });

      });

    </script>

    <?php endif;

}

function affwp_tweet_get_user_info( $user_id = 0 ) {

    if ( ! $user_id ) {
        return;
    }

    $users = function_exists( 'show_tweets' ) ? show_tweets()->get_users() : '';
    $user_info = array();

    if ( $users ) {
        foreach ( $users as $id => $user ) {

            if ( $user_id === $user->id ) {
                $user_info['name'] = $user->name;
                $user_info['screen_name'] = $user->screen_name;
                $user_info['avatar'] = $user->profile_image_url;
            }

        }
    }

    return $user_info;

}
