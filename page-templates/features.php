<?php
/**
 * Template Name: Features
 */

get_header(); ?>

<?php themedd_post_header( array( 'subtitle' => 'Everything you need, nothing you don\'t' ) ); ?>

<section class="container-fluid features">
	<div class="wrapper">
		<?php affwp_theme_features_html( array( 'columns' => 3 ) ); ?>
	</div>
</section>



<?php
get_footer();
