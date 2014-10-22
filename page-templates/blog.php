<?php
/*
Template Name: Blog
*/

get_header(); 

?>

<header class="entry-header">

<?php
	/**
	 * Displays the most recent post
	 */
	$args = array(
		'posts_per_page' => 1,
	);

	$temp = $wp_query; // assign original query to temp variable for later use  
	$wp_query = null;
	$wp_query = new WP_Query( $args ); 

	if ( have_posts() ) : ?>
		
		<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>
			
			<?php
				global $more;
				$more = 0;
			?>
			<?php affwp_post_thumbnail(); ?>
			<?php affwp_posted_on(); ?>
			<h1>
            	<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        	</h1>
        	
        	<?php 
		 		if ( function_exists( 'get_the_subheading' ) && get_the_subheading() )
					echo '<h2>' . get_the_subheading() . '</h2>';
			?>	


			<a href="<?php the_permalink(); ?>" class="button large">Read now</a>
			

		<?php endwhile; ?>

	<?php endif; 

	$wp_query = $temp; //reset back to original query 
?>


</header>


		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'page' ); ?>

		<?php endwhile;  wp_reset_postdata(); // end of the loop. ?>
		
		<?php

			/**
			 * Displays the most recent post
			 */
			
			$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

			$args = array(
				'posts_per_page' => 10,
				'paged'          => $paged,
			);

			if ( $paged >= 2 ) {
				$args['offet'] = 1;
			}
			
			$temp = $wp_query; // assign original query to temp variable for later use  
			$wp_query = null;
			$wp_query = new WP_Query( $args ); 
		
			if ( have_posts() ) : ?>
				
				<?php while ( $wp_query->have_posts() ) : $wp_query->the_post(); ?>


					<section class="section columns-3 columns">
						<div class="item left bdr">
							<?php echo get_avatar( get_the_author_meta( 'email' ), '80' ); ?>
							<p>
							<span>Written by <?php the_author(); ?></span>
							<?php if ( 'post' == get_post_type() ) : ?>
								<?php printf( '<time datetime="%1$s">%2$s</time>',
									esc_attr( get_the_date( 'c' ) ),
									esc_html( get_the_date() )
								); ?>
							<?php endif; ?>
							</p>

							
							<p>
								<span>Comments</span>
								<?php comments_popup_link( __( 'Leave a comment', 'affwp' ), __( '1', 'affwp' ), __( '%', 'affwp' ) ); ?>
							</p>
						
						</div>

						<div class="primary item content-area">
								<?php
									global $more;
									$more = 0;
								?>
								
								<h2>
					            	<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					        	</h2>
					        	
					        	<?php the_excerpt(); ?>	

								<p><a href="<?php the_permalink(); ?>" class="">Read more</a></p>

								<?php affwp_post_thumbnail(); ?>
								
						</div>

						<div class="item right">
							
							
						</div>
							
					</section>


				<?php endwhile; ?>

				<nav id="nav-below" class="nav-links columns columns-2">
					<span class="nav-previous item">
						<?php next_posts_link( __( '&larr; Older', 'affwp' ) ); ?>
					</span>

					<span class="nav-next item">
						<?php previous_posts_link( __( 'Newer &rarr;', 'affwp' ) ); ?>
					</span>

					
				</nav>

			<?php endif; 

			$wp_query = $temp; //reset back to original query 
		?>


<?php get_footer(); ?>