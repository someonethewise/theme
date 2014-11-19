<?php

/**
 * Refund policy
 */
function affwp_refund_policy() {
	?>

<?php affwp_page_header( '30 Day Money Back Guarantee'); ?>
	<div class="refund-policy">
		<div class="wrapper">
			
			
			<p>If you are unhappy with your purchase, or you have an issue that we are unable to resolve that makes the system unusable, we are more than happy to provide a complete refund within 30 days of your original purchase.</p>

			<p><a href="#refund-policy" class="popup-content" data-effect="mfp-move-from-bottom">View full refund policy</a></p>
			
			<a href="#refund-policy" class="popup-content" data-effect="mfp-move-from-bottom">
				<svg width="100px" height="91px" class="pulse animated infinite">
				   <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svg-defs.svg#icon-heart'; ?>"></use>
				</svg>
			</a>

			

		</div>
	</div>

<?php	
}

/**
 * Addon popups
 */
function affwp_add_on_popups() {
	?>


	<?php 

	  $args = array(
	      'post_type' => 'download',
	      'posts_per_page' => -1,
	      'tax_query' => array(
	          array(
	              'taxonomy' => 'download_category',
	              'field' => 'slug',
	              'terms' => 'pro-add-ons'
	          )
	      )
	  );

	  $wp_query = new WP_Query( $args );
	?>

	<div id="modal-pro-add-ons" class="modal addons popup entry-content mfp-with-anim mfp-hide">
		<h1>Pro Add-ons</h1>
		<p>Pro add-ons are only available with a purchase of either the <strong>ultimate</strong> or <strong>professional</strong> license.</p>
		<?php if ( $wp_query->have_posts() ) : ?>
		    
		    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
			    $coming_soon = affwp_addon_is_coming_soon( get_the_ID() ) ? 'coming-soon' : '';
		    ?>  
		      
		        <article <?php post_class( array( $coming_soon ) ); ?>> 
		        		    
					<?php if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

			    		<h2><?php the_title(); ?></h2>
				    	
				    	<div class="columns columns-2">
				    		<div class="wrapper">
					    		<div class="item excerpt">
					    			<?php the_excerpt(); ?>
					    		</div>

					    		<div class="item image">
					    		<?php affwp_post_thumbnail( 'thumbnail', false ); ?>
					    		</div>
					    	</div>	
				    	</div>

				    <?php elseif ( affwp_addon_is_coming_soon( get_the_ID() ) ) : ?>
				    	
				    	<h2><?php the_title(); ?></h2>

			    	 	<?php the_excerpt(); ?>

			    		<div class="post-thumbnail">
			    			<?php if ( current_user_can( 'manage_options' ) ) : ?>
			    				<?php affwp_post_thumbnail( 'thumbnail', false ); ?>
			    			<?php else : ?>
			    				<img alt="<?php the_title(); ?> - Coming Soon" src="<?php echo get_stylesheet_directory_uri() . '/images/add-ons-coming-soon.png'; ?>">
			    			<?php endif; ?>	
			    			
			    		</div>

					<?php endif; ?>	

			</article>
		       
		    <?php endwhile; wp_reset_query(); ?>
		   	


		<?php endif; ?>

	</div>


	<div id="modal-third-party-add-ons" class="modal addons popup entry-content mfp-with-anim mfp-hide">

		
		<?php 

		  $args = array(
		      'post_type' => 'download',
		      'posts_per_page' => -1,
		      'tax_query' => array(
		          array(
		              'taxonomy' => 'download_category',
		              'field' => 'slug',
		              'terms' => '3rd-party'
		          )
		      )
		  );

		  $third_party = new WP_Query( $args );
		?>


		<h1>Third Party Add-ons</h1>
		
		<?php if ( $third_party->have_posts() ) : ?>
		    
		    <?php while ( $third_party->have_posts() ) : $third_party->the_post(); 
			    $coming_soon = affwp_addon_is_coming_soon( get_the_ID() ) ? 'coming-soon' : '';
		    ?>  
		      
		        <article <?php post_class( array( $coming_soon ) ); ?>> 
		        		    
					<?php if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

			    		<h2><?php the_title(); ?></h2>
				    	
				    	<div class="columns columns-2">
				    		<div class="wrapper">
					    		<div class="item excerpt">
					    			<?php the_excerpt(); ?>
					    		</div>

					    		<div class="item image">
					    		<?php affwp_post_thumbnail( 'thumbnail', false ); ?>
					    		</div>
					    	</div>	
				    	</div>

				    <?php elseif ( affwp_addon_is_coming_soon( get_the_ID() ) ) : ?>
				    	
				    	<h2><?php the_title(); ?></h2>

			    	 	<?php the_excerpt(); ?>

			    		<div class="post-thumbnail">
			    			<?php if ( current_user_can( 'manage_options' ) ) : ?>
			    				<?php affwp_post_thumbnail( 'thumbnail', false ); ?>
			    			<?php else : ?>
			    				<img alt="<?php the_title(); ?> - Coming Soon" src="<?php echo get_stylesheet_directory_uri() . '/images/add-ons-coming-soon.png'; ?>">
			    			<?php endif; ?>	
			    			
			    		</div>

					<?php endif; ?>	

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
		    
		    <?php while ( $official_free->have_posts() ) : $official_free->the_post(); 
			    $coming_soon = affwp_addon_is_coming_soon( get_the_ID() ) ? 'coming-soon' : '';
		    ?>  
		      
		        <article <?php post_class( array( $coming_soon ) ); ?>> 
		        		    
					<?php if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

			    		<h2><?php the_title(); ?></h2>
				    	
				    	<div class="columns columns-2">
				    		<div class="wrapper">
					    		<div class="item excerpt">
					    			<?php the_excerpt(); ?>
					    		</div>

					    		<div class="item image">
					    		<?php affwp_post_thumbnail( 'thumbnail', false ); ?>
					    		</div>
					    	</div>	
				    	</div>

				    <?php elseif ( affwp_addon_is_coming_soon( get_the_ID() ) ) : ?>
				    	
				    	<h2><?php the_title(); ?></h2>

			    	 	<?php the_excerpt(); ?>

			    		<div class="post-thumbnail">
			    			<?php if ( current_user_can( 'manage_options' ) ) : ?>
			    				<?php affwp_post_thumbnail( 'thumbnail', false ); ?>
			    			<?php else : ?>
			    				<img alt="<?php the_title(); ?> - Coming Soon" src="<?php echo get_stylesheet_directory_uri() . '/images/add-ons-coming-soon.png'; ?>">
			    			<?php endif; ?>	
			    			
			    		</div>

					<?php endif; ?>	

			</article>
		       
		    <?php endwhile; wp_reset_query(); ?>
		   	
		<?php endif; ?>


	</div>

	<?php
}




/**
 * Pricing options
 */
function affwp_pricing_options() {
	$professional_add_ons  = affwp_get_add_on_count( 'pro-add-ons' );
	
	

	$download_url = edd_get_checkout_uri() . '?edd_action=add_to_cart&amp;download_id=' . affwp_get_affiliatewp_id();

?>
	
	<section class="section pricing columns columns-3 grid">

		<div class="wrapper pricing-options">

			<div class="ultimate col box pricing best-value">

				<h2>Ultimate</h2>

				<ul class="list">
					<li class="price"><span><sup>$</sup>449</span></li>
					<li><span class="highlight">Unlimited</span> site licenses</li>
					<li><span class="highlight">Unlimited</span> updates</li>
					<li><span class="highlight">Unlimited</span> support</li>
					<li class="highlight"><a href="#modal-pro-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $professional_add_ons; ?> professional add-ons</a></li>
				</ul>	

				<div class="option_a">
					<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=3">Purchase</a>
				</div>
				<div class="option_b" style="display:none;">
					<a title="Purchase" class="button checkout-option" data-price-id="3" href="#">Purchase</a>
				</div>
			</div>

			<div class="professional col box pricing highlight">
				
				<svg width="165px" height="33px">
				   <use xlink:href="<?php echo get_stylesheet_directory_uri() . '/images/svg-defs.svg#icon-recommended'; ?>"></use>
				</svg>

				<h2>Professional</h2>

				<ul class="list">
					<li class="price"><span><sup>$</sup>199</span></li>
					<li><span class="highlight">Unlimited</span> site licenses</li>
					<li>1 year of updates *</li>
					<li>1 year of support *</li>
					<li class="highlight"><a href="#modal-pro-add-ons" class="popup-content" data-effect="mfp-move-from-bottom"><?php echo $professional_add_ons; ?> professional add-ons</a></li>
				</ul>	

				<div class="option_a">
					<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=2">Purchase</a>
				</div>
				<div class="option_b" style="display:none;">
					<a title="Purchase" class="button checkout-option" data-price-id="2" href="#">Purchase</a>
				</div>
			</div>

			<div class="plus col box pricing">

				<h2>Plus</h2>

				<ul class="list">
					<li class="price"><span><sup>$</sup>99</span></li>
					<li>3 site licenses</li>
					<li>1 year of updates *</li>
					<li>1 year of support *</li>
				</ul>	

				<div class="option_a">
					<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=1">Purchase</a>
				</div>	
				<div class="option_b" style="display:none;">
					<a title="Purchase" class="button checkout-option" data-price-id="1" href="#">Purchase</a>
				</div>

			</div>

			<div class="personal col box pricing">
				<h2>Personal</h2>

				<ul class="list">
					<li class="price"><span><sup>$</sup>49</span></li>
					<li>1 site license</li>
					<li>1 year of updates *</li>
					<li>1 year of support *</li>
				</ul>	

				<div class="option_a">
					<a title="Purchase" class="button" href="<?php echo $download_url; ?>&amp;edd_options[price_id]=0">Purchase</a>
				</div>	
				<div class="option_b" style="display:none;">
					<a title="Purchase" class="button checkout-option" data-price-id="0" href="#">Purchase</a>
				</div>
			</div>

		</div>

	</section>

<?php
}