<?php
/**
 * Template Name: Brand Assets
 */

get_header(); ?>

<?php themedd_post_header( array( 'title' => 'Brand Assets', 'subtitle' => 'Thanks for your interest in AffiliateWP!' ) ); ?>

<section class="container-fluid">
	<div class="row center-xs aligncenter">
		<div class="col-xs-12 col-sm-8 col-lg-5">
			<p class="mb-xs-4">Below are a few guidelines for using AffiliateWP’s brand resources, please take a moment to familiarize yourself with them. You can download individual assets in each section, or you can download everything all at once below.</p>
			<a href="<?php echo get_stylesheet_directory_uri() . '/affiliatewp-brand-assets/all.zip'; ?>" class="button center-xs">Download all assets</a>
		</div>
	</div>
</section>

<?php
/**
 * Colors
 */
?>
<section class="container-fluid pv-xs-2 pv-md-4 bg colors">

	<div class="row center-xs">

		<div class="col-xs-12 col-md-8">


			<h1>Colors</h1>
			<p>These are AffiliateWP's brand colors. Copy the HEX codes below.</p>

		    <div class="row">

		        <div class="col-xs-12 col-sm-6 col-lg-4 color color-1">
					<div class="bottom-xs"><p>#e34f43</p></div>
		        </div>

				<div class="col-xs-12 col-sm-6 col-lg-4 color color-2">
					<div class="bottom-xs"><p>#ed6d62</p></div>
		        </div>

				<div class="col-xs-12 col-sm-6 col-lg-4 color color-3">
					<div class="bottom-xs"><p>#60b9b3</p></div>
		        </div>

				<div class="col-xs-12 col-sm-6 col-lg-4 color color-4">
					<div class="bottom-xs"><p>#2d2d2d</p></div>
		        </div>

				<div class="col-xs-12 col-sm-6 col-lg-4 color color-5">
					<div class="bottom-xs"><p>#f4f7f8</p></div>
		        </div>

				<div class="col-xs-12 col-sm-6 col-lg-4 color color-6">
					<div class="bottom-xs"><p>#ffffff</p></div>

		        </div>



		    </div>

		</div>

	</div>

</section>

<?php
/**
 * Logo guidelines
 */
?>
<section class="container-fluid highlight pv-xs-2 pv-md-4 bg colors">

	<div class="row center-xs">

		<div class="col-xs-12 col-md-8">

			<h1>Logo guidelines</h1>
			<p>You can use the AffiliateWP logo in either a horizontal or vertical layout. Shown below are the possible variations you may use.</p>

		    <div class="row">

		        <div class="col-xs-12 col-sm-6">
					<div class="logo-1">
						<img alt="AffiliateWP" src="<?php echo get_stylesheet_directory_uri() . '/images/brand-assets/affiliatewp-1.png'; ?>">
					</div>
					<h4>1. Logo on #FFFFFF</h4>
					<p>Download <a target="_blank" href="<?php echo get_stylesheet_directory_uri() . '/affiliatewp-brand-assets/logos/horizontal/1/affiliatewp-1.ai'; ?>">.AI</a>,
						<a target="_blank" href="<?php echo get_stylesheet_directory_uri() . '/affiliatewp-brand-assets/logos/horizontal/1/affiliatewp-1.eps'; ?>">.EPS</a> or
						<a target="_blank" href="<?php echo get_stylesheet_directory_uri() . '/affiliatewp-brand-assets/logos/horizontal/1/affiliatewp-1.png'; ?>">.PNG</a>
					</p>
		        </div>

				<div class="col-xs-12 col-sm-6">
					<div class="logo-2">
						<img alt="AffiliateWP" src="<?php echo get_stylesheet_directory_uri() . '/images/brand-assets/affiliatewp-1.png'; ?>">
					</div>
					<h4>2. Logo on #2D2D2D</h4>
					<p>Download <a target="_blank" href="<?php echo get_stylesheet_directory_uri() . '/affiliatewp-brand-assets/logos/horizontal/2/affiliatewp-2.ai'; ?>">.AI</a>,
						<a target="_blank" href="<?php echo get_stylesheet_directory_uri() . '/affiliatewp-brand-assets/logos/horizontal/2/affiliatewp-2.eps'; ?>">.EPS</a> or
						<a target="_blank" href="<?php echo get_stylesheet_directory_uri() . '/affiliatewp-brand-assets/logos/horizontal/2/affiliatewp-2.png'; ?>">.PNG</a>
					</p>
		        </div>


		    </div>

		</div>

	</div>

</section>

<?php get_footer();
