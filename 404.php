<?php
/**
 * 404 page
 */

get_header(); 

?>

<?php affwp_page_header( '<h1>I tried my best</h1>', '<h2>Sorry, I just can\'t find that page</h2>' ); ?>

<img id="mascot-404" alt="" src="<?php echo get_stylesheet_directory_uri() . '/images/alf-sad.png'; ?>">

<?php
get_footer();
