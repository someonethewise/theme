<?php

/**
 * Pricing Calculator
 */
function affwp_theme_pricing_calculator() {

	$class = is_front_page() ? ' highlight-alt' : ' highlight';
	?>

	<section class="pricing-calculator container-fluid pv-xs-2 pv-lg-4<?php echo $class; ?>">
	    <div class="wrapper">
	        <div class="row center-xs">
	            <div class="col-xs-12 col-sm-10">

					<svg width="80" height="80" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:1.41421;">
					    <g transform="matrix(0.956522,0,1.54074e-33,0.956522,2.91304,0.521739)">
					        <path d="M18.5,3.114C18.5,1.671 17.329,0.5 15.886,0.5L3.114,0.5C1.671,0.5 0.5,1.671 0.5,3.114L0.5,20.886C0.5,22.329 1.671,23.5 3.114,23.5L15.886,23.5C17.329,23.5 18.5,22.329 18.5,20.886L18.5,3.114Z" style="fill:none;stroke-width:1px;stroke:white;"/>
					        <path d="M16.5,3.43C16.5,2.917 16.083,2.5 15.57,2.5L3.43,2.5C2.917,2.5 2.5,2.917 2.5,3.43L2.5,5.57C2.5,6.083 2.917,6.5 3.43,6.5L15.57,6.5C16.083,6.5 16.5,6.083 16.5,5.57L16.5,3.43Z" style="fill:none;stroke-width:1px;stroke:white;"/>
					        <path d="M0.5,15.5L18.5,15.5" style="fill:none;stroke-width:1px;stroke:white;"/>
					        <path d="M0.5,8.5L18.5,8.5" style="fill:none;stroke-width:1px;stroke:white;"/>
					        <path d="M9.5,8.5L9.5,23.5" style="fill:none;stroke-width:1px;stroke:white;"/>
					        <path d="M3,12.5L6,12.5" style="fill:none;stroke-width:1px;stroke-linecap:round;stroke:white;"/>
					        <path d="M12.5,12.5L15.5,12.5" style="fill:none;stroke-width:1px;stroke-linecap:round;stroke:white;"/>
					        <path d="M12.5,20.5L15.5,20.5" style="fill:none;stroke-width:1px;stroke-linecap:round;stroke:white;"/>
					        <path d="M12.5,18.5L15.5,18.5" style="fill:none;stroke-width:1px;stroke-linecap:round;stroke:white;"/>
					        <path d="M4.5,11L4.5,14" style="fill:none;stroke-width:1px;stroke-linecap:round;stroke:white;"/>
					        <path d="M3,18L6,21" style="fill:none;stroke-width:1px;stroke-linecap:round;stroke:white;"/>
					        <path d="M6,18L3,21" style="fill:none;stroke-width:1px;stroke-linecap:round;stroke:white;"/>
					    </g>
					</svg>

	                <h2>AffiliateWP pays for itself, fast.</h2>
	                <p>AffiliateWP will allow you to recruit affiliates, who in turn will bring more customers to your site and purchase. Use our calculator below to find out how quickly AffiliateWP can pay for itself. What have you got to lose?</p>

					<a href="#pricing-calculator" class="popup-content button outline" data-effect="mfp-move-from-bottom">
						AffiliateWP Pricing Calculator
					</a>
	            </div>

	        </div>

	    </div>
	</section>

	<?php
}

/**
 * Pricing table
 */
function affwp_pricing_table() {

	$download_id = function_exists( 'affwp_get_download_id' ) ? affwp_get_download_id() : '';
	$checkout_url = function_exists( 'edd_get_checkout_uri' ) ? edd_get_checkout_uri() : '';

	$download_url = add_query_arg( array( 'edd_action' => 'add_to_cart', 'download_id' => $download_id ), $checkout_url );

	$count_pro_add_ons           = function_exists( 'affwp_get_add_on_count' ) ? affwp_get_add_on_count( 'pro' ) : '';
	$count_official_free_add_ons = function_exists( 'affwp_get_add_on_count' ) ? affwp_get_add_on_count( 'official-free' ) : '';

?>

	<section class="container-fluid pricing-table" id="pricing">

			<?php

			$cart_items = function_exists( 'edd_get_cart_contents' ) ? edd_get_cart_contents() : '';

			if ( $cart_items ) {
				$options = wp_list_pluck(  $cart_items, 'options' );
				$price_ids = wp_list_pluck(  $options, 'price_id' );
			}

			?>

			<div class="row pricing table-row mb-xs-2">

				<?php
					$price_id = 4;
					$in_cart = $cart_items ? in_array( $price_id, $price_ids ) : '';
					$in_cart_class = $cart_items && in_array( $price_id, $price_ids ) ? ' in-cart' : '';
				?>
	            <div class="col-xs-12 col-sm-6 col-lg-3 align-xs-center mb-xs-5 mb-sm-2<?php echo $in_cart_class; ?>">
	                <div class="table-option pv-xs-2">
						<?php if ( $in_cart ) : ?>
						<span>In your cart</span>
						<?php endif; ?>
                        <h2>Ultimate</h2>

                        <ul class="mb-xs-2">
                            <li class="pricing">
								<span class="price"><span class="currency">$</span>449</span>
								<span class="length">one-time payment</span>
							</li>
							<li class="feature"><strong><a href="#modal-pro-add-ons" class="popup-content link-highlight" data-effect="mfp-move-from-bottom"><?php echo $count_pro_add_ons; ?> pro add-ons</a></strong><br/>+ any we release in the future!</li>
							<li class="feature"><strong><a href="#modal-offical-free-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $count_official_free_add_ons; ?> official free add-ons</a></strong></li>
                            <li class="feature"><strong>Lifetime plugin updates</strong></li>
                            <li class="feature"><strong>Lifetime email support</strong></li>
							<li class="feature"><strong>Unlimited sites</strong></li>
							<li class="feature">All features included</li>

                        </ul>

                        <div class="footer">
							<?php
								if ( $in_cart ) {
									$button_link = $checkout_url;
									$text = 'Checkout';
								} else {
									$button_link = $download_url . '&amp;edd_options[price_id]=' . $price_id;
									$text = 'Purchase';
								}
							?>
							<a class="button" href="<?php echo $button_link; ?>"><?php echo $text; ?></a>
                        </div>

	                </div>
	            </div>

				<?php
					$price_id = 3;
					$in_cart = $cart_items ? in_array( $price_id, $price_ids ) : '';
					$in_cart_class = $cart_items && in_array( $price_id, $price_ids ) ? ' in-cart' : '';

					if ( ! $cart_items ) {
						$highlight_class = ' best-value';
					} else {
						$highlight_class = '';
					}
				?>
	            <div class="col-xs-12 col-sm-6 col-lg-3 align-xs-center mb-xs-2<?php echo $highlight_class; ?><?php echo $in_cart_class; ?>">

	                <div class="table-option pv-xs-2">
						<?php if ( ! $cart_items ) : ?>
						<span>Most popular</span>
						<?php endif; ?>

						<?php if ( $in_cart ) : ?>
						<span>In your cart</span>
						<?php endif; ?>

	                        <h2>Professional</h2>

	                        <ul class="mb-xs-2">
	                            <li class="pricing">

									<span class="price">
										<span class="currency">$</span>199</span>
										<span class="length">per year</span>
								</li>

								<li class="feature"><strong><a href="#modal-pro-add-ons" class="popup-content link-highlight" data-effect="mfp-move-from-bottom"><?php echo $count_pro_add_ons; ?> pro add-ons</a></strong><br/>+ any we release in the future!</li>
								<li class="feature"><strong><a href="#modal-offical-free-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $count_official_free_add_ons; ?> official free add-ons</a></strong></li>
	                            <li class="feature">Plugin updates *</li>
	                            <li class="feature">Email support *</li>
								<li class="feature"><strong>Unlimited sites</strong></li>
								<li class="feature">All features included</li>
	                        </ul>

							<div class="footer">
								<?php
									if ( $in_cart ) {
										$button_link = $checkout_url;
										$text = 'Checkout';
									} else {
										$button_link = $download_url . '&amp;edd_options[price_id]=' . $price_id;
										$text = 'Sign up';
									}
								?>
								<a class="button" href="<?php echo $button_link; ?>"><?php echo $text; ?></a>
	                        </div>
	                </div>
	            </div>

				<?php
					$price_id = 2;
					$in_cart = $cart_items ? in_array( $price_id, $price_ids ) : '';
					$in_cart_class = $cart_items && in_array( $price_id, $price_ids ) ? ' in-cart' : '';
				?>
	            <div class="col-xs-12 col-sm-6 col-lg-3 align-xs-center mb-xs-2<?php echo $in_cart_class; ?>">
	                <div class="table-option pv-xs-2">
						<?php if ( $in_cart ) : ?>
						<span>In your cart</span>
						<?php endif; ?>
							<h2>Plus</h2>

	                        <ul class="mb-xs-2">

								<li class="pricing">
									<span class="price"><span class="currency">$</span>99</span>
									<span class="length">per year</span>
								</li>
								<li class="feature"><strong><a href="#modal-offical-free-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $count_official_free_add_ons; ?> official free add-ons</a></strong></li>

	                            <li class="feature">Plugin updates *</li>
	                            <li class="feature">Email support *</li>
								<li class="feature">3 sites</li>
								<li class="feature">All features included</li>
	                        </ul>

							<div class="footer">
								<?php
									if ( $in_cart ) {
										$button_link = $checkout_url;
										$text = 'Checkout';
									} else {
										$button_link = $download_url . '&amp;edd_options[price_id]=' . $price_id;
										$text = 'Sign up';
									}
								?>
								<a class="button" href="<?php echo $button_link; ?>"><?php echo $text; ?></a>
	                        </div>
	                </div>
	            </div>

				<?php
					$price_id = 1;
					$in_cart = $cart_items ? in_array( $price_id, $price_ids ) : '';
					$in_cart_class = $cart_items && in_array( $price_id, $price_ids ) ? ' in-cart' : '';
				?>
	            <div class="col-xs-12 col-sm-6 col-lg-3 align-xs-center mb-xs-2<?php echo $in_cart_class; ?>">
	                <div class="table-option pv-xs-2">
						<?php if ( $in_cart ) : ?>
						<span>In your cart</span>
						<?php endif; ?>
	                        <h2>Personal</h2>

	                        <ul class="mb-xs-2">

								<li class="pricing">
									<span class="price"><span class="currency">$</span>49</span>
									<span class="length">per year</span>
								</li>

								<li class="feature"><strong><a href="#modal-offical-free-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $count_official_free_add_ons; ?> official free add-ons</a></strong></li>

								<li class="feature">Plugin updates *</li>
	                            <li class="feature">Email support *</li>
								<li class="feature">1 site</li>
								<li class="feature">All features included</li>
	                        </ul>

							<div class="footer">
								<?php
									if ( $in_cart ) {
										$button_link = $checkout_url;
										$text = 'Checkout';
									} else {
										$button_link = $download_url . '&amp;edd_options[price_id]=' . $price_id;
										$text = 'Sign up';
									}
								?>
								<a class="button" href="<?php echo $button_link; ?>"><?php echo $text; ?></a>
	                        </div>

	                </div>
	            </div>

	        </div>

			<div class="row center-sm">
				<div class="col-xs-12 col-sm-10">
					<p class="mb-xs-0">* Plugin updates and email support are provided for the duration of your current subscription. Renewals discounted at 30%. Pro add-ons are only available with Professional and Ultimate licenses. <?php if( is_page('pricing') ) { echo 'See FAQs below for details.'; } ?> All purchases are subject to our terms of use.</p>
				</div>
			</div>

	</section>

	<?php rcp_add_on_popups(); ?>

	<?php
}


/**
 * Addon popups
 */
function rcp_add_on_popups() {

	// remove the filter on the pricing page title.
	remove_filter( 'the_title', 'rcp_the_title', 10, 2 );

	// remove the subtitles from showing in the pop ups
	if ( class_exists( 'Subtitles' ) ) {
		remove_filter( 'the_title', array( Subtitles::getInstance(), 'the_subtitle' ), 10, 2 );
	}


	  $args = array(
	      'post_type' => 'download',
	      'posts_per_page' => -1,
	      'tax_query' => array(
	          array(
	              'taxonomy' => 'download_category',
	              'field' => 'slug',
	              'terms' => 'pro'
	          )
	      )
	  );

	  $wp_query = new WP_Query( $args );
	?>

	<div id="modal-pro-add-ons" class="modal addons popup entry-content mfp-with-anim mfp-hide">
		<h1>Pro add-ons</h1>
		<p>Pro add-ons are only available to <strong>Professional</strong> or <strong>Ultimate</strong> license-holders. These license-holders will also receive any additional pro add-ons we release in the future.</p>
		<?php if ( $wp_query->have_posts() ) : ?>

		    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
		        <article>
		    		<h2><?php the_title(); ?></h2>

					<div class="row">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="col-xs-6">
								<?php the_excerpt(); ?>
							</div>
							<div class="col-xs-6">
								<?php themedd_post_thumbnail( 'thumbnail', false ); ?>
							</div>
						<?php else : ?>
							<div class="col-xs-12">
								<?php the_excerpt(); ?>
							</div>
						<?php endif; ?>
					</div>
				</article>
		    <?php endwhile; wp_reset_query(); ?>

		<?php endif; ?>

	</div>

	<?php

	  $args = array(
	      'post_type' => 'download',
	      'posts_per_page' => -1,
	      'tax_query' => array(
	          array(
	              'taxonomy' => 'download_category',
	              'field' => 'slug',
	              'terms' => 'official-free'
	          )
	      )
	  );

	  $official_free = new WP_Query( $args );

	?>

	<div id="modal-offical-free-add-ons" class="modal addons popup entry-content mfp-with-anim mfp-hide">

		<h1>Official Free Add-ons</h1>

		<?php if ( $official_free->have_posts() ) : ?>

		    <?php while ( $official_free->have_posts() ) : $official_free->the_post(); ?>

				<article>
		    		<h2><?php the_title(); ?></h2>

					<div class="row">
						<?php if ( has_post_thumbnail() ) : ?>
							<div class="col-xs-6">
								<?php the_excerpt(); ?>
							</div>
							<div class="col-xs-6">
								<?php themedd_post_thumbnail( 'thumbnail', false ); ?>
							</div>
						<?php else : ?>
							<div class="col-xs-12">
								<?php the_excerpt(); ?>
							</div>
						<?php endif; ?>

					</div>
				</article>

		    <?php endwhile; wp_reset_query(); ?>

		<?php endif; ?>


	</div>

	<?php
}







/**
 * Pricing options
 */
function affwp_pricing_table2() {

	$professional_add_ons  = affwp_get_pro_add_on_count();
	$official_free_add_ons = affwp_get_add_on_count( 'official-free' );

	$download_url = edd_get_checkout_uri() . '?edd_action=add_to_cart&amp;download_id=' . affwp_get_download_id();

?>

	<section class="section pricing columns columns-3 grid">

		<div class="wrapper pricing-options">

			<div class="ultimate box pricing best-value">

				<h2>Ultimate</h2>

				<ul class="list">
					<li class="price"><span><sup>$</sup>449</span><span class="length">one-time payment</span></li>
					<li class="highlight"><strong><a href="#modal-pro-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $professional_add_ons; ?> pro add-ons</a></strong></li>
					<li class="highlight"><strong><a href="#modal-offical-free-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $official_free_add_ons; ?> official free add-ons</a></strong></li>
					<li><span class="highlight">Lifetime</span> plugin updates</li>
					<li><span class="highlight">Lifetime</span> email support</li>
					<li><span class="highlight">Unlimited</span> sites</li>

				</ul>

				<div class="option_a">
					<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=3">Purchase</a>
				</div>

			</div>

			<div class="professional box pricing highlight">

				<svg width="165px" height="33px">
				   <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svg-defs.svg#icon-recommended'; ?>"></use>
				</svg>

				<h2>Professional</h2>

				<ul class="list">
					<li class="price"><span><sup>$</sup>199</span><span class="length">per year</span></li>
					<li class="highlight"><strong><a href="#modal-pro-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $professional_add_ons; ?> pro add-ons</a></strong></li>
					<li class="highlight"><strong><a href="#modal-offical-free-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $official_free_add_ons; ?> official free add-ons</a></strong></li>
					<li>Plugin updates *</li>
					<li>Email support *</li>
					<li><span class="highlight">Unlimited</span> sites</li>

				</ul>

				<div class="option_a">
					<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=2">Sign up</a>
				</div>

			</div>

			<div class="plus box pricing">
				<div class="flex-wrapper">
					<h2>Plus</h2>

					<ul class="list">
						<li class="price"><span><sup>$</sup>99</span><span class="length">per year</span></li>
						<li class="highlight"><strong><a href="#modal-offical-free-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $official_free_add_ons; ?> official free add-ons</a></strong></li>
						<li>Plugin updates *</li>
						<li>Email support *</li>
						<li>3 sites</li>
					</ul>
				</div>

				<div class="option_a">
					<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=1">Sign up</a>
				</div>

			</div>

			<div class="personal box pricing">
				<div class="flex-wrapper">
					<h2>Personal</h2>

					<ul class="list">
						<li class="price"><span><sup>$</sup>49</span><span class="length">per year</span></li>
						<li class="highlight"><strong><a href="#modal-offical-free-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $official_free_add_ons; ?> official free add-ons</a></strong></li>
						<li>Plugin updates *</li>
						<li>Email support *</li>
						<li>1 site</li>
					</ul>

				</div>
				<div class="option_a">
					<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=0">Sign up</a>
				</div>
			</div>

		</div>

	</section>

<?php
}
