<?php
/**
 * The template for displaying Add-ons
 */

get_header(); ?>


<?php if ( have_posts() ) : ?>
<section class="section columns columns-2 addons">

	<div class="wrapper">
		<h1>Official Developer Add-ons</h1>
		<h2>Add-ons currently planned with more coming soon</h2>

		<?php if ( is_user_logged_in() && edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 2 ) ) : ?>
			

			<p>Hi developer license holder! All of the add-ons below are available from your <a title="Available from your account page" href="<?php echo site_url( 'account' ); ?>">account page</a>.</p>
		

		<?php
			// if the user is logged and has purchased a lower license, show a link to upgrade their license 
			elseif ( is_user_logged_in() && 
				edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 0 )  ||
				edd_has_user_purchased( get_current_user_id(), array( affwp_get_affiliatewp_id() ), 1 ) )
		: ?>
			<p>These add-ons will become immediately available to you when you <a title="Upgrade License" href="<?php echo affwp_get_dev_license_upgrade_url(); ?>">upgrade your license</a>.</p>
		<?php else : // user is logged in and has not purchased, or is logged out. Direct link to purchase dev license 
			$purchase_url = edd_get_checkout_uri() . '?edd_action=add_to_cart&amp;download_id=' . affwp_get_affiliatewp_id() .'&amp;edd_options[price_id]=2';
		?>
			<p>These add-ons are only available to <a title="Developer License Holders" href="<?php echo site_url( 'pricing' ); ?>">developer license</a> holders</p>
			
		<?php endif; ?>

	</div>	

	<?php while ( have_posts() ) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class( array( 'item', 'box' ) ); ?>> 
		    
			
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
		    			<?php the_post_thumbnail(); ?>
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

<?php get_footer();
