<?php
/**
 * Pricing
 */



/**
 * Show refund policy link
 *
 * @since 1.0.0
 */
function affwp_show_refund_policy_link() {

	ob_start();
	?>

	- <a href="#refund-policy" class="popup-content" data-effect="mfp-move-from-bottom">see our refund policy</a>

	<?php

	return ob_get_clean();
}


/**
 * The refund policy and pricing calculator content
 *
 * @since 1.0.0
 */
function affwp_theme_pricing_modal_content() {


	if ( ! ( is_page( 'pricing' ) || is_front_page() ) ) {
		return;
	}

	$refund_policy = get_page_by_title( 'purchase terms and refund policy' );

	if ( ! $refund_policy ) {
		return;
	}

	?>
	<div id="refund-policy" class="popup entry-content mfp-with-anim mfp-hide">
		<h1>
			<?php echo $refund_policy->post_title; ?>
		</h1>

		<?php echo stripslashes( wpautop( $refund_policy->post_content, true ) ); ?>
	</div>

	<div id="pricing-calculator" class="popup entry-content mfp-with-anim mfp-hide">
		<h1>AffiliateWP Pricing Calculator</h1>
		<p>Use the calculator below to work out how many referral sales you'll need to cover the cost of an AffiliateWP license.</p>

		<?php
			if ( function_exists( 'gravity_form' ) ) {
				gravity_form( 1, false, false, false, '', true );
			}
		?>

		<p>Good news!, you'll only need <strong><span class="rounded-referral-sale-count"></span> referral sales*</strong> to cover the cost of your AffiliateWP license.</p>

		<p>* Non-rounded number: <span class="referral-sale-count"></span></p>

		<a href="#">Would you like to email yourself the above?</a>

		<form class="affwp-form" action="" method="post">
			<p>
				<input id="affwp-send-price-calculation" name="affwp_send_price_calculation" type="email" />
			</p>
			<p>
				<input type="hidden" name="affwp_calculation" />
				<input type="hidden" name="affwp_action" value="affwp_send_email" />
				<input class="button" type="submit" value="<?php esc_attr_e( 'Send', 'affiliate-wp' ); ?>" />
			</p>
		</form>

	</div>

	<script>
		jQuery(document).ready(function($) {

			jQuery( "#input_1_9" ).change(function() {
				var referralSaleCount = jQuery(this).val();
				var roundedReferralSaleCount = Math.round(referralSaleCount);

				jQuery('.rounded-referral-sale-count').html(roundedReferralSaleCount);
				jQuery('.referral-sale-count').html(referralSaleCount);
				jQuery('input[name="affwp_calculation"]').html(roundedReferralSaleCount);
			});

			var referralSaleCount = jQuery("#input_1_9").val();
			var roundedReferralSaleCount = Math.round(referralSaleCount);

			jQuery('.rounded-referral-sale-count').html(roundedReferralSaleCount);
			jQuery('.referral-sale-count').html(referralSaleCount);
			jQuery('input[name="affwp_calculation"]').html(roundedReferralSaleCount);

			gform.addFilter( 'gform_calculation_formula', function( formula, formulaField, formId, calcObj ) {

				// modify the formula if flat rate is chosen
				if ( formId == '1' && jQuery('#input_1_4').val() === 'Flat dollar amount ($)' ) {

					// {Which license are you interested in?:3} / ( {Average price of your product/s:1} - ( ( {Average price of your product/s:1} * {How much commission will your affiliates earn:2} ) / 100 ) )
					formula = '{:3} / ( {:1} - {:2} )';
				}

				return formula;

			} );

		});
	</script>
	<?php
}
add_action( 'wp_footer', 'affwp_theme_pricing_modal_content' );

/**
 * Allows the customer to send themself an email with the result
 *
 * @since 1.0.0
 */
function affwp_theme_send_email() {

	if ( ! ( isset( $_POST['affwp_action'] ) && 'affwp_send_email' === $_POST['affwp_action'] ) ) {
		return;
	}

	$email = isset( $_POST['affwp_send_price_calculation'] ) ? $_POST['affwp_send_price_calculation'] : '';
	$message = isset( $_POST['affwp_calculation'] ) ? $_POST['affwp_calculation'] : '';

	wp_mail( $email, 'AffiliateWP price calculation', $message );

}
add_action( 'template_redirect', 'affwp_theme_send_email' );


/**
 * Pricing call to action
 *
 * @since 1.0.0
 */
function affwp_themedd_cta() {
	?>

	<section class="container-fluid highlight action pv-xs-4">
	    <div class="wrapper">

	        <div class="row center-xs">
	            <div class="col-xs-12 col-sm-8">

					<h2>Start making more money</h2>
	                <p>We’ve made it incredibly easy for you to get affiliates, manage your affiliates, and have these affiliates make more sales for you. Let us show you.</p>
					<a href="<?php echo site_url( 'pricing' ); ?>" class="button outline">Let's get started</a>
	                <div id="graph" class="ct-chart"></div>

	            </div>
	        </div>
	    </div>
	</section>

	<script>
	var chart = new Chartist.Line('.ct-chart', {
		labels: [1, 2, 3, 4, 5, 6, 7, 8],
		series: [
			[-100, -100, 200, 400, 700, 1500, 2000, 3000],
		]
	}, {
		fullWidth: true,
		showPoint: true,
		showArea: true,
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

	if (data.type === 'point') {

		var circle = new Chartist.Svg('circle', {
			cx: [data.x],
			cy: [data.y],
			r: [8],
		}, 'ct-circle');

		var foreignObjectHTML = '<div class="blip-wrap"><span class="circle-blip"></span></div>';

		data.element.parent().foreignObject(foreignObjectHTML, {
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
