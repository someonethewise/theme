<?php
/**
 * The Template for displaying all single addons
 */
get_header(); ?>

	<div id="primary" class="content-area">
	
	<a class="back" href="<?php echo site_url( 'addons' ); ?>">Back to add-ons</a>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
			<?php affwp_post_thumbnail(); ?>
				<div class="entry-content">
					<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'affwp' ) ); ?>
				</div>
			</article>

		<?php endwhile; ?>

		<?php if ( is_user_logged_in() && edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 2 ) ) : ?>

			<?php if ( edd_get_download_files( get_the_ID() ) ) : ?>
				<a title="Get this add-on" href="<?php echo affwp_get_add_on_download_url( get_the_ID() ); ?>" class="button large">Get this add-on</a>
			<?php endif; ?>
		<?php
			// if the user is logged and has purchased a lower license, show a link to upgrade their license 
			elseif ( is_user_logged_in() && 
				edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 0 )  ||
				edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 1 ) )
		: ?>
			<p>This add-on will become immediately available to you after you <a title="Upgrade Your License" href="<?php echo affwp_get_dev_license_upgrade_url(); ?>">upgrade your license</a>.</p>
			<a title="Upgrade Your License" href="<?php echo affwp_get_dev_license_upgrade_url(); ?>" class="button large">Upgrade license</a>
		<?php else : // user is logged in and has not purchased, or is logged out. Direct link to purchase dev license 
			$purchase_url = edd_get_checkout_uri() . '?edd_action=add_to_cart&amp;download_id=' . affwp_get_affiliatewp_id() .'&amp;edd_options[price_id]=2';
		?>
			<p>This add-on is only available to <a title="Developer License" href="<?php echo site_url( 'pricing' ); ?>">developer license</a> holders</p>
			<a title="Purchase developer license" class="button" href="<?php echo $purchase_url;?>">Purchase developer license</a>
		<?php endif; ?>

		
	</div>

<?php
get_sidebar();
get_footer();