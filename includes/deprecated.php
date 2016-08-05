<?php

/**
 * Filter specific titles
 *
 * @since 1.0.0
 */
function affwp_the_title( $title, $id = null ) {

	if ( is_page( 'pricing' ) && $id === get_the_ID() && in_the_loop() ) {
		$title = '<span class="entry-title-primary">30 Day Money Back Guarantee</span><span class="subtitle mb-sm-6">We stand behind our product 100% ' . affwp_show_refund_policy_link() . '</span>';
	}

    return $title;
}
//add_filter( 'the_title', 'affwp_the_title', 10, 2 );

/**
 * Append cart onto primary navigation
 *
 * @since 1.0
*/
function affwp_wp_nav_menu_items( $items, $args ) {

    if ( 'primary' == $args->theme_location ) {

    	$home = ! is_front_page() ? affwp_nav_home() : '';
    //	$items .= affwp_nav_account();
    //	$items .= affwp_nav_buy_now();
    }

	return $home . $items;

}
//add_filter( 'wp_nav_menu_items', 'affwp_wp_nav_menu_items', 10, 2 );

/**
 * Append account to main navigation
 * @return [type] [description]
 */
function affwp_nav_account2() {

	$account_link_text 	= 'Login';
	$account_page 		= '/account';
	$affiliates_page 	= '/affiliates';
	$active 			= is_page( 'account' ) || is_page( 'affiliates' ) ? ' current-menu-item' : '';


	ob_start();
	?>

		<li class="menu-item has-sub-menu menu-item-has-children account<?php echo $active; ?>">
			<a title="<?php echo $account_link_text; ?>" href="<?php echo site_url( $account_page ); ?>"><?php echo affwp_icon_account(); ?><?php echo $account_link_text; ?></a>
			<ul class="sub-menu">
				<?php if (  is_user_logged_in() ) : ?>
					<li>
						<a title="<?php echo $account_link_text; ?>" href="<?php echo site_url( $account_page ); ?>"><?php echo $account_link_text; ?></a>
					</li>
				<?php endif; ?>
				<li>
					<a title="<?php _e( 'Affiliates', 'affwp' ); ?>" href="<?php echo site_url( $account_page . $affiliates_page ); ?>"><?php _e( 'Affiliates', 'affwp' ); ?></a>
				</li>
				<?php if( ! is_user_logged_in() ) : ?>
					<li>
						<a title="<?php _e( 'Log in', 'affwp' ); ?>" href="<?php echo site_url( $account_page ); ?>"><?php _e( 'Log in', 'affwp' ); ?></a>
					</li>
				<?php else: ?>

					<li>
						<a title="<?php _e( 'Log out', 'affwp' ); ?>" href="<?php echo wp_logout_url( add_query_arg( 'logout', 'success', site_url( $account_page ) ) ); ?>"><?php _e( 'Log out', 'affwp' ); ?></a>
					</li>
				<?php endif; ?>


			</ul>
		</li>

	<?php $content = ob_get_contents();
    ob_end_clean();

    return $content;

    ?>

<?php }
/**
 * Prepend home link to main navigation
 * @return [type] [description]
 */
function affwp_nav_home() {
	 ob_start();
	?>

	<li class="menu-item home">
		<a title="Home" href="/"><?php echo affwp_icon_home(); ?>Home</a>
	</li>

	<?php $content = ob_get_contents();
    ob_end_clean();

    return $content;

    ?>

<?php }

/**
 * Append buy now link to main navigation
 * @return [type] [description]
 */
function affwp_nav_buy_now() {
	 ob_start();

	$cart_items = edd_get_cart_contents();

	if ( $cart_items ) : ?>
		<li class="action checkout menu-item">
			<a class="button" title="Checkout" href="/checkout">Checkout</a>
		</li>
	<?php else : ?>
		<li class="action purchase menu-item">
			<a class="button" title="Buy" href="/pricing">Buy</a>
		</li>
	<?php endif; ?>

	<?php $content = ob_get_contents();
    ob_end_clean();

    return $content;

    ?>

<?php }


/**
 * Validation message
 */
function affwp_theme_gforms_change_validation_message( $message, $form ) {
	return "<div class='validation_error'><p>Oops! want to try entering your email again?</p></div>";
}
//add_filter( 'gform_validation_message_1', 'affwp_theme_gforms_change_validation_message', 10, 2 );


 // filter the Gravity Forms button type

 function affwp_theme_gforms_pre_submit_button( $button, $form ) {
 	return '<p class="note">You will receive an email confirmation that your submission was received.</p>' . $button;
 }
 //add_filter( 'gform_submit_button_2', 'affwp_theme_gforms_pre_submit_button', 10, 2 );

 /**
  * Filter specific titles
  */
 function affwp_theme_the_title( $title, $id = null ) {

 	// about
 	// if ( is_page( 'about' ) && $id == get_the_ID() ) {
 	// 	$title = __( 'About Pippin Williamson', 'rcp' );
 	// }

 	if ( is_page( 'pricing' ) && $id == get_the_ID() ) {
 		$title = '<span class="entry-title-primary">30 Day Money Back Guarantee</span><span class="entry-subtitle">We stand behind our product 100% ' . rcp_show_refund_policy_link() . '</span>';
 	}

     return $title;
 }
 //add_filter( 'the_title', 'affwp_theme_the_title', 10, 2 );

 /**
  *
  */
 function affwp_testimonials_chartist_js() {

 	// if ( ! ( is_post_type_archive( 'testimonial' ) ) ) {
 	// 	return;
 	// }

 	?>

 	<script>

 	// var chart = new Chartist.Line('.ct-chart', {
 	// 	labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
 	// 	series: [
 	// 		[300, 380, 300, 400, 530, 740, 800, 1000, 1400, 2100],
 	// 	]
 	// }, {
 	// 	fullWidth: true,
 	// 	showPoint: true,
 	// 	showArea: true,
 	// 	fullWidth: true,
 	// 	showLabel: false,
 	// 	axisX: {
 	// 		showGrid: false,
 	// 		showLabel: false,
 	// 		offset: 0
 	// 	},
 	// 	axisY: {
 	// 		showGrid: false,
 	// 		showLabel: false,
 	// 		offset: 0
 	// 	},
 	// 	chartPadding: 0,
 	// 	high: 2500,
 	// 	low: 0
 	// });

 	var chart = new Chartist.Line('.ct-chart', {
 		labels: [1, 2, 3, 4, 5, 6, 7, 8],
 		series: [
 			[-100, -100, 200, 400, 700, 1500, 2000, 3000],
 		]
 	}, {
 		fullWidth: true,
 		showPoint: true,
 		showArea: true,
 //		showArea: false,
 		fullWidth: true,
 		showLabel: false,
 		axisX: {
 			showGrid: false,
 			showLabel: false,
 			offset: 0
 		},
 		axisY: {
 			showGrid: false,
 			showLabel: false,
 			offset: 0
 		},
 		chartPadding: 0,
 		high: 2500,
 		low: 0
 	});

 chart.on('draw', function(data) {

 // jQuery( "#cta .button" ).hover(
 // 	function() {
 // 		jQuery('body').addClass('cta');
 // 	}, function() {
 // 		jQuery('body').removeClass('cta');
 // 	}
 // );
 //
 // jQuery(".ct-series-b .circle-blip").hover(function() {
 // 	jQuery(this).addClass("animated");
 // });
 //
 // jQuery('.circle-blip').bind('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function(e) {
 // 	jQuery(this).removeClass("animated");
 // });
 //
 if (data.type === 'point') {

 	var circle = new Chartist.Svg('circle', {
 		cx: [data.x],
 		cy: [data.y],
 		r: [8],
 	}, 'ct-circle');

 	if ( data.group._node === '<g class="ct-series ct-series-b">' ) {
 		console.log( 'yes' );
 	}

 	var smashingImgTag = '<div class="blip-wrap"><span class="circle-blip"></span></div>';

 	var smashingFoob = data.element.parent().foreignObject(smashingImgTag, {
 		width: 80,
 		height: 80,
 		x: data.x - 40,
 		y: data.y - 40
 	});

 	data.element.replace(circle);

 }

 });

 </script>

 <?php
 }
 //add_action( 'wp_footer', 'affwp_testimonials_chartist_js', 100 );

 function affwp_theme_modify_sidebar( $classes ) {

 	if ( is_page_template( 'page-templates/add-on-listing.php' ) ) {
 		$classes[] = 'col-xs-12';
 	}

 	return $classes;
 }
 //add_filter( 'themedd_primary_classes', 'affwp_theme_modify_sidebar' );

 // $page = get_page_by_title( 'Add-ons' );
 //
 // if ( isset( $post ) && ( $page->ID === $post->post_parent ) ) {
 // 	$classes[] = 'add-on-listing';
 // }


 function affwp_feature_icon() {
 	?>

 	<?php echo get_the_ID(); ?>

 	<?php
 }
 //add_action( 'affwp_feature_icon', 'affwp_feature_icon' );

 /**
  * Loads the new Featured Icon metabox
  * Requires the Multi Post Thumbnails plugin
  */
 function affwp_admin_load_mpt() {

     if ( class_exists( 'MultiPostThumbnails' ) ) {
         new MultiPostThumbnails(
             array(
                 'label'     => 'Featured Icon',
                 'id'        => 'feature-icon',
                 'post_type' => 'page'
             )
         );
     }

 }
 add_action( 'wp_loaded', 'affwp_admin_load_mpt' );

 function affwp_register_init_scripts( $form ) {

 	$spinner_url = apply_filters( "gform_ajax_spinner_url_1", apply_filters( 'gform_ajax_spinner_url', GFCommon::get_base_url() . '/images/spinner.gif', $form ), $form );

 	$args = array(
 		'formId'      => 1,
 		'spinnerUrl'  => $spinner_url,
 		'refreshTime' => 0
 	);

 	$script = 'window.gwrf_' . 1 . ' = new gwrf( ' . json_encode( $args ) . ' );';
 	$slug   = sprintf( 'gpreloadform_%d', 1 );

 	GFFormDisplay::add_init_script( 1, $slug, GFFormDisplay::ON_PAGE_RENDER, $script );

 	return $form;
 }
 //add_filter( 'gform_pre_render_1', 'affwp_register_init_scripts', 1, 2 ); // use pre render so we can init our functions first


 /**
  *
  */
 function custom_confirmation( $confirmation, $form, $entry, $ajax ) {


 	ob_start();

 	// var_dump( $confirmation );
 	// var_dump( $form );
 	 var_dump( $entry );
 //	var_dump( $ajax );
 	//wp_die();

 	$license               = $entry['3'];
 	$average_product_price = $entry['1'];
 	$affiliate_commission  = $entry['2'];

 	$referral_sales_needed = $license / ( $average_product_price - ( ( $average_product_price * $affiliate_commission ) / 100 ) );
 	?>

 	<h1><?php echo round( $referral_sales_needed ); ?>!</h1>
 	<p>Good news!, you'll only need <strong><?php echo round( $referral_sales_needed ); ?> referral sales</strong> to cover the cost of your AffiliateWP license.</p>
 	<p><a href="#" class="gws-reload-form">Calculate again?</a></p>

 	<a href="#">Send this to myself</a>

 		<form id="" class="affwp-form" action="" method="post">
 			<p>
 				<input id="affwp-send-price-calculation" name="affwp_send_price_calculation" type="email" />
 			</p>
 			<p>
 				<input type="hidden" name="affwp_calculation" value="5" />
 				<input type="hidden" name="affwp_action" value="affwp_send_email" />
 				<input class="button" type="submit" value="<?php esc_attr_e( 'Send', 'affiliate-wp' ); ?>" />
 			</p>
 		</form>

 	<?php

 	return ob_get_clean();
 }
 //add_filter( 'gform_confirmation', 'custom_confirmation', 10, 4 );
