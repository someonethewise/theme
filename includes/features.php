<?php
/**
 * Features
 */


/**
 * Get the features
 *
 * @since 1.0.0
 */
function affwp_theme_features() {

	$features = array(
		1 => array(
			'title'       => 'Easy setup',
			'description' => 'Your affiliate program will be up and running in minutes. Simply install and activate and you’re ready to go!',
			'icon'        => 'feature-easy-setup'
		),
		2 => array(
			'title'       => 'Accurate affiliate tracking',
			'description' => 'AffiliateWP tracks affiliate referrals reliably, even on servers with aggressive caching.',
			'icon'        => 'feature-accurate-affiliate-tracking'
		),
		3 => array(
			'title'       => 'Complete integration',
			'description' => 'AffiliateWP integrates fully with popular WordPress eCommerce and membership plugins',
			'icon'        => 'feature-integration'
		),
		4 => array(
			'title'       => 'Real-time reporting',
			'description' => 'Track affiliate-referred visits, referrals, earnings and affiliate registrations in real time, without delay.',
			'icon'        => 'feature-reporting'
		),
		5 => array(
			'title'       => 'Unlimited affiliates',
			'description' => 'Have an unlimited number of affiliates actively promoting your website, products, and services.',
			'icon'        => 'feature-unlimited-affiliates'
		),
		6 => array(
			'title'       => 'Unlimited creatives',
			'description' => 'Give your affiliates unlimited visual resources or text links for faster, more effective promotion of your site.',
			'icon'        => 'feature-creatives'
		),
		7 => array(
			'title'       => 'Affiliate coupon tracking',
			'description' => 'Connect coupon codes to specific affiliate accounts with <a target="_blank" href="http://docs.affiliatewp.com/article/59-affiliate-coupon-tracking">affiliate coupon tracking</a>.',
			'icon'        => 'feature-coupon-tracking'
		),
		8 => array(
			'title'       => 'Easy affiliate management',
			'description' => 'See your top earning affiliates, view affiliate reports, edit individual affiliate accounts, and moderate affiliate registrations.',
			'icon'        => 'feature-affiliate-management'
		),
		9 => array(
			'title'       => 'Automatic affiliate creation',
			'description' => 'Enable automatic affiliate account creation for all users who register a new WordPress user account on your site.',
			'icon'        => 'feature-automatic-affiliate-creation'
		),
		10 => array(
			'title'       => 'Manual affiliate approval',
			'description' => 'Affiliate registrations can be moderated by admins, automatically accepted, or accounts can be manually created.',
			'icon'        => 'feature-affiliate-approval'
		),
		11 => array(
			'title'       => 'Affiliate Area',
			'description' => 'A dashboard for your affiliates to track their performance, view earnings, retrieve their referral URL, find creatives, and more!',
			'icon'        => 'feature-affiliate-area'
		),
		12 => array(
			'title'       => 'Referral link generator',
			'description' => 'Affiliates can generate their own referral links from the Affiliate Area with the built-in referral link generator.',
			'icon'        => 'feature-referral-link-generator'
		),
		13 => array(
			'title'       => 'Referral rate types',
			'description' => 'Choose between flat rate and percentage referral rate types on a global, per-affiliate, and per-product basis.',
			'icon'        => 'feature-referral-rate-types'
		),
		21 => array(
			'title'       => 'Easy affiliate registration',
			'description' => 'AffiliateWP ships with a default affiliate registration form so users can register as affiliates instantly.',
			'icon'        => 'feature-affiliate-registration'
		),
		22 => array(
			'title'       => 'Affiliate URLs',
			'description' => 'Choose pretty URLs or non-pretty. Affiliates can use their unique Affiliate ID or WordPress username in URLs.',
			'icon'        => 'feature-affiliate-urls'
		),
		23 => array(
			'title'       => 'Set cookie expiration',
			'description' => 'Choose how many days the referral tracking cookie should be valid for.',
			'icon'        => 'feature-cookie-expiration'
		),
		24 => array(
			'title'       => 'Simple shortcodes',
			'description' => 'Use WordPress-friendly shortcodes for the affiliate login form, the registration form, URLs, <a href="http://docs.affiliatewp.com/category/65-short-codes" target="_blank">and more</a>.',
			'icon'        => 'feature-shortcodes'
		),
		14 => array(
			'title'       => 'Customizable emails',
			'description' => 'Emails for admin notifications, pending affiliate applications, affiliate application approval and rejection, and new referral notifications.',
			'icon'        => 'feature-custom-emails'
		),
		15 => array(
			'title'       => 'Export data to CSV',
			'description' => 'Export affiliate data and referral data to a CSV file for forecasting, bookkeeping, and accounting purposes.',
			'icon'        => 'feature-export'
		),
		26 => array(
			'title'       => 'Payout Logs',
			'description' => 'Easily see a detailed log of every payout sent to affiliates from the Payouts screen.',
			'icon'        => 'feature-payout-logs'
		),
		20 => array(
			'title'       => 'Developer-friendly',
			'description' => 'AffiliateWP is extremely extensible with plenty of hooks and templates to add custom features and functionality.',
			'icon'        => 'feature-developer-friendly'
		),
		27 => array(
			'title'       => 'REST API',
			'description' => 'Our complete, read-only REST API allows developers to easily interact with AffiliateWP through remote applications.',
			'icon'        => 'feature-rest-api'
		),
		28 => array(
			'title'       => 'WP-CLI integration',
			'description' => 'Use our full suite of WP-CLI commands to create, update, delete, and view all data within AffiliateWP.',
			'icon'        => 'feature-wp-cli-integration'
		),
		25 => array(
			'title'       => 'Performance-ready',
			'description' => 'Thoroughly tested and built with speed in mind, AffiliateWP performs beautifully on all sites; from large to small and in-between.',
			'icon'        => 'feature-performance'
		),
		16 => array(
			'title'       => 'Fully internationalized',
			'description' => 'AffiliateWP is ready to be translated into your language. As always, translations are welcome!',
			'icon'        => 'feature-translated'
		),
		17 => array(
			'title'       => 'Made for WordPress',
			'description' => 'AffiliateWP looks and feels like WordPress; seamlessly integrated. It lives on your website (not someone else’s) so you have full control.',
			'icon'        => 'feature-wordpress'
		),
		18 => array(
			'title'       => 'Extensive documentation',
			'description' => 'We have all the documentation you need to help you get up and running quickly.',
			'icon'        => 'feature-documentation'
		),
		19 => array(
			'title'       => 'World-class support',
			'description' => 'If you require assistance, our support is considered the best in the industry. We’re here to help!',
			'icon'        => 'feature-support'
		),

	);

	return $features;
}

/**
 * AffiliateWP features HTML
 *
 * @since 1.0.0
 */
function affwp_theme_features_html( $args = array() ) {

	$defaults = array(

	);

	$columns = isset( $args['columns'] ) ? $args['columns'] : '';

	$args = wp_parse_args( $args, $defaults );

	switch ( $columns ) {
		case 3:
			$columns = 4; // 12 / 3 = 4
			break;

		case 4:
			$columns = 3; // 12 / 4 = 3
			break;

		default:
			$columns = 3;
			break;
	}
?>

<div class="row text-center-xs text-left-lg">
<?php foreach ( affwp_theme_features() as $key => $feature ) :

	$icon        = $feature['icon'];
	$title       = $feature['title'];
	$description = $feature['description'];

	?>
	<div class="col-xs-12 col-sm-6 col-lg-<?php echo $columns; ?> mb-xs-1 mb-lg-2">

		<svg width="48px" height="48px">
			<use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svgs/svg-defs.svg#icon-' . $icon ?>"></use>
		</svg>

		<h5><?php echo $title; ?></h5>
		<p><?php echo $description; ?></p>

	</div>
<?php endforeach; ?>
</div>

<?php
}
