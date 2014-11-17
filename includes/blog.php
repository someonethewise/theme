<?php



/**
 * Blog posts
 */
function affwp_blog() {

	global $post;
	
	// First, initialize how many posts to render per page
	$display_count = 3;

	// Next, get the current page
	$page = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	// Finally, we'll set the query arguments and instantiate WP_Query
	$args = array(
	  'post_type'  		=>  'post',
	  'orderby'    		=>  'date',
	  'order'      		=>  'desc',
	  'posts_per_page'	=>  $display_count,
	  'post__not_in' => array( get_the_ID() ), // hide the currently viewed post
	  'page'       		=>  $page,
	);

	$blog_query = new WP_Query( $args );


?>

<?php if ( have_posts() ) : ?>

	

	<section class="section columns columns-3 related-posts grid">

		<header class="sub-header">
			<h2>We also recommend</h2>
		</header>

		<div class="wrapper">
		<?php while ( $blog_query->have_posts() ) : $blog_query->the_post(); ?>
			 <div class="item box<?php if ( has_post_thumbnail() ) { echo ' has-post-thumbnail'; } ?><?php if ( has_excerpt() ) { echo ' has-excerpt'; } ?>">
			 
			 <div class="item-wrapper">
				<?php affwp_post_thumbnail( 'thumbnail', true ); ?>
				
					<?php affwp_posted_on(); ?>
					<h2><a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	        	
		        	<?php  
				 		$excerpt = $post->post_excerpt ? the_excerpt() : '';
				 		echo $excerpt;
					?>
			</div>	
	       	<a title="<?php the_title_attribute(); ?>" href="<?php the_permalink(); ?>" class="link">
	    		Read More  &rarr;
	    	</a>	
			</div>

		<?php endwhile; ?>

			<div class="gap"></div>
		    <div class="gap"></div>

		</div>
	</section>

	
	
	<?php endif; 

	wp_reset_postdata();

}
add_action( 'affwp_single_content_after', 'affwp_blog' );