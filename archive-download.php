<?php
/**
 * The template for displaying Add-ons
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

		<header class="entry-header">
		<h1 class="entry-title">Official Developer Add-ons</h1>
		
		<?php if ( is_user_logged_in() && edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 2 ) ) : ?>
			<h2>Download any available add-ons below from your <a title="Available from your account page" href="<?php echo site_url( 'account' ); ?>">account page</a></h2>

		<?php
			// if the user is logged and has purchased a lower license, show a link to upgrade their license 
			elseif ( is_user_logged_in() && 
				edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 0 )  ||
				edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 1 ) )
		: ?>
		<h2>Available once you upgrade to a <a title="Upgrade to a developer license" href="<?php echo affwp_get_license_upgrade_url( 'developer' ); ?>">developer license</a></h2>

		<?php else : // user is logged in and has not purchased, or is logged out. Direct link to purchase dev license 
			//$purchase_url = edd_get_checkout_uri() . '?edd_action=add_to_cart&amp;download_id=' . affwp_get_affiliatewp_id() .'&amp;edd_options[price_id]=2';
		?>
		<?php /*
			<p>These add-ons are only available to <a title="Developer License Holders" href="<?php echo site_url( 'pricing' ); ?>">developer license</a> holders</p>
			*/ ?>
			<h2>Free to <a title="developer license" href="<?php echo site_url( 'pricing' ); ?>">developer license</a> holders</h2>
		<?php endif; ?>

	</header>


<section id="official-developer-add-ons" class="section columns columns-3 addons">


	<?php while ( have_posts() ) : the_post(); 

	$coming_soon = affwp_addon_is_coming_soon( get_the_ID() ) ? 'coming-soon' : '';
	?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'item', 'box', $coming_soon ) ); ?>> 
		    
				<?php if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

		    		<h2>
						<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
				    		<?php the_title(); ?>
				    	</a>
			    	</h2>

			    	<?php affwp_post_thumbnail(); ?>

			    <?php elseif ( affwp_addon_is_coming_soon( get_the_ID() ) ) : ?>
			    		  	
		    		<h2><?php the_title(); ?></h2>
		    		<div class="post-thumbnail">
		    			<?php if ( current_user_can( 'manage_options' ) ) : ?>
		    				<?php the_post_thumbnail(); ?>
		    			<?php else : ?>
		    				<img alt="<?php the_title(); ?> - Coming Soon" src="<?php echo get_stylesheet_directory_uri() . '/images/add-ons-coming-soon.png'; ?>">
		    			<?php endif; ?>	
		    			
		    		</div>

				<?php endif; ?>	

		       	<?php 
			 		the_excerpt();
			 	?>
		</article>

	<?php endwhile; ?>
	<div class="gap"></div>
	<div class="gap"></div>
	<?php endif; ?>

	
</section>

<section id="official-free-add-ons" class="section columns columns-3 addons">

	<div class="wrapper">
		<header class="entry-header">
			<h1 class="entry-title">Official Free Add-ons</h1>
			<h2>Free to all license holders</h2>
		</header>

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

  $wp_query = new WP_Query( $args );
?>

<?php if ( $wp_query->have_posts() ) : ?>
    
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
	    $coming_soon = affwp_addon_is_coming_soon( get_the_ID() ) ? 'coming-soon' : '';
    ?>  
      
        <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'item', 'box', $coming_soon ) ); ?>> 
        		    
			<?php if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

	    		<h2>
					<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
			    		<?php the_title(); ?>
			    	</a>
		    	</h2>

		    	<?php affwp_post_thumbnail(); ?>

		    <?php elseif ( affwp_addon_is_coming_soon( get_the_ID() ) ) : ?>
		    	
		    	<h2><?php the_title(); ?></h2>
		    		<div class="post-thumbnail">
		    			<?php if ( current_user_can( 'manage_options' ) ) : ?>
		    				<?php the_post_thumbnail(); ?>
		    			<?php else : ?>
		    				<img alt="<?php the_title(); ?> - Coming Soon" src="<?php echo get_stylesheet_directory_uri() . '/images/add-ons-coming-soon.png'; ?>">
		    			<?php endif; ?>	
		    			
		    		</div>

			<?php endif; ?>	

	   	
	       	<?php 
		 		the_excerpt();
		 	?>
	</article>
       
    <?php endwhile; wp_reset_query(); ?>
   	
   	<div class="gap"></div>
	<div class="gap"></div>

<?php endif; ?>
</section>

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

  $wp_query = new WP_Query( $args );

?>

<?php if ( $wp_query->found_posts > 0 ) : ?>
<section id="third-party-add-ons" class="section columns columns-3 addons">

	<div class="wrapper">
		<header class="entry-header">
			<h1 class="entry-title">3rd Party Add-ons</h1>
			<h2>Free or paid add-ons created by other developers</h2>
		</header>
	</div>

<?php if ( $wp_query->have_posts() ) : ?>
    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
	    $coming_soon = affwp_addon_is_coming_soon( get_the_ID() ) ? 'coming-soon' : '';
    ?>  
        <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'item', 'box', $coming_soon ) ); ?>> 
        		    
			<?php 
			$external_download_url = get_post_meta( get_the_ID(), '_affwp_addon_download_url', true );

			if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

	    		<h2>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
			    		<?php the_title(); ?>
			    	</a>
		    	</h2>

		    	<?php affwp_post_thumbnail(); ?>

		    <?php elseif ( affwp_addon_is_coming_soon( get_the_ID() ) ) : ?>
		    		  	
	    		<h2><?php the_title(); ?></h2>
	    		<div class="post-thumbnail">
	    			<?php if ( current_user_can( 'manage_options' ) ) : ?>
	    				<?php the_post_thumbnail(); ?>
	    			<?php else : ?>
	    				<img alt="<?php the_title(); ?> - Coming Soon" src="<?php echo get_stylesheet_directory_uri() . '/images/add-ons-coming-soon.png'; ?>">
	    			<?php endif; ?>	
	    			
	    		</div>

			<?php endif; ?>	

	       	<?php the_excerpt(); ?>
	</article>
       
    <?php endwhile; wp_reset_query(); ?>
   	
   	<div class="gap"></div>
	<div class="gap"></div>

<?php endif; ?>
</section>
<?php endif; ?>

<?php get_footer();
