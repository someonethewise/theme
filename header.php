<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @since AffiliateWP 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?> class="no-js">
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="site" class="hfeed">

	<header id="masthead" class="site-header" role="banner">
		<div class="logo-wrapper">
			<h1 class="site-title">
				<a class="logo" title="<?php echo get_bloginfo( 'name' ); ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">AffiliateWP</a>
			</h1>

			<?php if ( ! edd_is_checkout() ) : ?>
			<nav id="main" class="site-navigation primary-navigation" role="navigation">
			<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'affwp' ); ?></a>
			<?php
				wp_nav_menu(
				  array(
				    'menu' 				=> 'main_nav',
				    'menu_class' 		=> 'menu',
				    'theme_location' 	=> 'primary',
				    'container' 		=> '',
				    'container_id' 		=> 'main',
				    'depth' 			=> '3',
				  )
				);
			?>
			</nav>
			<?php endif; ?>
			
		</div>
		
		<?php if ( is_front_page() ) : ?>
			<div class="wrapper">
				<h1 class="intro">
				The best affiliate marketing plugin for WordPress
				</h1>

				<div id="mascot"></div>
				<?php echo affwp_button_get_started( 'Start Your Affiliate Network' ); ?>
			</div>		
		<?php endif; ?>
		<div class="share-button"></div>

	</header><!-- #masthead -->

	<?php do_action( 'affwp_content_before' ); ?>
	<div id="content">
		<?php do_action( 'affwp_content_start' ); ?>
		<div class="wrapper">
			
