<?php
/**
 * Template Name: Support
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php affwp_page_header(); ?>

<section class="section columns-3 columns">
	<div class="item left">
	</div>

	<div class="primary item content-area">
		<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );
				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
			endwhile;
		?>
	</div>

	<div class="item right bdr">
		<h2>Have you seen these?</h2>
		<ul>
			<li><a href="http://docs.affiliatewp.com/">Documentation</a></li>
			<li><a href="http://docs.affiliatewp.com/category/7-getting-started">Getting Started</a></li>
			<li><a href="http://docs.affiliatewp.com/category/75-integrations">Integrations</a></li>
			<li><a href="http://docs.affiliatewp.com/category/51-faqs">FAQ</a></li>
		</ul>
	</div>
		
	</section>

<?php
get_footer();
