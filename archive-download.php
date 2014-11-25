<?php
/**
 * The template for displaying Add-ons
 */

get_header(); ?>

<?php if ( have_posts() ) : ?>

<?php affwp_page_header( 'Pro add-ons', '<h2>Available free with the Professional or Ultimate license</h2>' ); ?>

<section id="official-pro-add-ons" class="section columns columns-3 grid product-grid">
	<div class="wrapper">
		<?php while ( have_posts() ) : the_post(); 

		$coming_soon = affwp_addon_is_coming_soon( get_the_ID() ) ? 'coming-soon' : '';
		?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'item', 'box', $coming_soon ) ); ?>> 
			    <div class="item-wrapper">
					<?php if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

				    	<?php affwp_post_thumbnail( 'thumbnail', true ); ?>

				    	<h2>
							<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
					    		<?php the_title(); ?>
					    	</a>
				    	</h2>

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
			    </div>
			       	<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" class="link">
	 		    		Learn More  &rarr;
	 		    	</a>
			</article>

		<?php endwhile; ?>
		<div class="gap"></div>
		<div class="gap"></div>
		<?php endif; ?>
	</div>
	
</section>


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
<?php affwp_page_header( 'Official Free Add-ons', '<h2>Free to all license holders</h2>' ); ?>
<section id="official-free-add-ons" class="section columns columns-3 grid product-grid">
	<div class="wrapper">
	
	    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
		    $coming_soon = affwp_addon_is_coming_soon( get_the_ID() ) ? 'coming-soon' : '';
	    ?>  
	      
	        <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'item', 'box', $coming_soon ) ); ?>> 
	        	<div class="item-wrapper">	    
					<?php if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

						<?php affwp_post_thumbnail( 'thumbnail', true ); ?>

			    		<h2>
							<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>">
					    		<?php the_title(); ?>
					    	</a>
				    	</h2>

				    <?php elseif ( affwp_addon_is_coming_soon( get_the_ID() ) ) : ?>
				    	
				    	<div class="post-thumbnail">
				    		<?php if ( current_user_can( 'manage_options' ) ) : ?>
				    			<?php the_post_thumbnail(); ?>
				    		<?php else : ?>
				    			<img alt="<?php the_title(); ?> - Coming Soon" src="<?php echo get_stylesheet_directory_uri() . '/images/add-ons-coming-soon.png'; ?>">
				    		<?php endif; ?>	
				    		
				    	</div>

				    	<h2><?php the_title(); ?></h2>

					<?php endif; ?>	

			       	<?php the_excerpt(); ?>
			    </div>

	       		<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" class="link">
 		    		Learn More  &rarr;
 		    	</a>
		</article>
	       
	    <?php endwhile; wp_reset_query(); ?>
	   	
	   	<div class="gap"></div>
		<div class="gap"></div>

	
	</div>
</section>
<?php endif; ?>

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

<?php if ( $wp_query->have_posts() ) : ?>

<?php affwp_page_header( '3rd Party Add-ons', '<h2>Free or paid add-ons created by other developers</h2>' ); ?>
<section id="third-party-add-ons" class="section columns columns-3 grid product-grid">
<div class="wrapper">
	
	    <?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); 
		    $coming_soon = affwp_addon_is_coming_soon( get_the_ID() ) ? 'coming-soon' : '';
	    ?>  
	        <article id="post-<?php the_ID(); ?>" <?php post_class( array( 'item', 'box', $coming_soon ) ); ?>> 
	        	<div class="item-wrapper">		    
					<?php 
					$external_download_url = get_post_meta( get_the_ID(), '_affwp_addon_download_url', true );

					if ( ! affwp_addon_is_coming_soon( get_the_ID() ) || current_user_can( 'manage_options' ) ) : ?>

						<?php affwp_post_thumbnail( 'thumbnail', true ); ?>

			    		<h2>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
					    		<?php the_title(); ?>
					    	</a>
				    	</h2>

				    <?php elseif ( affwp_addon_is_coming_soon( get_the_ID() ) ) : ?>
				    	
				    	<div class="post-thumbnail">
				    		<?php if ( current_user_can( 'manage_options' ) ) : ?>
				    			<?php the_post_thumbnail(); ?>
				    		<?php else : ?>
				    			<img alt="<?php the_title(); ?> - Coming Soon" src="<?php echo get_stylesheet_directory_uri() . '/images/add-ons-coming-soon.png'; ?>">
				    		<?php endif; ?>	
				    		
				    	</div>

			    		<h2><?php the_title(); ?></h2>
			    		

					<?php endif; ?>	

			       	<?php the_excerpt(); ?>
		       	</div>
		       	
		       	<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" class="link">
 		    		Learn More  &rarr;
 		    	</a>
		</article>
	       
	    <?php endwhile; wp_reset_query(); ?>
	   	
	   	<div class="gap"></div>
		<div class="gap"></div>

	
	</div>
</section>
<?php endif; ?>

<?php get_footer();
